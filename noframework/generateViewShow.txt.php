<?php if(empty($result) == false) {  $'.$name.' = $result[0] ?>

    <h1>'.$Name.' <?= $'.$name.'->ID; ?> </h1>
    
    <p><b> ID: </b> <?= $'.$name.'->ID; ?></p>
    <p><b> Name: </b> <?= $'.$name.'->name; ?></p>

    <a class="edit" href="<?= URL('.$NAME.'_EDIT_PATH, $'.$name.'->ID); ?>">Bewerken</a>
    <a class="delete" method="post" href="<?= URL('.$NAME.'_DELETE_PATH, $'.$name.'->ID); ?>">Verwijderen<a>

<?php } else { die("'.$Name.' niet gevonden"); }