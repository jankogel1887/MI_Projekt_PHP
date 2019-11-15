<!DOCTYPE>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<font face="Verdana" >
</head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<div id="head" align="center"  >
  <a href="www.google.de"><img src="" alt="logo" align="left"
  height="85" width="100"  ></a>
  <li id="titel"><a
     style="text-decoration:none"
     style="font-size:10vw"
	 href="www.google.de">
     <font color="black">
     <b>WELTGESUNDHEITSORGANISATION <br> <br> eImpfpass</b></a></li>
</div>
<body class="body">
<hr> <!--Horizonatl line -->

<div id="reiter" >
<li id="arzt"><a
    style="text-decoration:none"
    href="aerzte.php"
	><font color="black">Ärzte</a></li>
<li id="patient"><a
    style="text-decoration:none"
    href="patienten.php"><font color="black">Patienten</a></li>
<li id="impfung"><a
    style="text-decoration:none"
    href="impfungen.php"><font color="black">Impfungen</a></li>
<div id="Inhalt" align="center">

  <br><br>
  <p> <h1><b>Datenbank</b><h1><p>
  <!--<div class="linien" ></div>  -->
  <div class="wrap">
   <div class="search">
     <form action="aerzte.php" method="post">
      <input type="text" name="searchfield" class="searchTerm" placeholder="Suchbegriff eingeben" style="float: right"></input>
      <button type="submit" name="submitsearch" class="searchButton">suchen</button>
    </form>
   </div>
</div>

  <?php
  error_reporting(E_ALL);
  ini_set('display_errors', 'on');
  if(isset($_POST['submitsearch'])){
    require('MySql.php');
    $stmt = $mysql->prepare("SELECT * FROM t_aerzte WHERE aname = :search2 OR avorname = :search2 OR afachgebiet = :search2 OR aplz = :search2 OR aid = :search2 OR aort = :search2 OR aid = :search2");
    $stmt->bindParam(":search2", $_POST["searchfield"]);
    $stmt->execute();
    //https://stackoverflow.com/questions/15251095/display-data-from-sql-database-into-php-html-table
    echo "<h2>Ergebnisse: </h2>";
    $users = $stmt->fetchAll();

    if(count($users) >= 1) {
      echo "<h3>Ärzte</h3>";
      echo "<table>";
      echo "<tr id=\"trTop\"><td>ID</td><td>Nachname</td><td>Vorname</td><td>Fachgebiet</td><td>Strasse</td><td>PLZ</td><td>Ort</td></tr>";
      foreach ($users as $row) {
        echo "<tr><td>" . $row['aid'] . "</td><td>" . $row['aname'] . "</td><td>" . $row['avorname'] . "</td><td>" . $row['afachgebiet'] . "</td><td>" . $row['astrasse'] . "</td><td>" . $row['aplz'] . "</td><td>" . $row['aort'] . "</td></tr>";
      }
      echo "</table>";
    }

  }
  ?>
  <br>
  <div class="linien" ></div>
</body>
