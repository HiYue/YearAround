<?php
/**
 * Created by https://yue.dev
 * Author: Justin Wang
 * Email: hi@yue.dev
 */

namespace Yue\YearAround\Contracts;


interface IDay
{
    /**
     * 格式化输出
     * @param $format
     * @return string
     */
    public function format($format);
}