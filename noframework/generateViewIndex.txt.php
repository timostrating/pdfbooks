<h1>'.$Name.'</h1>

<br/>
<a class="add" href="<?=LOCALHOSTURI?>/'.$names.'/new" value="'.$Name.' toevoegen"> New '.$name.' </a>
<br/>
<br/>

<table>
    <tr>
        <th> ID </td>
        <th> Name </td>
    </tr>

<?php foreach($result as $'.$name.') { ?>        
    <tr>
        <td><a href="<?=LOCALHOSTURI?>/'.$names.'/<?=$'.$name.'->ID;?>/show"><?= $'.$name.'->ID; ?></a></td>
        <td><?= $'.$name.'->name; ?></td>
        <td>
            <a class="edit" href="<?=LOCALHOSTURI?>/'.$names.'/<?=$'.$name.'->ID;?>/edit">Bewerken</a>
            <form id="myform<?=$'.$name.'->ID;?>" method="post" action="<?=LOCALHOSTURI?>/'.$names.'/<?=$'.$name.'->ID;?>/delete">
                <a class="delete" href="#" onclick="document.getElementById(\'myform<?=$user->ID;?>\').submit();">Verwijderen</a>
            </form>	
        </td>
    </tr>
<?php } ?>
</table>