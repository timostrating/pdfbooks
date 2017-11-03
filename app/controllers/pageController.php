<?php

class pageController extends baseController {

    function index() {
        $this->view->display('page/page_index.php');        
    }    
}