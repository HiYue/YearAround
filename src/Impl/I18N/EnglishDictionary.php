<?php
/**
 * Created by https://yue.dev
 * User: Justin Wang
 */

namespace Yue\YearAround\Impl\I18N;


use Yue\YearAround\Contracts\IDictionary;

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

    public function init()
    {
        foreach (range(1,12) as $idx) {
            $this->monthsList[$idx-1][] = $this->_abbrs[$idx-1];
            $this->monthsList[$idx-1][] = $this->_names[$idx-1];
        }
    }
}