<?php

namespace Matthimatiker\OpcacheBundle\ByteCodeCache;

/**
 * Defines an access layer for byte code cache information.
 */
interface ByteCodeCacheInterface
{
    /**
     * Checks if the byte code cache is active.
     *
     * @return boolean
     */
    public function isEnabled();

    /**
     * Provides information about the memory usage.
     *
     * @return MemoryUsage
     */
    public function memory();

    /**
     * Provides caching statistics.
     *
     * @return Statistics
     */
    public function statistics();

    // CacheEntry
    public function getCachedScripts();
}
