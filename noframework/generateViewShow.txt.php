<?php if(empty($result) == false) {  $'.$name.' = $result[0] ?>

    <h1>'.$Name.' <?= $'.$name.'->ID; ?> </h1>
    
    <p><b> ID: </b> <?= $'.$name.'->ID; ?></p>
    <p><b> Name: </b> <?= $'.$name.'->name; ?></p>

    <a class="edit" href="<?= URL('.$NAME.'_EDIT_PATH, $'.$name.'->ID); ?>">Bewerken</a>
    <form id="myform<?=$'.$name.'->ID;?>" method="post" action="<?= URL('.$NAME.'_DELETE_PATH, $'.$name.'->ID); ?>">
        <a class="delete" href="#" onclick="document.getElementById(\'myform<?=$'.$name.'->ID;?>\').submit();">Verwijderen</a>
    </form>	

<?php } else { die("'.$Name.' niet gevonden"); }