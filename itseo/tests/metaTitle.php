<?php
namespace itseo\test;

use itseo\TestInterface;

/**
 * This is a test that checks if meta title is present, 
 * size is correct and is same as title's DOM element.
 *
 * @author Fran Díaz <fran.diaz.gonzalez@gmail.com>
 * @access public
 */
class MetaTitle implements TestInterface{
    const TOTAL_SCORE = 4;
    public $score = 0;
    public $result = "";
    public $type = "internal_test";
    
    public static function extractMetaTitle($target)
    {
        $DOM = $target;
        $title = "";
        $meta_elements = $DOM->getElementsByTagName('meta');
        foreach ($meta_elements as $meta) {
            if(!$meta->getAttribute('name'))continue;
            elseif($meta->getAttribute('name') == "title"){
                if(!$meta->getAttribute('content'))continue;
                $title .= $meta->getAttribute('content');
            }
        }
        return $title;
    }

    public static function extractTitle($target)
    {
        $DOM = $target;
        $Mtitle = "";
        $title_element = $DOM->getElementsByTagName('title');

        foreach ($title_element as $title) {
            $Mtitle .= $title->textContent;
        }

        return $Mtitle;
    }
    
    public function test($target)
    {
        $title = self::extractTitle($target);
        $metatitle = self::extractMetaTitle($target);
        if(strlen($metatitle) >= 1){
            $this->result .='<p><span class="result ok">OK</span>The meta title is present: <pre>'.$metatitle.'</pre></p>'."\n";$this->score += 1;

            $metatitle_length = str_word_count($metatitle);
            if($metatitle_length == 9){$this->result .='<p><span class="result ok">OK</span>Meta title length is good: <pre>9 words</pre></p>'."\n";$this->score += 1;}
            else{$this->result .='<p><span class="result warn">WARN</span>Meta title length should be 9 words, detected: <pre>'.$metatitle_length.' words</pre></p>'."\n";}
            
            $metatitle_length = strlen($metatitle);
            if($metatitle_length >= 60 && $metatitle_length <= 70){$this->result .='<p><span class="result ok">OK</span>Meta title length is good: <pre>65 characters</pre></p>'."\n";$this->score += 1;}
            else{$this->result .='<p><span class="result warn">WARN</span>Meta title length should between 60 and 70 characters aprox. (included spaces), detected: <pre>'.$metatitle_length.' characters</pre></p>'."\n";}

            // title == metatitle
            if(strcmp($title, $metatitle) == 0){$this->result .='<p><span class="result ok">OK</span>Meta title is equal to page title</p>'."\n";$this->score += 1;}
            else{$this->result .='<p><span class="result error">Error</span>Meta title is different to page title: <pre>'.$title."\n".$metatitle.'</pre></p>'."\n";}
        }else{
            $this->result .='<p><span class="result error">ERROR</span>No meta title detected!</p>'."\n";
            $this->result .='<p><span class="result error">ERROR</span>Meta title length should be 9 words and 60 - 70 characters, none is detected.</p>'."\n";
        }
        
        return array("name" => "metatitle","score" => $this->score,"total_score" => self::TOTAL_SCORE,"result" => $this->result);
    }
    
    public function prepareTest()
    {
        
    }
}

