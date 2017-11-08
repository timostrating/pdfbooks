<?php if(empty($result) == false) {  $item = $result[0] ?>

    <h1>Item <?= $item->ID; ?> </h1>
    
    <p><b> ID: </b> <?= $item->ID; ?></p>
    <p><b> Name: </b> <?= $item->name; ?></p>

    <a class="edit" href="<?= URL(ITEM_EDIT_PATH, $item->ID); ?>">Bewerken</a>
    <form id="myform<?=$item->ID;?>" method="post" action="<?= URL(ITEM_DELETE_PATH, $item->ID); ?>">
        <a class="delete" href="#" onclick="document.getElementById('myform<?=$item->ID;?>').submit();">Verwijderen</a>
    </form>	

<?php } else { die("Item niet gevonden"); }