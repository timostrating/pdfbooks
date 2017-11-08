<?php if(empty($result) == false) {  $user = $result[0] ?>

    <h1>User <?= $user->ID; ?> </h1>
    
    <p><b> ID: </b> <?= $user->ID; ?></p>
    <p><b> Name: </b> <?= $user->name; ?></p>

    <a class="edit" href="<?= USER_EDIT_PATH; ?>">Bewerken</a>
    <a href="<?=ROOT_PATH?>/users/logout">logout</a>
    <form id="myform<?=$user->ID;?>" method="post" action="<?= USER_DELETE_PATH; ?>">
        <a class="delete" href="#" onclick="document.getElementById('myform<?=$user->ID;?>').submit();">Verwijderen</a>
    </form>	

<?php } else { die("User niet gevonden"); }