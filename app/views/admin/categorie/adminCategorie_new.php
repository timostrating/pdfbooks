<h1>AdminCategorie toevoegen</h1>

<form method="post" action="<?= ADMINCATEGORIE_CREATE_PATH; ?>">
   <table>

        <?php generateTableField("Name", "name"); ?>
        <?php generateTableField("", "", "submit", "Opslaan"); ?>

   </table>
</form>	