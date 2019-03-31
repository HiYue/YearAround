<?php
/**
 * Created by https://yue.dev
 * User: Justin Wang
 */

namespace Yue\YearAround\Impl;

use Yue\YearAround\Contracts\IHemisphere;
use Carbon\Carbon;
use Yue\YearAround\Contracts\IDictionary;
use Yue\YearAround\Contracts\IHoliday;
use Yue\YearAround\Contracts\IMonth;
use Yue\YearAround\Contracts\ISeason;
use Yue\YearAround\Env;
use Yue\YearAround\Utilities\ConstellationFactory;
use Yue\YearAround\Utilities\DictionaryFactory;
use Yue\YearAround\Utilities\SeasonFactory;
use Yue\YearAround\Utilities\YearAroundMonthException;

class Month implements IMonth
{
    protected $name = '';
    protected $abbr = '';
    protected $monthIntValue = -1;
    protected $year = null;
    protected $holidays = [];
    protected $constellations = [];

    /**
     * @var Carbon $lastDay
     */
    private $lastDay = null;

    /**
     * @var ISeason $season
     */
    private $season = null;

    /**
     * @var IDictionary $_dictionary
     */
    private $_dictionary = null;

    /**
     * Month constructor.
     * @param $month
     * @param IDictionary|null $dic
     */
    public function __construct($month, $dic = null)
    {
        $this->_dictionary = $dic ? $dic : DictionaryFactory::GetInstance(Env::get(Env::LANGUAGE));
        foreach ($this->_dictionary->getContent() as $idx=>$item) {
            if($month === $idx+1){
                $this->init($idx+1);
                break;
            }
            elseif(in_array($month, $item)){
                $this->init($idx+1);
                break;
            }
        }

        if($this->monthIntValue<1){
            throwException(new YearAroundMonthException());
        }
    }

    /**
     * @param $intIndex
     * @return Month
     */
    private function init($intIndex){
        $this->monthIntValue = $intIndex;
        $this->abbr = $this->_dictionary->getAbbrMonth($intIndex-1);
        $this->name = $this->_dictionary->getFullNameMonth($intIndex-1);
        return $this;
    }

    /**
     * Get month index in integer
     * @return int
     */
    public function getIntValue()
    {
        return $this->monthIntValue;
    }

    /**
     * Get Month name
     * @param boolean $abbr
     * @return string
     */
    public function getName($abbr = false)
    {
        return $abbr ? $this->abbr : $this->name;
    }

    /**
     * Set year of the month
     * @param $year
     * @return IMonth
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Get season
     * @return ISeason
     */
    public function getSeason()
    {
        if(!$this->season){
            // 检查一下是哪个半球
            $north = IHemisphere::NORTH === Env::get(Env::DEFAULT_HEMISPHERE);
            if($north){
                $type = ISeason::SPRING;
                if(in_array($this->monthIntValue, range(4,6))){
                    $type = ISeason::SUMMER;
                }
                elseif(in_array($this->monthIntValue, range(7,9))){
                    $type = ISeason::AUTUMN;
                }
                elseif(in_array($this->monthIntValue, range(10,12))){
                    $type = ISeason::WINTER;
                }
            }else{
                // 南半球
                $type = ISeason::SPRING;
                if(in_array($this->monthIntValue, range(10,12))){
                    $type = ISeason::SUMMER;
                }
                elseif(in_array($this->monthIntValue, range(1,3))){
                    $type = ISeason::AUTUMN;
                }
                elseif(in_array($this->monthIntValue, range(4,6))){
                    $type = ISeason::WINTER;
                }
            }
            $this->season = SeasonFactory::GetInstance($type, $this->_dictionary);
        }
        return $this->season;
    }

    /**
     * Set Holiday
     * @param IHoliday $holiday
     * @return IMonth
     */
    public function setHoliday(IHoliday $holiday)
    {
        $this->holidays[] = $holiday;
        return $this;
    }

    /**
     * Get holidays in this month
     * @return array
     */
    public function getHolidays()
    {
        return $this->holidays;
    }

    /**
     * {@inheritdoc}
     */
    public function getLastDay($year = null)
    {
        if(is_null($this->lastDay)){
            $year = $year ? $year : Carbon::now()->year;
            $this->lastDay = Carbon::create($year, $this->monthIntValue, 1)->endOfMonth();
        }
        return $this->lastDay;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->_dictionary->formatMonth($this->year,$this);
    }

    /**
     * {@inheritdoc}
     */
    public function getConstellations()
    {
        if(empty($this->constellations)){
            $first = ConstellationFactory::GetInstance($this->getIntValue(),1,$this->_dictionary);
            $this->constellations[] = $first;
            $this->constellations[] = $first->next();
        }
        return $this->constellations;
    }
}