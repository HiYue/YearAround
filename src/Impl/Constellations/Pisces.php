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

class Pisces extends AbstractConstellation
{
    /**
     * Aquarius constructor.
     * @param IDictionary|null $dictionary
     */
    public function __construct($dictionary = null)
    {
        $this->dictionary = $dictionary ? $dictionary : DictionaryFactory::GetInstance(Env::get(Env::LANGUAGE));
        $this->firstDate = Carbon::create(1975,2,19);
        $this->lastDate = Carbon::create(1975,3,20);
        $this->_type = IConstellation::Pisces;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Pisces';
    }
}