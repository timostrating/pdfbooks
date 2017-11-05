<?php if(empty($result) == false) {  $product = $result[0] ?>

    <h1>Product <?= $product->ID; ?> </h1>
    
    <p><b> ID: </b> <?= $product->ID; ?></p>
    <p><b> Name: </b> <?= $product->name; ?></p>
    <p><b> Description: </b> <?= $product->description; ?></p>
    <p><b> Imgurl: </b> <?= $product->imgurl; ?></p>
    <p><b> Price: </b> <?= $product->price; ?></p>

<?php } else { die("Product niet gevonden"); }