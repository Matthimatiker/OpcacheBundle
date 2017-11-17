<?php

namespace Matthimatiker\OpcacheBundle\Tests\ByteCodeCache;

use Matthimatiker\OpcacheBundle\ByteCodeCache\ArrayMapper;
use Matthimatiker\OpcacheBundle\ByteCodeCache\ByteCodeCacheInterface;
use Matthimatiker\OpcacheBundle\ByteCodeCache\InternedStrings;
use Matthimatiker\OpcacheBundle\ByteCodeCache\Memory;
use Matthimatiker\OpcacheBundle\ByteCodeCache\Script;
use Matthimatiker\OpcacheBundle\ByteCodeCache\ScriptCollection;
use Matthimatiker\OpcacheBundle\ByteCodeCache\ScriptSlots;
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

    public function testEnabledStateCanBeRestoredFromArray()
    {
        $originalByteCodeCache = $this->createByteCodeCache();
        $byteCodeCache = $this->transformAndRestore($originalByteCodeCache);

        $this->assertEquals($originalByteCodeCache->isEnabled(), $byteCodeCache->isEnabled());
    }

    public function testMemoryCanBeRestoredFromArray()
    {
        $originalByteCodeCache = $this->createByteCodeCache();
        $byteCodeCache = $this->transformAndRestore($originalByteCodeCache);

        $this->assertEquals($originalByteCodeCache->memory(), $byteCodeCache->memory());
    }

    public function testStatisticsCanBeRestoredFromArray()
    {
        $originalByteCodeCache = $this->createByteCodeCache();
        $byteCodeCache = $this->transformAndRestore($originalByteCodeCache);

        $this->assertEquals($originalByteCodeCache->statistics(), $byteCodeCache->statistics());
    }

    public function testScriptsCanBeRestoredFromArray()
    {
        $originalByteCodeCache = $this->createByteCodeCache();
        $byteCodeCache = $this->transformAndRestore($originalByteCodeCache);

        $this->assertEquals($originalByteCodeCache->scripts(), $byteCodeCache->scripts());
    }

    public function testConfigurationCanBeRestoredFromArray()
    {
        $originalByteCodeCache = $this->createByteCodeCache();
        $byteCodeCache = $this->transformAndRestore($originalByteCodeCache);

        $this->assertEquals($originalByteCodeCache->getConfiguration(), $byteCodeCache->getConfiguration());
    }

    /**
     * Transforms the given byte code cache into an array and
     * recreates the cache from that array.
     *
     * @param ByteCodeCacheInterface $cache
     * @return ByteCodeCacheInterface
     */
    protected function transformAndRestore(ByteCodeCacheInterface $cache)
    {
        $result = $this->mapper->toArray($cache);
        $this->assertInternalType('array', $result);
        $restoredCache = $this->mapper->fromArray($result);
        $this->assertInstanceOf(ByteCodeCacheInterface::class, $restoredCache);
        return $restoredCache;
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
            new Memory(5.0, 15.0),
            new Statistics(20, 5),
            new InternedStrings(2.0, 8.0, 6.0, 1200),
            new ScriptCollection(
                array(
                    new Script('/any/file.php', 0.35, 42, '2015-06-01 12:00:00')
                ),
                new ScriptSlots(5, 10, 3)
            ),
            array('config' => 'value')
        );
    }
}
