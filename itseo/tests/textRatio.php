<?php
namespace itseo\test;

use itseo\Itseo;
use itseo\TestInterface;

/**
 * This is a test that checks if text ratio (> 25%) 
 * in target page is enough for browsers.
 *
 * @author Fran Díaz <fran.diaz.gonzalez@gmail.com>
 * @access public
 */
class TextRatio implements TestInterface{
    const TOTAL_SCORE = 1;
    public $score = 0;
    public $result = "";
    public $type = "external_test";
    private $text_content = "";
    
    public function test($target)
    {
        
        $page = file_get_contents($target);
        $DOM = Itseo::extractDOM($page);
        $body_elements = $DOM->getElementsByTagName('body');
        $tags = $body_elements->item(0)->childNodes;
        foreach($tags as $tag){
            if($tag->nodeName == "script" || $tag->nodeName == "noscript" || $tag->nodeName == "style"){continue;}
            $this->text_content .= $tag->textContent;
        }

        $all_text = $this->text_content;
        $ratio = number_format((strlen($all_text)*100)/strlen($page),2);

        if($ratio >= 25 ){
            $this->result .='<p><span class="result ok">OK</span>Text / HTML ratio in your website is above 25%.</p><pre>'.$ratio.'% ratio</pre>'."\n";$this->score += 1;
        }else{
            $this->result .='<p><span class="result warn">WARN</span>Text / HTML ratio in your website is below 25%.</p><pre>'.$ratio.'% ratio</pre>'."\n";
        }
        
        return array("name" => "textratio","score" => $this->score,"total_score" => self::TOTAL_SCORE,"result" => $this->result);
    }
    
    public function prepareTest()
    {
        
    }
}

