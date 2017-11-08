<h1>Item toevoegen</h1>

<form method="post" action="<?= ITEM_CREATE_PATH; ?>">
   <table>

        <?php generateTableField("Name", "name"); ?>
        <?php generateTableField("", "", "submit", "Opslaan"); ?>

   </table>
</form>	