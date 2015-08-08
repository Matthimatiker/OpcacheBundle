<?php

namespace Matthimatiker\OpcacheBundle\ByteCodeCache;

interface ByteCodeCacheInterface
{
    /**
     * @return boolean
     */
    public function isEnabled();

    /**
     * @return MemoryUsage
     */
    public function memory();

    /**
     * @return Statistics
     */
    public function statistics();

    // CacheEntry
    public function getCachedScripts();
}
