<?php
namespace itseo;

use itseo\test;

class ItseoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Itseo
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new Itseo("http://www.brainhardware.es/");
    }

    protected function tearDown()
    {
        if(isset($this->object->tests['dummy']))unset($this->object->tests['dummy']);
    }

    /**
     * @covers itseo\Itseo::extractDomain
     * @todo   Implement testExtractDomain().
     */
    public function testExtractDomain()
    {
        $this->assertEquals("www.brainhardware.es", $this->object->extractDomain($this->object->target));
    }

    /**
     * @covers itseo\Itseo::createBaseUrl
     * @todo   Implement testCreateBaseUrl().
     */
    public function testCreateBaseUrl()
    {
        $this->assertEquals("http://www.brainhardware.es/", $this->object->createBaseUrl($this->object->target));
    }

    /**
     * @covers itseo\Itseo::extractDOM
     * @todo   Implement testExtractDOM().
     */
    public function testExtractDOM()
    {
        $this->assertInstanceOf("DOMDocument", $this->object->extractDOM($this->object->page_HTML));
    }

    /**
     * @covers itseo\Itseo::prepareTest
     * @todo   Implement testPrepareTest().
     * @expectedException Exception
     */
    public function testPrepareTest()
    {
        $dummy_test = "dummy";
        
        $this->object->prepareTest($dummy_test);
        
        $this->assertArrayHasKey($dummy_test, $this->object->tests);
    }

    /**
     * @covers itseo\Itseo::makeTest
     * @todo   Implement testMakeTest().
     * @expectedException Exception
     */
    public function testMakeTest()
    {
        $dummy_test = "dummy";
        
        $this->object->makeTest($dummy_test);
        
        $this->assertArrayHasKey($dummy_test, $this->object->tests);
    }
}
