<?php
include('header.php');

$servername = "localhost";
$username = "root";
$password = "";
$mydb = "pdfbooks";
$id = $_SESSION["id"];
// Create connection
$db = new mysqli($servername, $username, $password, $mydb);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} 

$sql = "DELETE FROM users WHERE id=$id";

if ($db->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $db->error;
}

$db->close();
header("location: logout.php");