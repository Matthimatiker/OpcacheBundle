<?php

namespace Matthimatiker\OpcacheBundle\ByteCodeCache;

interface CachedScriptsInterface extends \Traversable, \Countable
{
    /**
     * Maximal number of cached scripts.
     *
     * @return integer
     */
    public function max();
}
