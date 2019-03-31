<?php
/**
 * Created by https://yue.dev
 * Author: Justin Wang
 * Email: hi@yue.dev
 */

namespace Yue\YearAround\Impl\I18N;


class SpanishDictionary extends EnglishDictionary
{
    protected $_abbrs = [
        'Enero',
        'Feb.',
        'Marzo',
        'Abr',
        'Mayo',
        'Jun.',
        'Jul.',
        'Agosto',
        'Sept.',
        'Oct.',
        'Nov.',
        'Dic.',
    ];
    protected $_names = [
        'Enero',
        'Febrero',
        'Marzo',
        'Abril',
        'Mayo',
        'Junio',
        'Julio',
        'Agosto',
        'Septiembre',
        'Octubre',
        'Noviembre',
        'Diciembre',
    ];

    public $seasonsName = [
        'Primavera',
        'Verano',
        'Otoño',
        'Invierno',
    ];

    public function __construct()
    {
        parent::__construct();
    }
}