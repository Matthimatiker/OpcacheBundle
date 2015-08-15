<?php

namespace Matthimatiker\OpcacheBundle\Tests\ByteCodeCache;

use Matthimatiker\OpcacheBundle\ByteCodeCache\Script;

class ScriptTest extends \PHPUnit_Framework_TestCase
{
    /**
     * System under test.
     *
     * @var Script
     */
    protected $script = null;

    /**
     * Initializes the test environment.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->script = new Script(
            '/tmp/my/script/file.php',
            0.75,
            42,
            new \DateTime('2015-08-14 13:30:00')
        );
    }

    /**
     * Cleans up the test environment.
     */
    protected function tearDown()
    {
        $this->script = null;
        parent::tearDown();
    }

    public function testGetFileReturnsFileObject()
    {
        $file = $this->script->getFile();

        $this->assertInstanceOf(\SplFileInfo::class, $file);
    }

    public function testFileObjectHasCorrectPath()
    {
        $file = $this->script->getFile();

        $this->assertInstanceOf(\SplFileInfo::class, $file);
        $this->assertEquals('/tmp/my/script/file.php', $file->getPathname());
    }

    public function testGetMemoryConsumptionInMbReturnsCorrectValue()
    {
        $this->assertEquals(
            0.75,
            $this->script->getMemoryConsumptionInMb(),
            'Invalid memory consumption returned.',
            0.001
        );
    }

    public function testGetMemoryConsumptionInByteReturnsInteger()
    {
        $this->assertInternalType('integer', $this->script->getMemoryConsumptionInBytes());
    }

    public function testGetMemoryConsumptionInByteReturnsCorrectValue()
    {
        $this->assertEquals(
            0.75 * 1024.0 * 1024.0,
            $this->script->getMemoryConsumptionInBytes(),
            'Invalid memory consumption returned.',
            1
        );
    }

    public function testGetHitsReturnsCorrectValue()
    {
        $this->assertEquals(42, $this->script->getHits());
    }

    public function testGetLastAccessReturnsDateTime()
    {
        $lastAccess = $this->script->getLastAccess();

        $this->assertInstanceOf(\DateTimeInterface::class, $lastAccess);
    }

    public function testGetLastAccessReturnsCorrectDate()
    {
        $lastAccess = $this->script->getLastAccess();

        $this->assertInstanceOf(\DateTimeInterface::class, $lastAccess);
        $this->assertEquals('2015-08-14 13:30:00', $lastAccess->format('Y-m-d H:i:s'));
    }

    public function testGetLastAccessReturnsCorrectDateIfProvidedAsString()
    {
        $this->script = new Script(
            '/any/path/file.php',
            0.1,
            0,
            '2015-01-01 12:00:00'
        );
        $lastAccess = $this->script->getLastAccess();

        $this->assertInstanceOf(\DateTimeInterface::class, $lastAccess);
        $this->assertEquals('2015-01-01 12:00:00', $lastAccess->format('Y-m-d H:i:s'));
    }

    public function testGetFileReturnsCorrectObjectIfProvidedAsFileObject()
    {
        $originalFile = new \SplFileInfo('/any/path/file.php');
        $this->script = new Script(
            $originalFile,
            0.1,
            0,
            '2015-01-01 12:00:00'
        );

        $file = $this->script->getFile();

        $this->assertInstanceOf(\SplFileInfo::class, $file);
        $this->assertEquals($originalFile->getPathname(), $file->getPathname());
    }
}
