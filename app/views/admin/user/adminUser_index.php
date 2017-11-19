<h1 class="fl">Gebruikers</h1> <br/>
<a class="btn btn-success fr" href="<?=ADMINUSER_NEW_PATH?>" value="Gebruiker toevoegen"> Gebruiker toevoegen </a>

<table class="table table-striped">
    <tr>
        <th> Naam </td>
        <th> Achternaam </td>
        <th> E-mail </td>
        <th> Gebruikers type </td>
        <th> Acties </td>
    </tr>

<?php foreach($result as $User) { ?>        
    <tr>
        <td><?= $User->name; ?></td>
        <td><?= $User->last_name; ?></td>
        <td><?= $User->email; ?></td>
        <td><?= $User->user_type_id; ?></td>
        <td>
            <a class="btn btn-info" href="<?= URL(ADMINUSER_SHOW_PATH, $User->ID); ?>">Bekijken</a>
            <a class="btn btn-warning" href="<?= URL(ADMINUSER_EDIT_PATH, $User->ID); ?>">Bewerken</a>
            <a class="btn btn-danger" method="post" href="<?= URL(ADMINUSER_DELETE_PATH, $User->ID); ?>">Verwijderen<a> 
        </td>
    </tr>
<?php } ?>
</table>