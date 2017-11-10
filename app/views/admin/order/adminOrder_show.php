<?php if(empty($result) == false) {  $adminOrder = $result[0] ?>

    <h1>Bestelling <?= $adminOrder->ID; ?> </h1>
    
    <p><b> Name: </b> <?= $adminOrder->name; ?></p>

    <a class="btn btn-warning" href="<?= URL(ADMINORDER_EDIT_PATH, $adminOrder->ID); ?>">Bewerken</a>
    <a class="btn btn-danger" method="post" href="<?= URL(ADMINORDER_DELETE_PATH, $adminOrder->ID); ?>">Verwijderen<a>

<?php } else { die("AdminOrder niet gevonden"); }