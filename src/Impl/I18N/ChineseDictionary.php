<?php
/**
 * Created by https://yue.dev
 * User: Justin Wang
 */

namespace Yue\YearAround\Impl\I18N;


use Yue\YearAround\Contracts\IDictionary;

class ChineseDictionary extends IDictionary
{
    private $names = [
        '一月',
        '二月',
        '三月',
        '四月',
        '五月',
        '六月',
        '七月',
        '八月',
        '九月',
        '十月',
        '十一月',
        '十二月',
    ];

    public function init()
    {
        foreach (range(1,12) as $idx) {
            $this->monthsList[$idx-1][] = $this->names[$idx-1];
            $this->monthsList[$idx-1][] = $this->names[$idx-1];
        }
    }
}