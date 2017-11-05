<?php

global $connect;

class productController extends baseController {

    public function __construct() {
        global $connect;
        $connect = mysqli_connect('127.0.0.1', 'root', '', 'pdfbooks');
    }
    

    function index() {
        global $connect;
    
        $sql = "SELECT * FROM `Products`";		
        $result = mysqli_query($connect, $sql);
        
        echo"<h1>Producten</h1>";
        
        echo"<br/>";
        echo"<a class=\"add\" href=\"".LOCALHOSTURI."/products/new\" value=\"Product toevoegen\"> New product </a>";
        echo"<br/>";
        echo"<br/>";
        
        echo"<table>";
        
        echo"	<tr>";
        echo" 		<th> ID </td>";
        echo" 		<th> Name </td>";
        echo" 		<th> Description </td>";
        echo" 		<th> Imgurl </td>";
        echo" 		<th> Price </td>";
        echo"	</tr>";
        
        while($row = mysqli_fetch_assoc($result)) {            
            echo"	<tr>";
            echo"		<td>".$row['ID']."</td>";
            echo"		<td>".$row['name']."</td>";
            echo"		<td>".$row['description']."</td>";
            echo"		<td>".$row['imgurl']."</td>";
            echo"		<td>".$row['price']."</td>";
            echo"		<td>";
            echo"			<a class=\"edit\"  href=\"".LOCALHOSTURI."/products/".$row['ID']."/edit\">Bewerken</a>";
            echo"			|";
            // echo"			<a class=\"delete\" href=\"javascript:confirmAction('Zeker weten?', 'index.php?action=deleteemployee&id=".$row['ID']."');\">Verwijderen</a>";
            
            echo" <form method=\"post\" action=\"".LOCALHOSTURI."/products/".$row['ID']."/delete\">";
                generateField("", "", "submit", "Verwijderen");           
            echo" </form>";	
            
            
            echo"		</td>";
            echo"	</tr>";
        }
        echo"</table>";
    }


    # GET /products/1
    function show($id) {
        global $connect;
        
        $sql = sprintf( "SELECT * FROM `products` WHERE `ID` = %d",  mysqli_escape_string($connect, $id) );			
		$result = mysqli_query($connect, $sql);
		
		if($row = mysqli_fetch_assoc($result)) {			
			echo"<h1>Product $id</h1>";
            
            echo"<p><b> ID: </b> ".$row['ID']."</p>";
            echo"<p><b> Name: </b> ".$row['name']."</p>";
            echo"<p><b> Description: </b> ".$row['description']."</p>";
            echo"<p><b> Imgurl: </b> ".$row['imgurl']."</p>";
            echo"<p><b> Price: </b> ".$row['price']."</p>";
		}
		else {
			die("Product niet gevonden");
		}
    }


    # GET /products/new
    function new() {
		echo"<h1>Product toevoegen</h1>";
		
		echo"<form method=\"post\" action=\"".LOCALHOSTURI."/products/create\">";
        echo"   <table>";
		
        generateField("Name", "name");
        generateField("Description", "description");
        generateField("Imgurl", "imgurl");
        generateField("Price", "price");
        generateField("", "", "submit", "Opslaan");

        echo"   </table>";
		echo"</form>";			
	}
    

    # GET /products/1/edit
	function edit($id) {
		global $connect;
        
        var_dump($id);
		$sql = sprintf( "SELECT * FROM `products` WHERE `ID` = %d", mysqli_escape_string($connect, $id) );
		$result = mysqli_query($connect, $sql);
		
		if($row = mysqli_fetch_assoc($result)) {			
			echo"<h1>Product bewerken</h1>";
			
			echo"<form method=\"post\" action=\"".LOCALHOSTURI."/products/$id/update\">";
            echo"   <table>";

            generateField("Naam", "name", "text", $row['name']);
            generateField("Beschrijving", "description", "text", $row['description']);
            generateField("Afbeelding", "imgurl", "text", $row['imgurl']);
            generateField("Prijs", "price", "text", $row['price']);
            generateField("", "", "submit", "Opslaan");

            echo"   </table>";
			echo"</form>";		
			
		}
		else {
			die("Geen gegevens gevonden");
		}
    }
    


    # POST /products
    function create() { 
        global $connect;
        
        $sql = sprintf("INSERT INTO `products` (`name`, `description`, `imgurl`, `price`) 
                                        VALUES  ('%s', 	 '%s', 		    '%s', 	  '%d');", 
                        mysqli_escape_string($connect, $_POST['name']),
                        mysqli_escape_string($connect, $_POST['description']),
                        mysqli_escape_string($connect, $_POST['imgurl']),
                        mysqli_escape_string($connect, $_POST['price']) );
        
        if(mysqli_query($connect, $sql) == false) {
            echo "SQL ERROR";
            var_dump($sql);
        } else {
            header("location: ".LOCALHOSTURI."/products");  // terug naar de index
            exit();
        }
    }



    # PATCH/PUT /products/1/update
    function update($id) { 
        global $connect;
        $sql = sprintf("UPDATE `products` SET 
                        `name` = '%s',
                        `description` = '%s',
                        `imgurl` = '%s',
                        `price` = '%d'
                        WHERE `ID` = %d;",
                        mysqli_escape_string($connect, $_POST['name']),
                        mysqli_escape_string($connect, $_POST['description']),
                        mysqli_escape_string($connect, $_POST['imgurl']),
                        mysqli_escape_string($connect, $_POST['price']),
                        mysqli_escape_string($connect, $id) );
        
        
        if(mysqli_query($connect, $sql) == false) {
            echo "SQL ERROR";
            var_dump($sql);
        } else {
            header("location: ".LOCALHOSTURI."/products");  // terug naar de index
            exit();
        }
    }


    
    # DELETE /products/1/delete
	function delete($id) {
		global $connect;

		$sql = sprintf("DELETE FROM `products` WHERE `ID` = %d", mysqli_escape_string($connect, $id));
		mysqli_query($connect, $sql);
		
		if(mysqli_query($connect, $sql) == false) {
            echo "SQL ERROR";
            var_dump($sql);
        } else {
            header("location: ".LOCALHOSTURI."/products");  // terug naar de index
            exit();
        }
	}
}





















