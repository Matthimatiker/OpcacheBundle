<?php

namespace Matthimatiker\OpcacheBundle\ByteCodeCache;

use Symfony\Component\Validator\Constraints\All;

/**
 * Provides access to data about cached scripts.
 */
class CachedScripts implements CachedScriptsInterface, \IteratorAggregate
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
        // TODO: Implement getMaxNumberOfCachableScripts() method.
    }

    /**
     * Calculates the ratio of current number of cached scripts in relation to the maximal
     * number of cachable scripts in percent.
     *
     * @return double
     */
    public function getUsageInPercent()
    {
        // TODO: Implement getUsageInPercent() method.
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
