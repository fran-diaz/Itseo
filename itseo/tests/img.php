<?php
namespace itseo\test;

use itseo\TestInterface;

/**
 * This is a test that checks if all the images 
 * in the target are having the alt tag.
 *
 * @author Fran Díaz <fran.diaz.gonzalez@gmail.com>
 * @access public
 */
class Img implements TestInterface{
    const TOTAL_SCORE = 1;
    public $score = 0;
    public $result = "";
    public $type = "internal_test";
    private $img_alt = 0;
    private $img_s_alt = 0;
    
    public function test($target)
    {
        $DOM = $target;
        $images = $DOM->getElementsByTagName('img');
        foreach($images as $img){
            $alt = $img->getAttribute('alt');
            if(!$alt || $alt == ""){$this->img_s_alt++;}
            else{$this->img_alt++;}
            unset($alt);
        }

        if($this->img_s_alt == 0 && $this->img_alt >= 1){
            $this->result .='<p><span class="result ok">OK</span>All images have alt specified:</p><pre>'.$this->img_alt.' images have alt</pre>'."\n";$this->score += 1;
        }elseif($this->img_s_alt == 0 && $this->img_alt == 0){
            $this->result .='<p><span class="result ok">OK</span>No images without alt on page:</p>'."\n";$this->score += 1;
        }else{
            $this->result .='<p><span class="result warn">WARN</span>Some images without alt detected:</p><pre>'.$this->img_s_alt.' images without alt</pre>'."\n";
        }
        
        return array("name" => "img","score" => $this->score,"total_score" => self::TOTAL_SCORE,"result" => $this->result);
    }
    
    public function prepareTest()
    {
        
    }
}

?>
