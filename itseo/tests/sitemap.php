<?php
namespace itseo\test;

use itseo\TestInterface;

/**
 * This is a test that checks if exists target's sitemap.
 *
 * @author Fran Díaz <fran.diaz.gonzalez@gmail.com>
 * @access public
 */
class Sitemap implements TestInterface{
    const TOTAL_SCORE = 1;
    public $score = 0;
    public $result = "";
    public $type = "external_test";

    public function test($target)
    {
        $sitemap = @file_get_contents($target."/sitemap.xml");
        if($sitemap){
            $this->result .='<p><span class="result ok">OK</span>Sitemap is detected</p>'."\n";$this->score += 1;
        }else{
            $this->result .='<p><span class="result error">ERROR</span>Sitemap.xml not detected.</p>'."\n";
        }
        
        return array("name" => "sitemap","score" => $this->score,"total_score" => self::TOTAL_SCORE,"result" => $this->result);
    }
    
    public function prepareTest()
    {
        
    }
}
