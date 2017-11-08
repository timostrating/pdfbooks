<?php

class CartController extends baseController {

    function index() {  # GET /shoppingcart
        $result = [ 
            ["ID" => 1, "name" => "jhee"],  
            ["ID" => 4, "name" => "damn"] ];

        $this->view->display("cart/cart_index.php", $result);        
    }    


    /**********************************************************/
    

    function add($id) {  # POST /shoppingcart/1/add
        // TODO
        
        echo "JHEEE";

        // header("location: ".CART_INDEX_PATH);  // terug naar een GET
        // exit();
    }


    function subtract($id) {  # POST /shoppingcart/1/update
        // TODO
        
        header("location: ".CART_INDEX_PATH);  // terug naar een GET
        exit();
    }


	function delete($id) {  # POST /shoppingcart/1/delete
        // TODO
        
        header("location: ".CART_INDEX_PATH);  // terug naar een GET
        exit();
	}
}