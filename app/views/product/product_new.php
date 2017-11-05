<h1>Product toevoegen</h1>

<form method="post" action="<?= LOCALHOSTURI ?>/products/create">
   <table>

        <?= generateField("Name", "name"); ?>
        <?= generateField("Description", "description"); ?>
        <?= generateField("Imgurl", "imgurl"); ?>
        <?= generateField("Price", "price"); ?>
        <?= generateField("", "", "submit", "Opslaan"); ?>

   </table>
</form>	