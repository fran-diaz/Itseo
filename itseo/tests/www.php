<?php
namespace itseo\test;

use itseo\TestInterface;

/**
 * This is a test that checks if www domain and 
 * non-www domain redirected to the same target page. 
 *
 * @author Fran Díaz <fran.diaz.gonzalez@gmail.com>
 * @access public
 */
class Www implements TestInterface{
    const TOTAL_SCORE = 1;
    public $score = 0;
    public $result = "";
    public $type = "external_test";

    public function test($target)
    {
        $url_tokens = parse_url($target);
        if(substr($url_tokens['host'],0,3) == 'www'){
            $www_domain = 'http://'.$url_tokens['host'].'/';
            $nonwww_domain = 'http://'.substr($url_tokens['host'],4).'/';
        }else{
            $www_domain = 'http://www.'.$url_tokens['host'].'/';
            $nonwww_domain = 'http://'.$url_tokens['host'].'/';
        }

        $www_headers = get_headers($www_domain,1);
        $nonwww_headers = get_headers($nonwww_domain,1);

        if(strpos($www_headers[0],'HTTP/1.1 301') !== false){
            $www_location = $www_headers['Location'];
        }else{
            $www_location = $www_domain;
        }

        if(strpos($nonwww_headers[0],'HTTP/1.1 301') !== false){
            $nonwww_location = $nonwww_headers['Location'];
        }else{
            $nonwww_location = $nonwww_domain;
        }

        if($www_location == $nonwww_location){$this->result .='<p><span class="result ok">OK</span>Site with www and non-www redirects to same page: <pre>With WWW: '.$www_headers[0].'('.$www_location.")\nWithout WWW: ".$nonwww_headers[0].'('.$nonwww_location.')</pre></p>'."\n";$this->score += 1;}
        else{$this->result .='<p><span class="result error">ERROR</span>Site with www and non-www redirects to different web sites: <pre>With WWW: '.$www_headers[0].'('.$www_location.")\nWithout WWW: ".$nonwww_headers[0].'('.$nonwww_location.')</pre></p>'."\n";}

        
        return array("name" => "www","score" => $this->score,"total_score" => self::TOTAL_SCORE,"result" => $this->result);
    }
    
    public function prepareTest()
    {
        
    }
}

