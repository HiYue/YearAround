<?php
/**
 * Created by https://yue.dev
 * Author: Justin Wang
 * Email: hi@yue.dev
 */

namespace Yue\YearAround\Impl\Constellations;


use Carbon\Carbon;
use Yue\YearAround\Contracts\IConstellation;
use Yue\YearAround\Contracts\IDictionary;
use Yue\YearAround\Env;
use Yue\YearAround\Impl\AbstractConstellation;
use Yue\YearAround\Utilities\DictionaryFactory;

class Capricorn extends AbstractConstellation
{
    /**
     * Aquarius constructor.
     * @param IDictionary|null $dictionary
     */
    public function __construct($dictionary = null)
    {
        $this->dictionary = $dictionary ? $dictionary : DictionaryFactory::GetInstance(Env::get(Env::LANGUAGE));
        $this->firstDate = Carbon::create(1975,12,22);
        $this->lastDate = Carbon::create(1976,1,19);
        $this->_type = IConstellation::Capricorn;
    }
}