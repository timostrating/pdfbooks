<?php

class AdminBlogController extends baseController {

    function index() {  # GET /adminBlogs
        $result = $this->DB->query("SELECT * FROM Blogs", [], "Blog");
        $this->view->display("admin/blog/adminBlog_index.php", $result);        
    }


    function show($id) {  # GET /adminBlogs/1/show
        $sql = "SELECT * FROM Blogs WHERE ID=:id";
        $array = [ ":id" => $id ];
        $result = $this->DB->query($sql, $array, "Blog");
        $this->view->display("admin/blog/adminBlog_show.php", $result);                
    }


    function new() {  # GET /adminBlogs/new
        $this->view->display("admin/blog/adminBlog_new.php");                		
	}
    

    function edit($id) {  # GET /adminBlogs/1/edit
        $sql = "SELECT * FROM Blogs WHERE ID=:id";
        $array = [":id" => $id];
		$result = $this->DB->query($sql, $array, "Blog");
        $this->view->display("admin/blog/adminBlog_edit.php", $result);                		
    }


    /**********************************************************/
    

    function create() {  # POST /adminBlogs
        $sql = "INSERT INTO Blogs (title, description, imgurl) VALUES (?,?,?);";
        $array = [$_POST["title"], $_POST["description"], $_POST["imgurl"]];
		$result = $this->DB->query($sql, $array);
        
        header("location: ".ADMINBLOG_INDEX_PATH);  // terug naar een GET
        exit();
    }


    function update($id) {  # POST /adminBlogs/1/update
        $sql = "UPDATE Blogs SET title=:title, description=:description, imgurl=:imgurl WHERE ID=:id;";
        $array = [
            ":title" => $_POST["title"], 
            ":description" => $_POST["description"], 
            ":imgurl" => $_POST["imgurl"], 
            ":id" => $id
        ];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".ADMINBLOG_INDEX_PATH);  // terug naar een GET
        exit();
    }


	function delete($id) {  # POST /adminBlogs/1/delete
        $sql = "DELETE FROM Blogs WHERE ID=:id";
        $array = [":id" => $id];
        $result = $this->DB->query($sql, $array);
        
        header("location: ".ADMINBLOG_INDEX_PATH);  // terug naar een GET
        exit();
	}
}