<h1>AdminUsers</h1>

<br/>
<a class="add" href="<?=ADMINUSER_NEW_PATH?>" value="AdminUser toevoegen"> New adminUser </a>
<br/>
<br/>

<table>
    <tr>
        <th> ID </td>
        <th> Name </td>
    </tr>

<?php foreach($result as $adminUser) { ?>        
    <tr>
        <td><a href="<?= URL(ADMINUSER_SHOW_PATH, $adminUser->ID); ?>"><?= $adminUser->ID; ?></a></td>
        <td><?= $adminUser->name; ?></td>
        <td>
            <a class="edit" href="<?= URL(ADMINUSER_EDIT_PATH, $adminUser->ID); ?>">Bewerken</a>
            <a class="delete" method="post" href="<?= URL(ADMINUSER_DELETE_PATH, $adminUser->ID); ?>">Verwijderen<a>
        </td>
    </tr>
<?php } ?>
</table>