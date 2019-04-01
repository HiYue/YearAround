<?php
/**
 * Created by https://yue.dev
 * User: Justin Wang
 */

namespace Yue\YearAround;

use Yue\YearAround\Contracts\IMonth;
use Yue\YearAround\Utilities\ConstellationFactory;
use Yue\YearAround\Utilities\DateParser;

class Context
{
    /**
     * @param $month
     * @param $day
     * @param null $dictionary
     * @param int $type
     * @return Contracts\IConstellation
     */
    public static function CreateConstellation($month, $day, $dictionary = null, $type = 0){
        if($type){
            return ConstellationFactory::Instance($type, $dictionary);
        }
        return ConstellationFactory::GetInstance($month, $day, $dictionary);
    }

    /**
     * Create a new year instance
     * @param $year
     * @param int $startMonth
     * @return YearAround
     */
    public static function CreateYear($year, $startMonth = 1){
        $year = new YearAround($year);
        if($startMonth > 1){
            $year->setStartMonth($startMonth);
        }
        return $year;
    }

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
        return $month->getIntValue() === Env::get(Env::START_MONTH);
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
        $start = Env::get(Env::START_MONTH);
        if($start == 1){
            return $month->getIntValue() === 12;
        }else{
            return $month->getIntValue() === $start - 1;
        }
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
        return in_array($month->getIntValue(), [3,6,9,12]); // 季度末是固定值
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
        return in_array($month->getIntValue(), [1,4,7,10]); // 季度首月是固定值
    }
}