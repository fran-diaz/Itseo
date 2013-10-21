<?php
namespace itseo\test;

use itseo\TestInterface;
use itseo\Itseo;

/**
 * This is a test that checks if the favicon of the target 
 * is present.
 *
 * @author Fran Díaz <fran.diaz.gonzalez@gmail.com>
 * @access public
 */
class Favicon implements TestInterface{
    const TOTAL_SCORE = 1;
    public $score = 0;
    public $result = "";
    public $type = "internal_test";
    private $code = "";
    
    public function test($target)
    {
        $DOM = $target;
        $aux = $DOM->getElementsByTagName('link');
        foreach($aux as $link){
            if($link->getAttribute('type') == "image/x-icon"){$this->code .= htmlentities($DOM->saveXML($link));}
            elseif($link->getAttribute('rel') == "shortcut icon"){$this->code .= htmlentities($DOM->saveXML($link));}
        }
        if(strlen($this->code) >= 5){
            $this->result .='<p><span class="result ok">OK</span>Favicon is present in your website</p><pre>'.$this->code.'</pre>'."\n";$this->score += 1;
        }else{
            $this->result .='<p><span class="result warn">WARN</span>Favicon not detected</p>'."\n";
        }
        
        return array("name" => "favicon","score" => $this->score,"total_score" => self::TOTAL_SCORE,"result" => $this->result);
    }
    
    public function prepareTest()
    {
        
    }
}

?>
