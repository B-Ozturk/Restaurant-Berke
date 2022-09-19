<?php

error_reporting(0);

$host = "localhost"; /* Host name */$user = "berke"; /* User */$password = "berke"; /* Password */$dbname = "berke_phplessen"; /* Database name */
$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Read record
$sql = mysqli_query($con,"SELECT * FROM bestelling ORDER BY id DESC");
while($row = mysqli_fetch_assoc($sql)){

    // Unserialize
    $arr_unserialize1 = unserialize($row['bestelling']);

    // Display
    echo "<pre>";
    echo "Naam: " . $row['name'] . "<br>";
    echo "Email: " . $row['email'] . "<br>";
//    echo $row['adres'] . "<br>";
    echo "Bestelt op: " . $row['orderDate'] . "<br>";
    echo var_export($arr_unserialize1);
//    echo implode(" ",$arr_unserialize1);
    echo "</pre><hr /><br>";
}