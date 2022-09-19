<?php
include_once('../functions/functions.php');
include_once('../functions/login_functions.php');
include_once('../functions/user_functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Restaurant Berke</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<h1 class="text-center">Restaurant Berke</h1>

<div class="container-fluid">
    <div class="jumbotron jumbotron-fluid bg-warning">
        <?= countReservations(); ?>
        <?= countMembers(); ?>
    </div>

        <h5>Uw profiel wordt verwijderd van de server...</h5>
        <?=
            sleep(5);
            deleteProfile();
        ?>


</div>
</html>