<?php

class AdminProductController extends baseController {

    function index() {  # GET /adminProducts
        $result = $this->DB->query("SELECT * FROM Products", [], "Product");
        $this->view->display("admin/product/adminProduct_index.php", $result);        
    }


    function show($id) {  # GET /adminProducts/1/show
        $sql = "SELECT * FROM Products WHERE ID=:id";
        $array = [ ":id" => $id ];
        $result = $this->DB->query($sql, $array, "Product");
        $this->view->display("admin/product/adminProduct_show.php", $result);                
    }


    function new() {  # GET /adminProducts/new
        $this->view->display("admin/product/adminProduct_new.php");                		
	}
    

    function edit($id) {  # GET /adminProducts/1/edit
        $sql = "SELECT * FROM Products WHERE ID=:id";
        $array = [":id" => $id];
		$result = $this->DB->query($sql, $array, "Product");
        $this->view->display("admin/product/adminProduct_edit.php", $result);                		
    }


    /**********************************************************/
    

    function create() {  # POST /adminProducts
        $sql = "INSERT INTO Products (name, description, imgurl, price, categorie_id) VALUES (?,?,?,?,?);";
        $array = [$_POST["name"], $_POST["description"], $_POST["imgurl"], $_POST["price"], $_POST["categorie_id"]];
		$result = $this->DB->query($sql, $array);
        
        header("location: ".ADMINPRODUCT_INDEX_PATH);  // terug naar een GET
        exit();
    }


    function update($id) {  # POST /adminProducts/1/update
        $sql = "UPDATE Products SET name=:name, description=:description, imgurl=:imgurl, price=:price WHERE ID=:id;";
        $array = [
            ":name" => $_POST["name"], 
            ":description" => $_POST["description"], 
            ":imgurl" => $_POST["imgurl"], 
            ":price" => $_POST["price"], 
            ":id" => $id
        ];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".ADMINPRODUCT_INDEX_PATH);  // terug naar een GET
        exit();
    }


	function delete($id) {  # POST /adminProducts/1/delete
        $sql = "DELETE FROM Products WHERE ID=:id";
        $array = [":id" => $id];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".ADMINPRODUCT_INDEX_PATH);  // terug naar een GET
        exit();
	}
}