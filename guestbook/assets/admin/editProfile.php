<?php
include_once("./adminStructure.php");
?>

<html>
<div class="container">
    <h3 class="text-center">Welkom hier kan je je profiel aanpassen
        <?php if(isset($_SESSION['user']->name)){echo $_SESSION['user']->name;}else{echo "";}?>
    </h3>
    <center>
        <form method="post">

            <label class="labeltekst" for="email">Email:</label><br>
            <input type="email" name="email" id="email" value="<?php if(isset($_SESSION['user']->email)){echo $_SESSION['user']->email;}else{echo "";}?>" placeholder="User@email.com"><br>

            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name" value="<?php if(isset($_SESSION['user']->name)){echo $_SESSION['user']->name;}else{echo "";}?>" placeholder="User"><br>

            <input type="submit" name="profile" value="Profiel aanpassen">
        </form>
    </center>

    <?= changeProfile(); ?>

</div>
</html>