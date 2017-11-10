<h1 class="fl">Products</h1> <br/>
<a class="btn btn-success fr" href="<?=ADMINPRODUCT_NEW_PATH?>" value="Product toevoegen"> Product toevoegen </a>

<table class="table table-striped">
    <tr>
        <th> Afbeelding </td>
        <th> Naam </td>
        <th> Beschrijving </td>
        <th> Acties </th>
    </tr>

<?php foreach($result as $product) { ?>        
    <tr>
        <td>
            <a href="<?= URL(ADMINPRODUCT_SHOW_PATH, $product->ID); ?>">
                <img src="<?= $product->imgurl; ?>" alt="" style="height: 50px; width: auto;">
            </a>
        </td>
        <td>
            <a href="<?= URL(ADMINPRODUCT_SHOW_PATH, $product->ID); ?>">
                <?= $product->name; ?>
            </a>
        </td>
        <td><?= $product->description; ?></td>
        <td>
            <a class="btn btn-info" href="<?= URL(ADMINPRODUCT_SHOW_PATH, $product->ID); ?>">Bekijken</a>
            <a class="btn btn-warning" href="<?= URL(ADMINPRODUCT_EDIT_PATH, $product->ID); ?>">Bewerken</a>
            <a class="btn btn-danger" method="post" href="<?= URL(ADMINPRODUCT_DELETE_PATH, $product->ID); ?>">Verwijderen<a>
        </td>
    </tr>
<?php } ?>
</table>