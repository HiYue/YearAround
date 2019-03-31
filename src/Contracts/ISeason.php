<?php
/**
 * Created by PhpStorm.
 * User: Yue Wang
 * Date: 29/3/19
 * Time: 2:38 PM
 */

namespace Yue\YearAround\Contracts;


interface ISeason
{
    const SPRING = 0;
    const SUMMER = 1;
    const AUTUMN = 2;
    const WINTER = 3;

    /**
     * Get months of the season
     * @return array
     */
    public function getMonths();

    /**
     * Get Season name
     * @return string
     */
    public function getName();

    /**
     * Get Season type
     * @return int
     */
    public function getType();
}