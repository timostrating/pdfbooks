<?php

class '.ucfirst($name).'Controller extends baseController {

    function index() {  # GET /'.$name.'s
        $result = $this->DB->query("SELECT * FROM '.$name.'s", [], "'.ucfirst($name).'");
        $this->view->display("'.$name.'/'.$name.'_index.php", $result);        
    }


    function show($id) {  # GET /'.$name.'s/1/show
        $sql = "SELECT * FROM '.$name.'s WHERE ID=:id";
        $array = [ ":id" => $id ];
        $result = $this->DB->query($sql, $array, "'.ucfirst($name).'");
        $this->view->display("'.$name.'/'.$name.'_show.php", $result);                
    }


    function new() {  # GET /'.$name.'s/new
        $this->view->display("'.$name.'/'.$name.'_new.php");                		
	}
    

    function edit($id) {  # GET /'.$name.'s/1/edit
        $sql = "SELECT * FROM '.$name.'s WHERE ID=:id";
        $array = [":id" => $id];
		$result = $this->DB->query($sql, $array, "'.ucfirst($name).'");
        $this->view->display("'.$name.'/'.$name.'_edit.php", $result);                		
    }


    /**********************************************************/
    

    function create() {  # POST /'.$name.'s
        $sql = "INSERT INTO '.$name.'s (name) VALUES (?);";
        $array = [$_POST["name"]];
		$result = $this->DB->query($sql, $array);
        
        header("location: ".ROOT_PATH."/'.$name.'s");  // terug naar de index
        exit();
    }


    function update($id) {  # PATCH/PUT /'.$name.'s/1/update
        $sql = "UPDATE '.$name.'s SET name=:name WHERE ID=:id;";
        $array = [
            ":name" => $_POST["name"], 
            ":id" => $id
        ];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".ROOT_PATH."/'.$name.'s");  // terug naar de index
        exit();
    }


	function delete($id) {  # DELETE /'.$name.'s/1/delete
        $sql = "DELETE FROM '.$name.'s WHERE ID=:id";
        $array = [":id" => $id];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".ROOT_PATH."/'.$name.'s");  // terug naar de index
        exit();
	}
}