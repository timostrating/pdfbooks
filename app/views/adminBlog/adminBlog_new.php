<h1>AdminBlog toevoegen</h1>

<form method="post" action="<?= ADMINBLOG_CREATE_PATH; ?>">
   <table>

        <?php generateTableField("Title", "title"); ?>
        <?php generateTableField("Description", "description"); ?>
        <?php generateTableField("Imgurl", "imgurl"); ?>
        <?php generateTableField("", "", "submit", "Opslaan"); ?>

   </table>
</form>	