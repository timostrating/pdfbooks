<?php

class OrderController extends baseController {

    function index() {  # GET /orders
        $result = $this->DB->query("SELECT * FROM Orders", [], "Order");
        $this->view->display("order/order_index.php", $result);        
    }


    function show($id) {  # GET /orders/1/show
        $sql = "SELECT * FROM Orders WHERE ID=:id";
        $array = [ ":id" => $id ];
        $result = $this->DB->query($sql, $array, "Order");
        $this->view->display("order/order_show.php", $result);                
    }


    function new() {  # GET /orders/new
        $this->view->display("order/order_new.php");                		
	}


    /**********************************************************/
    

    function create() {  # POST /orders
        $sql = "INSERT INTO Orders (name) VALUES (?);";
        $array = [$_POST["name"]];
		$result = $this->DB->query($sql, $array);
        
        header("location: ".ORDER_INDEX_PATH);  // terug naar een GET
        exit();
    }


	function delete($id) {  # POST /orders/1/delete
        $sql = "DELETE FROM Orders WHERE ID=:id";
        $array = [":id" => $id];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".ORDER_INDEX_PATH);  // terug naar een GET
        exit();
	}
}