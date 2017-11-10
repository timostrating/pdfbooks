<?php

/**
 * This Controller is responsible for the CRUD of the products
 */

class productController extends baseController {
    

    function index() {  # GET /products
        $result = $this->DB->query("SELECT * FROM Categories", [], "Categorie");
        $this->view->display("product/product_menu.php", $result); 
        
            $search_value = (isset($_GET["search"]))? $_GET["search"] : "";
            $sql = "SELECT * FROM Products WHERE lower(name) LIKE ? OR lower(description) LIKE ?;";
            $array = ["%".$search_value."%", "%".$search_value."%"];
            $result = $this->DB->query($sql, $array, "Product");
            $this->view->display("product/product_index.php", $result); 

        echo "</div></div>";       
    }


    function show($id) {  # GET /products/1/show
        $sql = "SELECT * FROM Products WHERE ID=:id";
        $array = [ ":id" => $id ];
        $result = $this->DB->query($sql, $array, "Product");
        $this->view->display("product/product_show.php", $result);                
    }
}