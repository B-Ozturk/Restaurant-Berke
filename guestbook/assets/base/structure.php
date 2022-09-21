<?php
include_once(__DIR__ . '/header.php');
include_once('./assets/functions/functions.php');
include_once('./assets/functions/login_functions.php');
?>

<html>
<h1 class="text-center">Restaurant Berke</h1>

<ul>
    <h3><a href="../../guestbook/index.php">Home</a></h3>
    <h3><a href="../../guestbook/menu.php">Menu</a></h3>
    <h3><a href="../../guestbook/review.php">Reviews</a></h3>
    <h3><a href="../../guestbook/login.php"> Log in</a></h3>
</ul>

<div class="container-fluid">
    <div class="jumbotron jumbotron-fluid bg-warning">
        <?= countOrders() ?>
        <?= countReservations(); ?>
        <?= countMembers(); ?>
        <?= calculateScore(); ?>
    </div>
</div>
<script src="../js/weather.js"></script>
</html>