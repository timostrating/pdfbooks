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

    public function load($name) {
        $name = strtolower($name);
        $filepath = ROOTPATH.'/core/'.$name.'/'.$name.'.php';
        $filepath = $this->platformSlashes($filepath);
        if( !empty($this->autoloadable[$name]) ) {
            return $this->autoloadable[$name]($name);
        }
        if( file_exists($filepath) ) {
            return require($filepath);
        }

        var_dump($filepath);
        throw new Exception($name.' is not loaded or registred for autoloading');
    }

    function platformSlashes($path) {
        if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
            $path = str_replace('/', '\\', $path);
        }
        return $path;
    }
}