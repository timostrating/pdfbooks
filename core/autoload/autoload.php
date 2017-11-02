<?php

class Autoload {

    private $autoloadable = [];

    public function register($name, $loader = false) {
        if( is_callable($loader) || $loader == false) {
            $this->autoloadable[$name] = $loader;
            return;
        }
        throw new Exception('Loader must be callable '.$name);
    }

    public function registerFile($fileClassName, $URI = false) {
        $this->register($fileClassName, function() use ($URI) {
            return require($URI);
        });
    }

    public function registerFolder($URI) {
        $files = glob(platformSlashes($URI.'/*.{php}'), GLOB_BRACE);
        foreach($files as $file) {

            $fileClassName = explode(platformSlashes('/'), $file);                      
            $fileClassName = $fileClassName[ count($fileClassName)-1 ];
            $fileClassName = explode(platformSlashes('.'), $fileClassName);                      
            $fileClassName = strtolower( $fileClassName[0] );

            $this->register($fileClassName, function() use ($file) {
                return require($file);
            });
            
        }   
    }

    public function load($name) {
        $name = strtolower($name);
        $filepath = ROOTPATH.'/core/'.$name.'/'.$name.'.php';
        $filepath = $this->platformSlashes($filepath);
        
        console_log("AUTOLOAD->LOAD: ".$filepath."<br/>");

        if( !empty($this->autoloadable[$name]) ) {
            return $this->autoloadable[$name]($name);
        }
        if( file_exists($filepath) ) {
            return require($filepath);
        }

        throw new Exception($name.': is not loaded or registerd for autoloading');
    }

    function platformSlashes($path) {
        if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
            $path = str_replace('/', '\\', $path);
        }
        return $path;
    }
}