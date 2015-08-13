<?php

namespace Matthimatiker\OpcacheBundle\ByteCodeCache;

/**
 * Provides information about a single cached script.
 */
class CachedScript
{
    /**
     * The path to the script file.
     *
     * @return string
     */
    public function getPath()
    {

    }

    /**
     * The number of cache hits for this script.
     *
     * @return integer
     */
    public function getHits()
    {

    }

    /**
     * Returns the memory consumption of this script in MB.
     *
     * @return double
     */
    public function getMemoryConsumptionInMb()
    {

    }

    /**
     * Returns the last time this script was read from cache.
     *
     * @return \DateTimeInterface
     */
    public function getLastAccess()
    {

    }
}
