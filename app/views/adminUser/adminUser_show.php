<?php if(empty($result) == false) {  $adminUser = $result[0] ?>

    <h1>AdminUser <?= $adminUser->ID; ?> </h1>
    
    <p><b> ID: </b> <?= $adminUser->ID; ?></p>
    <p><b> Name: </b> <?= $adminUser->name; ?></p>

    <a class="edit" href="<?= URL(ADMINUSER_EDIT_PATH, $adminUser->ID); ?>">Bewerken</a>
    <a class="delete" method="post" href="<?= URL(ADMINUSER_DELETE_PATH, $adminUser->ID); ?>">Verwijderen<a>

<?php } else { die("AdminUser niet gevonden"); }