<?php

class IndexController {

    public function index() {
        $this->view = new View(
            new ViewLoader(platformSlashes(ROOTPATH.'/app/views/'))
        );
        
        $this->view->display('home.php');
    }
}