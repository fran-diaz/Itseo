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
 * @todo Implement methods for check if text is more 
 * than 300 words almost.
 * 
 */
class TextRatio implements TestInterface{
    const TOTAL_SCORE = 2;
    public $score = 0;
    public $result = "";
    public $type = "internal_test";
    private $text_content = "";
    private $p_content = "";
    
    public function test($target)
    {
        $DOM = $target;
        $page = $DOM->saveHTML();
        $body_elements = $DOM->getElementsByTagName('body');
        $tags = $body_elements->item(0)->childNodes;
        foreach($tags as $tag){
            if($tag->nodeName == "script" || $tag->nodeName == "noscript" || $tag->nodeName == "style"){continue;}
            if($tag->nodeName == "p"){$this->p_content .= ' '.$tag->textContent;}
            $this->text_content .= $tag->textContent;
        }

        $all_text = $this->text_content;
        $ratio = number_format((strlen($all_text)*100)/strlen($page),2);
        $num_words = explode(' ',$this->p_content);

        if($ratio >= 25 ){
            $this->result .='<p><span class="result ok">OK</span>Text / HTML ratio in your website is above 25%.</p><pre>'.$ratio.'% ratio</pre><code>'.$this->text_content.'</code>'."\n";$this->score += 1;
        }else{
            $this->result .='<p><span class="result warn">WARN</span>Text / HTML ratio in your website is below 25%.</p><pre>'.$ratio.'% ratio</pre><code>'.$this->text_content.'</code>'."\n";
        }
        if($num_words >= 300 ){
            $this->result .='<p><span class="result ok">OK</span>Number of words in your text is above 300 words.</p><pre>'.$num_words.' words</pre><code>'.$this->p_content.'</code>'."\n";$this->score += 1;
        }else{
            $this->result .='<p><span class="result warn">WARN</span>Number of words in your text is below 300 words.</p><pre>'.$num_words.' words</pre><code>'.$this->p_content.'</code>'."\n";
        }
        
        return array("name" => "textratio","score" => $this->score,"total_score" => self::TOTAL_SCORE,"result" => $this->result);
    }
    
    public function prepareTest()
    {
        
    }
}

