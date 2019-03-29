<?php
/**
 * Created by PhpStorm.
 * User: Justin Wang
 * Date: 29/3/19
 * Time: 2:49 PM
 */

namespace Yue\YearAround\Utilities;


use Carbon\Carbon;

class DateParser
{
    /**
     * 分析传入的日期参数, 然后返回月份的指示
     * @param $date
     * @return mixed
     */
    public static function GetMonth($date){
        if(is_object($date)){
            if(get_class($date) === Carbon::class){
                /**
                 * @var Carbon $date
                 */
                return $date->month;
            }
        }else{
            // Todo: 分析非Carbon类型的参数传入时 如何获取月份
            return $date;
        }
    }
}