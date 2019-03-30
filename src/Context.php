<?php
/**
 * Created by PhpStorm.
 * User: Justin Wang
 * Date: 29/3/19
 * Time: 2:47 PM
 */

namespace Yue\YearAround;

use Yue\YearAround\Utilities\DateParser;

class Context
{
    /**
     * If the given date is the end of year
     * 是否传入的日期是年底
     * @param $date
     * @return boolean
     */
    public static function IsEndOfYear($date){
        $yes = false;
        $month = DateParser::GetMonth($date);
        if(is_string($month)){
            if(strlen($month)<3){
                $yes = $month === '12';
            }elseif(strlen($month) === 3){
                $yes = strtolower($month) === 'dec';
            }else{
                $yes = strtolower($month) === 'december';
            }
        }elseif (is_int($month)){
            $yes = $month === 12;
        }
        return $yes;
    }

    /**
     * If the given date is the end of year
     * 是否传入的日期是某个季度末
     * @param $date
     * @return boolean
     */
    public static function IsEndOfSeason($date){
        $yes = false;
        $month = DateParser::GetMonth($date);
        if(is_string($month)){
            if(strlen($month)<3){
                $yes = $month === '3' || $month === '03'
                    || $month === '6' || $month === '06'
                    || $month === '9' || $month === '09'
                    || $month === '12' || $month === '12';
            }elseif(strlen($month) === 3){
                $month = strtolower($month);
                $yes = $month == 'mar' || $month == 'jun' || $month == 'sep' || $month == 'dec';
            }else{
                $month = strtolower($month);
                $yes = $month == 'march' || $month == 'june' || $month == 'september' || $month == 'december';
            }
        }elseif (is_int($month)){
            $yes = in_array($month, [3,6,9,12]);
        }
        return $yes;
    }

    /**
     * If the given date is the start of season
     * 是否传入的日期是某个季度开始
     * @param $date
     * @return boolean
     */
    public static function IsStartOfSeason($date){
        $yes = false;
        $month = DateParser::GetMonth($date);
        if(is_string($month)){
            if(strlen($month)<3){
                $yes = $month === '1' || $month === '01'
                    || $month === '4' || $month === '04'
                    || $month === '7' || $month === '07'
                    || $month === '10' || $month === '10';
            }elseif(strlen($month) === 3){
                $month = strtolower($month);
                $yes = $month == 'jan' || $month == 'apr' || $month == 'jul' || $month == 'oct';
            }else{
                $month = strtolower($month);
                $yes = $month == 'january' || $month == 'april' || $month == 'july' || $month == 'october';
            }
        }elseif (is_int($month)){
            $yes = in_array($month, [1,4,7,10]);
        }
        return $yes;
    }
}