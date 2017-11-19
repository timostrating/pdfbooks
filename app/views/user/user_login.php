<div class="tc mt50">
    <h1>Inloggen</h1>

    <form class="smallform" method="post" action="<?= USER_CREATE_SESSION_PATH ?>">

        <?php generateFormField("Email", "email", "email"); ?>
        <?php generateFormField("Password", "password", "password"); ?>
        <button type="submit" class="btn btn-primary">Inloggen</button>
        
    </form>	
</div>