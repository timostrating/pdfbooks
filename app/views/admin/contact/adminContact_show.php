<?php if(empty($result) == false) {  $adminContact = $result[0] ?>

    <h1>Bericht <?= $adminContact->ID; ?> </h1>
    
    <p><b> Name: </b> <?= $adminContact->name; ?></p>
    <p><b> E-mail: </b> <?= $adminContact->email; ?></p>
    <p><b> Description: </b> <?= $adminContact->description; ?></p>

    <a class="btn btn-danger" method="post" href="<?= URL(ADMINCONTACT_DELETE_PATH, $adminContact->ID); ?>">Verwijderen<a>

<?php } else { die("AdminContact niet gevonden"); }