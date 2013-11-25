<?php
namespace itseo\test;

use itseo\Itseo;

class MetaTitleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MetaTitle
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new MetaTitle;
    }

    protected function tearDown()
    {
    }

    /**
     * @covers itseo\test\MetaTitle::extractMetaTitle
     * @todo   Implement testExtractMetaTitle().
     */
    public function testExtractMetaTitle()
    {
        $dummy_dom = Itseo::extractDOM(file_get_contents("http://www.google.es/"));
        
        $result = $this->object->extractMetaTitle($dummy_dom);
        
        $this->assertStringMatchesFormat("%A",$result);
    }

    /**
     * @covers itseo\test\MetaTitle::getTitle
     * @todo   Implement testGetTitle().
     */
    public function testExtractTitle()
    {
        $dummy_dom = Itseo::extractDOM(file_get_contents("http://www.google.es/"));
        
        $result = $this->object->extractTitle($dummy_dom);
        
        $this->assertStringMatchesFormat("%A",$result);
    }

    /**
     * @covers itseo\test\MetaTitle::test
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
        $this->assertEquals("metatitle", $result['name']);
    }

    /**
     * @covers itseo\test\MetaTitle::prepareTest
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
