<?php
namespace itseo\test;

use itseo\Itseo;

class MetaDescriptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MetaDescription
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new MetaDescription;
    }

    protected function tearDown()
    {
    }

    /**
     * @covers itseo\test\MetaDescription::extractMetaDescription
     * @todo   Implement testExtractMetaDescription().
     */
    public function testExtractMetaDescription()
    {
        $dummy_dom = Itseo::extractDOM(file_get_contents("http://www.google.es/"));
        
        $result = $this->object->extractMetaDescription($dummy_dom);
        
        $this->assertStringMatchesFormat("%A",$result);
    }

    /**
     * @covers itseo\test\MetaDescription::test
     * @todo   Implement testTest().
     */
    public function testTest()
    {
        $dummy_dom = Itseo::extractDOM(file_get_contents("http://www.google.es/"));
        
        $result = $this->object->test($dummy_dom);
        
        $this->assertArrayHasKey("name", $result);
        $this->assertArrayHasKey("score", $result);
        $this->assertArrayHasKey("total_score", $result);
        $this->assertArrayHasKey("result", $result);
        $this->assertEquals("metadescription", $result['name']);
    }

    /**
     * @covers itseo\test\MetaDescription::prepareTest
     * @todo   Implement testPrepareTest().
     */
    public function testPrepareTest()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }
}
