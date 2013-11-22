<?php
namespace itseo\test;

class DmozTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Dmoz
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new Dmoz;
    }
    
    protected function tearDown()
    {
    }

    /**
     * @covers itseo\test\Dmoz::test
     * @todo   Implement testTest().
     */
    public function testTest()
    {
        $dummy_target = "https://www.google.es/";
        $dummy_domain = "www.google.es";
        
        $result = $this->object->test($dummy_target,$dummy_domain);
        
        $this->assertArrayHasKey("name", $result);
        $this->assertArrayHasKey("score", $result);
        $this->assertArrayHasKey("total_score", $result);
        $this->assertArrayHasKey("result", $result);
        $this->assertEquals("dmoz", $result['name']);
    }

    /**
     * @covers itseo\test\Dmoz::prepareTest
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
