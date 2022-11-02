<?php

spl_autoload_register(function ($class){
   $file = APPLICATION_DIR . str_replace('\\', '/', $class) . ".php";
    if (file_exists($file)){
        require $file;
    }
   else
       throw new Exception("Class ${class} not found!");
});
