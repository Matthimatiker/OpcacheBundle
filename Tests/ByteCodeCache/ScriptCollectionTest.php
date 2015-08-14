<?php

namespace Matthimatiker\OpcacheBundle\Tests\ByteCodeCache;

use Matthimatiker\OpcacheBundle\ByteCodeCache\Script;
use Matthimatiker\OpcacheBundle\ByteCodeCache\ScriptCollection;
use Matthimatiker\OpcacheBundle\ByteCodeCache\ScriptSlots;

class ScriptCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * System under test.
     *
     * @var ScriptCollection
     */
    protected $scripts = null;

    /**
     * Initializes the test environment.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->scripts = new ScriptCollection($this->createScripts(), 4);
    }

    /**
     * Cleans up the test environment.
     */
    protected function tearDown()
    {
        $this->scripts = null;
        parent::tearDown();
    }

    public function testIsTraversable()
    {
        $this->assertInstanceOf(\Traversable::class, $this->scripts);
    }

    public function testProvidesAccessToScriptInformation()
    {
        $this->assertInstanceOf(\Traversable::class, $this->scripts);
        $this->assertContainsOnly(Script::class, $this->scripts);
    }

    public function testCountReturnsNumberOfScripts()
    {
        $this->assertInstanceOf(\Countable::class, $this->scripts);
        $this->assertCount(2, $this->scripts);
    }

    public function testGetSlotsReturnsEqualObjectOnEachCall()
    {
        $this->assertEquals($this->scripts->getSlots(), $this->scripts->getSlots());
    }

    public function testMaxNumberOfSlotsIsCorrect()
    {
        $slots = $this->scripts->getSlots();

        $this->assertInstanceOf(ScriptSlots::class, $slots);
        $this->assertEquals(4, $slots->max());
    }

    public function testNumberOfUsedSlotsIsCorrect()
    {
        $slots = $this->scripts->getSlots();

        $this->assertInstanceOf(ScriptSlots::class, $slots);
        $this->assertEquals(2, $slots->used());
    }

    /**
     * Creates some scripts for testing.
     *
     * @return Script[]
     */
    protected function createScripts()
    {
        return array(
            new Script('/tmp/first.php', 0.1, 2, '2015-01-01 00:00:00'),
            new Script('/tmp/second.php', 0.5, 42, '2015-06-01 00:00:00'),
        );
    }
}
