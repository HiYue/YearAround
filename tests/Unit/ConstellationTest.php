<?php
/**
 * Created by https://yue.dev
 * Author: Justin Wang
 * Email: hi@yue.dev
 */
use Yue\YearAround\Contracts\IConstellation;
use Yue\YearAround\Context;

class ConstellationTest extends \PHPUnit\Framework\TestCase
{
    /**
     * 测试可以按照日期和类型来获取星座
     */
    public function testCreateConstellations(){
        foreach (range(IConstellation::Aquarius, IConstellation::Capricorn) as $type) {
            $constellation = \Yue\YearAround\Context::CreateConstellation(null, null, null,$type);
            $this->assertNotNull($constellation);
            $this->assertNotNull($constellation->prev());
            $this->assertNotNull($constellation->next());
//            echo PHP_EOL;
//            echo $constellation->getName().': '.$constellation->getFistDay()->format('m-d').' -> '.$constellation->getLastDay()->format('m-d');
//            echo PHP_EOL.'****************'.PHP_EOL;
        }

        foreach (range(1, 12) as $item) {
            $constellation = \Yue\YearAround\Context::CreateConstellation($item, 10);
            $this->assertNotNull($constellation);
            $this->assertNotNull($constellation->prev());
            $this->assertNotNull($constellation->next());
//            echo PHP_EOL;
//            echo $constellation->getName().': '.$constellation->getFistDay()->format('m-d').' -> '.$constellation->getLastDay()->format('m-d');
//            echo PHP_EOL.'****************'.PHP_EOL;
        }

        foreach (range(1, 12) as $item) {
            $m = \Yue\YearAround\Utilities\DateParser::GetMonth($item);
            $cs = $m->getConstellations();
            $this->assertEquals(2, count($cs));
//            foreach ($cs as $constellation) {
//                echo PHP_EOL;
//                echo $constellation->getName().': '.$constellation->getFistDay()->format('m-d').' -> '.$constellation->getLastDay()->format('m-d');
//                echo PHP_EOL.'****************'.PHP_EOL;
//            }
        }

        $leo = Context::CreateConstellation(null, null, null,IConstellation::Leo);
    }
}