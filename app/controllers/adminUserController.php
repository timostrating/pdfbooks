<?php

class AdminUserController extends baseController {

    function index() {  # GET /admin/users
        $result = $this->DB->query("SELECT * FROM Users", [], "AdminUser");
        $this->view->display("adminUser/adminUser_index.php", $result);        
    }


    function show($id) {  # GET /admin/users/1/show
        $sql = "SELECT * FROM Users WHERE ID=:id";
        $array = [ ":id" => $id ];
        $result = $this->DB->query($sql, $array, "AdminUser");
        $this->view->display("adminUser/adminUser_show.php", $result);                
    }


    function new() {  # GET /admin/users/new
        $this->view->display("adminUser/adminUser_new.php");                		
	}
    

    function edit($id) {  # GET /admin/users/1/edit
        $sql = "SELECT * FROM Users WHERE ID=:id";
        $array = [":id" => $id];
		$result = $this->DB->query($sql, $array, "AdminUser");
        $this->view->display("adminUser/adminUser_edit.php", $result);                		
    }


    /**********************************************************/
    

    function create() {  # POST /admin/users
        $sql = "INSERT INTO Users (name) VALUES (?);";
        $array = [$_POST["name"]];
		$result = $this->DB->query($sql, $array);
        
        header("location: ".ADMINUSER_INDEX_PATH);  // terug naar een GET
        exit();
    }


    function update($id) {  # POST /admin/users/1/update
        $sql = "UPDATE Users SET name=:name WHERE ID=:id;";
        $array = [
            ":name" => $_POST["name"], 
            ":id" => $id
        ];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".ADMINUSER_INDEX_PATH);  // terug naar een GET
        exit();
    }


	function delete($id) {  # POST /admin/users/1/delete
        $sql = "DELETE FROM Users WHERE ID=:id";
        $array = [":id" => $id];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".ADMINUSER_INDEX_PATH);  // terug naar een GET
        exit();
	}
}