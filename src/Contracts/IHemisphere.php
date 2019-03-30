<?php
/**
 * Created by PhpStorm.
 * User: Justin Wang
 * Date: 29/3/19
 * Time: 2:43 PM
 */
namespace Yue\YearAround\Contracts;

interface IHemisphere
{
    const NORTH = 1;        // 北半球
    const SOUTH = 2;        // 南半球

    public static function GetEndOfSeason($name,$northOrSouth);
}