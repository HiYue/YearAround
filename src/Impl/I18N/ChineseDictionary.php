<?php
/**
 * Created by https://yue.dev
 * User: Justin Wang
 */

namespace Yue\YearAround\Impl\I18N;

use Yue\YearAround\Contracts\IDictionary;
use Yue\YearAround\Contracts\IMonth;

class ChineseDictionary extends IDictionary
{
    protected $names = [
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

    public $seasonsName = [
        '春季',
        '夏季',
        '秋季',
        '冬季',
    ];

    public $_constellationsName = [
        '水瓶座',
        '双鱼座',
        '白羊座',
        '金牛座',
        '双子座',
        '巨蟹座',
        '狮子座',
        '处女座',
        '天秤座',
        '天蝎座',
        '射手座',
        '魔羯座'
    ];

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        foreach (range(1,12) as $idx) {
            $this->monthsList[$idx-1][] = $this->names[$idx-1];
            $this->monthsList[$idx-1][] = $this->names[$idx-1];
            // 星座
            $this->constellationList[$idx-1][2] = $this->_constellationsName[$idx-1];

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
        return $year.'年'.$month->getName();
    }

    /**
     * {@inheritdoc}
     */
    public function formatSeason($season)
    {
        return $this->seasonsName[$season->getType()];
    }
}