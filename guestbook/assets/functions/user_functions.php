<html>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
</html>

<?php
require_once('config.php');
require_once('User.php');
include_once('login_functions.php');

function deleteProfile(){
    global $pdo;
    $id = $_SESSION['user']->id;

    if ($id!=false){
        $sql = $pdo->prepare('DELETE FROM `user` WHERE `id` = :id');

        $stmnt = $sql;
        $stmnt->bindParam(':id',$id);


        if ($stmnt->execute()){
            logout();
        } else {
            echo "fail";
        }

    }
}

function makeMemberReservation(){
    global $pdo;

    if (isset($_POST['submit'])) {

        $name = $_SESSION['user']->name;
        $email = $_SESSION['user']->email;
        $persons = $_POST['persons'];
        $message = $_POST['message'];
        $time = $_POST['time'];
        $user_id = $_SESSION['user']->id;
        $vandaag = date("Y-m-d");
        $maxDatum = date("2022-10-31");

        if (!empty($name) && !empty($email) && !empty($message) && !empty($time) && !empty($persons)){
            if ($vandaag <= $message && $message <= $maxDatum){
                if ($persons >= 1 && $persons <= 100){
                    $sth = $pdo->prepare("INSERT INTO reservation(name,email,persons,message,time,user_id) VALUES (:name,:email,:persons,:message,:time,:user_id)");
                    $sth->bindParam("name", $name);
                    $sth->bindParam("email", $email);
                    $sth->bindParam("persons", $persons);
                    $sth->bindParam("message", $message);
                    $sth->bindParam("time", $time);
                    $sth->bindParam("user_id", $user_id);
                    $sth->execute();

                    showRecentReservation();
                    echo '<div class="alert alert-success" role="alert">Reservering is succesvol geplaatst!</div>';
                    countUserReservation();
                } else {
                    echo '<div class="alert alert-danger" role="alert">Invoer voldoet niet aan de eisen!</div>';
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">U kunt voor vandaag en een maand vooruit reserveren!</div>';
            }
        }
    }

}

function showRecentReservation(){
    echo "<h4>Beste " . $_SESSION['user']->name . " u heeft op " . date("d-m-Y") . " om "  . date("H:i:s") . " gereserveerd, zie hieronder uw reservatie.</h4><br>";
    echo"
                <table>
                  <tr>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Personen</th>
                    <th>Dag</th>
                    <th>Tijd</th>
                  </tr>
                  <tr>
                    <td>". $_SESSION['user']->name ."</td>
                    <td>". $_SESSION['user']->email ."</td>
                    <td>". $_POST['persons'] ."</td>
                    <td>". $_POST['message'] ."</td>
                    <td>". $_POST['time'] ."</td>
                  </tr>
                </table>        
            ";
}


//This function shows the reservations of the user he/she has made
function showMemberReservations(){
    global $pdo;
    $user_id = $_SESSION['user']->id;

    $sql = $pdo->prepare("SELECT * FROM `reservation` WHERE `user_id`=:u ORDER BY message DESC");
    $sql->bindValue(":u", $user_id);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($result)){
        echo"<table>
                  <tr>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Personen</th>
                    <th>Dag</th>
                    <th>Tijd</th>
                    <th>Geplaatst op</th>
                  </tr>";
        foreach ($result as $data){
            echo"
                  <tr>
                    <td>". $data['name'] ."</td>
                    <td>". $data['email'] ."</td>
                    <td>". $data['persons'] ."</td>
                    <td>". $data['message'] ."</td>
                    <td>". $data['time'] ."</td>
                    <td>". $data['date'] ."</td>
                  </tr>
            ";
        }
        echo"
        </table>        
        <br><br>
        ";

    } else{
//        Niets
    }
}


//This function displays the amount of reservations made by the user
function countMemberTotalReservations(){
    global $pdo;
    $email = $_SESSION['user']->email;
    $user_id = $_SESSION['user']->id;
    $userTotalReservations = 0;

    $sql = $pdo->prepare("SELECT * FROM reservation WHERE `email`=:e AND `user_id`=:u ORDER BY date DESC");
    $sql->bindValue(":e", $email);
    $sql->bindValue(":u", $user_id);
    $sql->execute();

    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data) {
        $userTotalReservations++;
    }
    echo "<h6>Uw reservaties: " . $userTotalReservations . "</h6>";
}

