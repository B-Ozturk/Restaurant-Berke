<?php
include_once("./adminStructure.php");
?>

<html>
<div class="container">
    <h3 class="text-center">Welkom hier kan je je wachtwoord wijzigen</h3>
    <center>
        <form method="post">

            <label class="labeltekst" for="oldPass">Oude wachtwoord:</label><br>
            <input type="password" name="oldPassword" id="oldPass" placeholder="Oude wachtwoord"><br>

            <label for="newPass">Name:</label><br>
            <input type="password" name="newPassword" id="newPass" placeholder="Nieuwe wachtwoord"><br>

            <label for="repPass">Name:</label><br>
            <input type="password" name="repeatPassword" id="repPass" placeholder="Herhaal nieuw wachtwoord"><br>

            <input type="submit" name="wijzig" value="Wachtwoord wijzigen">
        </form>
    </center>

    <?= changePassword(); ?>

</div>
</html>