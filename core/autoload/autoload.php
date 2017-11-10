<?php 

/**
 * This class is responsible for managing all autoloading responsibilities.
 */

class Autoload {

    private $autoloadable = [];


    /** This is our internall function to handle a registration */
    private function register($name, $loader = false) {
        if( is_callable($loader) || $loader == false) {
            $this->autoloadable[$name] = $loader;
            return;
        }
        throw new Exception('Loader must be callable '.$name);
    }


    /** Register a single file for autoloading */
    public function registerFile($fileClassName, $URI = false) {
        $this->register($fileClassName, function() use ($URI) {
            return require($URI);
        });
    }


    /** Register all files in the folder for autoloading */
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


    /** load a core file */
    public function load($name) {
        $name = strtolower($name);
        // We assume that for example the database.php is in the folder /core/database
        $filepath = ROOT.'/core/'.$name.'/'.$name.'.php'; 
        $filepath = $this->platformSlashes($filepath);
        
        // console_log("AUTOLOAD->LOAD: ".$filepath);

        if( !empty($this->autoloadable[$name]) ) {
            return $this->autoloadable[$name]($name);
        }
        if( file_exists($filepath) ) {
            return require($filepath);
        }

        throw new Exception($name.': is not loaded or registerd for autoloading');
    }


    function platformSlashes($path) {  // TODO: this is a duplicate
        if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
            $path = str_replace('/', '\\', $path);
        }
        return $path;
    }
}