//This function adds up the number of reservations of the user
function countUserReservation(){
    global $pdo;
    $email = $_SESSION['user']->email;
    $id = $_SESSION['user']->id;
    $userReservations = 0;

    $sql = $pdo->prepare("SELECT * FROM reservation WHERE `email`=:e AND `user_id`=:u ORDER BY date DESC");
    $sql->bindValue(":e", $email);
    $sql->bindValue(":u", $id);
    $sql->execute();

    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $data) {
        $userReservations++;
    }

    $sth = $pdo->prepare('UPDATE `user` SET `reservations`=:r WHERE `id`=:i');

    $sth->bindValue(":r",$userReservations);
    $sth->bindValue(":i",$id);
    $sth->execute();
}

// With this function you can add a review
function addReview(){
    global $pdo;

    if (isset($_POST['submit'])) {
        $email = $_SESSION['user']->email;
        $message = $_POST['message'];
        $stars = $_POST['stars'];
        $user_id = $_SESSION['user']->id;

        if (!empty($message) && !empty($email) && !empty($stars)){
            if ($stars >= 1 && $stars <= 10){
                $sth = $pdo->prepare("INSERT INTO review(email,stars,message,user_id) VALUES (:email,:stars,:message,:user_id)");
                $sth->bindParam("email", $email);
                $sth->bindParam("stars", $stars);
                $sth->bindParam("message", $message);
                $sth->bindParam("user_id", $user_id);
                $sth->execute();

                echo '<div class="alert alert-success" role="alert">Review is succesvol geplaatst!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Invoer voldoet niet aan de eisen!</div>';
            }
        }
    } elseif (isset($_POST['submit'])){
        echo "hiero";
    } else{

    }
}

// This function shows all the orders the member has made
function showMemberOrders(){
    global $pdo;
    $user_id = $_SESSION['user']->id;
    $totalOrders = 0;

    $sql = $pdo->prepare("SELECT * FROM `bestelling` WHERE `user_id`=:u");
    $sql->bindValue(":u", $user_id);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($result)){
        echo"<table>
                  <tr>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Adres</th>
                    <th>Gerecht</th>
                    <th>Prijs</th>
                    <th>Aantal</th>
                    <th>Totale prijs</th>
                  </tr>";
        foreach ($result as $data){
            $totalOrders++;
            echo"
                  <tr>
                    <td>". $data['name'] ."</td>
                    <td>". $data['email'] ."</td>
                    <td>". $data['adres'] ."</td>
                    <td>". $data['dish'] ."</td>
                    <td>&euro;". $data['price'] ."</td>
                    <td>". $data['quantity'] ."x</td>
                    <td>&euro; ". $data['totalPrice'] ."</td>
                  </tr>
            ";
        }
        echo"
        </table>        
        <br><br>
        ";

    } else{
//        Niets
    }
}

function countMemberTotalOrders(){
    global $pdo;
    $email = $_SESSION['user']->email;
    $user_id = $_SESSION['user']->id;
    $userTotalOrders = 0;

    $sql = $pdo->prepare("SELECT * FROM bestelling WHERE `email`=:e AND `user_id`=:u");
    $sql->bindValue(":e", $email);
    $sql->bindValue(":u", $user_id);
    $sql->execute();

    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $data) {
        $userTotalOrders++;
    }
    echo "<h6>Uw bestellingen: " . $userTotalOrders . "</h6>";
}


function sendMail(){
    // Set up parameters
    $to = "pofowebsite_contakt@outlook.com";
    $subject = "Your password";
    $message = "<p>Hello,</p>
<p>Thanks for registering.</p>
<p>Your password is: <b>1234</b></p>
";
    $from = "ian@example.com";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    $headers .= "From: $from" . "\r\n";

// Send email
    mail($to,$subject,$message,$headers);

// Inform the user
    echo "Thanks for registering! We have just sent you an email with your password.";
}