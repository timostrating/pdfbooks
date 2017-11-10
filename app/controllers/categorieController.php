<?php

class CategorieController extends baseController {

    function index() {  # GET /categories
        $result = $this->DB->query("SELECT * FROM Categories", [], "Categorie");
        $this->view->display("categorie/categorie_index.php", $result);        
    }


    function show($id) {  # GET /categories/1/show
        $result = $this->DB->query("SELECT * FROM Categories", [], "Categorie");
        $this->view->display("product/product_menu.php", $result); 
        
            $sql = "SELECT * FROM Products WHERE categorie_id=:id";
            $array = [ ":id" => $id ];
            $result = $this->DB->query($sql, $array, "Product");

            $this->view->display("product/product_index.php", $result);   

        echo "</div></div>";             
    }
}