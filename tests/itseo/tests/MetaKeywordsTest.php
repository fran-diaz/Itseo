<?php
namespace itseo\test;

use itseo\Itseo;

class MetaKeywordsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MetaKeywords
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new MetaKeywords;
    }

    protected function tearDown()
    {
    }

    /**
     * @covers itseo\test\MetaKeywords::extractMetaKeywords
     * @todo   Implement testExtractMetaKeywords().
     */
    public function testExtractMetaKeywords()
    {
        $dummy_dom = Itseo::extractDOM(file_get_contents("http://www.google.es/"));
        
        $result = $this->object->extractMetaKeywords($dummy_dom);
        
        $this->assertStringMatchesFormat("%A",$result);
    }

    /**
     * @covers itseo\test\MetaKeywords::test
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
        $this->assertEquals("metakeywords", $result['name']);
    }

    /**
     * @covers itseo\test\MetaKeywords::prepareTest
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
