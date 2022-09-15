<?php
include_once("./adminStructure.php");
?>
<html>
<div class="container">
    <h3 class="text-center">Menu</h3>
    <center>
        <a type="button" class="btn btn-info btn-sm px-3" href="addItem.php">Voeg toe <i class='bi bi-plus-square'></i></a>
    </center>
    <br>
    <?= showAdminMenu(); ?>
</div>
</html>
