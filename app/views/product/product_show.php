<?php if(empty($result) == false) {  $product = $result[0] ?>

    <h1>Product <?= $product->ID; ?> </h1>
    <img src="<?= $product->imgurl; ?>" alt="">

    <p><b> ID: </b> <?= $product->ID; ?></p>
    <p><b> Name: </b> <?= $product->name; ?></p>
    <p><b> Description: </b> <?= $product->description; ?></p>
    <p><b> Imgurl: </b> <?= $product->imgurl; ?></p>
    <p><b> Price: </b> <?= $product->price; ?></p>
    <div class="product-rating">Rating: 4/5</div>
		<div class="product-rate">
			Rate this product:
			<?php for($rating = 1; $rating <= 5; ++$rating) { ?>
				<a href="#rate$rating"><?= $rating; ?></a>
			<?php } ?>

		</div>
    <a class="btn btn-success mt10" method="post" href="<?= URL( CART_ADD_PATH, $product->ID); ?>">In de winkelwagen</a>

<?php } else { die("Product niet gevonden"); }