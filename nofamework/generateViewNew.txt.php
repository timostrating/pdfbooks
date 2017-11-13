<h1>'.$Name.' toevoegen</h1>

<form method="post" action="<?= '.$NAME.'_CREATE_PATH; ?>">
   <table>

        <?php generateTableField("Name", "name"); ?>
        <?php generateTableField("", "", "submit", "Opslaan"); ?>

   </table>
</form>	