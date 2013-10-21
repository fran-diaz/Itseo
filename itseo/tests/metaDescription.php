<?php
namespace itseo\test;

use itseo\TestInterface;

/**
 * This is a test that checks if meta description is 
 * present and size is correct in the target.
 *
 * @author Fran Díaz <fran.diaz.gonzalez@gmail.com>
 * @access public
 */
class MetaDescription implements TestInterface{
    const TOTAL_SCORE = 2;
    public $score = 0;
    public $result = "";
    public $type = "internal_test";
    
    public static function extractMetaDescription($target)
    {
        $DOM = $target;
        $meta_elements = $DOM->getElementsByTagName('meta');
        foreach ($meta_elements as $meta) {
            if(!$meta->getAttribute('name'))continue;
            elseif($meta->getAttribute('name') == "description"){
                if(!$meta->getAttribute('content'))return false;
                return $meta->getAttribute('content');
            }
        }
        return false;
    }
    
    public function test($target)
    {
        $metadesc = self::extractMetaDescription($target);
        if($metadesc){
            $this->result .='<p><span class="result ok">OK</span>The meta description is present: <pre>'.$metadesc.'</pre></p>'."\n";$this->score += 1;

            $metadesc_length = strlen($metadesc);
            if($metadesc_length >= 150 && $metadesc_length <= 160){$this->result .='<p><span class="result">OK</span>Meta description length is good: <pre>'.$metadesc_length.' characters</pre></p>'."\n";$this->score += 1;}
            else{$this->result .='<p><span class="result warn">WARN</span>Meta description length should between 150 and 160 characters aprox. (included spaces), detected: <pre>'.$metadesc_length.' characters</pre></p>'."\n";}
        }else{
            $this->result .='<p><span class="result error">ERROR</span>No meta description detected!</p>'."\n";
            $this->result .='<p><span class="result error">ERROR</span>Meta description length should be 150 and 160 characters (included spaces), none is detected.</p>'."\n";
        }
        
        return array("name" => "metadescription","score" => $this->score,"total_score" => self::TOTAL_SCORE,"result" => $this->result);
    }
    
    public function prepareTest()
    {
        
    }
}

