<h1>Registreren</h1>

<form method="post" action="<?= LOCALHOSTURI ?>/users/create">
   <table>

        <?php generateTableField("Name", "name"); ?>
        <?php generateTableField("Email", "email", "email"); ?>
        <?php generateTableField("Password", "password", "password"); ?>
        <?php generateTableField("", "", "submit", "Opslaan"); ?>

   </table>
</form>	