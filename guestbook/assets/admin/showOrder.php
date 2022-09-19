<?php
include_once("./adminStructure.php");
?>

<body onload="countOrder();">
<div class="container">
    <h3 class="text-center">Hoi <?= $_SESSION['user']->name ?> hier kan je de bestellingen van vandaag zien</h3><br>
    <h4 class="text-center" id="infoOrder">Je hebt vandaag 0 bestellingen</h4><br>

    <center>
        <?= showAllOrders(); ?>
    </center>
</div>
<script src="../js/adminOrders.js"></script>
</body>
</html>
