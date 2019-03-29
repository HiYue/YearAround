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
}