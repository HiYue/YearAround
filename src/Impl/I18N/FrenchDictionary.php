<?php
/**
 * Created by https://yue.dev
 * Author: Justin Wang
 * Email: hi@yue.dev
 */

namespace Yue\YearAround\Impl\I18N;


class FrenchDictionary extends EnglishDictionary
{
    protected $_abbrs = [
        'Jan',
        'Fév',
        'Mar',
        'Avr',
        'Mai',
        'Juin',
        'Juil.',
        'Août',
        'Sept.',
        'Oct.',
        'Nov.',
        'Déc.',
    ];
    protected $_names = [
        'Janvier',
        'Février',
        'Mars',
        'Avril',
        'Mai',
        'Juin',
        'Juillet',
        'Août',
        'Septembre',
        'Octobre',
        'Novembre',
        'Décembre',
    ];

    protected $seasonsName = [
        'Printemps',
        'Été',
        'L\'automne',
        'Hiver',
    ];

    public function __construct()
    {
        parent::__construct();
    }
}