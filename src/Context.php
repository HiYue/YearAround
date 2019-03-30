<?php
/**
 * Created by https://yue.dev
 * User: Justin Wang
 */

namespace Yue\YearAround;

use Yue\YearAround\Contracts\IMonth;
use Yue\YearAround\Utilities\DateParser;

class Context
{
    /**
     * If the given date is the end of year
     * 是否传入的日期是年底
     * @param $date
     * @return boolean
     */
    public static function IsStartOfYear($date){
        /**
         * @var IMonth $month
         */
        $month = DateParser::GetMonth($date);
        return $month->getIntValue() === 1;
    }

    /**
     * If the given date is the end of year
     * 是否传入的日期是年底
     * @param $date
     * @return boolean
     */
    public static function IsEndOfYear($date){
        /**
         * @var IMonth $month
         */
        $month = DateParser::GetMonth($date);
        return $month->getIntValue() === 12;
    }

    /**
     * If the given date is the end of year
     * 是否传入的日期是某个季度末
     * @param $date
     * @return boolean
     */
    public static function IsEndOfSeason($date){
        /**
         * @var IMonth $month
         */
        $month = DateParser::GetMonth($date);
        return in_array($month->getIntValue(), [3,6,9,12]);
    }

    /**
     * If the given date is the start of season
     * 是否传入的日期是某个季度开始
     * @param $date
     * @return boolean
     */
    public static function IsStartOfSeason($date){
        /**
         * @var IMonth $month
         */
        $month = DateParser::GetMonth($date);
        return in_array($month->getIntValue(), [1,4,7,10]);
    }
}