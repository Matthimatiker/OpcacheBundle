<?php

namespace Matthimatiker\OpcacheBundle\Tests\ByteCodeCache;

use Matthimatiker\OpcacheBundle\ByteCodeCache\ScriptSlots;

class ScriptSlotsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * System under test.
     *
     * @var ScriptSlots
     */
    protected $slots = null;

    /**
     * Initializes the test environment.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->slots = new ScriptSlots(3, 4);
    }

    /**
     * Cleans up the test environment.
     */
    protected function tearDown()
    {
        $this->slots = null;
        parent::tearDown();
    }

    public function testUsedReturnsCorrectValue()
    {
        $this->assertEquals(3, $this->slots->used());
    }

    public function testFreeReturnsCorrectValue()
    {
        $this->assertEquals(1, $this->slots->free());
    }

    public function testMaxReturnsCorrectValue()
    {
        $this->assertEquals(4, $this->slots->max());
    }

    public function testUsageInPercentIsCalculatedCorrectly()
    {
        $this->assertEquals(0.75, $this->slots->getUsageInPercent(), 'Usage calculation invalid.', 0.001);
    }

    public function testFullReturnsFalseIfAtLeastOneSlotIsFree()
    {
        $this->assertFalse($this->slots->full());
    }

    public function testFullReturnsTrueIfMaxNumberOfSlotsIsUsed()
    {
        $this->slots = new ScriptSlots(10, 10);

        $this->assertTrue($this->slots->full());
    }

    public function testFullReturnsTrueIfMoreSlotsThanAvailableAreInUse()
    {
        $this->slots = new ScriptSlots(5, 4);

        $this->assertTrue($this->slots->full());
    }
}
