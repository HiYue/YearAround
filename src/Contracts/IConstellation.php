<?php
/**
 * Created by https://yue.dev
 * User: Justin Wang
 */

namespace Yue\YearAround\Contracts;

use Carbon\Carbon;
interface IConstellation
{
    const Aquarius  = 1; // 水瓶座
    const Pisces    = 2; // 双鱼座
    const Aries     = 3; // 白羊座
    const Taurus    = 4; // 金牛座
    const Gemini    = 5; // 双子座
    const Cancer    = 6; // 巨蟹座
    const Leo       = 7; // 狮子座
    const Virgo     = 8; // 处女座
    const Libra     = 9; // 天秤座
    const Scorpio   = 10; // 天蝎座
    const Sagittarius = 11; // 射手座
    const Capricorn = 12; // 魔羯座

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

    /**
     * Includes given month and day
     * @param int $month
     * @param int $day
     * @return bool
     */
    public function includes($month, $day);

    /**
     * Compare with the given constellation
     * @param IConstellation $constellation
     * @return bool
     */
    public function equals($constellation);

    /**
     * @return IConstellation
     */
    public function next();

    /**
     * @return IConstellation
     */
    public function prev();

    /**
     * Get type value
     * @return int
     */
    public function getType();
}