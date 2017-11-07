<?php 

//link naar de database
require_once 'databaselink.php';

$product = null;

//snelle check of de id beschikbaar is
if(isset($_GET['id'])) {

//als dit het geval is wordt deze in een variabele gezet.
	//gekozen voor integer voor een verbeterde beveiliging tegen bijv. SQL injection
	$id = (int)$_GET['id'];

	$product = $db->query("
	SELECT products.id, products.naam, AVG(product_ratings.rating) AS rating 
	FROM products
	LEFT JOIN product_ratings
	ON products.id = product_ratings.product
	WHERE products.id = {$id}
		")->fetch_object();
	}


 ?>

<!DOCTYPE html>
<html>
<?php //php echo weergeeft $product niet ?>

	<?php if($product); { ?>
		<div class="product">
		Dit is product "<?php echo $product; ?>".
		<div class="product-rating">Rating: "<?php round($product->rating); ?>"/5</div>
		<div class="product-rate">
			Rate this product:
			<?php foreach (range(1, 5) as $rating); { ?>
				<a href="rate.php?product=<?php echo $product->id; ?>&rating=<?php echo $rating; ?>"></a>
			<?php } ?>

		</div>
	<?php } ?>

	
	

</html> 