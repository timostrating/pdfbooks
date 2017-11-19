<h1>Blog toevoegen</h1>

<form method="post" action="<?= ADMINBLOG_CREATE_PATH; ?>">
   <table>

        <?php generateTableField("Titel", "title"); ?>
        <?php generateTableField("Beschrijving", "description"); ?>
        <?php generateTableField("Afbeelding", "imgurl"); ?>
        <tr> <td></td>  <td> <button type="submit" class="btn btn-primary">Opslaan</button> </td> </tr>
        
   </table>
</form>	