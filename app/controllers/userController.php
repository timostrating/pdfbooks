<?php

class UserController extends baseController {

    function login() {  # GET /users
        $this->view->display("user/user_login.php");        
    }

    function logout() {  # GET /users
        session_unset();
        session_destroy();
        header("location: ".LOCALHOSTURI); 
        exit();       
    }


    function show() {  # GET /users/1/show
        if(isset($_SESSION["USER_ID"])) {
            $sql = "SELECT * FROM users WHERE ID=:id";
            $array = [ ":id" => $_SESSION["USER_ID"] ];
            $result = $this->DB->query($sql, $array, "User");
            $this->view->display("user/user_show.php", $result); 
        } 
        else { header("location: ".LOCALHOSTURI); exit; }        
    }


    function new() {  # GET /users/new
        $this->view->display("user/user_new.php");                		
	}
    

    function edit() {  # GET /users/1/edit
        if(isset($_SESSION["USER_ID"])) {
            $sql = "SELECT * FROM users WHERE ID=:id";
            $array = [":id" => $_SESSION["USER_ID"]];
            $result = $this->DB->query($sql, $array, "User");
            $this->view->display("user/user_edit.php", $result); 
        } 
        else { header("location: ".LOCALHOSTURI); exit; }                 		
    }
    
    /**********************************************************/

    function create_session() {  # POST /users
        $sql = "SELECT * FROM users WHERE email=:email AND password=:password"; 
        $array = [":email" => $_POST['email'], ":password" => $_POST['password']];
        $result = $this->DB->query($sql, $array, "User");
        
        if(empty($result) == false) {
            $_SESSION["USER_ID"] = $result[0]->ID;
            header("location: ".LOCALHOSTURI."/users/profile"); 
            exit();
        } else {
            header("location: ".LOCALHOSTURI."/users/login"); 
            exit();
        }
    }


    function create() {  # POST /users
        $sql = "INSERT INTO users (name, email, password) VALUES (?,?,?);";
        $array = [$_POST["name"], $_POST["email"], $_POST["password"]];
        $result = $this->DB->query($sql, $array);

        $sql = "SELECT * FROM users WHERE email=:email' AND password=:password'"; 
        $array = [":email" => $_POST['email'], ":password" => $_POST['password']];
        $result = $this->DB->query($sql, $array, "User");

        $_SESSION["USER_ID"] = $result[0]->ID;
        
        header("location: ".LOCALHOSTURI."/users/profile"); 
        exit();
    }


    function update() {  # POST /users/1/update
        if(isset($_SESSION["USER_ID"])) {
            $sql = "UPDATE users SET name=:name WHERE ID=:id;";
            $array = [
                ":name" => $_POST["name"], 
                ":id" => $_SESSION["USER_ID"]
            ];
            $result = $this->DB->query($sql, $array);
        }
        
        header("location: ".LOCALHOSTURI."/users/profile");
        exit();
    }


    function delete() {  # POST /users/1/delete
        if(isset($_SESSION["USER_ID"])) {
            $sql = "DELETE FROM users WHERE ID=:id";
            $array = [":id" => $_SESSION["USER_ID"]];
            $result = $this->DB->query($sql, $array);
        }
        header("location: ".LOCALHOSTURI);  
        exit();
	}
}