<?php
/**
 * Created by https://yue.dev
 * User: Justin Wang
 */

namespace Yue\YearAround\Impl;


use Carbon\Carbon;
use Yue\YearAround\Contracts\IDictionary;
use Yue\YearAround\Contracts\IHoliday;
use Yue\YearAround\Contracts\IMonth;
use Yue\YearAround\Contracts\ISeason;
use Yue\YearAround\Utilities\DictionaryFactory;
use Yue\YearAround\Utilities\YearAroundMonthException;

class Month implements IMonth
{
    private $name = '';
    private $abbr = '';
    private $monthIntValue = -1;
    private $year = null;
    private $holidays = [];

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
     */
    public function __construct($month)
    {
        $this->_dictionary = DictionaryFactory::GetInstance();
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
        $this->abbr = $this->_dictionary->getAbbr($intIndex-1);
        $this->name = $this->_dictionary->getFullName($intIndex-1);
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
    public function getLastDay()
    {
        return $this->lastDay;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->_dictionary->format($this->year,$this);
    }
}