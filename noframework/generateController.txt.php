<?php

class '.$Name.'Controller extends baseController {

    function index() {  # GET /'.$names.'
        $result = $this->DB->query("SELECT * FROM '.$Names.'", [], "'.$Name.'");
        $this->view->display("'.$name.'/'.$name.'_index.php", $result);        
    }


    function show($id) {  # GET /'.$names.'/1/show
        $sql = "SELECT * FROM '.$Names.' WHERE ID=:id";
        $array = [ ":id" => $id ];
        $result = $this->DB->query($sql, $array, "'.$Name.'");
        $this->view->display("'.$name.'/'.$name.'_show.php", $result);                
    }


    function new() {  # GET /'.$names.'/new
        $this->view->display("'.$name.'/'.$name.'_new.php");                		
	}
    

    function edit($id) {  # GET /'.$names.'/1/edit
        $sql = "SELECT * FROM '.$Names.' WHERE ID=:id";
        $array = [":id" => $id];
		$result = $this->DB->query($sql, $array, "'.$Name.'");
        $this->view->display("'.$name.'/'.$name.'_edit.php", $result);                		
    }


    /**********************************************************/
    

    function create() {  # POST /'.$names.'
        $sql = "INSERT INTO '.$Names.' (name) VALUES (?);";
        $array = [$_POST["name"]];
		$result = $this->DB->query($sql, $array);
        
        header("location: ".'.$NAME.'_INDEX_PATH);  // terug naar een GET
        exit();
    }


    function update($id) {  # POST /'.$names.'/1/update
        $sql = "UPDATE '.$Names.' SET name=:name WHERE ID=:id;";
        $array = [
            ":name" => $_POST["name"], 
            ":id" => $id
        ];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".'.$NAME.'_INDEX_PATH);  // terug naar een GET
        exit();
    }


	function delete($id) {  # POST /'.$names.'/1/delete
        $sql = "DELETE FROM '.$Names.' WHERE ID=:id";
        $array = [":id" => $id];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".'.$NAME.'_INDEX_PATH);  // terug naar een GET
        exit();
	}
}