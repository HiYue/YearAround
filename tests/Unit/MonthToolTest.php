<?php
/**
 * Created by PhpStorm.
 * User: justinwang
 * Date: 29/3/19
 * Time: 2:07 PM
 */
use PHPUnit\Framework\TestCase;

class MonthToolTest extends TestCase
{
    /**
     * 测试可以正确的获取某个月的最后一天
     */
    public function testMonthCanGetRightListDay(){
        $monthWith31Days = [1,3,5,7,8,10,12];
        foreach ($monthWith31Days as $monthWith31Day) {
            $m = \Yue\YearAround\Utilities\DateParser::GetMonth($monthWith31Day);
            $this->assertEquals(31, $m->getLastDay(2000)->day);
        }

        $monthWith30Days = [4,6,9,11];
        foreach ($monthWith30Days as $monthWith30Day) {
            $m = \Yue\YearAround\Utilities\DateParser::GetMonth($monthWith30Day);
            $this->assertEquals(30, $m->getLastDay(2000)->day);
        }

        // 测试闰月
        $m = \Yue\YearAround\Utilities\DateParser::GetMonth(2);
        $this->assertEquals(29, $m->getLastDay(2000)->day);
        $m2 = \Yue\YearAround\Utilities\DateParser::GetMonth(2);
        $this->assertEquals(28, $m2->getLastDay(2001)->day);
    }
    /**
     * 测试是否可以正确的判断某个给定格式的1月份是年底
     */
    public function testIsStartOfYearForAnyGivenMonthValue(){
        $this->assertTrue(\Yue\YearAround\Context::IsStartOfYear(1),'1 is start of any year');
        $this->assertTrue(\Yue\YearAround\Context::IsStartOfYear('1'));
        $this->assertTrue(\Yue\YearAround\Context::IsStartOfYear('01'));
        $this->assertTrue(\Yue\YearAround\Context::IsStartOfYear('Jan'));
        $this->assertTrue(\Yue\YearAround\Context::IsStartOfYear('January'));
        foreach ([1] as $item) {
            $date = \Carbon\Carbon::create(2018, $item,10);
            $this->assertTrue(\Yue\YearAround\Context::IsStartOfYear($date));
            $this->assertFalse(\Yue\YearAround\Context::IsStartOfYear($date->addMonth()));
        }

        // Test not end of season month
        $this->assertFalse(\Yue\YearAround\Context::IsStartOfYear(4));
        $this->assertFalse(\Yue\YearAround\Context::IsStartOfYear('06'), '01 is not end of any year');
        $this->assertFalse(\Yue\YearAround\Context::IsStartOfYear('Feb'), 'Jan is not end of any year');
    }

