<?php
/**
 * Created by https://yue.dev
 * User: Justin Wang
 */

namespace Yue\YearAround\Contracts;


use Carbon\Carbon;

interface IHoliday extends IDay
{
    /**
     * Get Holiday name
     * @return string
     */
    public function getName();

    /**
     * @return IDay
     */
    public function getStartDay();

    /**
     * @return IDay
     */
    public function getEndDay();

    /**
     * @return int
     */
    public function countDays();
}