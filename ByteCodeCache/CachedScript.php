<?php

namespace Matthimatiker\OpcacheBundle\ByteCodeCache;

/**
 * Provides information about a single cached script.
 */
class CachedScript
{
    /**
     * @param \SplFileInfo|string $pathOrFile
     * @param double $memoryConsumptionInMb
     * @param integer $hits
     * @param \DateTimeInterface|string $lastAccess
     */
    public function __construct($pathOrFile, $memoryConsumptionInMb, $hits, $lastAccess)
    {

    }

    /**
     * Provides information about the script file.
     *
     * @return \SplFileInfo
     */
    public function getFile()
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
     * The number of cache hits for this script.
     *
     * @return integer
     */
    public function getHits()
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
