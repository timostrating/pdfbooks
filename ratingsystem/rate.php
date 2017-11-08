<?php 

require_once 'databaselink.php'; 

//check of......
if(isset($_GET['product'], $_GET['rating'])) {
	
	$product = (int)$_GET['product'];
	$rating = (int)$_GET['rating'];

	if(in_array($rating, [1, 2, 3, 4, 5])) {

		$exists = $db->query(
		"SELECT id FROM products WHERE id = {$products}"
		)->num_rows ? true : false;
		if($exists) {
			$db->query("INSERT INTO product_ratings (product, rating) VALUES ({product}, {rating})");
		}
	}

	header('Location: product.php?id=' . $product);
}

?>