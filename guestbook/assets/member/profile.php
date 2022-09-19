<?php
include_once("./userStructure.php");
?>
<style>
    .hide {
        display: none;
    }

    .delbut:hover + .hide {
        display: block;
        color: red;
    }
</style>

<html>
<div class="container">
    <h3 class="text-center">Profiel gegevens</h3>
</div>

<table class="table align-middle">
    <tbody>
    <tr>
        <td>Email:</td>
        <td><?= $_SESSION['user']->email ?></td>
    </tr>
    <tr>
        <td>Name:</td>
        <td><?= $_SESSION['user']->name ?></td>
    </tr>
    </tbody>
</table>

<center>
    <a type="button" class="btn btn-info btn-sm px-3" href="../member/showOrder.php">Bekijk al je bestellingen</a>
    <a type="button" class="btn btn-info btn-sm px-3" href="../member/showReservation.php">Bekijk al je reserveringen</a>
</center>
<br>
<center>
    <a type="button" class="btn btn-primary btn-sm px-3" href="../member/editProfile.php">Profiel aanpassen</a>
    <a type="button" class="btn btn-warning btn-sm px-3" href="../member/changePassword.php">Wachtwoord aanpassen</a>
</center>
<br>
<center>
    <a type="button" class="btn btn-danger btn-sm px-3 delbut" href="../member/deleteProfile.php">Verwijder profiel</a>
    <h4 class="hide">LET OP ALS JE JE ACCOUNT VERWIJDERD GAAN ALLE GEGEVENS EN DATA VERLOREN!!!</h4>
</center>
</html>
