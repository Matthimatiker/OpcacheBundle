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
        $this->slots = new ScriptSlots(3, 6, 2);
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

    public function testWastedReturnsCorrectValue()
    {
        $this->assertEquals(2, $this->slots->wasted());
    }

    public function testMaxReturnsCorrectValue()
    {
        $this->assertEquals(6, $this->slots->max());
    }

    public function testUsedSlotsInPercentAreCalculatedCorrectly()
    {
        $this->assertEquals(
            (3 / 6) * 100.0,
            $this->slots->getUsedInPercent(),
            'Used slot calculation invalid.',
            0.001
        );
    }

    public function testFreeSlotsInPercentAreCalculatedCorrectly()
    {
        $this->assertEquals(
            (1 / 6) * 100.0,
            $this->slots->getFreeInPercent(),
            'Free slot calculation invalid.',
            0.001
        );
    }

    public function testWastedSlotsInPercentAreCalculatedCorrectly()
    {
        $this->assertEquals(
            (2 / 6) * 100.0,
            $this->slots->getWastedInPercent(),
            'Wasted slot calculation invalid.',
            0.001
        );
    }

    public function testPercentCalculationWorksIfSlotsAreZero()
    {
        $this->slots = new ScriptSlots(0, 0, 0);

        $this->assertEquals(0.0, $this->slots->getUsedInPercent());
        $this->assertEquals(0.0, $this->slots->getWastedInPercent());
        $this->assertEquals(0.0, $this->slots->getFreeInPercent());
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

    public function testFullReturnsTrueIfUsedPlusWastedSlotsReachMaxSlots()
    {
        $this->slots = new ScriptSlots(1, 4, 3);

        $this->assertTrue($this->slots->full());
    }
}
