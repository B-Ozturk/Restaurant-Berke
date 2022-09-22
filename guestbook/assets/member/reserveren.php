<?php
include_once("./userStructure.php");
?>
<html>
<div class="container">
    <h3 class="text-center">Welkom
        <?php if(isset($_SESSION['user']->name)){echo $_SESSION['user']->name;}else{echo "";}?>
        hier kan je een tafel reserveren
    </h3>

    <center>
    <div class="container">
        <form id="formulier" method="post">
            <label for="name">Aantal mensen:</label><br>
            <input type="number" name="persons" id="name" value="1" min="1" max="100"><br>

            <label for="message">Voor wanneer wilt u reserveren?</label><br>
            <input type="date" name="message" id="message" min="2022-9-7" max="2022-12-31" required><br>

            <label for="time">Voor hoelaat wilt u reserveren?</label><br>
            <input type="time" name="time" id="time" min="10:00" max="23:00" required><br>
            <small>We zijn open van 10:00 - 23:00</small><br>

            <input class="button" type="submit" name="submit" value="Reserveren">

            <?= makeMemberReservation();?>
        </form>
    </div>
    </center>
</div>
</html>