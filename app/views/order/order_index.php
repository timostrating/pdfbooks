<h1>Orders</h1> <br/>

<table class="table table-striped">
    <tr>
        <th> Name</td>
        <th> Acties </td>
    </tr>

<?php foreach($result as $order) { ?>        
    <tr>
        <td><a href="<?= URL(ORDER_SHOW_PATH, $order->ID); ?>"><?= $order->name; ?></a> </td>
        <td>
            <a class="btn btn-danger" method="post" href="<?= URL(ORDER_DELETE_PATH, $order->ID); ?>">Verwijderen<a>
        </td>
    </tr>
<?php } ?>
</table>