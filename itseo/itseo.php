<?php
namespace itseo;

use itseo\test;
/**
 * ITSeo is a class that meets a set of tests whose function 
 * is to review web pages in very basic level to extract 
 * information about SEO.
 *
 * @author Fran Díaz <fran.diaz.gonzalez@gmail.com>
 * @version 0.5
 * @access public
 * @copyright (c) 2013, Fran Diaz
 * 
 */
class Itseo {

    public $target, $base_url, $page_HTML, $page_DOM;
    public $tests = array();
    protected $domain;
    
    public function __construct($target)
    {
        if(parse_url($target,PHP_URL_SCHEME) === null){
            $this->target = "HTML code";
            $this->domain = "HTML code";
            $this->base_url = "HTML code";
            $this->page_HTML = $target;
            $this->page_DOM = $this->extractDOM($this->page_HTML);
        }else{
            $this->target = $target;
            $this->domain = self::extractDomain($target);
            $this->base_url = self::createBaseUrl($target);
            $opts = array('http' => array('header' => 'Accept-Charset: utf-8, *;q=0'));
            $context = stream_context_create($opts);
            $this->page_HTML = utf8_decode(file_get_contents($target ,false,$context));
            unset($aux);
            $this->page_DOM = $this->extractDOM($this->page_HTML);
        }
    }

    public static function extractDomain($url) 
    {
        return parse_url($url, PHP_URL_HOST);
    }
    
    public static function createBaseUrl($url)
    {
        $tmp_domain = self::extractDomain($url);
        if (strpos($tmp_domain, "www") === false) {
            $tmp_domain = "www." . $tmp_domain;
        }
        return "http://" . $tmp_domain . "/";
    }
    
    public static function extractDOM($page){
        $DOM = new \DOMDocument();
        $DOM->recover = true;
        $DOM->strictErrorChecking = false;
        @$DOM->loadHTML($page);
        return $DOM;
    }
    
    public function prepareTest($test)
    {
        if(!isset($this->tests[$test])){
            $this->tests[$test] = array("name" => '', "title" => '', "score" => 0, "total_score" => 0, "result" => '');
        }
        
        $test_ob_name = 'itseo\\test\\'.$test;
        if(!class_exists($test_ob_name))throw new \Exception( "Class '$test_ob_name' not exist!" );
        else{
            $test_ob = new $test_ob_name;
            $test_ob->prepareTest();
        }
    }
    
    public function makeTest($test)
    {
        if(!isset($this->tests[$test])){$this->prepareTest($test);}
        $test_ob_name = 'itseo\\test\\'.$test;
        $test_ob = new $test_ob_name;
        if($test_ob->type == "internal_test"){
            $result = $test_ob->test($this->page_DOM);
        }else{
            if($this->target != "HTML code"){
                $result = $test_ob->test($this->target,$this->domain);
            }else{
                unset($this->tests[$test]);
                trigger_error("Selected test not supports current target.",E_USER_NOTICE);
                return false;
            }
        }

        $this->tests[$test]['name'] = $result['name'];
        $this->tests[$test]['title'] = $result['name'];
        $this->tests[$test]['score'] = $result['score'];
        $this->tests[$test]['total_score'] = $result['total_score'];
        $this->tests[$test]['result'] = $result['result'];
    }
}
