<?php

/**
 * This Controller is responsible for the CRUD of the products
 */

class productController extends baseController {
   

    function index() {  # GET /products
        $result = $this->DB->query("SELECT * FROM Products", [], "Product");
        $this->view->display("product/product_index.php", $result);        
    }


    function show($id) {  # GET /products/1/show
        $sql = "SELECT * FROM Products WHERE ID=:id";
        $array = [ ":id" => $id ];
        $result = $this->DB->query($sql, $array, "Product");
        $this->view->display("product/product_show.php", $result);                
    }


    function new() {  # GET /products/new
        $this->view->display("product/product_new.php");                		
	}
    

    function edit($id) {  # GET /products/1/edit
        $sql = "SELECT * FROM Products WHERE ID=:id";
        $array = [":id" => $id];
		$result = $this->DB->query($sql, $array, "Product");
        $this->view->display("product/product_edit.php", $result);                		
    }
    

    /**********************************************************/


    function create() {  # POST /products
        $sql = "INSERT INTO Products (name, description, imgurl, price) VALUES  (?,?,?,?);";
        $array = [$_POST["name"], $_POST["description"], $_POST["imgurl"], $_POST["price"]];
		$result = $this->DB->query($sql, $array);
        
        header("location: ".PRODUCT_INDEX_PATH);  // terug naar een GET
        exit();
    }


    function update($id) {  # POST /products/1/update
        $sql = "UPDATE Products SET name=:name, description=:description, imgurl=:imgurl, price=:price WHERE ID=:id;";
        $array = [
            ":name" => $_POST["name"], 
            ":description" => $_POST["description"], 
            ":imgurl" => $_POST["imgurl"],
            ":price" => $_POST["price"],
            ":id" => $id
        ];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".PRODUCT_INDEX_PATH);  // terug naar een GET
        exit();
    }


	function delete($id) { # POST /products/1/delete
        $sql = "DELETE FROM Products WHERE ID=:id";
        $array = [":id" => $id];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".PRODUCT_INDEX_PATH);  // terug naar een GET
        exit();
	}
}