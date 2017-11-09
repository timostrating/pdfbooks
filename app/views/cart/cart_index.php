<h1>Winkelwagen</h1>

<table>
    <tr>
        <th> </td>
        <th> ID </td>
        <th> Count </td>
        <th> Name </td>
        <th>  </td>
    </tr>

<?php foreach($result as $item) { ?>        
    <tr>
        <td> <a class="delete" method="post" href="<?= URL(CART_DELETE_PATH, $item["ID"]); ?>">x</a> </td>
        <td> <?= $item["ID"] ?> </td>
        <td> <?= $item["count"] ?> </td>
        <td> <?= $item["name"] ?> </td>
        <td> <a class="add" method="post" href="<?= URL(CART_ADD_PATH, $item["ID"]); ?>">+</a> </td>
        <td> <a class="edit" method="post" href="<?= URL(CART_SUBTRACT_PATH, $item["ID"]); ?>">-</a> </td>
    </tr>
<?php } ?>
</table>