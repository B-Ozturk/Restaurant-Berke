<?php
include_once("./userStructure.php");
?>
<html>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../member/profile.php">Profiel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Wachtwoord aanpassen</li>
        </ol>
    </nav>
    <h3 class="text-center">Welkom <?php if(isset($_SESSION['user']->name)){echo $_SESSION['user']->name;}else{echo "";}?> hier kan je je wachtwoord wijzigen</h3>
    <center>
        <form method="post">
            <label class="labeltekst" for="oldPass">Oude wachtwoord:</label><br>
            <input type="password" name="oldPassword" id="oldPass" placeholder="Oude wachtwoord"><br>

            <label for="newPass">Nieuw wachtwoord:</label><br>
            <input type="password" name="newPassword" id="newPass" placeholder="Nieuw wachtwoord"><br>

            <label for="repPass">Herhaal nieuw wachtwoord:</label><br>
            <input type="password" name="repeatPassword" id="repPass" placeholder="Herhaal nieuw wachtwoord"><br><br>

            <input type="submit" name="wijzig" value="Wachtwoord wijzigen">
        </form>
    </center>

    <?= changePassword(); ?>
</div>
</html>