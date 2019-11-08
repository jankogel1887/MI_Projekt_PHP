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
      $stmt = $mysql->prepare("SELECT * FROM t_login WHERE Benutzername = \':user\' AND Passwort = \':password\'"); //Username überprüfen
      $stmt->bindParam(":user", $_POST["username"]);
      $stmt->bindParam(":password", $_POST["pw"]);
      $stmt->execute();
      $count = $stmt->rowCount();
      echo $stmt;
      if($count == 1){
        header("Location: /test.html");
      } else {
        //echo "Der Login ist fehlgeschlagen";
      }
    }
     ?>
    <h1>Anmelden</h1>
    <form action="login.php" method="post">
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="password" name="pw" placeholder="Passwort" required><br>
      <button type="submit" name="submit">Einloggen</button>
    </form>
    <br>
    <a href="register.php">Noch keinen Account?</a><br>
  </body>
</html>
