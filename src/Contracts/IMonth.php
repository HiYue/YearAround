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
     * Get year of the month
     * @return int
     */
    public function getYear();

    /**
     * Get season
     * @return ISeason
     */
    public function getSeason();

    /**
     * Get possible Constellations
     * @return array
     */
    public function getConstellations();

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
     * @param int|null $year
     * @return Carbon
     */
    public function getLastDay($year = null);

    /**
     * Get the full description of the month
     * @return string
     */
    public function __toString();
}