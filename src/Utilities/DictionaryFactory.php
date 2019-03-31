<?php
/**
 * Created by https://yue.dev
 * User: Justin Wang
 */

namespace Yue\YearAround\Utilities;

use Yue\YearAround\Contracts\IDictionary;
use Yue\YearAround\Impl\I18N\ChineseDictionary;
use Yue\YearAround\Impl\I18N\EnglishDictionary;
use Yue\YearAround\Impl\I18N\FrenchDictionary;
use Yue\YearAround\Impl\I18N\GermanyDictionary;
use Yue\YearAround\Impl\I18N\JapaneseDictionary;
use Yue\YearAround\Impl\I18N\SpanishDictionary;

class DictionaryFactory
{
    /**
     * 获取字典 默认为英文字典
     * @param string|null $lang
     * @return IDictionary
     */
    public static function GetInstance($lang = null){
        $lang = $lang ? strtolower($lang) : IDictionary::ENGLISH;
        /**
         * @var IDictionary $instance
         */
        $instance = null;

        switch ($lang){
            case IDictionary::CHINESE:
                $instance = new ChineseDictionary();
                break;
            case IDictionary::JAPANESE:
                $instance = new JapaneseDictionary();
                break;
            case IDictionary::FRENCH:
                $instance = new FrenchDictionary();
                break;
            case IDictionary::GERMANY:
                $instance = new GermanyDictionary();
                break;
            case IDictionary::SPANISH:
                $instance = new SpanishDictionary();
                break;
            default:
                $instance = new EnglishDictionary();
                break;
        }

        return $instance;
    }
}