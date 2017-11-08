<h1>Inloggen</h1>

<form method="post" action="<?= USER_CREATE_SESSION_PATH ?>">
   <table>

        <?php generateTableField("Email", "email", "email"); ?>
        <?php generateTableField("Password", "password", "password"); ?>
        <?php generateTableField("", "", "submit", "Opslaan"); ?>

   </table>
</form>	