<?php
namespace itseo\test;

use itseo\TestInterface;

/**
 * This is a test that list the occurrences of the headings 
 * in the target.
 *
 * @author Fran Díaz <fran.diaz.gonzalez@gmail.com>
 * @access public
 */
class Headings implements TestInterface{
    const TOTAL_SCORE = 1;
    public $score = 0;
    public $result = "";
    public $type = "internal_test";
    
    public function test($target)
    {
        $DOM = $target;
        $h1_elements = $DOM->getElementsByTagName('h1');
        $h2_elements = $DOM->getElementsByTagName('h2');
        $h3_elements = $DOM->getElementsByTagName('h3');
        $h4_elements = $DOM->getElementsByTagName('h4');
        $h5_elements = $DOM->getElementsByTagName('h5');
        $h6_elements = $DOM->getElementsByTagName('h6');
        if($h1_elements->length >= 1 && $h2_elements->length >= 1){$this->result .='<p><span class="result ok">OK</span>Almost one H1 and one H2 are detected:</p>';$this->score += 1;}
        else{$this->result .= '<p><span class="result error">ERROR</span>Almost one H1 and one H2 there be present in your page</p>';}
        $this->result .= '<table>
            <tr><th>H1</th><th>H2</th><th>H3</th><th>H4</th><th>H5</th><th>H6</th></tr>
            <tr><td>'.$h1_elements->length.'</td><td>'.$h2_elements->length.'</td><td>'.$h3_elements->length.'</td><td>'.$h4_elements->length.'</td><td>'.$h5_elements->length.'</td><td>'.$h6_elements->length.'</td></tr>
            </table><pre>';

        foreach($h1_elements as $h1){
            $this->result .= htmlentities('<h1>').substr(htmlentities($h1->textContent),0,65);
            if(strlen(htmlentities($h1->textContent)) > 70){$this->result .= '...';}
            $this->result .= htmlentities('</h1>')."\n";
        }
        foreach($h2_elements as $h2){
            $this->result .= htmlentities('<h2>').substr(htmlentities($h2->textContent),0,65);
            if(strlen(htmlentities($h2->textContent)) > 70){$this->result .= '...';}
            $this->result .= htmlentities('</h2>')."\n";
        }
        foreach($h3_elements as $h3){
            $this->result .= htmlentities('<h3>').substr(htmlentities($h3->textContent),0,65);
            if(strlen(htmlentities($h3->textContent)) > 70){$this->result .= '...';}
            $this->result .= htmlentities('</h3>')."\n";
        }
        foreach($h4_elements as $h4){
            $this->result .= htmlentities('<h4>').substr(htmlentities($h4->textContent),0,65);
            if(strlen(htmlentities($h4->textContent)) > 70){$this->result .= '...';}
            $this->result .= htmlentities('</h4>')."\n";
        }
        foreach($h5_elements as $h5){
            $this->result .= htmlentities('<h5>').substr(htmlentities($h5->textContent),0,65);
            if(strlen(htmlentities($h5->textContent)) > 70){$this->result .= '...';}
            $this->result .= htmlentities('</h5>')."\n";
        }
        foreach($h6_elements as $h6){
            $this->result .= htmlentities('<h6>').substr(htmlentities($h6->textContent),0,65);
            if(strlen(htmlentities($h6->textContent)) > 70){$this->result .= '...';}
            $this->result .= htmlentities('</h6>')."\n";
        }

        $this->result .= '</pre>'."\n";
        
        return array("name" => "headings","score" => $this->score,"total_score" => self::TOTAL_SCORE,"result" => $this->result);
    }
    
    public function prepareTest()
    {
        
    }
}

?>
