<?php
namespace itseo\test;

use itseo\Itseo;

class LinksTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Links
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new Links;
    }

    protected function tearDown()
    {
    }

    /**
     * @covers itseo\test\Links::test
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
        $this->assertEquals("links", $result['name']);
    }

    /**
     * @covers itseo\test\Links::prepareTest
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
