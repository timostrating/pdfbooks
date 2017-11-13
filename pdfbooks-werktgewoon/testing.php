<!DOCTYPE html>
<html>
    <?php include('header.php');?>
    <body>


            


<script type="text/javascript">
function AlertIt() {
var answer = confirm ("Weet je zeker dat je je account wilt verwijderen?")
if (answer)
window.location="delete.php";
}
</script>
<button class="btn btn-danger" onclick="AlertIt();">Verwijder</button>
    </body>
</html>