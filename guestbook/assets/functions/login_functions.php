<html>
<link rel="stylesheet" href="../css/style.css">
</html>

<?php
require_once('config.php');
require_once('User.php');

session_start();

// This function checks the login
function checkLogin(){
    global $pdo;
    global  $_SESSION;

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');

    if ($email !== null && $email !== false && !empty($password)){
        $sql = 'SELECT * FROM `user` WHERE `email` = :e ';
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':e', $email);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'User');
        $sth->execute();
        $user = $sth->fetch();

        if(!empty($user)){
            $_SESSION['user'] = $user;

            if(password_verify($password, $_SESSION['user']->password)){

                if ($_SESSION['user']->role == "admin"){
                    header('Location: ./assets/admin/adminHome.php');
                } elseif ($_SESSION['user']->role == "member"){
                    header('Location: ./assets/member/memberHome.php');
                }
                else {
                    echo '<div class="alert alert-warning" role="alert">Oeps er is iets mis gegaan probeer het opnieuw!</div>';
                    include_once("./login.php");
                }
            } else{
                echo '<div class="alert alert-warning" role="alert">Ingevoerde gegevens kloppen niet!</div>';
            }
        } else {
            echo '<div class="alert alert-info" role="alert">
                    Hmm heb jij wel een account bij ons, zo niet dan kan je je gratis <a href="registration.php" class="alert-link">registreren</a>.
                  </div>';
        }
    }
}

//With this function the user can log out
function logout(){
    $_SESSION = array();
    session_destroy();
    header('Location: ../../index.php');
}

//This function registrates the user in the database
function makeRegistration(){
    global $pdo;
    global $melding;

    if (isset($_POST['submit'])){

        $name = filter_input(INPUT_POST, 'name');
        $email  = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $adres = filter_input(INPUT_POST, 'adres');
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeatPassword'];

        if (!empty($name) && !empty($email) && !empty($password) && !empty($repeatPassword) && !empty($adres)){

            if (!empty($email)){
                $sql = $pdo->prepare("SELECT * FROM `user` WHERE `email`=:e");
                $sql->bindValue(":e", $email);
                $sql->execute();
                $result = $sql->fetchAll(PDO::FETCH_ASSOC);

                if ($result){
                    echo '<div class="alert alert-danger" role="alert">Email is al geregistreerd bij ons!</div>';
                } else{
                    if ($password === $repeatPassword){
                        $password = password_hash($password, PASSWORD_DEFAULT);

                        $sth = $pdo->prepare('INSERT INTO user (email,password,name,adres,reservations,role) VALUES (?,?,?,?,0,"member")');
                        $sth->bindParam(1, $email);
                        $sth->bindParam(2, $password);
                        $sth->bindParam(3, $name);
                        $sth->bindParam(4, $adres);
                        $sth->execute();

                        echo '<div class="alert alert-success" role="alert">Profiel is succesvol aangepast!</div>';
                        header('Location: ./login.php');
                    } else {
                        echo '<div class="alert alert-warning" role="alert">Wachtwoorden komen niet overeen!</div>';
                    }
                }
            }


        } else {
            echo '<div class="alert alert-warning" role="alert">Vul alle velden in!</div>';
        }
    }
}


// With this function the user can change his/her profile
function changeProfile(){
    global $pdo;
    global $_SESSION;

    $id = $_SESSION['user']->id;
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $adres = filter_input(INPUT_POST, "adres", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (isset($_POST['profile'])){
        if (!empty($email) && !empty($name) && !empty($adres)) {

            $sth = $pdo->prepare('UPDATE `user` SET `name`=:n, `email`=:e, `adres`=:a  WHERE `id`=:i');

            $sth->bindValue(":n",$name);
            $sth->bindValue(":a",$adres);
            $sth->bindValue(":e",$email);
            $sth->bindValue(":i",$id);

            $sth->execute();

            $_SESSION['user']->email = $email;
            $_SESSION['user']->name = $name;
            $_SESSION['user']->adres = $adres;

            echo '<div class="alert alert-success" role="alert">Profiel is succesvol aangepast!</div>';
        } else {
            echo '<div class="alert alert-warning" role="alert">Oeps er is iets mis gegaan!</div>';
        }
    }


}

// This function lets the member change his/her password
function changePassword(){
    global $pdo;

    if (isset($_POST['wijzig'])) {

        $email = $_SESSION['user']->email;

        $activePassword = $_SESSION['user']->password;
        $currentPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $repeatpassword = $_POST['repeatPassword'];

        if (password_verify($currentPassword, $activePassword)) {
            if ($newPassword === $repeatpassword) {
                if (!empty($email) && !empty($newPassword)) {

                    $replacingPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                    $sth = $pdo->prepare('UPDATE `user` SET `password`=:p WHERE `email`=:e');

                    $sth->bindValue(":p",$replacingPassword);
                    $sth->bindValue(":e",$email);

                    $sth->execute();

                    $_SESSION['user']->email = $email;
                    $_SESSION['user']->password = $replacingPassword;

                    echo '<div class="alert alert-success" role="alert">Wachtwoord is succesvol gewijzigd!</div>';

                } else {
                    echo '<div class="alert alert-warning" role="alert">Vul alles goed in!</div>';
                }
            } else {
                echo '<div class="alert alert-danger" role="alert">Wachtwoorden komen niet overeen, vul alles goed in!</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Verkeerde wachtwoord, vul alles goed in!</div>';
        }
    }
}

// This function checks if the user is still logged in or not
function checkSession(){
    if (!isset($_SESSION['user']->name)) {
        echo("<script>location.href = '../../login.php';</script>");
        header("../../index.php");
    }
}