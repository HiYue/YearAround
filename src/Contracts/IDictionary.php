<?php
/**
 * Created by https://yue.dev
 * User: Justin Wang
 */

namespace Yue\YearAround\Contracts;

abstract class IDictionary
{
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
     * Output 格式化输出
     * @param $year
     * @param IMonth $month
     * @param string $separator
     * @return string
     */
    public abstract function format($year, $month,$separator = null);

    public function getAbbr($idx){
        return isset($this->monthsList[$idx][2]) ? $this->monthsList[$idx][2] : '';
    }

    public function getFullName($idx){
        return isset($this->monthsList[$idx][2]) ? $this->monthsList[$idx][3] : '';
    }

    public function getContent(){
        return $this->monthsList;
    }
}