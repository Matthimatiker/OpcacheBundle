<?php

namespace Matthimatiker\OpcacheBundle\ByteCodeCache;

/**
 * Cache implementation that is filled with static data.
 */
class StaticCacheData implements ByteCodeCacheInterface
{
    /**
     * @var boolean
     */
    protected $enabled = null;

    /**
     * @var MemoryUsage
     */
    protected $memory = null;

    /**
     * @var Statistics
     */
    protected $statistics = null;

    /**
     * @var ScriptCollection
     */
    protected $scripts = null;

    /**
     * @param boolean $enabled
     * @param MemoryUsage $memory
     * @param Statistics $statistics
     * @param ScriptCollection|Script[] $scripts
     */
    public function __construct($enabled, MemoryUsage $memory, Statistics $statistics, $scripts = array())
    {
        $this->enabled    = $enabled;
        $this->memory     = $memory;
        $this->statistics = $statistics;
        $this->scripts    = (is_array($scripts)) ? new ScriptCollection($scripts) : $scripts;
    }

    /**
     * Checks if the byte code cache is active.
     *
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Provides information about the memory usage.
     *
     * @return MemoryUsage
     */
    public function memory()
    {
        return $this->memory;
    }

    /**
     * Provides caching statistics.
     *
     * @return Statistics
     */
    public function statistics()
    {
        return $this->statistics;
    }

    /**
     * Returns data about cached scripts.
     *
     * @return ScriptCollection
     */
    public function scripts()
    {
        return $this->scripts;
    }
}
