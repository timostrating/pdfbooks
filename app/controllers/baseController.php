<?php

class BaseController {

    public function __construct() {
        $this->view = new View(
            new ViewLoader(platformSlashes(ROOTPATH.'/app/views/'))
        );
    }

    public function model($model) {
        require_once( ROOTPATH."/app/models/" . $model . ".php");
        return new $model();
    }
}