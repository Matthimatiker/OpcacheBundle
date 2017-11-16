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
     * @return Memory
     */
    public function memory();

    /**
     * Provides caching statistics.
     *
     * @return Statistics
     */
    public function statistics();

    /**
     * Returns data about cached scripts.
     *
     * @return ScriptCollection
     */
    public function scripts();

    /**
     * Returns the raw cache configuration.
     *
     * @return array<mixed>
     */
    public function getConfiguration();

    /**
     * Returns data about interned strings.
     *
     * @return InternedStrings
     */
    public function internedStrings(): InternedStrings;
}
