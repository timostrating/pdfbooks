<?php

class View {

    public function __construct($viewLoader) {
        $this->viewLoader = $viewLoader;
    }

    public function display($viewName, $result) {
        echo $this->viewLoader->load($viewName, array("result" => $result));
    }
}