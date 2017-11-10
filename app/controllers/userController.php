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

    function remove_account() {
        $this->view->display("user/user_menu.php");                
            $this->view->display("user/user_remove.php"); 
        echo "</div></div>";               
    }    

    function profile() {  # GET /users/profile
        if(isset($_SESSION["USER_ID"])) {
            $sql = "SELECT * FROM Users WHERE ID=:id";
            $array = [ ":id" => $_SESSION['USER_ID'] ];
            $result = $this->DB->query($sql, $array, "User");
            
            $this->view->display("user/user_menu.php");                            
                $this->view->display("user/user_show.php", $result); 
            echo "</div></div>"; 
        } 
        else { header("location: ".USER_LOGIN_PATH); exit; }        
    }


    // I renamed this from 'new' to 'register' to make it more readable when the path is used
    function register() {  # GET /users/register
        $this->view->display("user/user_new.php"); 
	}
    

    function edit() {  # GET /users/update
        if(isset($_SESSION["USER_ID"])) {
            $sql = "SELECT * FROM Users WHERE ID=:id";
            $array = [":id" => $_SESSION["USER_ID"]];
            $result = $this->DB->query($sql, $array, "User");
            
            $this->view->display("user/user_menu.php");                            
                $this->view->display("user/user_edit.php", $result); 
            echo "</div></div>"; 
        } 
        else { header("location: ".USER_LOGIN_PATH); exit; }                 		
    }

    
    /**********************************************************/


    function create_session() {  # POST /users/create_session
        $sql = "SELECT * FROM Users WHERE email=:email AND password=:password"; 
        $array = [":email" => $_POST['email'], ":password" => good_hash($_POST['password'])];
        $result = $this->DB->query($sql, $array, "User");
        
        if(isset($result)) {
            $_SESSION["USER_ID"] = $result[0]->ID;
            if($result[0]->user_type_id == 2) { $_SESSION["ADMIN_ID"] = $result[0]->ID; }
            header("location: ".USER_PROFILE_PATH); 
            exit();
        } else { header("location: ".USER_LOGIN_PATH."?error=De+ingevulde+gegevens+zijn+niet+correct."); exit(); }
    }


    function create() {  # POST /users/create
        if (preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$/", $_POST['email'])) {
            if($_POST['password'] === $_POST['password_again']) {
                $result = $this->DB->query("SELECT * FROM Users WHERE email=:email", [":email" => $_POST['email']]);
                if(empty($result)) {
                    $sql = "INSERT INTO Users (name, email, password, user_type_id) VALUES (?,?,?,?);";
                    $array = [$_POST["name"], $_POST["email"], good_hash($_POST["password"]), 1];
                    $result = $this->DB->query($sql, $array);
    
                    $sql = "SELECT * FROM Users WHERE email=:email AND password=:password"; 
                    $array = [":email" => $_POST['email'], ":password" => good_hash($_POST['password'])];
                    $result = $this->DB->query($sql, $array, "User");
    
                    $_SESSION["USER_ID"] = $result[0]->ID;
                    if($result[0]->user_type_id == 2) { $_SESSION["ADMIN_ID"] = $result[0]->ID; }
    
                    header("location: ".USER_PROFILE_PATH); 
                    exit();
                } else { header("location: ".USER_REGISTER_PATH."?error=Er+is+al+een+account+met+dit+e-mail+address."); exit(); }
            } else { header("location: ".USER_REGISTER_PATH."?error=De+ingevulde+wachtwoorden+komen+niet+overeen."); exit(); }
        } else { header("location: ".USER_REGISTER_PATH."?error=Je+hebt+geen+geldig+e-mail+address+ingevult."); exit(); }
    }


    function update() {  # POST /users/update
        if(isset($_SESSION["USER_ID"])) {
            $sql = "UPDATE Users SET name=:name WHERE ID=:id;";
            $array = [
                ":name" => $_POST["name"], 
                ":id" => $_SESSION["USER_ID"]
            ];
            $result = $this->DB->query($sql, $array);
        }
        
        header("location: ".USER_PROFILE_PATH);
        exit();
    }


    function delete() {  # POST /users/1/delete
        if(isset($_SESSION["USER_ID"])) {
            $sql = "DELETE FROM Users WHERE ID=:id";
            $array = [":id" => $_SESSION["USER_ID"]];
            $result = $this->DB->query($sql, $array);
        }
        header("location: ".ROOT_PATH);  
        exit();
	}
}