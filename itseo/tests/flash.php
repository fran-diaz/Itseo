<?php
namespace itseo\test;

use itseo\TestInterface;

/**
 * This is a test that checks if flash objects are present 
 * in the target.
 *
 * @author Fran Díaz <fran.diaz.gonzalez@gmail.com>
 * @access public
 */
class Flash implements TestInterface{
    const TOTAL_SCORE = 1;
    public $score = 0;
    public $result = "";
    public $type = "internal_test";
    
    public function test($target)
    {
        $DOM = $target;
        $embed_elements = $DOM->getElementsByTagName('embed');
        $object_elements = $DOM->getElementsByTagName('object');
        if($embed_elements->length >= 1 || $object_elements->length >= 1){
            $this->result .='<p><span class="result error">ERROR</span>Some potential flash elements are detected: <pre>'.$embed_elements->length.' embed elements<br />'.$object_elements->length.' object elements</pre></p>'."\n";
        }else{
            $this->result .='<p><span class="result ok">OK</span>No flash elements are detected!</p>'."\n";$this->score += 1;
        }
        
        return array("name" => "flash","score" => $this->score,"total_score" => self::TOTAL_SCORE,"result" => $this->result);
    }
    
    public function prepareTest()
    {
        
    }
}

?>
