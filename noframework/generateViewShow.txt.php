<?php if(empty($result) == false) {  $'.$name.' = $result[0] ?>

    <h1>'.$Name.' <?= $'.$name.'->ID; ?> </h1>
    
    <p><b> ID: </b> <?= $'.$name.'->ID; ?></p>
    <p><b> Name: </b> <?= $'.$name.'->name; ?></p>

    <a class="edit" href="<?=ROOT_PATH?>/'.$names.'/<?=$'.$name.'->ID;?>/edit">Bewerken</a>
    <form id="myform<?=$'.$name.'->ID;?>" method="post" action="<?=ROOT_PATH?>/'.$names.'/<?=$'.$name.'->ID;?>/delete">
        <a class="delete" href="#" onclick="document.getElementById(\'myform<?=$user->ID;?>\').submit();">Verwijderen</a>
    </form>	

<?php } else { die("'.$Name.' niet gevonden"); }