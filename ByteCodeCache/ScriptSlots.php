<?php

namespace Matthimatiker\OpcacheBundle\ByteCodeCache;

/**
 * Holds information about available and used script slots.
 */
class ScriptSlots
{
    /**
     * @param integer $used Number of currently used slots.
     * @param integer $max Number of available slots.
     */
    public function __construct($used, $max)
    {

    }

    /**
     * Returns the number of used scripts slots.
     *
     * @return integer
     */
    public function used()
    {

    }

    /**
     * Returns the number of free script slots.
     *
     * @return integer
     */
    public function free()
    {

    }

    /**
     * Returns the maximal number of available script slots.
     *
     * @return integer
     */
    public function max()
    {

    }

    /**
     * Returns the slot usage in percent.
     *
     * @return double
     */
    public function getUsageInPercent()
    {

    }

    /**
     * Checks if all slots are in use.
     *
     * @return boolean
     */
    public function isFull()
    {

    }
}
