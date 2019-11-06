<?php
$host = "remotemysql.com:3306/teBkBlukHH";
$name = "test";
$user = "teBkBlukHH";
$passwort = "73jEmTvhoK";
try{
    $mysql = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
} catch (PDOException $e){
    echo "SQL Error: ".$e->getMessage();
}
 ?>
