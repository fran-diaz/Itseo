<?php
namespace itseo\test;

class SitemapTest extends \PHPUnit_Framework_TestCase 
{

    /**
     * @var Sitemap
     */
    protected $object;

    protected function setUp() 
    {
        $this->object = new Sitemap;
    }

    protected function tearDown() 
    {
    }

    /**
     * @covers itseo\test\Sitemap::test
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
        $this->assertEquals("sitemap", $result['name']);
    }

    /**
     * @covers itseo\test\Sitemap::prepareTest
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
