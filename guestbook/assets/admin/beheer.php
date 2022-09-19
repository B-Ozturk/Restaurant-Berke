<?php
include_once("./adminStructure.php");
?>

<html>
<div class="container">
    <h3 class="text-center">Alle gasten</h3>
    <center>
        <a type="button" class="btn btn-info btn-sm px-3" href="../admin/showReservation.php">Bekijk alle reserveringen</a>
    </center>
    <br>
    <?= showMembers();?>
</div>
</html>
