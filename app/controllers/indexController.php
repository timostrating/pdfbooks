<?php

class IndexController extends BaseController {

    # GET /products
    function index() { 
        $this->view->display('home/home_index.php');
    }

    # GET /products/1
    function show($id) { 
        $this->view->display('home/home_show.php');
    }

    # GET /products/new
    function new() { 
        $this->view->display('home/home_new.php');
    }

    # GET /products/1/edit
    function edit($id) { 
        $this->view->display('home/home_edit.php');
    }


    # POST /products
    function create() { 
        // User::create([
        //     'name' => "test",
        //     'email' => "test@hanze.nl"
        // ]);
    }

    # PATCH/PUT /products/1
    function update($id) { 
        // TODO
    }

    # DELETE /products/1
    function destroy($id) {
        // User::destroy($id);
    }
}