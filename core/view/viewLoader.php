<?php

/**
 *  This class is responsible for parsing a view. 
 */

class ViewLoader {

    public function __construct($path) {
        $this->path = $path;
    }

    public function load($viewName, $vars) {
        if( file_exists($this->path.$viewName) ) {
            ob_start();
                extract($vars);
                print eval('?>'. file_get_contents($this->path.$viewName));
                $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
        throw new Exception("View cannot be loaded: ".$this->path.$viewName);
    }
}