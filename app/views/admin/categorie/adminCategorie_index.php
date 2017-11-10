<h1>AdminCategories</h1>

<br/>
<a class="add" href="<?=ADMINCATEGORIE_NEW_PATH?>" value="AdminCategorie toevoegen"> New adminCategorie </a>
<br/>
<br/>

<table>
    <tr>
        <th> ID </td>
        <th> Name </td>
    </tr>

<?php foreach($result as $adminCategorie) { ?>        
    <tr>
        <td><a href="<?= URL(ADMINCATEGORIE_SHOW_PATH, $adminCategorie->ID); ?>"><?= $adminCategorie->ID; ?></a></td>
        <td><?= $adminCategorie->name; ?></td>
        <td>
            <a class="edit" href="<?= URL(ADMINCATEGORIE_EDIT_PATH, $adminCategorie->ID); ?>">Bewerken</a>
            <a class="delete" method="post" href="<?= URL(ADMINCATEGORIE_DELETE_PATH, $adminCategorie->ID); ?>">Verwijderen<a>
        </td>
    </tr>
<?php } ?>
</table>