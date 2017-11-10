<?php

class AdminCategorieController extends baseController {

    function index() {  # GET /adminCategories
        $result = $this->DB->query("SELECT * FROM Categories", [], "Categorie");
        $this->view->display("adminCategorie/adminCategorie_index.php", $result);        
    }


    function show($id) {  # GET /adminCategories/1/show
        $sql = "SELECT * FROM Categories WHERE ID=:id";
        $array = [ ":id" => $id ];
        $result = $this->DB->query($sql, $array, "Categorie");
        $this->view->display("adminCategorie/adminCategorie_show.php", $result);                
    }


    function new() {  # GET /adminCategories/new
        $this->view->display("adminCategorie/adminCategorie_new.php");                		
	}
    

    function edit($id) {  # GET /adminCategories/1/edit
        $sql = "SELECT * FROM Categories WHERE ID=:id";
        $array = [":id" => $id];
		$result = $this->DB->query($sql, $array, "Categorie");
        $this->view->display("adminCategorie/adminCategorie_edit.php", $result);                		
    }


    /**********************************************************/
    

    function create() {  # POST /adminCategories
        $sql = "INSERT INTO Categories (name) VALUES (?);";
        $array = [$_POST["name"]];
		$result = $this->DB->query($sql, $array);
        
        header("location: ".ADMINCATEGORIE_INDEX_PATH);  // terug naar een GET
        exit();
    }


    function update($id) {  # POST /adminCategories/1/update
        $sql = "UPDATE Categories SET name=:name WHERE ID=:id;";
        $array = [
            ":name" => $_POST["name"], 
            ":id" => $id
        ];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".ADMINCATEGORIE_INDEX_PATH);  // terug naar een GET
        exit();
    }


	function delete($id) {  # POST /adminCategories/1/delete
        $sql = "DELETE FROM Categories WHERE ID=:id";
        $array = [":id" => $id];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".ADMINCATEGORIE_INDEX_PATH);  // terug naar een GET
        exit();
	}
}