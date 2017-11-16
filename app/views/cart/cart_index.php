<?php $priceTotal = 0; ?>



<h1>Winkelwagen</h1>

<?php if(empty($result)) { echo "Je hebt nog geen producten in je winkelwagentje gestopt. <a href=\"".PRODUCT_INDEX_PATH."\"> Naar de webshop </a>"; return; } ?>        

<table class="table table-striped">
    <tr>
        <th> Verwijder </th>
        <th> Naam </th>
        <th> Aantal </th>
        <th> Prijs </th>
        <th> Prijs Totaal </th>
        <th> Plus </th>
        <th> Min </th>
    </tr>

<?php foreach($result as $item) { $priceTotal += intval($item["count"]) * intval($item["price"]) ?>        
    <tr>
        <td> <a class="btn btn-danger" method="post" href="<?= URL(CART_DELETE_PATH, $item["ID"]); ?>">x</a> </td>
        <td> <a href="<?= URL(PRODUCT_SHOW_PATH, $item["ID"]); ?>"><?= $item["name"] ?></a> </td>
        <td> <?= $item["count"] ?> </td>
        <td> € <?php printf("%.2f",$item["price"]); ?> </td>
        <td> € <?php printf("%.2f",intval($item["count"]) * intval($item["price"])); ?> </td>
        <td> <a class="btn btn-success" method="post" href="<?= URL(CART_ADD_PATH, $item["ID"]); ?>">+</a> </td>
        <td> <a class="btn btn-warning" method="post" href="<?= URL(CART_SUBTRACT_PATH, $item["ID"]); ?>">-</a> </td>
    </tr>
<?php } ?>
</table>

<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
        <table class="table">
            <tr> <th>Cart Total</th><th></th> </tr>
            <tr><td>Cart total Exl. BTW</td><td>€ <?php printf("%.2f", $priceTotal * 0.79); ?></td></tr>
            <tr><td>BTW(21%)</td><td>€ <?php printf("%.2f", $priceTotal * 0.21); ?></td></tr>
            <tr><td>Total</td><td>€ <?php printf("%.2f", $priceTotal); ?></td></tr>
            <tr> <td></td><td><a class="btn btn-success" href="<?= ORDER_NEW_PATH ?>"> Betalen </a></td> </tr>
        </table>
    </div>
</div>

