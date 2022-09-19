<?php
include_once("./userStructure.php");
?>
<html>
<div class="container">
    <h3 class="text-center">Bestellen</h3>
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="">
                <label class="labeltekst" for="email">Email:</label><br>
                <input type="email" name="email" id="email" value="<?php if(isset($_SESSION['user']->email)){echo $_SESSION['user']->email;}else{echo "";}?>" placeholder="User@email.com"><br>

                <label for="name">Naam:</label><br>
                <input type="text" name="name" id="name" value="<?php if(isset($_SESSION['user']->name)){echo $_SESSION['user']->name;}else{echo "";}?>" placeholder="User"><br>

                <label for="address">Bezorg adres:</label><br>
                <input type="text" name="adres" id="address" placeholder="Straatnaam 12" required><br><br>

                <label for="aantal">Kies je aantal</label><br>
                <select id="aantal" name="quantity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select><br><br>

                <input type="submit" name="order" value="Bestellen">
            </form>
            <?= makeOrder(); ?>
        </div>
        <div class="col-md-6">
            <!-- Hier komt een Card met het gekozen product -->
            <?= showItem(); ?>
        </div>
    </div>
</div>
</html>
