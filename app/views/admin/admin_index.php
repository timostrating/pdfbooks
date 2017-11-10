<h1 class="tc mt50"> Welcome admin </h1>

<table class="table table-striped mt50">
    <tr>
        <th> url </td>
        <th> action </td>
        <th> count </td>
    </tr>

<?php foreach($result as $pageview) { ?>        
    <tr <?php if($pageview->valid == 0) { echo 'style="color: red;"'; } ?>>
        <td><?= $pageview->url; ?></td>
        <td><?= $pageview->action; ?></td>
        <td><?= $pageview->count; ?></td>
    </tr>
<?php } ?>
</table>