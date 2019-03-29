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
}