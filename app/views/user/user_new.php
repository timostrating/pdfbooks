<div class="tc mt50">
    <h1>Registreren</h1>

    <form class="smallform" method="post" action="<?= USER_CREATE_PATH; ?>">

        <?php generateFormField("Name", "name"); ?>
        <?php generateFormField("Email", "email", "email"); ?>
        <?php generateFormField("Password", "password", "password"); ?>
        <?php generateFormField("Password", "password_again", "password"); ?>
        <button type="submit" class="btn btn-primary">Register</button>

    </form>	
</div>