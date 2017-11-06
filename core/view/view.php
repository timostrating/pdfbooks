<?php

class View {

    public function __construct($viewLoader) {
        $this->viewLoader = $viewLoader;
    }

    public function display($viewName, $result="") {
        console_log("VIEW LOAD: ".$viewName);
        echo $this->viewLoader->load($viewName, array("result" => $result));
    }
}