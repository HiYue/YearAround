<?php
/**
 * Created by PhpStorm.
 * User: Justin Wang
 * Date: 29/3/19
 * Time: 2:49 PM
 */

namespace Yue\YearAround\Utilities;

use Carbon\Carbon;
use Yue\YearAround\Contracts\IDictionary;
use Yue\YearAround\Contracts\IMonth;
use Yue\YearAround\Impl\Month;

class DateParser
{
    /**
     * 分析传入的日期参数, 然后返回月份的指示
     * @param $date
     * @param IDictionary|null $dic
     * @return IMonth
     */
    public static function GetMonth($date, $dic = null){
        /**
         * @var IMonth $month
         */
        $month = null;
        if(is_object($date)){
            if(get_class($date) === Carbon::class){
                /**
                 * @var Carbon $date
                 */
                $month = new Month($date->month, $dic);
            }
        }else{
            // 分析非Carbon类型的参数传入时 如何获取月份
            return new Month($date, $dic);
        }

        return $month;
    }
}