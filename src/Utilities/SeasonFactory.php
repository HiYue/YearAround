<?php
/**
 * Created by https://yue.dev
 * Author: Justin Wang
 * Email: hi@yue.dev
 */

namespace Yue\YearAround\Utilities;


use Yue\YearAround\Impl\Season;

class SeasonFactory
{
    public static function GetInstance($type, $dic = null, $hemisphere = null){
        return new Season($type, $dic, $hemisphere);
    }
}