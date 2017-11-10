<?php if(empty($result) == false) {  $adminCategorie = $result[0] ?>

    <h1>AdminCategorie <?= $adminCategorie->ID; ?> </h1>
    
    <p><b> ID: </b> <?= $adminCategorie->ID; ?></p>
    <p><b> Name: </b> <?= $adminCategorie->name; ?></p>

    <a class="edit" href="<?= URL(ADMINCATEGORIE_EDIT_PATH, $adminCategorie->ID); ?>">Bewerken</a>
    <a class="delete" method="post" href="<?= URL(ADMINCATEGORIE_DELETE_PATH, $adminCategorie->ID); ?>">Verwijderen<a>

<?php } else { die("AdminCategorie niet gevonden"); }