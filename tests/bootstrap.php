<?php
use itseo\Itseo;

function autoload($dir){
    $files = scandir($dir);
    foreach($files as $file){
        if($file == "." || $file == "..")continue;
        $tmp_dir = $dir.DIRECTORY_SEPARATOR.$file;
        if(is_dir($tmp_dir)){
            autoload($tmp_dir);
        }elseif(is_readable($tmp_dir)){
            require_once($tmp_dir);
        }
    }
}
autoload(getcwd().DIRECTORY_SEPARATOR."itseo");