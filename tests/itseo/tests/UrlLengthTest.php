<?php
namespace itseo\test;

class UrlLengthTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UrlLength
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new UrlLength;
    }

    protected function tearDown()
    {
    }

    /**
     * @covers itseo\test\UrlLength::test
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
        $this->assertEquals("urllength", $result['name']);
    }

    /**
     * @covers itseo\test\UrlLength::prepareTest
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
