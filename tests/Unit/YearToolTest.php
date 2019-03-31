<?php
/**
 * Created by https://yue.dev
 * Author: Justin Wang
 * Email: hi@yue.dev
 */

class YearToolTest extends \PHPUnit\Framework\TestCase
{
    public function testCreateYear(){
        $year = \Yue\YearAround\Context::CreateYear(2018);
        $leapYear = \Yue\YearAround\Context::CreateYear(2000);
        $this->assertFalse($year->isLeapYear());
        $this->assertTrue($leapYear->isLeapYear());

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
        for ($i=0;$i<12;$i++) {
            $firstMonthValueInt = $ms[$i];
            $year = \Yue\YearAround\Context::CreateYear(2018, $firstMonthValueInt);
            foreach ($year->getMonths() as $idx => $month) {
                if($month->getIntValue()<$firstMonthValueInt){
                    $this->assertEquals(2019, $month->getYear());
                }else{
                    $this->assertEquals(2018, $month->getYear());
                }
            }
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