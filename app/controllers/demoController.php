<?php

class DemoController extends baseController {

    function index() {  # GET /demos
        $this->view->display("demo/demo_index.php");        
    }


    function show() {  # GET /demos/1/show 
        echo 
        $this->view->display("demo/demo_show.php");                
    }

}