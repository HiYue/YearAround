<?php
/**
 * Created by https://yue.dev
 * User: Justin Wang
 */

namespace Yue\YearAround\Contracts;

use Carbon\Carbon;
interface IConstellation
{
    /**
     * Get Month name
     * @return string
     */
    public function getName();

    /**
     * @return Carbon
     */
    public function getLastDay();

    /**
     * @return Carbon
     */
    public function getFistDay();
}