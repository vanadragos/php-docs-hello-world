<?php

echo "Hello World DB!";




//connection
$user = "azure";
$password = "6#vWHD_$";

//demo
session_start();

$db_name_normal = "test";


$mysqli = new mysqli('localhost',$user, $password, $db_name_normal);

$user_email = 'vanadragos@gmail.com';

$stmt = $mysqli->prepare("SELECT a.* FROM `_accounts` a 

    WHERE 1=1 and a.user_email=?  LIMIT 1") or die($mysqli->error);

//There are four possible types: i, d, s and b, which stand for integer, double, string and binary.
$stmt->bind_param("s", $user_email);

$stmt->execute();

$result = $stmt->get_result();

$stmt->close();

print 'a';

if ($result->num_rows > 0) {
    print 'b';

    $row = $result->fetch_assoc();

    print $row['user_name'];
}
?>