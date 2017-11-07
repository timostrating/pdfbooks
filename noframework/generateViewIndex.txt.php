<h1>'.$Name.'</h1>

<br/>
<a class="add" href="<?=ROOT_PATH?>/'.$names.'/new" value="'.$Name.' toevoegen"> New '.$name.' </a>
<br/>
<br/>

<table>
    <tr>
        <th> ID </td>
        <th> Name </td>
    </tr>

<?php foreach($result as $'.$name.') { ?>        
    <tr>
        <td><a href="<?=ROOT_PATH?>/'.$names.'/<?=$'.$name.'->ID;?>/show"><?= $'.$name.'->ID; ?></a></td>
        <td><?= $'.$name.'->name; ?></td>
        <td>
            <a class="edit" href="<?=ROOT_PATH?>/'.$names.'/<?=$'.$name.'->ID;?>/edit">Bewerken</a>
            <form id="myform<?=$'.$name.'->ID;?>" method="post" action="<?=ROOT_PATH?>/'.$names.'/<?=$'.$name.'->ID;?>/delete">
                <a class="delete" href="#" onclick="document.getElementById(\'myform<?=$'.$name.'->ID;?>\').submit();">Verwijderen</a>
            </form>	
        </td>
    </tr>
<?php } ?>
</table>