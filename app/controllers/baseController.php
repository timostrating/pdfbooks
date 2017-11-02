<?php

class BaseController {

    public function __construct() {
        $this->view = new View(
            new ViewLoader(platformSlashes(ROOTPATH.'/app/views/'))
        );
    }

    // TODO: maybe we should have a model and view function here to handle them
    //       Models - are now static
    //       Views - are now loaded in the controller
}