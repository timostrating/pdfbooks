<?php if(empty($result) == false) {  $user = $result[0] ?>

    <h1>Gebruiker <?= $user->ID; ?> </h1>
    
    <p><b> Name: </b> <?= $user->name; ?></p>
    <p><b> Achternaam: </b> <?= $user->last_name; ?></p>
    <p><b> E-mail: </b> <?= $user->email; ?></p>
    <p><b> Wachtwoord: </b> <?= $user->password; ?></p>
    <p><b> UserType: </b> <?= $user->user_type_id; ?></p>

    <a class="btn btn-warning" href="<?= URL(ADMINUSER_EDIT_PATH, $user->ID); ?>">Bewerken</a>
    <a class="btn btn-danger" method="post" href="<?= URL(ADMINUSER_DELETE_PATH, $user->ID); ?>">Verwijderen<a>

<?php } else { die("AdminUser niet gevonden"); }