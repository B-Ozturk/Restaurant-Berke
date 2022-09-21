<?php
include_once("assets/base/structure.php");
include_once("./assets/functions/login_functions.php");
?>

<html>
<head>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<div class="container">
    <center>
        <h2>Registreer je nu gratis en krijg cookies!</h2><br>
        <form id="formulier" method="post">

            <label class="labeltekst" for="name">Naam:</label><br>
            <input type="text" name="name" id="name" placeholder="User"><br>

            <label class="labeltekst" for="email">Email:</label><br>
            <input type="email" name="email" id="email" placeholder="User@email.com"><br>

            <label for="password">Wachtwoord:</label><br>
            <input type="password" name="password" id="password" placeholder="Wachtwoord"><br>

            <label for="herhaalwachtwoord">Herhaal wachtwoord:</label><br>
            <input type="password" name="repeatPassword" id="herhaalwachtwoord" placeholder="Herhaal wachtwoord"><br>

            <input class="button" type="submit" name="submit" value="Registreer">
        </form>
    </center>

    <?php
    makeRegistration();
    ?>

</div>
</html>