<?php

namespace Matthimatiker\OpcacheBundle\DataCollector;

use Matthimatiker\OpcacheBundle\ByteCodeCache\ByteCodeCacheInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

/**
 * Collects data about the byte code cache usage.
 */
class ByteCodeCacheDataCollector extends DataCollector
{
    /**
     * @param ByteCodeCacheInterface $byteCodeCache
     */
    public function __construct(ByteCodeCacheInterface $byteCodeCache)
    {

    }

    /**
     * Collects data for the given Request and Response.
     *
     * @param Request $request A Request instance
     * @param Response $response A Response instance
     * @param \Exception $exception An Exception instance
     */
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        // TODO: Implement collect() method.
    }

    /**
     * Provides information about the byte code cache.
     *
     * @return ByteCodeCacheInterface
     */
    public function getByteCodeCache()
    {

    }

    /**
     * Returns the name of the collector.
     *
     * @return string The collector name
     */
    public function getName()
    {
        return 'matthimatiker_opcache.byte_code_cache';
    }
}
