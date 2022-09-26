<?php

echo "Hello World 127!";




//connection
$user = "azure";
$password = "6#vWHD_$";

//demo
session_start();

$db_name_normal = "localdb";


$mysqli = new mysqli('127.0.0.1',$user, $password, $db_name_normal);

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