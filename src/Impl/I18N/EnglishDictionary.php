<?php
/**
 * Created by https://yue.dev
 * User: Justin Wang
 */

namespace Yue\YearAround\Impl\I18N;


use Yue\YearAround\Contracts\IDictionary;
use Yue\YearAround\Contracts\IMonth;
use Yue\YearAround\Env;

class EnglishDictionary extends IDictionary
{
    private $_abbrs = [
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'May',
        'Jun',
        'Jul',
        'Aug',
        'Sep',
        'Oct',
        'Nov',
        'Dec',
    ];
    private $_names = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December',
    ];

    public $seasonsName = [
        'Spring',
        'Summer',
        'Autumn',
        'Winter',
    ];

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        foreach (range(1,12) as $idx) {
            $this->monthsList[$idx-1][] = $this->_abbrs[$idx-1];
            $this->monthsList[$idx-1][] = $this->_names[$idx-1];
            if($idx<4){
                // Seasons
                $this->seasonsList[$idx-1][] = $this->seasonsName[$idx-1];
            }
        }
    }

    /**
     * @param $year
     * @param IMonth $month
     * @param string $separator
     * @return string
     */
    public function formatMonth($year, $month, $separator = null)
    {
        if(is_null($separator)){
            $separator = Env::get(Env::FORMAT_SEPARATOR);
        }
        return $month->getName().$separator.$year;
    }

    /**
     * {@inheritdoc}
     */
    public function formatSeason($season)
    {
        return $this->seasonsName[$season->getType()];
    }
}