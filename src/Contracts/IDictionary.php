<?php
/**
 * Created by https://yue.dev
 * User: Justin Wang
 */

namespace Yue\YearAround\Contracts;

abstract class IDictionary
{
    const ENGLISH   = 'en'; // 英语
    const CHINESE   = 'cn'; // 简体中文
    const JAPANESE  = 'jp'; // 日语
    const GERMANY   = 'de'; // 德语
    const FRENCH    = 'fr'; // 法语

    /**
     * 所有的月份
     * @var array
     */
    protected $monthsList = [
        ['01','1'],
        ['02','2'],
        ['03','3'],
        ['04','4'],
        ['05','5'],
        ['06','6'],
        ['07','7'],
        ['08','8'],
        ['09','9'],
        ['10','10'],
        ['11','11'],
        ['12','12'],
    ];

    /**
     * 所有的季节
     * @var array
     */
    protected $seasonsList = [
        ['01','1'],
        ['02','2'],
        ['03','3'],
        ['04','4'],
    ];

    public function __construct()
    {
        $this->init();
    }

    /**
     * Init the dictionary
     * 初始化对应的字典
     * @return void
     */
    public abstract function init();

    /**
     * Output 格式化输出月份
     * @param $year
     * @param IMonth $month
     * @param string $separator
     * @return string
     */
    public abstract function formatMonth($year, $month,$separator = null);

    /**
     * Output 格式化输出季节
     * @param ISeason $season
     * @return string
     */
    public abstract function formatSeason($season);

    public function getAbbrMonth($idx){
        return isset($this->monthsList[$idx][2]) ? $this->monthsList[$idx][2] : '';
    }

    public function getFullNameMonth($idx){
        return isset($this->monthsList[$idx][2]) ? $this->monthsList[$idx][3] : '';
    }

    public function getContent(){
        return $this->monthsList;
    }
}