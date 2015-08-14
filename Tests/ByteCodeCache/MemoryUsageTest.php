<?php

namespace Matthimatiker\OpcacheBundle\Tests\ByteCodeCache;

use Matthimatiker\OpcacheBundle\ByteCodeCache\MemoryUsage;

class MemoryUsageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * System under test.
     *
     * @var MemoryUsage
     */
    protected $memoryUsage = null;

    /**
     * Initializes the test environment.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->memoryUsage = new MemoryUsage(150.0, 200.0);
    }

    /**
     * Cleans up the test environment.
     */
    protected function tearDown()
    {
        $this->memoryUsage = null;
        parent::tearDown();
    }

    public function testGetUsedInMbReturnsCorrectValue()
    {
        $this->assertEquals(150.0, $this->memoryUsage->getUsedInMb());
    }

    public function testGetSizeReturnsCorrectValue()
    {
        $this->assertEquals(200.0, $this->memoryUsage->getSizeInMb());
    }

    public function testUsedMemoryInPercentIsCalculatedCorrectly()
    {
        $this->assertEquals(75.0, $this->memoryUsage->getUsedInPercent(), 'Percentage calculation invalid.', 0.001);
    }

    public function testFreeMemoryIsCalculatedCorrectly()
    {
        $this->assertEquals(50.0, $this->memoryUsage->getFreeInMb(), 'Free memory calculation invalid.', 0.001);
    }

    public function testIsFullReturnsFalseIfSomeMemoryIsFree()
    {
        $this->assertFalse($this->memoryUsage->isFull());
    }

    public function testIsFullReturnsTrueIfAllMemoryIsUsed()
    {
        $this->memoryUsage = new MemoryUsage(1.0, 1.0);

        $this->assertTrue($this->memoryUsage->isFull());
    }

    public function testIsFullReturnsFalseIfMoreMemoryThanAvailableIsUsed()
    {
        $this->memoryUsage = new MemoryUsage(2.0, 1.0);

        $this->assertTrue($this->memoryUsage->isFull());
    }

    public function testMemoryUsageInPercentIsCalculatedCorrectlyIfSizeIsZero()
    {
        $this->memoryUsage = new MemoryUsage(0, 0);

        $this->assertEquals(0.0, $this->memoryUsage->getUsedInPercent(), 'Percentage calculation invalid.', 0.001);
    }
}
