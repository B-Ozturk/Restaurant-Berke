<html>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
</html>

<?php
require_once('config.php');
require_once('User.php');
$request = $_SERVER['REQUEST_URI'];
$params = explode("/", $request);
global $params;

// This function shows a list of members
function showMembers(){
    global $pdo;

    $sql = "SELECT * FROM `user` WHERE role='member'";
    $sth = $pdo->prepare($sql);
    $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
    $sth->execute();
    $users = $sth->fetchAll();

    echo"
        <table class='table align-middle'>
    <thead>
    <tr>
        <th scope='col'>nr</th>
        <th scope='col'>Naam</th>
        <th scope='col'>Email</th>
        <th scope='col'>Reservaties</th>
        <th scope='col' class='text-center'>Verwijderen</th>
    </tr>
    </thead>
    <tbody>";

    $count=1;
    foreach($users as $user):
        echo"<tr>
            <th scope='row'>" . $count++ . "</th>

            <td>" . $user->name . "</td>
            <td>" . $user->email . "</td>
            <td>" . $user->reservations . "</td>
            <td class='text-center'>
                <a type='button' class='btn btn-danger btn-sm px-3' href='../admin/delete.php?id=" . $user->id . "'>
                    <i class='bi bi-dash-square'></i>
                </a>
            </td>
        </tr>";
    endforeach;

    echo"</tbody>
</table>";
}

// This function deletes a member from the database
function deleteMember(){
    global $pdo;
    $id = $_GET['id'];

    if ($id!=false){
        $sql = $pdo->prepare('DELETE FROM `user` WHERE `id` = :id');

        $stmnt = $sql;
        $stmnt->bindParam(':id',$id);

        if ($stmnt->execute()){
            deleteMemberSucces();
        } else {
            deleteMemberFailure();
        }
    }
}

function deleteMemberSucces(){
    echo '<div class="alert alert-success" role="alert">Profiel is succesvol verwijderd!</div>';
}

function deleteMemberFailure(){
    echo '<div class="alert alert-danger" role="alert">Profiel is niet succesvol verwijderd!</div>';
}

//This function shows the reservations of the user he/she has made
function showAllReservations(){
    global $pdo;
    $today = date("Y-m-d");

    $sql = $pdo->prepare("SELECT * FROM `reservation` ORDER BY time ASC");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($result)){

        echo "<table>
                  <tr>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Personen</th>
                    <th>Dag</th>
                    <th>Tijd</th>                    
                  </tr>";

        foreach ($result as $data){
            if ($data['message'] === $today) {
                echo "
                  <tr class='reservering'>
                    <td>" . $data['name'] . "</td>
                    <td>" . $data['email'] . "</td>
                    <td>" . $data['persons'] . "</td>
                    <td>" . $data['message'] . "</td>
                    <td>" . $data['time'] . "</td>
                  </tr>
            ";
            }
        }

        echo    "</table>        
                <br><br>";

    } else{
        echo "oopsie";
    }
}

// This function shows the admin the menu
function showAdminMenu(){
    global $pdo;

    $sql = "SELECT * FROM `menu` ORDER BY `category_id` ASC";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    $items = $sth->fetchAll(PDO::FETCH_ASSOC);

    echo"
        <table class='table align-middle'>
    <thead>
    <tr>
        <th scope='col'>nr</th>
        <th scope='col'>Foto</th>
        <th scope='col'>Naam</th>
        <th scope='col'>Prijs</th>
        <th scope='col' class='text-center'>Aanpassen</th>
        <th scope='col' class='text-center'>Verwijderen</th>
    </tr>
    </thead>
    <tbody>";

    $count=1;
    foreach($items as $food):
        echo"<tr>
            <th scope='row'>" . $count++ . "</th>

            <td style='width: 10%'><img src='../image/categories/". $food['picture'] ."' class='img-thumbnail img-fluid'></td>
            <td>" . $food['name'] . "</td>
            <td>&euro; " . $food['price'] . "</td>
            <td class='text-center'>
                <a type='button' class='btn btn-warning btn-sm px-3' href='../admin/editItem.php?id=" . $food['id'] . "'>
                    <i class='bi bi-pencil-square'></i>
                </a>
            </td>
            <td class='text-center'>
                <a type='button' class='btn btn-danger btn-sm px-3' href='../admin/deleteItem.php?id=" . $food['id'] . "'>
                    <i class='bi bi-dash-square'></i>
                </a>
            </td>
        </tr>";
    endforeach;

    echo"</tbody>
</table>";
}

