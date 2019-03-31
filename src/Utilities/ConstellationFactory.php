<?php
/**
 * Created by https://yue.dev
 * Author: Justin Wang
 * Email: hi@yue.dev
 */

namespace Yue\YearAround\Utilities;

use Yue\YearAround\Impl\Constellations\Aries;
use Yue\YearAround\Impl\Constellations\Taurus;
use Yue\YearAround\Impl\Constellations\Gemini;
use Yue\YearAround\Impl\Constellations\Cancer;
use Yue\YearAround\Impl\Constellations\Leo;
use Yue\YearAround\Impl\Constellations\Virgo;
use Yue\YearAround\Impl\Constellations\Libra;
use Yue\YearAround\Impl\Constellations\Scorpio;
use Yue\YearAround\Impl\Constellations\Sagittarius;
use Yue\YearAround\Impl\Constellations\Capricorn;
use Yue\YearAround\Contracts\IConstellation;
use Yue\YearAround\Impl\Constellations\Aquarius;
use Yue\YearAround\Impl\Constellations\Pisces;

class ConstellationFactory
{
    /**
     * Get constellation by give month, day and dictionary
     * @param int $month
     * @param int $day
     * @param null $dictionary
     * @return IConstellation
     */
    public static function GetInstance($month, $day, $dictionary = null){
        /**
         * @var IConstellation $instance
         */
        $instance = null;
        foreach (range(1, 12) as $type) {
            $instance = self::Instance($type,$dictionary);
            if($instance->includes($month, $day)){
                break;
            }
        }
        return $instance;
    }

    /**
     * Get constellation by give type and dictionary
     * @param $type
     * @param null $dictionary
     * @return IConstellation
     */
    public static function Instance($type, $dictionary = null){
        /**
         * @var IConstellation $instance
         */
        $instance = null;
        switch ($type){
            case IConstellation::Aquarius:
                $instance = new Aquarius($dictionary);
                break;
            case IConstellation::Pisces:
                $instance = new Pisces($dictionary);
                break;
            case IConstellation::Aries:
                $instance = new Aries($dictionary);
                break;
            case IConstellation::Taurus:
                $instance = new Taurus($dictionary);
                break;
            case IConstellation::Gemini:
                $instance = new Gemini($dictionary);
                break;
            case IConstellation::Cancer:
                $instance = new Cancer($dictionary);
                break;
            case IConstellation::Leo:
                $instance = new Leo($dictionary);
                break;
            case IConstellation::Virgo:
                $instance = new Virgo($dictionary);
                break;
            case IConstellation::Libra:
                $instance = new Libra($dictionary);
                break;
            case IConstellation::Scorpio:
                $instance = new Scorpio($dictionary);
                break;
            case IConstellation::Sagittarius:
                $instance = new Sagittarius($dictionary);
                break;
            case IConstellation::Capricorn:
                $instance = new Capricorn($dictionary);
                break;
            default:
                break;
        }
        return $instance;
    }
}