<?php
include_once("./userStructure.php");
?>
<html>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../member/profile.php">Profiel</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profiel aanpassen</li>
        </ol>
    </nav>

    <h3 class="text-center">Welkom <?php if(isset($_SESSION['user']->name)){echo $_SESSION['user']->name;}else{echo "";}?> hier kan je je profiel aanpassen</h3>
    <center>
        <form method="post">
            <label class="labeltekst" for="email">Email:</label><br>
            <input type="email" name="email" id="email" value="<?= $_SESSION['user']->email ?>" placeholder="User@email.com"><br>

            <label for="name">Naam:</label><br>
            <input type="text" name="name" id="name" value="<?= $_SESSION['user']->name ?>" placeholder="User"><br>

            <label for="Adres">Adres:</label><br>
            <input type="text" name="adres" id="Adres" value="<?= $_SESSION['user']->adres ?>" placeholder="Adres"><br><br>

            <input type="submit" name="profile" value="Profiel aanpassen">
        </form>
    </center>

    <?= changeProfile(); ?>
</div>
</html>