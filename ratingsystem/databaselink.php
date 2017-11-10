<?php 
	/*CREATE TABLE `product_ratings` (
  `id` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
COMMIT; */

?>


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