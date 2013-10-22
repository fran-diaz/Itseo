<?php
namespace itseo\test;

use itseo\TestInterface;

/**
 * This is a test that checks if title element is 
 * present and size is correct.
 *
 * @author Fran Díaz <fran.diaz.gonzalez@gmail.com>
 * @access public
 */
class Title implements TestInterface{
    const TOTAL_SCORE = 3;
    public $score = 0;
    public $result = "";
    public $type = "internal_test";

    public static function extractTitle($target)
    {
        $DOM = $target;
        $title_element = $DOM->getElementsByTagName('title');

        foreach ($title_element as $title) {
            $title = $title->textContent;
        }
        
        if(!$title_element || $title_element->length == 0){
            return false;
        }

        return $title;
    }
    
    public function test($target)
    {
        $title = self::extractTitle($target);
        if($title){
            $this->result .='<p><span class="result ok">OK</span>The title is present: <pre>'.$title.'</pre></p>'."\n";$this->score += 1;
            
            $title_length = explode(" ",$title);
            if(count($title_length) == 9){
                $this->result .='<p><span class="result ok">OK</span>Title length is good: <pre>9 words</pre></p>'."\n";$this->score += 1;
            }else{
                $this->result .='<p><span class="result warn">WARN</span>Title length should be 9 words, detected: <pre>'.count($title_length).' words</pre></p>'."\n";
            }
            
            $title_length = strlen($title);
            if($title_length >= 60 && $title_length <= 70){
                $this->result .='<p><span class="result ok">OK</span>Title length is good: <pre>65 characters</pre></p>'."\n";$this->score += 1;
            }else{
                $this->result .='<p><span class="result warn">WARN</span>Title length should between 60 and 70 characters aprox. (included spaces), detected: <pre>'.$title_length.' characters</pre></p>'."\n";
            }
        }else{
            $this->result .='<p><span class="result error">ERROR</span>No title detected!</p>'."\n";
            $this->result .='<p><span class="result error">ERROR</span>Title length should be 9 words and 60 - 70 characters (spaces included), none is detected.</p>'."\n";
        }
        
        return array("name" => "title","score" => $this->score,"total_score" => self::TOTAL_SCORE,"result" => $this->result);
    }
    
    public function prepareTest()
    {
        
    }
}

