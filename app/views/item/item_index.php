<h1>Item</h1>

<br/>
<a class="add" href="<?=ITEM_NEW_PATH?>" value="Item toevoegen"> New item </a>
<br/>
<br/>

<table>
    <tr>
        <th> ID </td>
        <th> Name </td>
    </tr>

<?php foreach($result as $item) { ?>        
    <tr>
        <td><a href="<?= URL(ITEM_SHOW_PATH, $item->ID); ?>"><?= $item->ID; ?></a></td>
        <td><?= $item->name; ?></td>
        <td>
            <a class="edit" href="<?= URL(ITEM_EDIT_PATH, $item->ID); ?>">Bewerken</a>
            <form id="myform<?=$item->ID;?>" method="post" action="<?= URL(ITEM_DELETE_PATH, $item->ID); ?>">
                <a class="delete" href="#" onclick="document.getElementById('myform<?=$item->ID;?>').submit();">Verwijderen</a>
            </form>	
        </td>
    </tr>
<?php } ?>
</table>