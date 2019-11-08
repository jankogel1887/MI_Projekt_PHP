<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Anmelden</title>
  </head>
  <body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

    if(isset($_POST['submit'])){
      require('MySql.php');

      $stmt = $mysql-> prepare('SELECT * FROM t_login WHERE Benutzername = :user'); //Username überprüfen
      $stmt->bindParam(":user", $_POST["username"]);
      $stmt->execute();
      $count = $stmt->rowCount();
      if($count == 0){
        //Username ist frei

          if($_POST["pw"] == $_POST["pw2"]){
            //User anlegen
            $stmt = $mysql->prepare("INSERT INTO accounts (Benutzername, Passwort_BCRYPT) VALUES (:user, :pw)");
            $stmt->bindParam(":user", $_POST["username"]);
            $hash = password_hash($_POST["pw"], Passwort_BCRYPT);
            $stmt->bindParam(":pw", $hash);
            $stmt->execute();
            echo "Dein Account wurde angelegt";
          } else {
            echo "Die Passwörter stimmen nicht überein";
          }

      } else {
        echo "Der Username ist bereits vergeben";
      }
    }
     ?>
    <h1>Account erstellen</h1>
    <form action="register.php" method="post">
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="password" name="pw" placeholder="Passwort" required><br>
      <button type="submit" name="submit">Erstellen</button>
    </form>
    <br>
    <a href="index.php">Hast du bereits einen Account?</a>
  </body>
</html>
