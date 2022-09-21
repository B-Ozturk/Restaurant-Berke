<?php
include_once("./adminStructure.php");
?>
<html>
<div class="container">
    <h3 class="text-center">Profiel gegevens</h3>
</div>

<table class="table align-middle">
    <thead>
    <tr>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Email:</td>
        <td><?= $_SESSION['user']->email ?></td>
    </tr>
    <tr>
        <td>Name:</td>
        <td><?= $_SESSION['user']->name ?></td>
    </tr>
    </tbody>
</table>

<center>
    <a type="button" class="btn btn-primary btn-sm px-3" href="../admin/editProfile.php">Profiel aanpassen</a>
    <a type="button" class="btn btn-danger btn-sm px-3" href="../admin/changePassword.php">Wachtwoord aanpassen</a>
</center>
</html>