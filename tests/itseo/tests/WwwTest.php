<?php
namespace itseo\test;

class WwwTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Www
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new Www;
    }

    protected function tearDown()
    {
    }

    /**
     * @covers itseo\test\Www::test
     * @todo   Implement testTest().
     */
    public function testTest()
    {
        $dummy_target = "http://www.google.es/";
        
        $result = $this->object->test($dummy_target);
        
        $this->assertArrayHasKey("name", $result);
        $this->assertArrayHasKey("score", $result);
        $this->assertArrayHasKey("total_score", $result);
        $this->assertArrayHasKey("result", $result);
        $this->assertEquals("www", $result['name']);
    }

    /**
     * @covers itseo\test\Www::prepareTest
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
