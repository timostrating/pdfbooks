<h1>Product toevoegen</h1>

<form method="post" action="<?= LOCALHOSTURI ?>/products/create">
   <table>

        <?php generateTableField("Name", "name"); ?>
        <?php generateTableField("Description", "description"); ?>
        <?php generateTableField("Imgurl", "imgurl"); ?>
        <?php generateTableField("Price", "price"); ?>
        <?php generateTableField("", "", "submit", "Opslaan"); ?>

   </table>
</form>	