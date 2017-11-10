<h1>Categories</h1>

<br/>
<a class="add" href="<?=CATEGORIE_NEW_PATH?>" value="Categorie toevoegen"> New categorie </a>
<br/>
<br/>

<table>
    <tr>
        <th> ID </td>
        <th> Name </td>
    </tr>

<?php foreach($result as $categorie) { ?>        
    <tr>
        <td><a href="<?= URL(CATEGORIE_SHOW_PATH, $categorie->ID); ?>"><?= $categorie->ID; ?></a></td>
        <td><?= $categorie->name; ?></td>
    </tr>
<?php } ?>
</table>