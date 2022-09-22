<?php
include_once("assets/base/structure.php");
include_once("./assets/functions/login_functions.php");
?>

<html>
<head>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<div class="container">
    <center><h2>Welkom op de log in pagina</h2><br>

    <form id="formulier" method="post">

        <label class="labeltekst" for="email">Email:</label><br>
        <input type="email" name="email" id="email" placeholder="User@email.com"><br>

        <label for="password">Wachtwoord:</label><br>
        <input type="password" name="password" id="password" placeholder="Password"><br>

        <h6>Nog geen account? <a href="registration.php">Meld je nu aan!</a></h6>

        <input class="button" type="submit" name="submit" value="GO">
    </form>
    </center>

    <?php checkLogin(); ?>

</div>
</html>