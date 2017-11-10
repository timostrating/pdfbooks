<?php

class AdminContactController extends baseController {

    function index() {  # GET /adminContacts
        $result = $this->DB->query("SELECT * FROM Contacts", [], "Contact");
        $this->view->display("admin/contact/adminContact_index.php", $result);        
    }


    function show($id) {  # GET /adminContacts/1/show
        $sql = "SELECT * FROM Contacts WHERE ID=:id";
        $array = [ ":id" => $id ];
        $result = $this->DB->query($sql, $array, "Contact");
        $this->view->display("admin/contact/adminContact_show.php", $result);                
    }


    /**********************************************************/


	function delete($id) {  # POST /adminContacts/1/delete
        $sql = "DELETE FROM Contacts WHERE ID=:id";
        $array = [":id" => $id];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".ADMINCONTACT_INDEX_PATH);  // terug naar een GET
        exit();
	}
}