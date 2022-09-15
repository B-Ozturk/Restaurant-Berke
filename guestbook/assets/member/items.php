<?php
include_once("./userStructure.php");
?>
<html>
<div class="container">
    <center>
        <h3>Kies een categorie</h3>
        <?= breadCrumbs(); ?>
        <div class="row">
            <?= generateBuyLink(); ?>
        </div>
    </center>
</div>
</html>
