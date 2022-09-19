<?php
include_once('../functions/functions.php');
include_once('../functions/login_functions.php');
include_once('../functions/user_functions.php');
include_once('../functions/order_functions.php');
?>

<?= checkSession(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Restaurant Berke</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/weather.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>


<h1 class="text-center">Restaurant Berke</h1>
<ul>
    <h3><a href="../member/memberHome.php">Home</a></h3>
    <h3><a href="../member/reserveren.php">Reserveren</a></h3>
    <h3><a href="../member/categories.php">Bestellen</a></h3>
    <h3><a href="../member/review.php">Review</a></h3>
    <h3><a href="../member/profile.php">Profiel</a></h3>
    <h3><a href="../functions/logout.php">Afmelden</a></h3>
</ul>

<div class="container-fluid">
    <div class="jumbotron jumbotron-fluid bg-warning">
        <?= countMemberTotalReservations(); ?>
        <?= countMemberTotalOrders() ?>
        <hr/>
        <?= countReservations(); ?>
        <?= countMembers(); ?>
        <?= calculateScore(); ?>
    </div>
</div>
</html>
