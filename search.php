<?php
include('header.php');
$servername = "localhost";
$username = "root";
$password = "";
$mydb = "pdfbooks";
// Create connection
$db = new mysqli($servername, $username, $password, $mydb);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
echo "Connected successfully";

$query = "SELECT name FROM products WHERE name LIKE \"K%\";";
$result = mysqli_query($db, $query);
var_dump($result);
echo "<br />";
$row = mysqli_fetch_assoc($result);
var_dump($row);
?>
