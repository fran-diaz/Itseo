<?php
namespace itseo\test;

use itseo\TestInterface;

/**
 * This is a test that checks if frame or iframe objects are present 
 * in the target.
 *
 * @author Fran Díaz <fran.diaz.gonzalez@gmail.com>
 * @access public
 */
class Frames implements TestInterface{
    const TOTAL_SCORE = 1;
    public $score = 0;
    public $result = "";
    public $type = "internal_test";
    
    public function test($target)
    {
        $DOM = $target;
        $frame_elements = $DOM->getElementsByTagName('frame');
        $iframe_elements = $DOM->getElementsByTagName('iframe');
        if(!$frame_elements || $frame_elements->length == 0){
            $this->result .='<p><span class="result ok">OK</span>No frames are detected!</p>'."\n";
        }else{
            $this->result .='<p><span class="result error">ERROR</span>Some frames are detected: <pre>'.$frame_elements->length.' frames</pre></p>'."\n";
        }

        
        if(!$iframe_elements || $iframe_elements->length == 0){
            $this->result .='<p><span class="result ok">OK</span>No iframes are detected!</p>'."\n";
        }else{
            $this->result .='<p><span class="result error">ERROR</span>Some iframes are detected: <pre>'.$iframe_elements->length.' iframes</pre></p>'."\n";
        }

        if(!$frame_elements && !$iframe_elements){
            $this->score += 1;
        }elseif($frame_elements->length == 0 && $iframe_elements->length == 0){
            $this->score += 1;
        }
        
        return array("name" => "frames","score" => $this->score,"total_score" => self::TOTAL_SCORE,"result" => $this->result);
    }
    
    public function prepareTest()
    {
        
    }
}

?>
