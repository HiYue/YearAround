<?php
/**
 * Created by https://yue.dev
 * Author: Justin Wang
 * Email: hi@yue.dev
 */

namespace Yue\YearAround\Contracts;

use Carbon\Carbon;

interface ICalendar
{
    /**
     * Set Years
     * @param array $years
     * @return ICalendar
     */
    public function setYear($years);

    /**
     * Set start date
     * @param Carbon $startDate
     * @return ICalendar
     */
    public function setStartDate(Carbon $startDate);

    /**
     * Set End date
     * @param Carbon $carbon
     * @return ICalendar
     */
    public function setEndDate(Carbon $carbon);

    /**
     * 输出日历 可以选择JSON的格式
     * @param bool $inJsonFormat
     * @return mixed
     */
    public function output($inJsonFormat = false);
}