// This function adds an item to the menu
function addItem(){
    if (isset($_POST['submit'])){
        global $pdo;
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category = $_POST['category'];

        $picture = $_FILES["picture"]["name"];
        $tempname = $_FILES["picture"]["tmp_name"];
        $folder = "../image/categories/" . $picture;

        if (!empty($name) && !empty($price) && !empty($description) && !empty($category)){
            $sth = $pdo->prepare('INSERT INTO menu (name,description,price,category_id,picture) VALUES (?,?,?,?,?)');
            $sth->bindParam(1, $name);
            $sth->bindParam(2, $description);
            $sth->bindParam(3, $price);
            $sth->bindParam(4, $category);
            $sth->bindParam(5, $picture);
            $sth->execute();

            if (move_uploaded_file($tempname, $folder)) {
                echo '<div class="alert alert-success" role="alert">Item is succesvol toegevoegd!</div>';
            } else {
                echo "<h3>  Failed to upload image!</h3>";
            }
        }
    }

}

// With this function the admin is in able to edit an item
function editItem(){
    global $pdo;
    $id = $_GET['id'];

    if (isset($_POST['submit'])){

        $price = $_POST['price'];
        $description = $_POST['description'];


        $sth = $pdo->prepare('UPDATE `menu` SET `price`=:p, `description`=:d  WHERE `id`=:i');
        $sth->bindValue(":p",$price);
        $sth->bindValue(":d",$description);
        $sth->bindValue(":i",$id);

        if ($sth->execute()){
            echo '<div class="alert alert-success" role="alert">Item is succesvol aangepast!</div>';
        } else {
            echo '<div class="alert alert-warning" role="alert">Oeps er is iets mis gegaan!</div>';
        }
    }
}

// This function deletes an item from the menu that was chosen
function deleteItem(){
    global $pdo;
    global $id;
    $id = $_GET['id'];

    if ($id!=false){

        deletePicture();

        $sql = $pdo->prepare('DELETE FROM `menu` WHERE `id` = :id');

        $stmnt = $sql;
        $stmnt->bindParam(':id',$id);

        if ($stmnt->execute()){
            deleteItemSucces();
        } else {
            deleteItemFailure();
        }
    }
}

// This function deletes the image from the library
function deletePicture(){
    global $pdo;
    $id = $_GET['id'];

    $sql = $pdo->prepare('SELECT picture FROM `menu` WHERE `id` = :id');
    $stmnt = $sql;
    $stmnt->bindParam(':id',$id);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data){
        unlink("../image/categories/" . $data['picture']);
    }

}

function deleteItemSucces(){
    echo '<div class="alert alert-success" role="alert">Item is succesvol verwijderd!</div>';
}

function deleteItemFailure(){
    echo '<div class="alert alert-danger" role="alert">Item is niet succesvol verwijderd!</div>';
}

//This function shows the reservations of the user he/she has made
function showAllOrders(){
    global $pdo;
//    $today = date("Y-m-d");

    $sql = $pdo->prepare("SELECT * FROM `bestelling` ORDER BY orderDate DESC");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($result)){
        foreach ($result as $data) {

            ?>
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <div class='bestelling'>
                <ol>Naam: <?= $data['name'] ?></ol>
                <ol>Email: <?= $data['email'] ?></ol>
                <ol>Adres: <?= $data['adres'] ?></ol>
<!--                <ol>Bestelling: --><?//= print_r()?><!--</ol>-->
              </div>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div><?php
        }
    } else{
        echo "oopsie";
    }
}