<?php
include_once('../functions/functions.php');
include_once('../functions/login_functions.php');
include_once('../functions/admin_functions.php');
?>

<?= checkSession(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Restaurant Berke</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>


<h1 class="text-center">Restaurant Berke</h1>
<ul>
    <h3><a href="../admin/adminHome.php">Home</a></h3>
    <h3><a href="../admin/beheer.php">Gasten</a></h3>
    <h3><a href="../admin/showOrder.php">Bestellingen</a></h3>
    <h3><a href="../admin/adminMenu.php">Menu</a></h3>
    <h3><a href="../admin/profile.php">Profiel</a></h3>
    <h3><a href="../functions/logout.php">Afmelden</a></h3>
</ul>

<div class="container-fluid">
    <div class="jumbotron jumbotron-fluid bg-warning">
        <?= countOrders(); ?>
        <?= countReservations(); ?>
        <?= countMembers(); ?>
        <?= calculateScore(); ?>
    </div>
</div>

