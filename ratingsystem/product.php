<?php 

//link naar de database
require_once 'databaselink.php';

$product = null;

//snelle check of de id beschikbaar is
if(isset($_GET['id']) == false) {
	die("jammer");
}
$id = (int)$_GET['id'];

$result = $db->query("
SELECT products.id, products.naam, AVG(product_ratings.rating) AS rating 
FROM products
LEFT JOIN product_ratings
ON products.id = product_ratings.product
WHERE products.id = {$id}
	");

$row = mysqli_fetch_assoc($result);

	


 ?>

<!DOCTYPE html>
<html>

	<?php if(empty($row) == false); { ?>
		<div class="product">
		Dit is product <?php echo $row["naam"]; ?>.
		<div class="product-rating">Rating: <?= round($row["rating"],1); ?>/5</div>
		<div class="product-rate">
			Rate this product:
			<?php for($rating = 1; $rating <= 5; ++$rating) { ?>
				<a href="rate.php?product=<?php echo $row["id"]; ?>&rating=<?php echo $rating; ?>"><?= $rating; ?></a>
			<?php } ?>

		</div>
	<?php } ?>

	
	

</html> 