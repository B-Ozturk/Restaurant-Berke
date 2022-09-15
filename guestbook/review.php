<?php
include_once("assets/base/structure.php");
?>

<html>
    <head>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

    <div class="container">
        <h1 class="intro"><?= countReviews(); ?></h1><br>

        <!-- Hier komen de reviews -->

        <div class="row">
<!--            <div class="col-md-6">-->
                <?php showReviews();?>
<!--            </div>-->
        </div>


    </div>
</html>