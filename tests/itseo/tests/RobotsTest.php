<?php
namespace itseo\test;

class RobotsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Robots
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new Robots;
    }

    protected function tearDown()
    {
    }

    /**
     * @covers itseo\test\Robots::parseRobots
     * @todo   Implement testParseRobots().
     */
    public function testParseRobots()
    {
        $dummy_robots = "User-agent: *
                         Disallow: /cgi-bin/
                         Disallow: /tmp/
                         Disallow: /~john/";
        
        $result = $this->object->parseRobots($dummy_robots);
        
        $this->assertArrayHasKey("result", $result);
        $this->assertArrayHasKey("fails", $result);
    }

    /**
     * @covers itseo\test\Robots::test
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
        $this->assertEquals("robots", $result['name']);
    }

    /**
     * @covers itseo\test\Robots::prepareTest
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
