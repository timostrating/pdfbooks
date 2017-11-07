<h1>Product toevoegen</h1>

<form method="post" action="<?= URL(PRODUCT_CREATE_PATH, $product->ID); ?>">
   <table>

        <?php generateTableField("Name", "name"); ?>
        <?php generateTableField("Description", "description"); ?>
        <?php generateTableField("Imgurl", "imgurl"); ?>
        <?php generateTableField("Price", "price"); ?>
        <?php generateTableField("", "", "submit", "Opslaan"); ?>

   </table>
</form>	