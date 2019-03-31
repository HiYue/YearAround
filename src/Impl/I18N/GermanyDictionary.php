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

    protected $seasonsName = [
        'Frühling',
        'Sommer',
        'Herbst',
        'Winter',
    ];

    public function __construct()
    {
        parent::__construct();
    }
}