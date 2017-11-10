<?php

class AdminOrderController extends baseController {

    function index() {  # GET /adminOrders
        $result = $this->DB->query("SELECT * FROM Orders", [], "Order");
        $this->view->display("admin/order/adminOrder_index.php", $result);        
    }


    function show($id) {  # GET /adminOrders/1/show
        $sql = "SELECT * FROM Orders WHERE ID=:id";
        $array = [ ":id" => $id ];
        $result = $this->DB->query($sql, $array, "Order");
        $this->view->display("admin/order/adminOrder_show.php", $result);                
    }


    function new() {  # GET /adminOrders/new
        $this->view->display("admin/order/adminOrder_new.php");                		
	}
    

    function edit($id) {  # GET /adminOrders/1/edit
        $sql = "SELECT * FROM Orders WHERE ID=:id";
        $array = [":id" => $id];
		$result = $this->DB->query($sql, $array, "Order");
        $this->view->display("admin/order/adminOrder_edit.php", $result);                		
    }


    /**********************************************************/
    

    function create() {  # POST /adminOrders
        $sql = "INSERT INTO Orders (name) VALUES (?);";
        $array = [$_POST["name"]];
		$result = $this->DB->query($sql, $array);
        
        header("location: ".ADMINORDER_INDEX_PATH);  // terug naar een GET
        exit();
    }


    function update($id) {  # POST /adminOrders/1/update
        $sql = "UPDATE Orders SET name=:name WHERE ID=:id;";
        $array = [
            ":name" => $_POST["name"], 
            ":id" => $id
        ];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".ADMINORDER_INDEX_PATH);  // terug naar een GET
        exit();
    }


	function delete($id) {  # POST /adminOrders/1/delete
        $sql = "DELETE FROM Orders WHERE ID=:id";
        $array = [":id" => $id];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".ADMINORDER_INDEX_PATH);  // terug naar een GET
        exit();
	}
}