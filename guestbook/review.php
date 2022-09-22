<?php
include_once("assets/base/structure.php");
?>

<html>
    <head>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

    <div class="container">
        <h1 class="intro"><?= countReviews(); ?></h1><br>
        <div class="row">
            <?php showReviews();?>
        </div>
    </div>
</html>