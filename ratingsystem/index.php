<?php 

//link naar de database
require_once 'databaselink.php';

//opvraging database inhoud door middel van SQL
$query = $db->query("
	SELECT products.id, products.naam, AVG(product_ratings.rating) AS rating 
	FROM products
	LEFT JOIN product_ratings
	ON products.id = product_ratings.product
	GROUP BY product.id
	");

// Array maken van de database gegevens
$products = [];

while($row = $query->fetch_object()) {
	$products[] = $row;
}

 ?>

<!DOCTYPE html>
<html>
	
	<?php foreach($products as $product); { ?>


		<div class="product">
			<h3><a href="product.php?id=<?php echo $product->id; ?>"><?php echo $product->naam; ?></a></h3>
			<div class="product-rating">Rating: <?php round($product->rating); ?>/5</div>
		</div>
	<?php } ?>

</html> 