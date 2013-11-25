<?php
namespace itseo\test;

use itseo\TestInterface;

/**
 * This is a test that checks if meta keywords are present.
 *
 * @author Fran Díaz <fran.diaz.gonzalez@gmail.com>
 * @access public
 */
class MetaKeywords implements TestInterface{
    const TOTAL_SCORE = 0;
    public $score = 0;
    public $result = "";
    public $type = "internal_test";
    
    public static function extractMetaKeywords($target)
    {
        $DOM = $target;
        $keywords = "";
        $meta_elements = $DOM->getElementsByTagName('meta');
        foreach ($meta_elements as $meta) {
            if(!$meta->getAttribute('name'))continue;
            elseif($meta->getAttribute('name') == "keywords"){
                if(!$meta->getAttribute('content'))continue;
                $keywords .= $meta->getAttribute('content');
            }
        }
        return $keywords;
    }
    
    public function test($target)
    {
        $metakey = self::extractMetaKeywords($target);
        if(strlen($metakey) >= 1){
            $metakey_length = strlen($metakey);
            $metakey_words = explode(",",$metakey);
            $this->result .='<p><span class="result info">INFO</span>The meta keywords are present, good game but remind that they aren\'t longer used: <pre>'.$metakey."\n".$metakey_length.' characters in '.count($metakey_words).' words</pre></p>'."\n";
        }else{
            $this->result .='<p><span class="result info">INFO</span>No meta keywords detected, don\'t waste your time in this because aren\'t longer used </p>'."\n";
        }
        
        return array("name" => "metakeywords","score" => $this->score,"total_score" => self::TOTAL_SCORE,"result" => $this->result);
    }
    
    public function prepareTest()
    {
        
    }
}

