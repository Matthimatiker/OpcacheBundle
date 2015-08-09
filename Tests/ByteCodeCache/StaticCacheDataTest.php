<?php

namespace Matthimatiker\OpcacheBundle\Tests\ByteCodeCache;

use Matthimatiker\OpcacheBundle\ByteCodeCache\MemoryUsage;
use Matthimatiker\OpcacheBundle\ByteCodeCache\StaticCacheData;
use Matthimatiker\OpcacheBundle\ByteCodeCache\Statistics;

class StaticCacheDataTest extends \PHPUnit_Framework_TestCase
{
    /**
     * System under test.
     *
     * @var StaticCacheData
     */
    protected $cacheData = null;

    /**
     * @var MemoryUsage
     */
    protected $memory = null;

    /**
     * @var Statistics
     */
    protected $statistics = null;

    /**
     * Initializes the test environment.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->memory     = new MemoryUsage(1.0, 5.0);
        $this->statistics = new Statistics(20, 0);
        $this->cacheData  = new StaticCacheData(true, $this->memory, $this->statistics);
    }

    /**
     * Cleans up the test environment.
     */
    protected function tearDown()
    {
        $this->cacheData  = null;
        $this->statistics = null;
        $this->memory     = null;
        parent::tearDown();
    }

    public function testIsEnabledReturnsCorrectValue()
    {
        $this->assertTrue($this->cacheData->isEnabled());
    }

    public function testMemoryReturnsCorrectData()
    {
        $this->assertEquals($this->memory, $this->cacheData->memory());
    }

    public function testStatisticsReturnsCorrectData()
    {
        $this->assertEquals($this->statistics, $this->cacheData->statistics());
    }
}
