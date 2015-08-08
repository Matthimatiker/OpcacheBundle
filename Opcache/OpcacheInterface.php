<?php

namespace Matthimatiker\OpcacheBundle\Opcache;

interface OpcacheInterface
{
    public function isEnabled();

    // Size/Memory: max, used, full, usage in %
    public function memory();

    // CacheEntry
    public function getCachedScripts();
}
