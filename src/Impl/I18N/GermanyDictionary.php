<?php
/**
 * Created by https://yue.dev
 * Author: Justin Wang
 * Email: hi@yue.dev
 */

namespace Yue\YearAround\Impl\I18N;


class GermanyDictionary extends EnglishDictionary
{
    protected $_abbrs = [
        'Jan',
        'Feb',
        'Mär',
        'Apr',
        'Mai',
        'Jun',
        'Jul',
        'Aug',
        'Sep',
        'Oct',
        'Nov',
        'Dec',
    ];
    protected $_names = [
        'Januar',
        'Februar',
        'März',
        'April',
        'Mai',
        'Juni',
        'Juli',
        'August',
        'September',
        'Oktober',
        'November',
        'Dezember',
    ];
    public $seasonsName = [
        'Frühling',
        'Sommer',
        'Herbst',
        'Winter',
    ];
    public $_constellationsName = [
        'Wassermann',
        'Fische',
        'Widder',
        'Stier',
        'Zwillinge',
        'Krebs',
        'Löwe',
        'Jungfrau',
        'Waage',
        'Skorpion',
        'Schütze',
        'Steinbock'
    ];
}