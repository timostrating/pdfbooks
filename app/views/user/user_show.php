<?php if(empty($result) == false) {  $user = $result[0]; ?>
    
    <table>
        <th colspan="2">
            <h1><?= $user->name; ?></h1>
        </th>
        <?php /* <tr> <td>Voornaam</td>       <td><?= $user->first_name; ?></td> </tr> */ ?>
        <?php /* <tr> <td>Achternaam</td>     <td><?= $user->last_name; ?></td> </tr> */ ?>
        <tr> <td>Name</td>     <td><?= $user->name; ?></td> </tr>
        <tr> <td>Emailadres</td>     <td><?= $user->email; ?></td> </tr>
        <tr> <td>UserType</td>     <td><?= $user->user_type_id; ?></td> </tr>
        <?php /* <tr> <td>Geslacht</td>       <td><?= $user->gender; ?></td> </tr> */ ?>
        <?php /* <tr> <td>Land</td>           <td><?= $user->country; ?></td> </tr> */ ?>
        <?php /* <tr> <td>Provincie</td>      <td><?= $user->state; ?></td> </tr> */ ?>
        <?php /* <tr> <td>Stad</td>           <td><?= $user->city; ?></td> </tr> */ ?>
        <?php /* <tr> <td>Straatnaam</td>     <td><?= $user->street; ?></td> </tr> */ ?>
        <?php /* <tr> <td>Huisnummer</td>     <td><?= $user->street_number; ?></td> </tr> */ ?>
        <?php /* <tr> <td>Postcode</td>       <td><?= $user->postal_code; ?></td> </tr> */ ?>
    </table>

    <a class="btn btn-warning" href="<?= USER_EDIT_PATH; ?>">Profiel bewerken</a>

    
<?php  } else { die("User niet gevonden"); }    ?>