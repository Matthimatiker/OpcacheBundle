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

    public function testGetUsageInMbReturnsCorrectValue()
    {

    }

    public function testGetSizeReturnsCorrectValue()
    {

    }

    public function testMemoryUsageInPercentIsCalculatedCorrectly()
    {

    }

    public function testIsFullReturnsFalseIfSomeMemoryIsFree()
    {

    }

    public function testIsFullReturnsTrueIfAllMemoryIsUsed()
    {

    }
}
