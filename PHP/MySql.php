<?php
$host = "localhost";
$name = "test";
$user = "root";
$passwort = "root";
try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
} catch (PDOException $e){
    echo "SQL Error: ".$e->getMessage();
}
 ?>
