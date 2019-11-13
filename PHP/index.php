<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    if(isset($_POST['submit'])){
      require('MySql.php');
      $stmt = $mysql->prepare("SELECT * FROM t_login WHERE Benutzername = :user"); //Username überprüfen
      $stmt->bindParam(":user", $_POST["username"]);
      $stmt->execute();
      $count = $stmt->rowCount();
      if($count == 1){
        //Username ist frei
        $row = $stmt->fetch();
        echo $_POST["pw"];
        if($_POST["pw"] == $row["Passwort"]){
          session_start();
          $_SESSION["username"] = $row["Benutzername"];
          header("Location: geheim.php");
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
    <a href="register.php">Noch keinen Account?</a><br>
  </body>
</html>
