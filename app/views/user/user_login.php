<h1>Inloggen</h1>

<form method="post" action="<?= LOCALHOSTURI ?>/users/create_session">
   <table>

        <?php generateTableField("Email", "email", "email"); ?>
        <?php generateTableField("Password", "password", "password"); ?>
        <?php generateTableField("", "", "submit", "Opslaan"); ?>

   </table>
</form>	