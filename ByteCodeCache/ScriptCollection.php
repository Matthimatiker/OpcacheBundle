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
 * @see \Matthimatiker\OpcacheBundle\ByteCodeCache\Script
 */
class ScriptCollection implements \IteratorAggregate, \Countable
{
    /**
     * List of cached scripts.
     *
     * @var Script[]
     */
    protected $scripts = null;

    /**
     * Provides information about the available script slots.
     *
     * @var ScriptSlots
     */
    protected $slots = null;

    /**
     * @param Script[] $scripts
     * @param integer $maxNumberOfSlots The maximal number of cachable scripts
     */
    public function __construct(array $scripts, $maxNumberOfSlots)
    {
        $this->scripts = $scripts;
        $this->slots   = new ScriptSlots(count($scripts), $maxNumberOfSlots);
    }

    /**
     * Iterates over the cached scripts.
     *
     * @return \Traversable
     * @see \Matthimatiker\OpcacheBundle\ByteCodeCache\Script
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->scripts);
    }

    /**
     * Returns information about the available script slots.
     *
     * @return ScriptSlots
     */
    public function getSlots()
    {
        return $this->slots;
    }

    /**
     * Returns the number of currently cached scripts.
     *
     * @return integer
     */
    public function count()
    {
        return count($this->scripts);
    }
}
