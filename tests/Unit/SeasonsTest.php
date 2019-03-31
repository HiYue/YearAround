<?php
/**
 * Created by https://yue.dev
 * Author: Justin Wang
 * Email: hi@yue.dev
 */

use Yue\YearAround\Impl\Season;
use Yue\YearAround\Contracts\ISeason;
class SeasonsTest extends \PHPUnit\Framework\TestCase
{
    public function testMonthCanGetSeason(){
        $m = \Yue\YearAround\Utilities\DateParser::GetMonth(2, \Yue\YearAround\Utilities\DictionaryFactory::GetInstance(\Yue\YearAround\Contracts\IDictionary::ENGLISH));
        $this->assertNotNull($m->getSeason());
        $this->assertEquals(3, count($m->getSeason()->getMonths()));
    }

    /**
     * 测试北半球
     */
    public function testCreateSeasonNorth(){
        // English
        $dic = new \Yue\YearAround\Impl\I18N\EnglishDictionary();
        foreach (range(ISeason::SPRING, ISeason::WINTER) as $type) {
            $season = new Season($type, $dic);
            $this->assertEquals($dic->seasonsName[$type], $season->getName());
            $this->_dumpSeason($season);
        }
        // Chinese
        $dic = new \Yue\YearAround\Impl\I18N\ChineseDictionary();
        foreach (range(ISeason::SPRING, ISeason::WINTER) as $type) {
            $season = new Season($type,$dic);
            $this->assertEquals($dic->seasonsName[$type], $season->getName());
            $this->_dumpSeason($season);
        }
    }

    /**
     * 测试南半球
     */
    public function testCreateSeasonSouth(){
        // English
        $dic = new \Yue\YearAround\Impl\I18N\EnglishDictionary();
        foreach (range(ISeason::SPRING, ISeason::WINTER) as $type) {
            $season = new Season($type,$dic, \Yue\YearAround\Contracts\IHemisphere::SOUTH);
            $this->assertEquals($dic->seasonsName[$type], $season->getName());
            $this->_dumpSeason($season);
        }
        // Chinese
        $dic = new \Yue\YearAround\Impl\I18N\ChineseDictionary();
        foreach (range(ISeason::SPRING, ISeason::WINTER) as $type) {
            $season = new Season($type,$dic,\Yue\YearAround\Contracts\IHemisphere::SOUTH);
            $this->assertEquals($dic->seasonsName[$type], $season->getName());
            $this->_dumpSeason($season);
        }
    }

    private function _dumpSeason($season, $ignore = true){
        if($ignore)
            return;

        echo PHP_EOL;
        echo $season->getName().PHP_EOL;
        foreach ($season->getMonths() as $month) {
            /**
             * @var \Yue\YearAround\Contracts\IMonth $month
             */
            echo $month->getName().';';
        }
        echo PHP_EOL.'************************************'.PHP_EOL;
    }
}