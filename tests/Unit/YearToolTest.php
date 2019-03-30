<?php
/**
 * Created by https://yue.dev
 * Author: Justin Wang
 * Email: hi@yue.dev
 */

class YearToolTest extends \PHPUnit\Framework\TestCase
{
    public function testCreateYear(){
        $year = new \Yue\YearAround\YearAround(2018);
        $this->assertEquals(12, count($year->getMonths()),' 一年必须有12个月才对');

        $ms = range(1,12);

        foreach ($year->getMonths() as $idx => $month) {
            /**
             * @var \Yue\YearAround\Contracts\IMonth $month
             */
            $this->assertEquals($ms[$idx], $month->getIntValue());
            $this->assertEquals(2018, $month->getYear());
        }

        /**
         * 跨年的测试 起始月份为4月份
         */
        $ms = [4,5,6,7,8,9,10,11,12,1,2,3];
        foreach ($year->setStartMonth(4)->getMonths() as $idx => $month) {
            if($idx>8){
                $this->assertEquals(2019, $month->getYear());
            }else{
                $this->assertEquals(2018, $month->getYear());
            }
            $this->assertEquals($ms[$idx], $month->getIntValue());
        }
    }

    public function testCreateMonth(){
        $month = \Yue\YearAround\Utilities\DateParser::GetMonth(1);
        $this->assertEquals('Jan',$month->getName(true));
        $this->assertEquals('January',$month->getName());
        $this->assertEquals(1,$month->getIntValue());

        $month = \Yue\YearAround\Utilities\DateParser::GetMonth(5);
        $this->assertEquals('May',$month->getName(true));
        $this->assertEquals('May',$month->getName());
        $this->assertEquals(5,$month->getIntValue());
    }
}