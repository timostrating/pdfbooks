<?php 

require_once 'databaselink.php'; 

//check of......
if(isset($_GET['product'], $_GET['rating'])) {
	
	$product = (int)$_GET['product'];
	$rating = (int)$_GET['rating'];

	if(in_array($rating, [1, 2, 3, 4, 5])) {

		$row = $db->query("SELECT * FROM products WHERE id = {$products}")->num_rows;
		if($row !== 0) {
			$db->query("INSERT INTO product_ratings (product, rating) VALUES 
												({product}, {rating})");
		}
	}

	header('Location: product.php?id=' . $product);
}

?>