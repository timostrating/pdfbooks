<?php 

//link naar de database
require_once 'databaselink.php';


//opvraging database inhoud door middel van SQL
$result = $db->query("
	SELECT products.id, products.naam, AVG(product_ratings.rating) AS rating 
	FROM products
	LEFT JOIN product_ratings
	ON products.id = product_ratings.product
	GROUP BY products.id
	");


 ?>

<!DOCTYPE html>
<html>
	

<?php while($row = mysqli_fetch_assoc($result)) { ?>  

		<div class="product">
			<h3><a href="product.php?id=<?php echo $row["id"]; ?>"><?php echo $row["naam"]; ?></a></h3>
			<div class="product-rating">Rating: <?= round($row["rating"],1); ?>/5</div>
		</div>

<?php } ?>  


</html> 