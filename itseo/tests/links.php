<?php
namespace itseo\test;

use itseo\TestInterface;

/**
 * This is a test that checks if all the links 
 * in the target are well formed.
 *
 * @author Fran Díaz <fran.diaz.gonzalez@gmail.com>
 * @access public
 * @todo Implement tests that list insite links and 
 * offsite links.
 */
class Links implements TestInterface{
    const TOTAL_SCORE = 2;
    public $score = 0;
    public $result = "";
    public $type = "internal_test";
    private $good_links, $bad_links, $warn_links, $inpage_links, $offpage_links = array();
    
    public function test($target)
    {
        $DOM = $target;
        $links = $DOM->getElementsByTagName('a');
        foreach ($links as $link) {
            if($link->getAttribute("href") != ""){
													 
                if($link->hasChildNodes()){
                    $childs = $link->childNodes;
                    if($childs->item(0)->nodeName == "#text"){$this->good_links[] = $link->getAttribute("href");}
                    else{$this->warn_links[] = $link->getAttribute("href");}
                }else{$this->good_links[] = $link->getAttribute("href");}
            }else{$this->bad_links[] = $link->textContent;}
        }


        if(count($this->bad_links) >= 1){
            $this->result .= '<p><span class="result error">ERROR</span>Almost one link without href is present in the site.</p><pre>'.count($this->bad_links).' without href</pre>';
        }
        if(count($this->warn_links) >= 1){
            $this->result .= '<p><span class="result warn">WARN</span>Almost one link contains other elements in the site.</p><pre>'.count($this->warn_links).' contains other elements inside</pre>';
        }

        if(count($this->good_links) >= 1){
            $this->result .= '<p><span class="result ok">OK</span>Almost one correct link in present in the site.</p><pre>'.count($this->good_links).' correct links</pre>';
        }else{
            $this->result .= '<p><span class="result error">ERROR</span>No correct links are detected in the site.</p>';
        }

        if(count($this->good_links) >= 1 && count($this->bad_links) == 0 && count($this->warn_links) == 0){
            $this->score += 2;
        }elseif(count($this->good_links) >= 1 && count($this->bad_links) == 0){
            $this->score += 1;
        }
        
        return array("name" => "links","score" => $this->score,"total_score" => self::TOTAL_SCORE,"result" => $this->result);
    }
    
    public function prepareTest()
    {
        
    }
}

?>
