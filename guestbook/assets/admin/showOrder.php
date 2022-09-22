<?php
include_once("./adminStructure.php");
?>

<body onload="countOrder();">
<div class="container">
    <h3 class="text-center">Hoi <?= $_SESSION['user']->name ?> hier kan je de bestellingen van vandaag zien</h3><br>
    <h4 class="text-center" id="infoOrder">Je hebt vandaag 0 bestellingen</h4><br>
        <?= showAllOrders(); ?>
</div>
<script src="../js/adminOrders.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
