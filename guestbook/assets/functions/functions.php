<html>
<link rel="stylesheet" href="../css/style.css">
</html>

<?php
include_once('config.php');

// This function counts the amount of reservations in the database
function countReservations(){
    global $pdo;
    $numberOfReservations = 0;
    $sql = $pdo->prepare("SELECT * FROM reservation ORDER BY date DESC");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data) {
        $numberOfReservations++;
    }
    echo "<h6>Totale reservaties: " . $numberOfReservations . "</h6>";
}

// This function counts the total members
function countMembers(){
    global $pdo;

    $numberOfMembers = 0;
    $role = "member";

    $sql = $pdo->prepare("SELECT * FROM user WHERE `role`=:r");
    $sql->bindValue(":r", $role);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data){
        $numberOfMembers++;
    }
    echo "<h6>Aantal leden: " . $numberOfMembers . "</h6>";
}

// This function counts the total of reviews in the database
function countReviews(){
    global $pdo;
    $numberOfReviews = 0;

    $sql = $pdo->prepare("SELECT * FROM review");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data){
        $numberOfReviews++;
    }
    echo "<h3 class='text-center'>Er zijn " . $numberOfReviews . " reviews om te lezen</h3>";
}

// This function calculates the average score
function calculateScore(){
    global $pdo;
    $total = 0;
    $amount = 0;

    $sql = $pdo->prepare("SELECT * FROM review");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data){
        $total += $data['stars'];
        $amount++;
    }

    $average = $total / $amount;

    echo "<h6>Gemiddelde score " . round($average, 0) . "☆</h6>";
}

// This function counts the total of orders in the database
function countOrders(){
    global $pdo;
    $numberOfOrders = 0;
    $sql = $pdo->prepare("SELECT * FROM bestelling");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data) {
        $numberOfOrders++;
    }
    echo "<h6>Totale bestellingen: " . $numberOfOrders . "</h6>";
}

// This function shows all the reviews that are in the database
function showReviews(){
    global $pdo;
    $sql = $pdo->prepare("SELECT * FROM review");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data) {
        echo"
            <div class='col-md-6'>
                <div class='card'>
                  <div class='container'> 
                    <h6>Review: " . $data['message'] . "</h6> 
                    <h6>Cijfer: ". $data['stars'] ."</h6>
                    <p>Datum: ". $data['date'] ."</p> 
                  </div>
                </div>
            </div>
        ";
    }
}

// This function shows all the categories that are in the database
function showCategories(){
    global $pdo;
    $sql = $pdo->prepare("SELECT * FROM categories");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data) {
        echo"
            <div class='col-sm-4 col-md-3'>
                <div class='card'>
                  <div class='card-body text-center'> 
                        <a href='../../guestbook/category.php?id=" . $data['id'] . "'>
                            <img class='product-img img-responsive center-block' src='assets/image/categories/". $data['picture'] ."' width='200px' height='150px'>
                        </a> 
                        <div class='card-title mb-3'><h5>
                            ". $data['name'] ."
                        </h5></div>
                  </div>
                </div>
            </div>
        ";
    }
}

// This function shows the menu of the category that is selected
function showMenu(){
    global $pdo;
    $id = $_GET['id'];
    $sql = $pdo->prepare('SELECT * FROM menu WHERE `category_id` = :id');
    $stmnt = $sql;
    $stmnt->bindParam(':id',$id);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data) {
        echo"
            <div class='col-sm-4 col-md-3'>
                <div class='card'>
                  <div class='card-body text-center'> 
                        <img class='product-img img-responsive center-block' src='assets/image/categories/". $data['picture'] ."' width='200px' height='150px'>
                        <div class='card-title mb-3'><h5>
                            ". $data['name'] ."
                        </h5></div>
                  </div>
                  <div class='card-body text-center'>
                        <p class='card-text'>". $data['description'] ."</p>
                        <p class='card-text'>&euro; ". $data['price'] ."</p>
                  </div>
                </div>
            </div>
        ";
    }
}

// This function generates a breadcrumb for on the category page
function breadcrumb(){
    global $pdo;
    $category_id = $_GET['id'];
    $sql = $pdo->prepare('SELECT * FROM categories WHERE `id` = :category_id');
    $stmnt = $sql;
    $stmnt->bindParam(':category_id',$category_id);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data){
        echo "
            <nav aria-label='breadcrumb'>
                <ol class='breadcrumb'>
                    <li class='breadcrumb-item'><a href='./menu.php'>Menu</a></li>
                    <li class='breadcrumb-item active' aria-current='page'>". $data['name'] ."</li>
                </ol>
            </nav>
        ";
    }
}