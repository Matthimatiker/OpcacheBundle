<?php

namespace Matthimatiker\OpcacheBundle\ByteCodeCache;

/**
 * Provides access to information about the PHP 5.5 Opcache.
 */
class PhpOpcache implements ByteCodeCacheInterface
{
    /**
     * @param array<string, mixed>|null $cacheData
     */
    public function __construct(array $cacheData = null)
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
