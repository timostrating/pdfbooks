<?php if(empty($result) == false) {  $user = $result[0] ?>		

    <h1>Gebruiker bewerken</h1>
    
    <form method="post" action="<?= URL(ADMINUSER_UPDATE_PATH, $user->ID); ?>">
       <table>

            <tr> <td>ID:</td>  <td><?=$user->ID;?></td></tr>
            <?php generateTableField("Naam", "name", "text", $user->name); ?>
            <?php generateTableField("Achternaam", "last_name", "text", $user->last_name); ?>
            <?php generateTableField("E-mail", "email", "email", $user->email); ?>
            <?php generateTableField("Wachtwoord", "password", "text", $user->password); ?>
            <?php generateTableField("GebruikerType", "user_type_id", "number", $user->user_type_id); ?>
            <tr> <td></td> <td> <button type="submit" class="btn btn-primary">Opslaan</button> </td> </tr>

       </table>
    </form>		

<?php } else { die("AdminUser niet gevonden"); }