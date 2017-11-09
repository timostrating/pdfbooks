<h1>'.$Names.'</h1>

<br/>
<a class="add" href="<?='.$NAME.'_NEW_PATH?>" value="'.$Name.' toevoegen"> New '.$name.' </a>
<br/>
<br/>

<table>
    <tr>
        <th> ID </td>
        <th> Name </td>
    </tr>

<?php foreach($result as $'.$name.') { ?>        
    <tr>
        <td><a href="<?= URL('.$NAME.'_SHOW_PATH, $'.$name.'->ID); ?>"><?= $'.$name.'->ID; ?></a></td>
        <td><?= $'.$name.'->name; ?></td>
        <td>
            <a class="edit" href="<?= URL('.$NAME.'_EDIT_PATH, $'.$name.'->ID); ?>">Bewerken</a>
            <a class="delete" method="post" href="<?= URL('.$NAME.'_DELETE_PATH, $'.$name.'->ID); ?>">Verwijderen<a>
        </td>
    </tr>
<?php } ?>
</table>