<?php if(empty($result) == false) {  $order = $result[0] ?>

    <h1>Bestelling <?= $order->ID; ?> </h1>
    
    <p><b> ID: </b> <?= $order->ID; ?></p>
    <p><b> Naam: </b> <?= $order->name; ?></p>
    <p><b> PDF: </b> <a href="<?= ROOT_PATH."/assets/PDF.pdf";?>">DOWNLOAD</a></p>

    <a class="btn btn-danger" method="post" href="<?= URL(ORDER_DELETE_PATH, $order->ID); ?>">Verwijderen<a>

<?php } else { die("Order niet gevonden"); }