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