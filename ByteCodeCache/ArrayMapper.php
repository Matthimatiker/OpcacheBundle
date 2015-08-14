<?php

namespace Matthimatiker\OpcacheBundle\ByteCodeCache;

/**
 * Maps cache data to a simple array structure and back.
 */
class ArrayMapper
{
    /**
     * @param ByteCodeCacheInterface $cache
     * @return array<string, mixed>
     */
    public function toArray(ByteCodeCacheInterface $cache)
    {
        return array(
            'enabled' => $cache->isEnabled(),
            'memory' => array(
                'usedInMb' => $cache->memory()->getUsedInMb(),
                'sizeInMb'  => $cache->memory()->getSizeInMb()
            ),
            'statistics' => array(
                'hits'   => $cache->statistics()->getHits(),
                'misses' => $cache->statistics()->getMisses()
            ),
            'cachedScripts' => array(
            )
        );
    }

    /**
     * @param array<string, mixed> $data
     * @return ByteCodeCacheInterface
     */
    public function fromArray(array $data)
    {
        return new StaticCacheData(
            $data['enabled'],
            new MemoryUsage($data['memory']['usedInMb'], $data['memory']['sizeInMb']),
            new Statistics($data['statistics']['hits'], $data['statistics']['misses']),
            $data['cachedScripts']
        );
    }
}
