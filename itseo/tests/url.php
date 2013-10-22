<?php
namespace itseo\test;

use itseo\TestInterface;

/**
 * This is a test that checks if domain's url length 
 * is correct. 
 *
 * @author Fran Díaz <fran.diaz.gonzalez@gmail.com>
 * @access public
 */
class UrlLength implements TestInterface{
    const TOTAL_SCORE = 1;
    public $score = 0;
    public $result = "";
    public $type = "external_test";

    public function test($target)
    {
        $url_length = strlen($target);
        if($url_length <= 160){$this->result .='<p><span class="result ok">OK</span>URL length is good: <pre>'.$url_length.' characters</pre></p>'."\n";$this->score += 1;}
        else{$this->result .='<p><span class="result warn">WARN</span>URL length should be less than 160 characters, detected: <pre>'.$url_length.' characters</pre></p>'."\n";}
        
        return array("name" => "urllength","score" => $this->score,"total_score" => self::TOTAL_SCORE,"result" => $this->result);
    }
    
    public function prepareTest()
    {
        
    }
}

