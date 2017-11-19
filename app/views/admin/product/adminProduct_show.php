<?php if(empty($result) == false) {  $product = $result[0] ?>

    <h1>Product <?= $product->ID; ?> </h1>
    
    <p> <img src="<?= $product->imgurl; ?>" alt="" style="height: 150px; width: auto;"></p>
    <p><b> Naam: </b> <?= $product->name; ?></p>
    <p><b> Beschrijving: </b> <?= $product->description; ?></p>
    <p><b> Prijs: </b> <?= $product->price; ?></p>
    <p><b> CategorieID: </b> <?= $product->categorie_id; ?></p>

    <a class="btn btn-warning" href="<?= URL(ADMINPRODUCT_EDIT_PATH, $product->ID); ?>">Bewerken</a>
    <a class="btn btn-danger" method="post" href="<?= URL(ADMINPRODUCT_DELETE_PATH, $product->ID); ?>">Verwijderen<a>

<?php } else { die("AdminProduct niet gevonden"); }