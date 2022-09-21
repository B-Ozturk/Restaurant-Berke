<?php
include_once("assets/base/structure.php");
?>

<html>
<head>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<div class="container">
    <?= breadcrumb(); ?>
    <center>
        <h3>Menu</h3>
        <div class="row">
            <?= showMenu() ?>
        </div>
    </center>
</div>
</html>