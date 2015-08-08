<?php

namespace Matthimatiker\OpcacheBundle\ByteCodeCache;

/**
 * Holds statistics about the cache.
 */
class Statistics
{
    /**
     * Number of cache hits.
     *
     * @var integer
     */
    protected $hits = null;

    /**
     * Number of cache misses.
     *
     * @var integer
     */
    protected $misses = null;

    /**
     * @param integer $hits
     * @param integer $misses
     */
    public function __construct($hits, $misses)
    {
        $this->hits   = $hits;
        $this->misses = $misses;
    }

    /**
     * Returns the number of cache hits.
     *
     * @return integer
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * Returns the number of cache misses.
     *
     * @return integer
     */
    public function getMisses()
    {
        return $this->misses;
    }

    /**
     * Returns the cache hit rate in percent.
     *
     * @return double
     */
    public function getHitRateInPercent()
    {
        return $this->hits / ($this->hits + $this->misses);
    }
}
