<?php

class PageController extends BaseController {

    function index() {
        $this->view->display('page/page_index.php');        
    } 
    
    function contact() {
        $this->view->display('page/page_contact.php');        
    }

    function test() {
        // dump(getenv());
    }
}