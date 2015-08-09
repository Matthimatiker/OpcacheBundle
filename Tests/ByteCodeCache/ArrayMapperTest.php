<?php

namespace Matthimatiker\OpcacheBundle\Tests\ByteCodeCache;

use Matthimatiker\OpcacheBundle\ByteCodeCache\ArrayMapper;
use Matthimatiker\OpcacheBundle\ByteCodeCache\ByteCodeCacheInterface;
use Matthimatiker\OpcacheBundle\ByteCodeCache\MemoryUsage;
use Matthimatiker\OpcacheBundle\ByteCodeCache\StaticCacheData;
use Matthimatiker\OpcacheBundle\ByteCodeCache\Statistics;

class ArrayMapperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * System under test.
     *
     * @var ArrayMapper
     */
    protected $mapper = null;

    /**
     * Initializes the test environment.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->mapper = new ArrayMapper();
    }

    /**
     * Cleans up the test environment.
     */
    protected function tearDown()
    {
        $this->mapper = null;
        parent::tearDown();
    }

    public function testToArrayReturnsArray()
    {
        $result = $this->mapper->toArray($this->createByteCodeCache());

        $this->assertInternalType('array', $result);
    }

    public function testFromArrayReturnsByteCodeCache()
    {
        $result = $this->mapper->toArray($this->createByteCodeCache());
        $this->assertInternalType('array', $result);
        $byteCodeCache = $this->mapper->fromArray($result);

        $this->assertInstanceOf(ByteCodeCacheInterface::class, $byteCodeCache);
    }

    public function testByteCodeCacheDataCanBeRestoredFromArray()
    {
        $originalByteCodeCache = $this->createByteCodeCache();
        $result = $this->mapper->toArray($originalByteCodeCache);
        $this->assertInternalType('array', $result);
        $byteCodeCache = $this->mapper->fromArray($result);
        $this->assertInstanceOf(ByteCodeCacheInterface::class, $byteCodeCache);

        $this->assertEquals($originalByteCodeCache->isEnabled(), $byteCodeCache->isEnabled());
        $this->assertEquals($originalByteCodeCache->memory(), $byteCodeCache->memory());
        $this->assertEquals($originalByteCodeCache->statistics(), $byteCodeCache->statistics());
        $this->assertEquals($originalByteCodeCache->getCachedScripts(), $byteCodeCache->getCachedScripts());
    }

    /**
     * Returns a byte code cache with example data for testing.
     *
     * @return ByteCodeCacheInterface
     */
    protected function createByteCodeCache()
    {
        return new StaticCacheData(
            true,
            new MemoryUsage(5.0, 15.0),
            new Statistics(20, 5)
        );
    }
}
