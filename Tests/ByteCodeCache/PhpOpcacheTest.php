<?php

namespace Matthimatiker\OpcacheBundle\Tests\ByteCodeCache;

use Matthimatiker\OpcacheBundle\ByteCodeCache\ByteCodeCacheInterface;
use Matthimatiker\OpcacheBundle\ByteCodeCache\MemoryUsage;
use Matthimatiker\OpcacheBundle\ByteCodeCache\PhpOpcache;
use Matthimatiker\OpcacheBundle\ByteCodeCache\Statistics;

class PhpOpcacheTest extends \PHPUnit_Framework_TestCase
{
    /**
     * System under test.
     *
     * @var PhpOpcache
     */
    protected $opcache = null;

    /**
     * Initializes the test environment.
     */
    protected function setUp()
    {
        parent::setUp();
        $data = require(__DIR__ . '/_files/PhpOpcache/active_cache.php');
        $this->opcache = new PhpOpcache($data);
    }

    /**
     * Cleans up the test environment.
     */
    protected function tearDown()
    {
        $this->opcache = null;
        parent::tearDown();
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(ByteCodeCacheInterface::class, $this->opcache);
    }

    public function testProvidesCorrectMemoryUsage()
    {
        $memory = $this->opcache->memory();

        $this->assertInstanceOf(MemoryUsage::class, $memory);
        $this->assertEquals(
            // Used + wasted memory.
            (29836904 + 6619288) / 1024 / 1024,
            $memory->getUsageInMb(),
            'Invalid memory usage reported.',
            0.001
        );
    }

    public function testProvidesCorrectMemorySize()
    {
        $memory = $this->opcache->memory();

        $this->assertInstanceOf(MemoryUsage::class, $memory);
        $this->assertEquals(64.0, $memory->getSizeInMb(), 'Invalid memory size reported.', 0.001);
    }

    public function testProvidesCorrectMemoryUsageInPercent()
    {
        $memory = $this->opcache->memory();

        $this->assertInstanceOf(MemoryUsage::class, $memory);
        $this->assertEquals(
            // Used + wasted memory divided by all available memory.
            ((29836904 + 6619288) / (29836904 + 6619288 + 30652672)) * 100.0,
            $memory->getUsageInPercent(),
            'Invalid memory size reported.',
            0.001
        );
    }

    public function testProvidesCorrectNumberOfHits()
    {
        $statistics = $this->opcache->statistics();

        $this->assertInstanceOf(Statistics::class, $statistics);
        $this->assertEquals($statistics->getHits(), 5247);
    }

    public function testProvidesCorrectNumberOfMisses()
    {
        $statistics = $this->opcache->statistics();

        $this->assertInstanceOf(Statistics::class, $statistics);
        $this->assertEquals($statistics->getMisses(), 989);
    }

    public function testProvidesCorrectHitRate()
    {
        $statistics = $this->opcache->statistics();

        $this->assertInstanceOf(Statistics::class, $statistics);
        $this->assertEquals(
            84.140474663245669,
            $statistics->getHitRateInPercent(),
            'Invalid hit rate provided.',
            0.001
        );
    }

    public function testIsEnabledReturnsTrueIfDataIsAvailable()
    {
        $this->assertTrue($this->opcache->isEnabled());
    }

    public function testObjectCanBeCreatedWithoutArguments()
    {
        $this->opcache = new PhpOpcache();

        $this->assertInstanceOf(MemoryUsage::class, $this->opcache->memory());
        $this->assertInstanceOf(Statistics::class, $this->opcache->statistics());
    }

    public function testAccessLayerWorksIfNoCacheDataIsAvailable()
    {
        $this->opcache = new PhpOpcache(false);

        $this->assertInstanceOf(MemoryUsage::class, $this->opcache->memory());
        $this->assertInstanceOf(Statistics::class, $this->opcache->statistics());
    }
}