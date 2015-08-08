<?php

namespace Matthimatiker\OpcacheBundle\Tests\ByteCodeCache;

use Matthimatiker\OpcacheBundle\ByteCodeCache\Statistics;

class StatisticsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * System under test.
     *
     * @var Statistics
     */
    protected $statistics = null;

    /**
     * Initializes the test environment.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->statistics = new Statistics(200, 100);
    }

    /**
     * Cleans up the test environment.
     */
    protected function tearDown()
    {
        $this->statistics = null;
        parent::tearDown();
    }

    public function testGetHitsReturnsCorrectValue()
    {
        $this->assertEquals(200, $this->statistics->getHits());
    }

    public function testGetMissesReturnsCorrectValue()
    {
        $this->assertEquals(100, $this->statistics->getMisses());
    }

    public function testHitRateIsCalculatedCorrectly()
    {
        $this->assertEquals(
            (200 / (200 + 100)) * 100.0,
            $this->statistics->getHitRateInPercent(),
            'Hit rate is not calculated correctly.',
            0.001
        );
    }

    public function testHitRateIsCalculatedCorrectlyIfHitsAndMissesAreZero()
    {
        $this->statistics = new Statistics(0, 0);

        $this->assertEquals(
            0.0,
            $this->statistics->getHitRateInPercent(),
            'Hit rate is not calculated correctly.',
            0.001
        );
    }
}
