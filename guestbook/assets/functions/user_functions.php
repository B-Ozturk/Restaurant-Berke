<html>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
</html>

<?php
require_once('config.php');
require_once('User.php');
include_once('login_functions.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require '../../../vendor/autoload.php';

// This function lets the member delete his/her p
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

// With this function the member can make a reservation
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

                    if ($sth->execute()){
                        showRecentReservation();
                        countUserReservation();
                        if (sendReservationMail()){
                            return '<div class="alert alert-success" role="alert">Reservering is succesvol geplaatst!</div>';
                        }
                    }
                } else {
                    echo '<div class="alert alert-danger" role="alert">Invoer voldoet niet aan de eisen!</div>';
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">U kunt voor vandaag en een maand vooruit reserveren!</div>';
            }
        }
    }

}

// This function shows the recent reservation the member has made
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
    error_reporting(0);

    $sql = $pdo->prepare("SELECT * FROM `bestelling` WHERE `user_id`=:u");
    $sql->bindValue(":u", $user_id);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($result)){
        foreach ($result as $data){
            // Unserialize
            $arr_unserialize1 = unserialize($data['bestelling']);

            // Display
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                  <div class='bestelling'>";
            echo "<ol>Naam: " . $data['name'] . "</ol>";
            echo "<ol>Email: " . $data['email'] . "</ol>";
            echo "<ol>". $data['adres'] . "</ol>";
            echo "<ol>Bestelt op: " . $data['orderDate'] . "</ol>";
            echo var_export($arr_unserialize1);
            echo "</div>
                  </div>";
        }
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

// This mail sends an email when a member makes a reservation
function sendReservationMail(){
    $mail = new PHPMailer(false);

    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'smtp.office365.com;';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'bko_website@outlook.com';
        $mail->Password   = 'NietBiggieDoen_3844';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $to = $_SESSION['user']->email;
        $toName = $_SESSION['user']->name;

        $day = $_POST['message'];
        $time = $_POST['time'];
        $timeStamp = date('Y-m-d H:i:s');

        $mail->setFrom('bko_website@outlook.com', 'Restaurant Berke');
        $mail->addAddress($to);
        $mail->addAddress($to, $toName);
        $mail->isHTML(true);
        $mail->Subject = 'Reservering | Restaurant Berke';
        $mail->Body    = 'Beste '. $toName .',<br><br>U heeft op '. $timeStamp .' gereserveerd voor ' . $day . ' om ' . $time . "<br><br>Bij Restaurant Berke";
        $mail->AltBody = 'Bevestiging van uw reservering';
        $mail->send();

        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}