<?php
// Database connection
$db = new mysqli('localhost', 'root', '', 'pdfbooks');

// SQL om gegevens van Database op te halen
$query = $db->query('SELECT * FROM products');

$products = [];

while($row = $query->fetch_object()) {
	$products[] = $row;
}

?>