<?php
include_once("./adminStructure.php");
?>
<html>
<div class="container">
    <h3 class="text-center">Pas item aan</h3>

    <center>
        <form id="formulier" method="post" action="" enctype="multipart/form-data">

            <label class="labeltekst" for="price">Prijs:</label><br>
            <input type="number" name="price" id="price" placeholder="Prijs €0.00" min="0" max="50" step=".01" required><br>

            <label for="description">Beschrijving:</label><br>
            <textarea type="text" name="description" id="description" placeholder="Beschrijving"></textarea><br>

            <input class="button" type="submit" name="submit" value="Aanpassen">

            <?= editItem() ?>

        </form>
    </center>
</div>
</html>
