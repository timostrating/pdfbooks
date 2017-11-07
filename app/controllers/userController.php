<?php

/**
 * This Controller is responsible for the CRUD of the Users
 */

class UserController extends baseController {


    function login() {  # GET /users/login
        $this->view->display("user/user_login.php");        
    }


    function logout() {  # GET /users/logout
        session_unset();
        session_destroy();
        header("location: ".ROOT_PATH); 
        exit();       
    }


    function show() {  # GET /users/profile
        if(isset($_SESSION["USER_ID"])) {
            $sql = "SELECT * FROM users WHERE ID=:id";
            $array = [ ":id" => $_SESSION["USER_ID"] ];
            $result = $this->DB->query($sql, $array, "User");
            $this->view->display("user/user_show.php", $result); 
        } 
        else { header("location: ".ROOT_PATH); exit; }        
    }


    // I renamed this from 'new' to 'register' to make it more readable when the path is used
    function register() {  # GET /users/register
        $this->view->display("user/user_new.php");                		
	}
    

    function edit() {  # GET /users/update
        if(isset($_SESSION["USER_ID"])) {
            $sql = "SELECT * FROM users WHERE ID=:id";
            $array = [":id" => $_SESSION["USER_ID"]];
            $result = $this->DB->query($sql, $array, "User");
            $this->view->display("user/user_edit.php", $result); 
        } 
        else { header("location: ".ROOT_PATH); exit; }                 		
    }

    
    /**********************************************************/


    function create_session() {  # POST /users/create_session
        $sql = "SELECT * FROM users WHERE email=:email AND password=:password"; 
        $array = [":email" => $_POST['email'], ":password" => $_POST['password']];
        $result = $this->DB->query($sql, $array, "User");
        
        if(empty($result) == false) {
            $_SESSION["USER_ID"] = $result[0]->ID;
            header("location: ".ROOT_PATH."/users/profile"); 
            exit();
        } else {
            header("location: ".ROOT_PATH."/users/login"); 
            exit();
        }
    }


    function create() {  # POST /users/create
        $sql = "INSERT INTO users (name, email, password) VALUES (?,?,?);";
        $array = [$_POST["name"], $_POST["email"], $_POST["password"]];
        $result = $this->DB->query($sql, $array);

        $sql = "SELECT * FROM users WHERE email=:email' AND password=:password'"; 
        $array = [":email" => $_POST['email'], ":password" => $_POST['password']];
        $result = $this->DB->query($sql, $array, "User");

        $_SESSION["USER_ID"] = $result[0]->ID;
        
        header("location: ".ROOT_PATH."/users/profile"); 
        exit();
    }


    function update() {  # POST /users/update
        if(isset($_SESSION["USER_ID"])) {
            $sql = "UPDATE users SET name=:name WHERE ID=:id;";
            $array = [
                ":name" => $_POST["name"], 
                ":id" => $_SESSION["USER_ID"]
            ];
            $result = $this->DB->query($sql, $array);
        }
        
        header("location: ".ROOT_PATH."/users/profile");
        exit();
    }


    function delete() {  # POST /users/1/delete
        if(isset($_SESSION["USER_ID"])) {
            $sql = "DELETE FROM users WHERE ID=:id";
            $array = [":id" => $_SESSION["USER_ID"]];
            $result = $this->DB->query($sql, $array);
        }
        header("location: ".ROOT_PATH);  
        exit();
	}
}