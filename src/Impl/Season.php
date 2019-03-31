<?php
/**
 * Created by https://yue.dev
 * Author: Justin Wang
 * Email: hi@yue.dev
 */

namespace Yue\YearAround\Impl;

use Yue\YearAround\Contracts\IDictionary;
use Yue\YearAround\Contracts\IHemisphere;
use Yue\YearAround\Contracts\ISeason;
use Yue\YearAround\Env;
use Yue\YearAround\Utilities\DateParser;
use Yue\YearAround\Utilities\DictionaryFactory;

class Season implements ISeason
{
    protected $name = 'N.A';
    protected $months = [];
    private $dictionary;
    private $type;

    /**
     * Season constructor.
     * @param int $type
     * @param IDictionary $dictionary
     * @param int|null $hemisphere
     */
    public function __construct($type, $dictionary = null, $hemisphere = null)
    {
        $this->dictionary = $dictionary ? $dictionary : DictionaryFactory::GetInstance(Env::get(Env::LANGUAGE));
        $this->type = $type;

        $north = IHemisphere::NORTH === ($hemisphere ? $hemisphere : Env::get(Env::DEFAULT_HEMISPHERE));
        $monthValuesArray = [];
        if(ISeason::SPRING === $type){
            $monthValuesArray = $north ? range(1,3) : range(7,9);
        }
        elseif (ISeason::SUMMER === $type){
            $monthValuesArray = $north ? range(4,6) : range(10,12);
        }
        elseif (ISeason::AUTUMN === $type){
            $monthValuesArray = $north ? range(7,9) : range(1,3);
        }
        elseif (ISeason::WINTER === $type){
            $monthValuesArray = $north ? range(10,12) : range(4,6);
        }
        $this->_init($monthValuesArray);
    }

    private function _init($monthValuesArray){
        foreach ($monthValuesArray as $monthValue) {
            $this->months[] = DateParser::GetMonth($monthValue, $this->dictionary);
        }
    }

    public function getMonths()
    {
        return $this->months;
    }

    public function getName()
    {
        return $this->dictionary->formatSeason($this);
    }

    public function getType()
    {
        return $this->type;
    }
}