<?php
namespace itseo\test;

class HumansTest extends \PHPUnit_Framework_TestCase 
{

    /**
     * @var Sitemap
     */
    protected $object;

    protected function setUp() 
    {
        $this->object = new Humans;
    }

    protected function tearDown() 
    {
    }

    /**
     * @covers itseo\test\Humans::test
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
        $this->assertEquals("humans", $result['name']);
    }

    /**
     * @covers itseo\test\Humans::prepareTest
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
