<?php

namespace Matthimatiker\OpcacheBundle\ByteCodeCache;

/**
 * Cache implementation that is filled with static data.
 */
class StaticCacheData implements ByteCodeCacheInterface
{
    /**
     * @param boolean $enabled
     * @param MemoryUsage $memory
     * @param Statistics $statistics
     * @param array $cachedScripts
     */
    public function __construct($enabled, MemoryUsage $memory, Statistics $statistics, array $cachedScripts = array())
    {

    }

    /**
     * Checks if the byte code cache is active.
     *
     * @return boolean
     */
    public function isEnabled()
    {
        // TODO: Implement isEnabled() method.
    }

    /**
     * Provides information about the memory usage.
     *
     * @return MemoryUsage
     */
    public function memory()
    {
        // TODO: Implement memory() method.
    }

    /**
     * Provides caching statistics.
     *
     * @return Statistics
     */
    public function statistics()
    {
        // TODO: Implement statistics() method.
    }

    public function getCachedScripts()
    {
        // TODO: Implement getCachedScripts() method.
    }
}
