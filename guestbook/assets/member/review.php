<?php
include_once("./userStructure.php");
?>
<html>
<body>
<h3 class="text-center">Hoi <?php if(isset($_SESSION['user']->name)){echo $_SESSION['user']->name;}else{echo "";}?> hier kan je een anonieme review plaatsen</h3>
<br>
<div class="container">
    <center>
        <form id="formulier" method="post">
            <label for="message">Review:</label><br>
            <input type="text" name="message" placeholder="Plaats hier uw review" required><br>

            <label for="name">Geef een cijfer</label><br>
            <input type="number" name="stars" id="name" placeholder="1 - 10" min="1" max="10" required><br>

            <input class="button" type="submit" name="submit" value="Review">

            <?= addReview();?>
        </form>
    </center>
</div>
</body>
</html>
