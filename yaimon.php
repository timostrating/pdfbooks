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
//     price1


if (isset($_POST['search'])) {
    $search_value = strtolower($_POST['search']);   // Making search input all lower case so they are case insensitive
}
$query = "SELECT * FROM products WHERE lower(name) LIKE \"%$search_value%\" OR description LIKE \"%$search_value%\";";
$result = mysqli_query($db, $query);    // Storing the query result in a variable
?>

<!-- Creating a table where the results will be displayed -->

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
        while ($row = mysqli_fetch_assoc($result)) { // Using a while loop to display all the values from the array into the table
            echo '<tr>
					<td>' . $row['name'] . '</td>
					<td>' . $row['description'] . '</td>
					<td>' . "&euro; " . $row['price'] . '</td>
				</tr>';
        }
        ?>
        </tbody>
    </table>
    <?php

    if ($result->num_rows === 0) {  // When there are no rows given back there are nog results
        echo "No products found.";
    }
    ?>
</div>


