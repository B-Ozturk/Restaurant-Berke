<?php
include_once("./adminStructure.php");
?>
<html>
<body onload="countReservation();">
<div class="container">
    <h3 class="text-center">Hoi <?= $_SESSION['user']->name ?> hier kan je de reserveringen van vandaag zien</h3><br>
    <h4 class="text-center" id="infoReservation">Je hebt vandaag 0 reserveringen</h4><br>
</div>

<center>
    <?= showAllReservations(); ?>
</center>

<script src="../js/adminReservations.js"></script>
</body>
</html>
