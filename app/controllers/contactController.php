<?php

class ContactController extends baseController {

    function new() {  # GET /contacts/new
        $this->view->display("page/page_contact.php");                		
	}


    /**********************************************************/
    

    function create() {  # POST /contacts
        if(isset($_POST["name"], $_POST["email"], $_POST["description"])) {
            $sql = "INSERT INTO Contacts (name, email, description) VALUES (?,?,?);";
            $array = [$_POST["name"], $_POST["email"], $_POST["description"]];
            $result = $this->DB->query($sql, $array);
            
            header("location: ".CONTACT_NEW_PATH."?success=Bedankt+voor+uw+bericht");  // terug naar een GET
            exit();
        } else { header("location: ".CONTACT_NEW_PATH."?error=Vul+alle+velden+in+aub"); exit(); }
    }
}