<?php
/**
 * Created by https://yue.dev
 * Author: Justin Wang
 * Email: hi@yue.dev
 */

namespace Yue\YearAround\Impl\Constellations;

use Yue\YearAround\Utilities\DictionaryFactory;
use Carbon\Carbon;
use Yue\YearAround\Contracts\IConstellation;
use Yue\YearAround\Impl\AbstractConstellation;
use Yue\YearAround\Contracts\IDictionary;
use Yue\YearAround\Env;

class Sagittarius extends AbstractConstellation
{
    /**
     * Aquarius constructor.
     * @param IDictionary|null $dictionary
     */
    public function __construct($dictionary = null)
    {
        $this->dictionary = $dictionary ? $dictionary : DictionaryFactory::GetInstance(Env::get(Env::LANGUAGE));
        $this->firstDate = Carbon::create(1975,11,23);
        $this->lastDate = Carbon::create(1975,12,21);
        $this->_type = IConstellation::Sagittarius;
    }
}