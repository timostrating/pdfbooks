<h1>Demos</h1>

<br/>
<a class="add" href="<?=DEMO_NEW_PATH?>" value="Demo toevoegen"> New demo </a>
<br/>
<br/>

<table>
    <tr>
        <th> ID </td>
        <th> Name </td>
    </tr>

<?php foreach($result as $demo) { ?>        
    <tr>
        <td><a href="<?= URL(DEMO_SHOW_PATH, $demo->ID); ?>"><?= $demo->ID; ?></a></td>
        <td><?= $demo->name; ?></td>
        <td>
            <a class="edit" href="<?= URL(DEMO_EDIT_PATH, $demo->ID); ?>">Bewerken</a>
            <a class="delete" method="post" href="<?= URL(DEMO_DELETE_PATH, $demo->ID); ?>">Verwijderen<a>
        </td>
    </tr>
<?php } ?>
</table>