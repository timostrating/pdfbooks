<?php

class IndexController extends BaseController {

    public function index() {
        $this->view->display('home.php');
    }
}