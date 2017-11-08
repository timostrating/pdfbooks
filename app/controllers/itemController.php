<?php

class ItemController extends baseController {

    function index() {  # GET /items
        $result = $this->DB->query("SELECT * FROM Items", [], "Item");
        $this->view->display("item/item_index.php", $result);        
    }


    function show($id) {  # GET /items/1/show
        $sql = "SELECT * FROM Items WHERE ID=:id";
        $array = [ ":id" => $id ];
        $result = $this->DB->query($sql, $array, "Item");
        $this->view->display("item/item_show.php", $result);                
    }


    function new() {  # GET /items/new
        $this->view->display("item/item_new.php");                		
	}
    

    function edit($id) {  # GET /items/1/edit
        $sql = "SELECT * FROM Items WHERE ID=:id";
        $array = [":id" => $id];
		$result = $this->DB->query($sql, $array, "Item");
        $this->view->display("item/item_edit.php", $result);                		
    }


    /**********************************************************/
    

    function create() {  # POST /items
        $sql = "INSERT INTO Items (name) VALUES (?);";
        $array = [$_POST["name"]];
		$result = $this->DB->query($sql, $array);
        
        header("location: ".ITEM_INDEX_PATH);  // terug naar een GET
        exit();
    }


    function update($id) {  # POST /items/1/update
        $sql = "UPDATE Items SET name=:name WHERE ID=:id;";
        $array = [
            ":name" => $_POST["name"], 
            ":id" => $id
        ];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".ITEM_INDEX_PATH);  // terug naar een GET
        exit();
    }


	function delete($id) {  # POST /items/1/delete
        $sql = "DELETE FROM Items WHERE ID=:id";
        $array = [":id" => $id];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".ITEM_INDEX_PATH);  // terug naar een GET
        exit();
	}
}