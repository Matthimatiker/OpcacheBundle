<?php

namespace Matthimatiker\OpcacheBundle\ByteCodeCache;

/**
 * Provides access to information about cached scripts.
 *
 * Counting returns the number of currently cached scripts:
 *
 *     $numberOfCachedScripts = count($scripts);
 *
 * Iterating over the collection provides information about each cached script:
 *
 *     foreach ($script as $script) {
 *         // $script is an instance of \Matthimatiker\OpcacheBundle\ByteCodeCache\CachedScript
 *     }
 *
 * @see \Matthimatiker\OpcacheBundle\ByteCodeCache\CachedScript
 */
class CachedScripts implements \IteratorAggregate, \Countable
{
    /**
     * @param CachedScript[] $scripts
     * @param integer $maxNumberOfSlots The maximal number of cachable scripts
     */
    public function __construct(array $scripts, $maxNumberOfSlots)
    {

    }

    /**
     * Iterates over the cached scripts.
     *
     * @return \Traversable
     * @see \Matthimatiker\OpcacheBundle\ByteCodeCache\CachedScript
     */
    public function getIterator()
    {
        // TODO: Implement getIterator() method.
    }

    /**
     * Maximal number of cached scripts.
     *
     * @return integer
     */
    public function getMaxNumberOfSlots()
    {

    }

    /**
     * Returns the number of scripts that could be added to the cache.
     *
     * @return integer
     */
    public function getNumberOfFreeSlots()
    {

    }

    /**
     * Calculates the usage of caching slots in percent.
     *
     * @return double
     */
    public function getSlotUsageInPercent()
    {

    }

    /**
     * Returns the number of currently cached scripts.
     *
     * @return integer
     */
    public function count()
    {
        // TODO: Implement count() method.
    }
}
