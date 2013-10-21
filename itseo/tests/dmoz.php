<?php
namespace itseo\test;

use itseo\TestInterface;
use itseo\Itseo;

/**
 * This is a test that checks if the target url is listed 
 * in Dmoz directory.
 *
 * @author Fran Díaz <fran.diaz.gonzalez@gmail.com>
 * @access public
 */
class Dmoz implements TestInterface{
    const TOTAL_SCORE = 1;
    public $score = 0;
    public $result = "";
    public $type = "external_test";
    private $in_dmoz = false;
    
    public function test($target,$domain = "localhost")
    {
        $dmoz_HTML = file_get_contents('http://www.dmoz.org/search/?q='.$domain);
        if($dmoz_HTML){
            $DOM = Itseo::extractDOM($dmoz_HTML);
            $aux = $DOM->getElementsByTagName('a');
            foreach($aux as $link){
                if($link->getAttribute('href') == $target){
                    $this->in_dmoz = true;
                    $this->result .='<p><span class="result ok">OK</span>Your site is listed in DMOZ directory.</p>'."\n";$this->score += 1;
                    break;
                }
            }

            if($this->in_dmoz !== true){
                $this->result .='<p><span class="result error">ERROR</span>Your site its not listed in DMOZ directory</p>'."\n";
            }
        }
        
        return array("name" => "dmoz","score" => $this->score,"total_score" => self::TOTAL_SCORE,"result" => $this->result);
    }
    
    public function prepareTest()
    {
        
    }
    
}
