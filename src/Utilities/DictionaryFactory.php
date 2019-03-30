<?php
/**
 * Created by https://yue.dev
 * User: Justin Wang
 */

namespace Yue\YearAround\Utilities;


use Yue\YearAround\Contracts\IDictionary;
use Yue\YearAround\Impl\I18N\ChineseDictionary;
use Yue\YearAround\Impl\I18N\EnglishDictionary;

class DictionaryFactory
{
    /**
     * 获取字典 默认为英文字典
     * @param null $lang
     * @return IDictionary
     */
    public static function GetInstance($lang = null){
        $lang = $lang ? strtolower($lang) : 'en';
        /**
         * @var IDictionary $instance
         */
        $instance = null;

        switch ($lang){
            case 'cn':
                $instance = new ChineseDictionary();
                break;
            default:
                $instance = new EnglishDictionary();
                break;
        }

        return $instance;
    }
}