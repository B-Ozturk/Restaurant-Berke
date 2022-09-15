<?php
include_once("./adminStructure.php");
?>
<html>
<div class="container">
    <h3 class="text-center">Voeg een nieuw item toe aan het menu</h3>

    <center>
        <form id="formulier" method="post" action="" enctype="multipart/form-data">

            <label class="labeltekst" for="name">Naam:</label><br>
            <input type="text" name="name" id="name" placeholder="Naam" required><br>

            <label class="labeltekst" for="price">Prijs:</label><br>
            <input type="number" name="price" id="price" placeholder="Prijs €0.00" min="0" max="50" step=".01" required><br>

            <label class="labeltekst" for="picture">Afbeelding:</label><br>
            <input type="file" name="picture" id="picture" required><br>

            <label for="description">Beschrijving:</label><br>
            <textarea type="text" name="description" id="description" placeholder="Beschrijving"></textarea><br>

            <label for="cat">Categorie:</label><br>
            <select id="cat" name="category">
                <option value="1">Soepen</option>
                <option value="2">Hoofdgerechten</option>
                <option value="3">Nagerechten</option>
                <option value="4">Drinken</option>
            </select><br>

            <input class="button" type="submit" name="submit" value="Toevoegen">

            <?= addItem() ?>

        </form>
    </center>
</div>
</html>
