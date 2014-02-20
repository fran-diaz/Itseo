<?php
namespace itseo\test;

use itseo\TestInterface;

/**
 * This is a test that checks if exists humans.txt file in target site.
 *
 * @author Fran Díaz <fran.diaz.gonzalez@gmail.com>
 * @access public
 */
class Humans implements TestInterface{
    const TOTAL_SCORE = 0;
    public $score = 0;
    public $result = "";
    public $type = "external_test";

    public function test($target)
    {
        $sitemap = @file_get_contents($target."/humans.txt");
        if($sitemap){
            $this->result .='<p><span class="result info">INFO</span>Humans.txt is detected</p>'."\n";
        }else{
            $this->result .='<p><span class="result error">INFO</span>Humas.txt not detected.</p>'."\n";
        }
        
        return array("name" => "humans","score" => $this->score,"total_score" => self::TOTAL_SCORE,"result" => $this->result);
    }
    
    public function prepareTest()
    {
        
    }
}
