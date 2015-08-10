<?php

namespace Matthimatiker\OpcacheBundle\Tests\DataCollector;

use Matthimatiker\OpcacheBundle\ByteCodeCache\ByteCodeCacheInterface;
use Matthimatiker\OpcacheBundle\ByteCodeCache\MemoryUsage;
use Matthimatiker\OpcacheBundle\ByteCodeCache\StaticCacheData;
use Matthimatiker\OpcacheBundle\ByteCodeCache\Statistics;
use Matthimatiker\OpcacheBundle\DataCollector\ByteCodeCacheDataCollector;

class ByteCodeCacheDataCollectorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * System under test.
     *
     * @var ByteCodeCacheDataCollector
     */
    protected $dataCollector = null;

    /**
     * Initializes the test environment.
     */
    protected function setUp()
    {
        parent::setUp();
        $cache = new StaticCacheData(
            true,
            new MemoryUsage(25.0, 100.0),
            new Statistics(100, 5)
        );
        $this->dataCollector = new ByteCodeCacheDataCollector($cache);
    }

    /**
     * Cleans up the test environment.
     */
    protected function tearDown()
    {
        $this->dataCollector = null;
        parent::tearDown();
    }

    public function testIsSerializable()
    {
        $this->setExpectedException(null);
        serialize($this->dataCollector);
    }

    public function testKeepsByteCodeCacheDataAfterDeserialization()
    {
        $serialized = serialize($this->dataCollector);
        /* @var $restoredCollector ByteCodeCacheDataCollector */
        $restoredCollector = unserialize($serialized);

        $this->assertInstanceOf(ByteCodeCacheInterface::class, $restoredCollector->getByteCodeCache());
    }

    public function testProvidesName()
    {
        $name = $this->dataCollector->getName();

        $this->assertInternalType('string', $name);
        $this->assertNotEmpty($name);
    }
}
