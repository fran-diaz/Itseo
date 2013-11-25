<?php
namespace itseo\test;

use itseo\Itseo;

class TitleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Title
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new Title;
    }

    protected function tearDown()
    {
    }

    /**
     * @covers itseo\test\Title::extractTitle
     * @todo   Implement testExtractTitle().
     */
    public function testExtractTitle()
    {
        $dummy_dom = Itseo::extractDOM(file_get_contents("http://www.google.es/"));
        
        $result = $this->object->extractTitle($dummy_dom);
        
        $this->assertStringMatchesFormat("%A",$result);
    }

    /**
     * @covers itseo\test\Title::test
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
        $this->assertEquals("title", $result['name']);
    }

    /**
     * @covers itseo\test\Title::prepareTest
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
