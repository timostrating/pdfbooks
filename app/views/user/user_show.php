<?php if(empty($result) == false) {  $user = $result[0] ?>

    <h1>User <?= $user->ID; ?> </h1>
    
    <p><b> ID: </b> <?= $user->ID; ?></p>
    <p><b> Name: </b> <?= $user->name; ?></p>

    <a class="edit" href="<?=LOCALHOSTURI?>/users/update">Bewerken</a>
    <a href="<?=LOCALHOSTURI?>/users/logout">logout</a>
    <form id="myform<?=$user->ID;?>" method="post" action="<?=LOCALHOSTURI?>/users/delete">
        <a class="delete" href="#" onclick="document.getElementById('myform<?=$user->ID;?>').submit();">Verwijderen</a>
    </form>	

<?php } else { die("User niet gevonden"); }