    /**
     * 测试是否可以正确的判断某个给定格式的12月份是年底
     */
    public function testIsEndOfYearForAnyGivenMonthValue(){
        $this->assertTrue(\Yue\YearAround\Context::IsEndOfYear(12),'12 is end of any year');
        $this->assertTrue(\Yue\YearAround\Context::IsEndOfYear('12'));
        $this->assertTrue(\Yue\YearAround\Context::IsEndOfYear('Dec'));
        foreach ([12] as $item) {
            $date = \Carbon\Carbon::create(2018, $item,10);
            $this->assertTrue(\Yue\YearAround\Context::IsEndOfYear($date));
            $this->assertFalse(\Yue\YearAround\Context::IsEndOfYear($date->addMonth()));
        }

        // Test not end of season month
        $this->assertFalse(\Yue\YearAround\Context::IsEndOfYear(1));
        $this->assertFalse(\Yue\YearAround\Context::IsEndOfYear('01'), '01 is not end of any year');
        $this->assertFalse(\Yue\YearAround\Context::IsEndOfYear('Jan'), 'Jan is not end of any year');
    }
    /**
     * Test is end of season function
     */
    public function testIsEndOfSeasonForAnyGivenMonthValue(){
        $this->assertTrue(\Yue\YearAround\Context::IsEndOfSeason(3));
        $this->assertTrue(\Yue\YearAround\Context::IsEndOfSeason(6));
        $this->assertTrue(\Yue\YearAround\Context::IsEndOfSeason(9));
        $this->assertTrue(\Yue\YearAround\Context::IsEndOfSeason(12));

        $this->assertTrue(\Yue\YearAround\Context::IsEndOfSeason('Mar'));
        $this->assertTrue(\Yue\YearAround\Context::IsEndOfSeason('Jun'));
        $this->assertTrue(\Yue\YearAround\Context::IsEndOfSeason('Sep'));
        $this->assertTrue(\Yue\YearAround\Context::IsEndOfSeason('Dec'));

        $this->assertTrue(\Yue\YearAround\Context::IsEndOfSeason('3'));
        $this->assertTrue(\Yue\YearAround\Context::IsEndOfSeason('03'));
        $this->assertTrue(\Yue\YearAround\Context::IsEndOfSeason('6'));
        $this->assertTrue(\Yue\YearAround\Context::IsEndOfSeason('06'));
        $this->assertTrue(\Yue\YearAround\Context::IsEndOfSeason('9'));
        $this->assertTrue(\Yue\YearAround\Context::IsEndOfSeason('09'));
        $this->assertTrue(\Yue\YearAround\Context::IsEndOfSeason('12'));

        foreach ([3, 6, 9, 12] as $item) {
            $date = \Carbon\Carbon::create(2018, $item,10);
            $this->assertTrue(\Yue\YearAround\Context::IsEndOfSeason($date));
            $this->assertFalse(\Yue\YearAround\Context::IsEndOfSeason($date->addMonth()));
        }

        // Test not end of season month
        $this->assertFalse(\Yue\YearAround\Context::IsEndOfSeason(1));
        $this->assertFalse(\Yue\YearAround\Context::IsEndOfSeason('01'), '01 is not end of any season');
        $this->assertFalse(\Yue\YearAround\Context::IsEndOfSeason('Jan'), 'Jan is not end of any season');
    }

    /**
     * Test is start of season function
     */
    public function testIsStartOfSeasonForAnyGivenMonthValue(){
        $this->assertTrue(\Yue\YearAround\Context::IsStartOfSeason(1));
        $this->assertTrue(\Yue\YearAround\Context::IsStartOfSeason(4));
        $this->assertTrue(\Yue\YearAround\Context::IsStartOfSeason(7));
        $this->assertTrue(\Yue\YearAround\Context::IsStartOfSeason(10));

        $this->assertTrue(\Yue\YearAround\Context::IsStartOfSeason('Jan'));
        $this->assertTrue(\Yue\YearAround\Context::IsStartOfSeason('Apr'));
        $this->assertTrue(\Yue\YearAround\Context::IsStartOfSeason('Jul'));
        $this->assertTrue(\Yue\YearAround\Context::IsStartOfSeason('Oct'));

        $this->assertTrue(\Yue\YearAround\Context::IsStartOfSeason('1'));
        $this->assertTrue(\Yue\YearAround\Context::IsStartOfSeason('01'));
        $this->assertTrue(\Yue\YearAround\Context::IsStartOfSeason('4'));
        $this->assertTrue(\Yue\YearAround\Context::IsStartOfSeason('04'));
        $this->assertTrue(\Yue\YearAround\Context::IsStartOfSeason('7'));
        $this->assertTrue(\Yue\YearAround\Context::IsStartOfSeason('07'));
        $this->assertTrue(\Yue\YearAround\Context::IsStartOfSeason('10'));

        foreach ([1, 4, 7, 10] as $item) {
            $date = \Carbon\Carbon::create(2018, $item,10);
            $this->assertTrue(\Yue\YearAround\Context::IsStartOfSeason($date));
            $this->assertFalse(\Yue\YearAround\Context::IsStartOfSeason($date->addMonth()));
        }

        // Test not end of season month
        $this->assertFalse(\Yue\YearAround\Context::IsStartOfSeason(2));
        $this->assertFalse(\Yue\YearAround\Context::IsStartOfSeason('02'), '02 is not end of any season');
        $this->assertFalse(\Yue\YearAround\Context::IsStartOfSeason('May'), 'May is not end of any season');
    }
}