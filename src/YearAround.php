<?php
/**
 * Created by https://yue.dev
 * Author: Justin Wang
 * Email: hi@yue.dev
 */

namespace Yue\YearAround;


use Yue\YearAround\Contracts\IHemisphere;
use Yue\YearAround\Contracts\IMonth;
use Yue\YearAround\Utilities\DateParser;

class YearAround
{
    private $months;
    private $hemisphere = IHemisphere::NORTH;
    private $_year;

    /**
     * YearAround constructor.
     * 本年对象在生成的时候，会根据设定的起始月份来生成所有的月份对象
     * @param int $year
     */
    public function __construct($year)
    {
        $this->_year = $year;
        /**
         * 设定所在的半球
         */
        $this->hemisphere = Env::get(Env::HEMISPHERE);

        /**
         * 生成两年的月份排列
         */
//        $defaultMonthsIndex = range(1,12);
//        foreach (range(1, 12) as $idx) {
//            $defaultMonthsIndex[] = $idx;
//        }
//
//        // Todo 根据配置的默认起始月来生成一年中的所有月份
//        $startMonthValue = Env::get(Env::START_MONTH);
//        $index = 0;
//        foreach ($defaultMonthsIndex as $idx => $monthValue) {
//            if($monthValue === $startMonthValue){
//                $index = $idx;
//                break;
//            }
//        }
//
//        $startMonthValueInt = $defaultMonthsIndex[$index];
//
//        for ($i = 0; $i < 12; $i++){
//            $mIndex = $defaultMonthsIndex[$index + $i];
//            $m = DateParser::GetMonth($mIndex);
//            if($mIndex < $startMonthValueInt){
//                // 表示跨年了
//                $m->setYear($this->_year+1);
//            }else{
//                $m->setYear($this->_year);
//            }
//            $this->months[] = $m;
//        }
        $this->_init();
    }

    private function _init($startMonthValueInt = null){
        $this->months = [];
        /**
         * 生成两年的月份排列
         */
        $defaultMonthsIndexes = range(1,12);
        foreach (range(1, 12) as $idx) {
            $defaultMonthsIndexes[] = $idx;
        }

        // Todo 根据配置的默认起始月来生成一年中的所有月份
        $startMonthValue = $startMonthValueInt ? $startMonthValueInt : Env::get(Env::START_MONTH);
        $index = 0;
        foreach ($defaultMonthsIndexes as $idx => $monthValue) {
            if($monthValue === $startMonthValue){
                $index = $idx;
                break;
            }
        }

//        if(is_null($startMonthValueInt)){
//            $startMonthValueInt = $defaultMonthsIndex[$index];
//        }

        for ($i = 0; $i < 12; $i++){
            $mIndexValue = $defaultMonthsIndexes[$index + $i];
            $m = DateParser::GetMonth($mIndexValue);
            if($mIndexValue < $startMonthValue){
                // 表示跨年了
                $m->setYear($this->_year+1);
            }else{
                $m->setYear($this->_year);
            }
            $this->months[] = $m;
        }
        return $this;
    }

    /**
     * Get last month of the year
     * @return IMonth
     */
    public function getLastMonth(){
        return $this->months[11];
    }

    /**
     * Get first month of the year
     * @return IMonth
     */
    public function getFirstMonth(){
        return $this->months[0];
    }

    /**
     * 获取本年中的所有月份
     * @return array
     */
    public function getMonths(){
        return $this->months;
    }

    /**
     * @param $monthValueInt
     * @return YearAround
     */
    public function setStartMonth($monthValueInt){
        return $this->_init($monthValueInt);
    }
}