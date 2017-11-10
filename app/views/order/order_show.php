<?php if(empty($result) == false) {  $order = $result[0] ?>

    <h1>Order <?= $order->ID; ?> </h1>
    
    <p><b> ID: </b> <?= $order->ID; ?></p>
    <p><b> Name: </b> <?= $order->name; ?></p>

    <a class="edit" href="<?= URL(ORDER_EDIT_PATH, $order->ID); ?>">Bewerken</a>
    <a class="delete" method="post" href="<?= URL(ORDER_DELETE_PATH, $order->ID); ?>">Verwijderen<a>

<?php } else { die("Order niet gevonden"); }