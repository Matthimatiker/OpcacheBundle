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
            'cachedScripts' => $this->scriptsToArray($cache->scripts()),
            'configuration' => $cache->getConfiguration(),
            'interned_strings_usage' => [
                'used_memory' => $cache->internedStrings()->getUsageInMb(),
                'buffer_size' => $cache->internedStrings()->getSizeInMb(),
                'free_memory' => $cache->internedStrings()->getFreeInMb(),
                'number_of_strings' => $cache->internedStrings()->getStringCount(),
            ]
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
            new Memory($data['memory']['usedInMb'], $data['memory']['sizeInMb']),
            new Statistics($data['statistics']['hits'], $data['statistics']['misses']),
            new InternedStrings(
                $data['interned_strings_usage']['used_memory'] ?? 0,
                $data['interned_strings_usage']['buffer_size'] ?? 0,
                $data['interned_strings_usage']['free_memory'] ?? 0,
                $data['interned_strings_usage']['number_of_strings'] ?? 0
            ),
            $this->scriptsFromArray($data['cachedScripts']),
            $data['configuration']
        );
    }

    /**
     * @param ScriptCollection $scripts
     * @return array<string, mixed>
     */
    protected function scriptsToArray(ScriptCollection $scripts)
    {
        return array(
            'slots' => array(
                'used'   => $scripts->getSlots()->used(),
                'wasted' => $scripts->getSlots()->wasted(),
                'max'    => $scripts->getSlots()->max()
            ),
            'scripts' => array_map(function (Script $script) {
                return array(
                    'path' => $script->getFile()->getPathname(),
                    'memoryConsumptionInMb' => $script->getMemoryConsumptionInMb(),
                    'hits' => $script->getHits(),
                    'lastAccess' => $script->getLastAccess()->format('Y-m-d H:i:s')
                );
            }, iterator_to_array($scripts))
        );
    }

    /**
     * @param array<string, mixed> $data
     * @return ScriptCollection
     */
    protected function scriptsFromArray(array $data)
    {
        $slots   = new ScriptSlots($data['slots']['used'], $data['slots']['max'], $data['slots']['wasted']);
        $scripts = array_map(function (array $scriptData) {
            return new Script(
                $scriptData['path'],
                $scriptData['memoryConsumptionInMb'],
                $scriptData['hits'],
                new \DateTimeImmutable($scriptData['lastAccess'])
            );
        }, $data['scripts']);
        return new ScriptCollection($scripts, $slots);
    }
}
