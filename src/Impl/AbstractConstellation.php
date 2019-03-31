<?php
/**
 * Created by https://yue.dev
 * Author: Justin Wang
 * Email: hi@yue.dev
 */

namespace Yue\YearAround\Impl;


use Carbon\Carbon;
use Yue\YearAround\Contracts\IConstellation;
use Yue\YearAround\Contracts\IDictionary;
use Yue\YearAround\Impl\Constellations\Aquarius;
use Yue\YearAround\Impl\Constellations\Capricorn;
use Yue\YearAround\Utilities\ConstellationFactory;

abstract class AbstractConstellation implements IConstellation
{
    /**
     * @var Carbon $firstDate
     */
    protected $firstDate;

    /**
     * @var Carbon $lastDate
     */
    protected $lastDate;

    /**
     * @var IDictionary
     */
    protected $dictionary;

    /**
     * @var int $_type
     */
    protected $_type;
    /**
     * @var IConstellation $_prev
     */
    protected $_prev = null;
    /**
     * @var IConstellation $_next
     */
    protected $_next = null;

    /**
     * {@inheritdoc}
     */
    public function getLastDay()
    {
        return $this->lastDate;
    }

    /**
     * {@inheritdoc}
     */
    public function getFistDay()
    {
        return $this->firstDate;
    }

    /**
     * {@inheritdoc}
     */
    public function equals($constellation)
    {
        return $this->getType() === $constellation->getType();
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        if(!$this->_next){
            if($this->getType() === IConstellation::Capricorn){
                // 如果是摩羯座
                $this->_next = new Aquarius($this->dictionary); // 返回水瓶座
            }else{
                $this->_next = ConstellationFactory::Instance($this->getType()+1, $this->dictionary);
            }
        }
        return $this->_next;
    }

    /**
     * {@inheritdoc}
     */
    public function prev()
    {
        if(!$this->_prev){
            if($this->getType() === IConstellation::Aquarius){
                // 如果是水瓶座
                $this->_prev = new Capricorn($this->dictionary); // 返回摩羯座
            }else{
                $this->_prev = ConstellationFactory::Instance($this->getType()-1, $this->dictionary);
            }
        }
        return $this->_prev;
    }

    /**
     * {@inheritdoc}
     */
    public function includes($month, $day)
    {
        return ($this->firstDate->month === $month && $day >= $this->firstDate->day)
            ||
        ($this->lastDate->month === $month && $day <= $this->lastDate->day);
    }
}