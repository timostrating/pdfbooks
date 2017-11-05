<?php

class PageController extends baseController {

    function index() {
        $this->view->display('page/page_index.php');        
    } 
    
    function contact() {
        $this->view->display('page/page_contact.php');        
    }
}