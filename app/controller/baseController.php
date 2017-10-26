<?php

class BaseController {

    public function __construct() {
        $this->view = new View(
            new ViewLoader(platformSlashes(ROOTPATH.'/app/views/'))
        );
    }
}