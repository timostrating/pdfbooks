<h1>AdminUser toevoegen</h1>

<form method="post" action="<?= ADMINUSER_CREATE_PATH; ?>">
   <table>

        <?php generateTableField("Name", "name"); ?>
        <?php generateTableField("", "", "submit", "Opslaan"); ?>

   </table>
</form>	