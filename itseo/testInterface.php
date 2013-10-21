<?php
namespace itseo;

/**
 * TestInterface it's a template that allows test classes 
 * be created in same way
 * 
 * @author Fran Díaz <fran.diaz.gonzalez@gmail.com>
 * @access public
 */
interface TestInterface {
    public function test($target);
    public function prepareTest();
}

?>
