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
        $requests = ($this->hits + $this->misses);
        if ($requests === 0) {
            return 0.0;
        }
        return ($this->hits / $requests) * 100.0;
    }

    /**
     * Returns the cache miss rate in percent.
     *
     * @return double
     */
    public function getMissRateInPercent()
    {
        $requests = ($this->hits + $this->misses);
        if ($requests === 0) {
            return 0.0;
        }
        return ($this->misses / $requests) * 100.0;
    }
}
