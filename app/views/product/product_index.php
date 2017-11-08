<h1>Producten</h1>

<br/>
<a class="add" href="<?= PRODUCT_NEW_PATH ?>" value="Product toevoegen"> New product </a>
<br/>
<br/>

<?php if(empty($result)) { echo "Er zijn geen resultaten"; return; }?>

<table>
    <tr>
        <th> ID </td>
        <th> Name </td>
        <th> Description </td>
        <th> Imgurl </td>
        <th> Price </td>
    </tr>

<?php foreach($result as $product) { ?>        
    <tr>
        <td><a href="<?= URL(PRODUCT_SHOW_PATH, $product->ID); ?>"><?= $product->ID; ?></a></td>
        <td><?= $product->name; ?></td>
        <td><?= $product->description; ?></td>
        <td><?= $product->imgurl; ?></td>
        <td><?= $product->price; ?></td>
        <td>
            <a class="edit" href="<?= URL(PRODUCT_EDIT_PATH, $product->ID); ?>">Bewerken</a>
            <a class="delete" method="post" href="<?= URL(PRODUCT_DELETE_PATH, $product->ID); ?>">Verwijderen<a>
        </td>
    </tr>
<?php } ?>
</table>