<?php
/**
 * Created by https://yue.dev
 * User: Justin Wang
 */

namespace Yue\YearAround\Contracts;

use Carbon\Carbon;

interface IMonth
{
    /**
     * Get month index in integer
     * @return int
     */
    public function getIntValue();

    /**
     * Get Month name or abbrs
     * @param boolean $abbr
     * @return string
     */
    public function getName($abbr = false);

    /**
     * Set year of the month
     * @param $year
     * @return IMonth
     */
    public function setYear($year);

    /**
     * Get season
     * @return ISeason
     */
    public function getSeason();

    /**
     * Set Holiday
     * @param IHoliday $holiday
     * @return IMonth
     */
    public function setHoliday(IHoliday $holiday);

    /**
     * Get holidays in this month
     * @return array
     */
    public function getHolidays();

    /**
     * Get the last day of the month
     * @return Carbon
     */
    public function getLastDay();
}