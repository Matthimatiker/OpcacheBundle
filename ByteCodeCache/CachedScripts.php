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
    public function getMaxNumberOfCachableScripts()
    {

    }

    /**
     * Calculates the ratio of current number of cached scripts in relation to the maximal
     * number of cachable scripts in percent.
     *
     * @return double
     */
    public function getUsageInPercent()
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
