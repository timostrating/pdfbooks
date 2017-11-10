<?php

class BlogController extends baseController {

    function index() {  # GET /blogs
        $result = $this->DB->query("SELECT * FROM Blogs", [], "Blog");
        $this->view->display("blog/blog_index.php", $result);        
    }


    function show($id) {  # GET /blogs/1/show
        $sql = "SELECT * FROM Blogs WHERE ID=:id";
        $array = [ ":id" => $id ];
        $result = $this->DB->query($sql, $array, "Blog");
        $this->view->display("blog/blog_show.php", $result);                
    }
}