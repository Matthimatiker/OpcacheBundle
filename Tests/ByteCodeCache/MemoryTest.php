<?php

namespace Matthimatiker\OpcacheBundle\Tests\ByteCodeCache;

use Matthimatiker\OpcacheBundle\ByteCodeCache\Memory;

class MemoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * System under test.
     *
     * @var Memory
     */
    protected $memory = null;

    /**
     * Initializes the test environment.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->memory = new Memory(150.0, 225.0, 50.0);
    }

    /**
     * Cleans up the test environment.
     */
    protected function tearDown()
    {
        $this->memory = null;
        parent::tearDown();
    }

    public function testGetUsedInMbReturnsCorrectValue()
    {
        $this->assertEquals(150.0, $this->memory->getUsedInMb());
    }

    public function testGetSizeInMbReturnsCorrectValue()
    {
        $this->assertEquals(225.0, $this->memory->getSizeInMb());
    }

    public function testGetWastedInMbReturnsCorrectValue()
    {
        $this->assertEquals(50.0, $this->memory->getWastedInMb());
    }

    public function testFreeMemoryIsCalculatedCorrectly()
    {
        $this->assertEquals(25.0, $this->memory->getFreeInMb(), 'Free memory calculation invalid.', 0.001);
    }

    public function testUsedMemoryInPercentIsCalculatedCorrectly()
    {
        $this->assertEquals(
            (150.0 / 225.0) * 100.0,
            $this->memory->getUsedInPercent(),
            'Percentage calculation invalid.',
            0.001
        );
    }

    public function testWastedMemoryInPercentIsCalculatedCorrectly()
    {
        $this->assertEquals(
            (50.0 / 225.0) * 100.0,
            $this->memory->getUsedInPercent(),
            'Percentage calculation invalid.',
            0.001
        );
    }

    public function testFreeMemoryInPercentIsCalculatedCorrectly()
    {
        $this->assertEquals(
            (25.0 / 225.0) * 100.0,
            $this->memory->getUsedInPercent(),
            'Percentage calculation invalid.',
            0.001
        );
    }

    public function testIsFullReturnsFalseIfSomeMemoryIsFree()
    {
        $this->assertFalse($this->memory->isFull());
    }

    public function testIsFullReturnsTrueIfAllMemoryIsUsed()
    {
        $this->memory = new Memory(1.0, 1.0);

        $this->assertTrue($this->memory->isFull());
    }

    public function testIsFullReturnsTrueIfMoreMemoryThanAvailableIsUsed()
    {
        $this->memory = new Memory(2.0, 1.0);

        $this->assertTrue($this->memory->isFull());
    }

    public function testIsFullReturnsTrueIfUsedAndWastedMemoryReachSize()
    {
        $this->memory = new Memory(150.0, 200.0, 50.0);

        $this->assertTrue($this->memory->isFull());
    }

    public function testMemoryUsageInPercentIsCalculatedCorrectlyIfSizeIsZero()
    {
        $this->memory = new Memory(0.0, 0.0);

        $this->assertEquals(0.0, $this->memory->getUsedInPercent(), 'Percentage calculation invalid.', 0.001);
    }
}
