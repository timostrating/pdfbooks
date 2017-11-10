<?php

class AdminUserController extends baseController {

    function index() {  # GET /admin/users
        $result = $this->DB->query("SELECT * FROM Users", [], "User");
        $this->view->display("admin/user/adminUser_index.php", $result);        
    }


    function show($id) {  # GET /admin/users/1/show
        $sql = "SELECT * FROM Users WHERE ID=:id";
        $array = [ ":id" => $id ];
        $result = $this->DB->query($sql, $array, "User");
        $this->view->display("admin/user/adminUser_show.php", $result);                
    }


    function new() {  # GET /admin/users/new
        $this->view->display("admin/user/adminUser_new.php");                		
	}
    

    function edit($id) {  # GET /admin/users/1/edit
        $sql = "SELECT * FROM Users WHERE ID=:id";
        $array = [":id" => $id];
		$result = $this->DB->query($sql, $array, "User");
        $this->view->display("admin/user/adminUser_edit.php", $result);                		
    }


    /**********************************************************/
    

    function create() {  # POST /admin/users
        if(isset($_POST["name"], $_POST["last_name"], $_POST["email"], $_POST["password"], $_POST["user_type_id"])) {

            $sql = "INSERT INTO Users (name, last_name, email, password, user_type_id) VALUES (?,?,?,?,?);";
            $array = [$_POST["name"], $_POST["last_name"], $_POST["email"], good_hash($_POST["password"]), $_POST["user_type_id"]];
            $result = $this->DB->query($sql, $array);
            
            header("location: ".ADMINUSER_INDEX_PATH);  // terug naar een GET
            exit();

        } else { header("location: ".ADMINUSER_INDEX_PATH."?error=Alles+volledig+invullen+aub"); exit(); }
    }


    function update($id) {  # POST /admin/users/1/update
        if(isset($_POST["name"], $_POST["last_name"], $_POST["email"], $_POST["password"], $_POST["user_type_id"])) {
            
            $sql = "UPDATE Users SET name=:name, last_name=:last_name, email=:email, password=:password, user_type_id=:user_type_id WHERE ID=:id;";
            $array = [
                ":name" => $_POST["name"], 
                ":last_name" => $_POST["last_name"], 
                ":email" => $_POST["email"], 
                ":password" => ((strlen($_POST["password"]) < 100) ? good_hash($_POST["password"]) : $_POST["password"]),  // Not the best way to solve this issue, but it works
                ":user_type_id" => $_POST["user_type_id"], 
                ":id" => $id
            ];
            $result = $this->DB->query($sql, $array);
            
            header("location: ".ADMINUSER_INDEX_PATH);  // terug naar een GET
            exit();

        } else { header("location: ".URL(ADMINUSER_EDIT_PATH, $id)."?error=Alles+volledig+invullen+aub"); exit(); }    
    }


	function delete($id) {  # POST /admin/users/1/delete
        $sql = "DELETE FROM Users WHERE ID=:id";
        $array = [":id" => $id];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".ADMINUSER_INDEX_PATH);  // terug naar een GET
        exit();
	}
}