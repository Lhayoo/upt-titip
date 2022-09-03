<?php 
    // coded by farriq muwaffaq
     spl_autoload_register(function($class){
        $class = explode('\\',$class);
        $class = end($class);
        require_once 'core/'.$class.'.php';
    });
?>