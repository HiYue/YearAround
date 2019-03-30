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
}