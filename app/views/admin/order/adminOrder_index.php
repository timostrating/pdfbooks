<h1 class="fl">Bestellingen</h1> <br/>
<a class="btn btn-success fr" href="<?=ADMINORDER_NEW_PATH?>" value="Bestelling toevoegen"> Bestelling toevoegen </a>


<table class="table table-striped">
    <tr>
        <th> Name </td>
        <th> Actions </td>
    </tr>

<?php foreach($result as $order) { ?>        
    <tr>
        <td><?= $order->name; ?></td>
        <td>
            <a class="btn btn-info" href="<?= URL(ADMINORDER_SHOW_PATH, $order->ID); ?>">Bekijken</a>
            <a class="btn btn-warning" href="<?= URL(ADMINORDER_EDIT_PATH, $order->ID); ?>">Bewerken</a>
            <a class="btn btn-danger" method="post" href="<?= URL(ADMINORDER_DELETE_PATH, $order->ID); ?>">Verwijderen<a>
        </td>
    </tr>
<?php } ?>
</table>