<?php

class CartController extends baseController {

    function index() {  # GET /shoppingcart
        if(isset($_SESSION["CART"]) == false) { $_SESSION["CART"] = []; }
        $this->view->display("cart/cart_index.php",  $_SESSION["CART"]);        
    }    


    /**********************************************************/
    

    function add($id) {  # POST /shoppingcart/1/add
        if(isset($_SESSION["CART"]) == false) { $_SESSION["CART"] = []; }

        $sql = "SELECT * FROM Products WHERE ID=:id";
        $array = [ ":id" => $id ];
        $result = $this->DB->query($sql, $array, "Product");
        $product = $result[0];
        
        if(isset($_SESSION["CART"][$id])) {
            $_SESSION["CART"][$id]["count"] += 1;
        } else{
            $_SESSION["CART"][$id] = ["ID"=> $id, "count"=>1, "name" => $product->name, "price" => $product->price ];            
        }
        
        header("location: ".CART_INDEX_PATH);  // terug naar een GET
        exit();
    }


    function subtract($id) {  # POST /shoppingcart/1/subtract
        if(isset($_SESSION["CART"]) == false) { $_SESSION["CART"] = []; }        

        if(array_key_exists($id, $_SESSION["CART"])) {
            $_SESSION["CART"][$id]["count"] -= 1;
            
            if($_SESSION["CART"][$id]["count"] < 1) {
                $_SESSION["CART"] = array_diff_key($_SESSION["CART"], [$id => "?"]);
            }
        }
        
        header("location: ".CART_INDEX_PATH);  // terug naar een GET
        exit();
    }


	function delete($id) {  # POST /shoppingcart/1/delete
        $_SESSION["CART"] = array_diff_key($_SESSION["CART"], [$id => "?"]);
        
        header("location: ".CART_INDEX_PATH);  // terug naar een GET
        exit();
	}
}