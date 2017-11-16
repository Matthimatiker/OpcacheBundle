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
     * @var Memory
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
     * @var array<mixed>
     */
    protected $configuration = null;
    /**
     * @var InternedStrings
     */
    protected $internedStrings;

    /**
     * @param boolean $enabled
     * @param Memory $memory
     * @param Statistics $statistics
     * @param ScriptCollection|Script[] $scripts
     * @param array<mixed> $configuration
     */
    public function __construct(
        $enabled,
        Memory $memory,
        Statistics $statistics,
        InternedStrings $internedStrings,
        $scripts = array(),
        array $configuration = array()
    ) {
        $this->enabled       = $enabled;
        $this->memory        = $memory;
        $this->statistics    = $statistics;
        $this->scripts       = (is_array($scripts)) ? new ScriptCollection($scripts) : $scripts;
        $this->configuration = $configuration;
        $this->internedStrings = $internedStrings;
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
     * @return Memory
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

    /**
     * Returns the raw cache configuration.
     *
     * @return array<mixed>
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * Returns data about interned strings.
     *
     * @return InternedStrings
     */
    public function internedStrings(): InternedStrings
    {
        return $this->internedStrings;
    }
}
