<h1>Bestelling toevoegen</h1>

<form method="post" action="<?= ADMINORDER_CREATE_PATH; ?>">
   <table>

        <?php generateTableField("Name", "name"); ?>
        <tr> <td></td>  <td> <button type="submit" class="btn btn-primary">Opslaan</button> </td> </tr>
        
   </table>
</form>	