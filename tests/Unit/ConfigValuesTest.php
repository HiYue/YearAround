<?php
/**
 * Created by https://yue.dev
 * Author: Justin Wang
 * Email: hi@yue.dev
 */

use Yue\YearAround\Env;
class ConfigValuesTest extends \PHPUnit\Framework\TestCase
{
    public function testLoadEachConfigValue(){
        $this->assertEquals(1, Env::get(Env::START_MONTH));
        $this->assertEquals(\Yue\YearAround\Contracts\IHemisphere::NORTH, Env::get(Env::HEMISPHERE));
    }
}