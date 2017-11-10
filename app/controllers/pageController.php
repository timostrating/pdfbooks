<?php

/**
 * This Controller is responsible for all individual pages.
 */

class PageController extends BaseController {

    function index() {
        $result = $this->DB->query("SELECT * FROM Categories", [], "Categorie");
        $this->view->display('page/page_index.php', $result);        
    } 

    function admin() {
        $this->view->display('admin/admin_index.php');
    }
}