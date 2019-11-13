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
<<<<<<< HEAD
      $stmt = $mysql->prepare("SELECT * FROM T_login WHERE Benutzername = \':user\'"); //Username überprüfen
=======

      $stmt = $mysql-> prepare('SELECT * FROM t_login WHERE Benutzername = :user'); //Username überprüfen
>>>>>>> master
      $stmt->bindParam(":user", $_POST["username"]);
      //$stmt->bindParam(":password", $_POST["pw"]);
      $stmt->execute();
      $count = $stmt->rowCount();
<<<<<<< HEAD
      if($count == 1){
        header("Location: /test.html");
=======
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

>>>>>>> master
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
