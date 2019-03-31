<?php
/**
 * Created by https://yue.dev
 * Author: Justin Wang
 * Email: hi@yue.dev
 */

namespace Yue\YearAround;

use Yue\YearAround\Contracts\IHemisphere;

class Env
{
    const HEMISPHERE        = 1;  // 默认为北半球
    const START_MONTH       = 2;  // 计算本年时的起始月份
    const FORMAT_SEPARATOR  = 3;  // 计算本年时的起始月份
    const LANGUAGE          = 4;  // 使用的语言

    /**
     * Default values
     */
    const DEFAULT_HEMISPHERE        = IHemisphere::NORTH;   // 默认为北半球
    const DEFAULT_START_MONTH       = 1;                    // 默认为1月份是任何年的起始月份
    const DEFAULT_FORMAT_SEPARATOR  = '/';                  // 默认 / 作为年月日间的分隔符
    const DEFAULT_LANGUAGE          = 'en';                 // 默认英语作为语言

    /**
     * Get env value by given key
     * 判断: 如果有env方法存在那么就通过env来获取, 这个是Laravel常用的; 否则就返回默认的
     * @param $key
     * @return int|null
     */
    public static function get($key){
        $hasEnvFunctionDefined = function_exists('env');
        $result = null;
        switch ($key){
            case self::HEMISPHERE:
                $result = $hasEnvFunctionDefined ? env('YEAR_AROUND_HEMISPHERE', self::DEFAULT_HEMISPHERE) : self::DEFAULT_HEMISPHERE;
                break;
            case self::START_MONTH:
                $result = $hasEnvFunctionDefined ? env('YEAR_AROUND_START_MONTH', self::DEFAULT_START_MONTH) : self::DEFAULT_START_MONTH;
                break;
            case self::FORMAT_SEPARATOR:
                $result = $hasEnvFunctionDefined ? env('YEAR_AROUND_FORMAT_SEPARATOR', self::DEFAULT_FORMAT_SEPARATOR) : self::DEFAULT_FORMAT_SEPARATOR;
                break;
            case self::LANGUAGE:
                $result = $hasEnvFunctionDefined ? env('YEAR_AROUND_LANGUAGE', self::DEFAULT_LANGUAGE) : self::DEFAULT_LANGUAGE;
                break;
            default:
                break;
        }
        return $result;
    }
}