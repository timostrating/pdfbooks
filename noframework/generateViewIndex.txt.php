<h1>'.$Name.'</h1>

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
            <form id="myform<?=$'.$name.'->ID;?>" method="post" action="<?= URL('.$NAME.'_DELETE_PATH, $'.$name.'->ID); ?>">
                <a class="delete" href="#" onclick="document.getElementById(\'myform<?=$'.$name.'->ID;?>\').submit();">Verwijderen</a>
            </form>	
        </td>
    </tr>
<?php } ?>
</table>