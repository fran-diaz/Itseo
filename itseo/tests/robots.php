<?php
namespace itseo\test;

use itseo\TestInterface;

/**
 * This is a test that checks if exists target's robots 
 * and has good structure.
 *
 * @author Fran Díaz <fran.diaz.gonzalez@gmail.com>
 * @access public
 */
class Robots implements TestInterface{
    const TOTAL_SCORE = 2;
    public $score = 0;
    public $result = "";
    public $type = "external_test";
    
    public function parseRobots($robots_file){
        $valid_commands = array("User-agent","Disallow");
        $custom_commands = array("Allow","Crawl-delay","Sitemap","Host");
        $result = "";
        $fails = 0;

        $lines = explode("\n", $robots_file);
        if($lines){
            foreach($lines as $line){
                $line_info = explode(":", $line);
                if(in_array($line_info[0],$valid_commands)){
                    $result .= $line.' - OK'."\n";
                }elseif(in_array($line_info[0],$custom_commands)){
                    $result .= $line.' - CUSTOM COMMAND'."\n";
                }else{
                   $result .= $line.' - INVALID COMMAND'."\n"; 
                   $fails += 1;
                }
            }
            return array("result" =>$result,"fails" => $fails);
        }else{
            return false;
        }
    }

    public function test($target)
    {
        $robots_HTML = @file_get_contents($target."/robots.txt");
        if($robots_HTML){
            $this->result .='<p><span class="result ok">OK</span>Robots is detected</p>'."\n";$this->score += 1;
            $robots_info = $this->parseRobots($robots_HTML);
            if($robots_info['fails'] == 0){
                $this->result .='<p><span class="result ok">OK</span>Robots structure appears valid: <pre>'.$robots_info['result'].'</pre></p>'."\n";$this->score += 1;
            }else{
                $this->result .='<p><span class="result warn">WARN</span>Robots structure contains invalid commands: <pre>'.$robots_info['result'].'</pre></p>'."\n";
            }
        }else{
            $this->result .='<p><span class="result error">ERROR</span>Robots.txt not detected.</p>'."\n";
        }
        
        return array("name" => "robots","score" => $this->score,"total_score" => self::TOTAL_SCORE,"result" => $this->result);
    }
    
    public function prepareTest()
    {
        
    }
}
