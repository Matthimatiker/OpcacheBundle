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
     * The maximal number of slots.
     *
     * @var integer
     */
    protected $max = null;

    /**
     * @param integer $used Number of currently used slots.
     * @param integer $max Number of available slots.
     */
    public function __construct($used, $max = PHP_INT_MAX)
    {
        $this->used = $used;
        $this->max  = $max;
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
        return $this->max() - $this->used();
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
     * Returns the slot usage in percent.
     *
     * @return double
     */
    public function getUsageInPercent()
    {
        return ($this->used() / $this->max()) * 100.0;
    }

    /**
     * Checks if all slots are in use.
     *
     * @return boolean
     */
    public function full()
    {
        return $this->used() >= $this->max();
    }
}
