<?php
/**
 * Created by https://yue.dev
 * User: Justin Wang
 */

namespace Yue\YearAround\Contracts;


use Carbon\Carbon;

interface IHoliday
{
    public function getName();

    /**
     * @return Carbon
     */
    public function getStartDay();

    /**
     * @return Carbon
     */
    public function getEndDay();

    /**
     * @return int
     */
    public function countDays();
}