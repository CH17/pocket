<?php

/****************************************
## Autoload required library files
## Bootstrapped when app load
*****************************************/

require_once 'config/config.php';


spl_autoload_register( function($className){
    require_once 'libraries/'. $className.'.php';
});