<?php if(empty($result) == false) {  $user = $result[0] ?>

    <h1>User <?= $user->ID; ?> </h1>
    
    <p><b> ID: </b> <?= $user->ID; ?></p>
    <p><b> Name: </b> <?= $user->name; ?></p>

    <a class="edit" href="<?= USER_EDIT_PATH; ?>">Bewerken</a>
    <a href="<?=ROOT_PATH?>/users/logout">logout</a>
    <a class="delete" method="post" href="<?= URL(USER_DELETE_PATH, $user->ID); ?>">Verwijderen<a>

<?php } else { die("User niet gevonden"); }