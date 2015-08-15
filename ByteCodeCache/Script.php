<?php

namespace Matthimatiker\OpcacheBundle\ByteCodeCache;

/**
 * Provides information about a single cached script.
 */
class Script
{
    /**
     * Information about the cached file.
     *
     * @var \SplFileInfo
     */
    protected $file = null;

    /**
     * Memory consumption in the cache in MB.
     *
     * @var double
     */
    protected $memoryConsumptionInMb = null;

    /**
     * Number of cache hits for this script.
     *
     * @var integer
     */
    protected $hits = null;

    /**
     * The last time that this script was requested from cache.
     *
     * @var \DateTimeInterface
     */
    protected $lastAccess = null;

    /**
     * @param \SplFileInfo|string $pathOrFile
     * @param double $memoryConsumptionInMb
     * @param integer $hits
     * @param \DateTimeInterface|string $lastAccess
     */
    public function __construct($pathOrFile, $memoryConsumptionInMb, $hits, $lastAccess)
    {
        $this->file = (is_string($pathOrFile)) ? new \SplFileInfo($pathOrFile) : $pathOrFile;
        $this->memoryConsumptionInMb = $memoryConsumptionInMb;
        $this->hits = $hits;
        $this->lastAccess = (is_string($lastAccess)) ? new \DateTimeImmutable($lastAccess) : $lastAccess;
    }

    /**
     * Provides information about the script file.
     *
     * @return \SplFileInfo
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Returns the memory consumption of this script in MB.
     *
     * @return double
     */
    public function getMemoryConsumptionInMb()
    {
        return $this->memoryConsumptionInMb;
    }

    /**
     * Returns the memory consumption of this script in bytes.
     *
     * @return integer
     */
    public function getMemoryConsumptionInBytes()
    {

    }

    /**
     * The number of cache hits for this script.
     *
     * @return integer
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * Returns the last time this script was read from cache.
     *
     * @return \DateTimeInterface
     */
    public function getLastAccess()
    {
        return $this->lastAccess;
    }
}
