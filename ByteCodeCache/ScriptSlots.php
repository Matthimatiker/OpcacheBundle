<?php

namespace Matthimatiker\OpcacheBundle\ByteCodeCache;

/**
 * Holds information about available and used script slots.
 */
class ScriptSlots
{
    /**
     * The number of used slots.
     *
     * @var integer
     */
    protected $used = null;

    /**
     * The number of wasted slots.
     *
     * @var integer
     */
    protected $wasted = null;

    /**
     * The maximal number of slots.
     *
     * @var integer
     */
    protected $max = null;

    /**
     * @param integer $used Number of currently used slots.
     * @param integer $max Number of available slots.
     * @param integer $wasted Number of wasted slots that are not usable.
     */
    public function __construct($used, $max = PHP_INT_MAX, $wasted = 0)
    {
        $this->used   = $used;
        $this->max    = $max;
        $this->wasted = $wasted;
    }

    /**
     * Returns the number of used scripts slots.
     *
     * @return integer
     */
    public function used()
    {
        return $this->used;
    }

    /**
     * Returns the number of free script slots.
     *
     * @return integer
     */
    public function free()
    {
        return $this->max() - ($this->used() + $this->wasted());
    }

    /**
     * Returns the number of wasted slots.
     *
     * @return integer
     */
    public function wasted()
    {
        return $this->wasted;
    }

    /**
     * Returns the maximal number of available script slots.
     *
     * @return integer
     */
    public function max()
    {
        return $this->max;
    }

    /**
     * Returns the used slots in percent.
     *
     * @return double
     */
    public function getUsedInPercent()
    {
        return $this->getPercentageOfSlots($this->used());
    }

    /**
     * Returns the free slots in percent.
     *
     * @return double
     */
    public function getFreeInPercent()
    {
        return $this->getPercentageOfSlots($this->free());
    }

    /**
     * Returns the wasted slots in percent.
     *
     * @return double
     */
    public function getWastedInPercent()
    {
        return $this->getPercentageOfSlots($this->wasted());
    }

    /**
     * Checks if all slots are in use.
     *
     * @return boolean
     */
    public function full()
    {
        return $this->free() <= 0;
    }

    /**
     * Calculates $value as percentage of max slots.
     *
     * @param integer $value
     * @return double
     */
    protected function getPercentageOfSlots($value)
    {
        if ($this->max() === 0) {
            return 0.0;
        }
        return ($value / $this->max()) * 100.0;
    }
}
