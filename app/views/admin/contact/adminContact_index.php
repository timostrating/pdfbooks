<h1>Berichten</h1>

<table class="table table-striped">
    <tr>
        <th> Name </td>
        <th> E-Mail </td>
        <th> Description </td>
        <th> Actions </td>
    </tr>

<?php foreach($result as $contact) { ?>        
    <tr>
        <td><?= $contact->name; ?></td>
        <td><?= $contact->email; ?></td>
        <td><?= $contact->description; ?></td>
        <td>
            <a class="btn btn-info" href="<?= URL(ADMINCONTACT_SHOW_PATH, $contact->ID); ?>">Bekijken</a>
            <a class="btn btn-danger" method="post" href="<?= URL(ADMINCONTACT_DELETE_PATH, $contact->ID); ?>">Verwijderen<a>
        </td>
    </tr>
<?php } ?>
</table>