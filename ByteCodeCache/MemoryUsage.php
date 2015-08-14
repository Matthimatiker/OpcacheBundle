<?php

namespace Matthimatiker\OpcacheBundle\ByteCodeCache;

/**
 * Holds information about the memory usage of the cache.
 */
class MemoryUsage
{
    /**
     * Current memory usage in MB.
     *
     * @var double
     */
    protected $usedInMb = null;

    /**
     * Maximal cache size in MB.
     *
     * @var double
     */
    protected $sizeInMb = null;

    /**
     * @param double $usageInMb
     * @param double $sizeInMb
     * @param double $wastedInMb The wasted memory in MB.
     */
    public function __construct($usageInMb, $sizeInMb, $wastedInMb = 0.0)
    {
        $this->usedInMb = $usageInMb;
        $this->sizeInMb  = $sizeInMb;
    }

    /**
     * Returns the current memory usage in MB.
     *
     * @return double
     */
    public function getUsedInMb()
    {
        return $this->usedInMb;
    }

    /**
     * Returns the free memory in MB.
     *
     * @return double
     */
    public function getFreeInMb()
    {
        return $this->getSizeInMb() - $this->getUsedInMb();
    }

    /**
     * Returns the maximal size of the cache in MB.
     *
     * @return double
     */
    public function getSizeInMb()
    {
        return $this->sizeInMb;
    }

    /**
     * Returns the cache usage in percent.
     *
     * 100% usage means that the cache is full.
     *
     * @return double
     */
    public function getUsedInPercent()
    {
        if ($this->sizeInMb == 0.0) {
            return 0.0;
        }
        return ($this->usedInMb / $this->sizeInMb) * 100.0;
    }

    /**
     * Checks if the cache is full.
     *
     * @return boolean
     */
    public function isFull()
    {
        return $this->usedInMb >= $this->sizeInMb;
    }
}
