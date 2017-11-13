<!-- index.php -->

<?php 

//link naar de database
require_once 'databaselink.php';


//opvraging database inhoud door middel van SQL
//LEFT JOIN voegt alle inhoud van tabel 'products' samen met alle overeenkomende inhoud van tabel 'product_ratings'
$result = $db->query("
	SELECT products.id, products.naam, AVG(product_ratings.rating) AS rating 
	FROM products
	LEFT JOIN product_ratings
	ON products.id = product_ratings.product
	GROUP BY products.id
	");


 ?>

<?php while($row = mysqli_fetch_assoc($result)) { ?>  

		<div class="product">
			<h3><a href="product.php?id=<?php echo $row["id"]; ?>"><?php echo $row["naam"]; ?></a></h3>
			<div class="product-rating">Rating: <?= round($row["rating"],1); ?>/5</div>
		</div>

<?php } ?> 





<!-- product.php -->




<?php 


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


 ?>


 

<!-- rate.php -->



<?php 

require_once 'databaselink.php'; 

//check of......
if(isset($_GET['product'], $_GET['rating'])) {
	
	$product = (int)$_GET['product'];
	$rating = (int)$_GET['rating'];


//door de klant ingevoerde rating doorgeven aan database
	if(in_array($rating, [1, 2, 3, 4, 5])) {

		$exists = $db->query(
		"SELECT id FROM products WHERE id = {products}"
		)->num_rows;

		if($exists) {
			$db->query("INSERT INTO product_ratings (product, rating) VALUES ({product}, {rating})");
		}
	

	header('Location: product.php?id=' . $product);
	}
}

?>