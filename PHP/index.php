<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="Startseite-design.css" type="text/css">
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body class="body">
    <?php
    error_reporting(E_ALL); //anzeigen von Fehlern
    ini_set('display_errors', 'on');

    if(isset($_POST['submit'])){
      require('MySql.php');
      $stmt = $mysql->prepare("SELECT * FROM t_login WHERE Benutzername = :user"); //Username ueberpruefen
      $stmt->bindParam(":user", $_POST["username"]);
      $stmt->execute();
      $count = $stmt->rowCount();
      if($count == 1){
        //Username ist frei
        $row = $stmt->fetch(); //Passwort ueberpruefung
        echo $_POST["pw"];
        if($_POST["pw"] == $row["Passwort"]){
          session_start();
          $_SESSION["username"] = $row["Benutzername"];

          if (strpos($row["Benutzername"], 'A_') === 0) {  //Unterscheidung zwischen Arzt und Patient
            header("Location: aerzte.php");
          }elseif (strpos($row["Benutzername"], 'P_') === 0) {
            header("Location: patient.php");
        }else {
          echo "Benutzername oder Passwort ist falsch";
        }


        } else {
          echo "Das Passwort ist falsch";
        }
      } else {
        echo "Kein Ergebnis gefunden";
      }
    }
     ?>
    <h1>Anmelden</h1>
    <form action="index.php" method="post">
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="password" name="pw" placeholder="Passwort" required><br>
      <button type="submit" name="submit">Einloggen</button>
    </form>
    <br>

  </body>
</html>
