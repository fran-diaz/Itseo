<?php
namespace itseo\test;

use itseo\Itseo;

class FaviconTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Favicon
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new Favicon;
    }

    protected function tearDown()
    {
    }

    /**
     * @covers itseo\test\Favicon::test
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
        $this->assertEquals("favicon", $result['name']);
    }

    /**
     * @covers itseo\test\Favicon::prepareTest
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
