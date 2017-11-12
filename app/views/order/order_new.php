<h1>Onder welke naam wil je de bestelling plaatsen</h1>

<form method="post" action="<?= ORDER_CREATE_PATH; ?>">
   <table>

        <?php generateTableField("Name", "name"); ?>
        <tr> <td></td>  <td> <button type="submit" class="btn btn-primary">Opslaan</button> </td> </tr>
        
   </table>
</form>	