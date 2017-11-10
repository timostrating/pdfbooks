<?php
    include('header.php');

    $servername = "localhost";
    $username = "root";
    $password = "";
    $mydb = "pdfbooks";
    // Create connection
    $db = new mysqli($servername, $username, $password, $mydb);

    // Check if connection display any errors
    if ($db->connect_error) {
        die("Connection failed");
    }
    
    
    //  Products
    //     ID
    //     name
    //     description
    //     imgurl
    //     price


    if(isset($_POST['search'])){
        $search_value = strtolower($_POST['search']);
     }
    $query = "SELECT * FROM products WHERE lower(name) LIKE \"%$search_value%\" OR description LIKE \"%$search_value%\";";
    $result = mysqli_query($db, $query);
?>
<div class="container">
<table class="table table-striped table-hover ">
    <caption class="title"><h2>Resultaten</h2></caption>
    <thead>
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
					<td>'.$row['name'].'</td>
					<td>'.$row['description'].'</td>
					<td>'."&euro; ".$row['price'].'</td>
				</tr>';
    }
    ?>
    </tbody>
</table>
    <?php

    if($result->num_rows === 0) {
        echo "No products found.";
    }

    ?>
</div>


