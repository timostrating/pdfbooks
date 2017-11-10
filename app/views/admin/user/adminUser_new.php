<h1>Gebruiker toevoegen</h1>

<form method="post" action="<?= ADMINUSER_CREATE_PATH; ?>">
   <table>

        <?php generateTableField("Name", "name"); ?>
        <?php generateTableField("Achternaam", "last_name"); ?>
        <?php generateTableField("E-mail", "email"); ?>
        <?php generateTableField("Wachtwoord", "password"); ?>
        <?php generateTableField("Gebruiker type", "user_type_id"); ?>
        <tr> <td></td> <td><button type="submit" class="btn btn-primary">Opslaan</button> </td> </tr>
        
   </table>
</form>	