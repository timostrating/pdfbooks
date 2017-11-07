<h1>'.$Name.' toevoegen</h1>

<form method="post" action="<?= ROOT_PATH ?>/'.$names.'/create">
   <table>

        <?php generateTableField("Name", "name"); ?>
        <?php generateTableField("", "", "submit", "Opslaan"); ?>

   </table>
</form>	