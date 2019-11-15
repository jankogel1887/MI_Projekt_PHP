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
    href="www.google.de"
	target="_blank"
	><font color="black">Ärzte</a></li>
<li id="patient"><a
    style="text-decoration:none"
    href="webseite"><font color="black">Patienten</a></li>
<li id="impfung"><a
    style="text-decoration:none"
    href="webseite"><font color="black">Impfungen</a></li>
<div id="Inhalt" align="center">

  <br><br>
  <p> <h1><b>Datenbank</b><h1><p>
  <br>
  <!--<div class="linien" ></div>  -->
  <div class="wrap">
   <div class="search">
     <form action="index2.php" method="post">
      <input type="text" name="searchfield" class="searchTerm" placeholder="Suchbegriff eingeben">
      <button type="submit" name="submitsearch" class="searchButton">suchen</button>
    </form>
   </div>
</div>

  <?php
  error_reporting(E_ALL);
  ini_set('display_errors', 'on');
  if(isset($_POST['submitsearch'])){
    require('MySql.php');
    $stmt = $mysql->prepare("SELECT * FROM t_patienten WHERE pname = :search OR pvorname = :search OR pplz = :search OR pstrasse = :search OR port = :search OR pid = :search");
    $stmt->bindParam(":search", $_POST["searchfield"]);
    $stmt->execute();


    $stmt2 = $mysql->prepare("SELECT * FROM t_aerzte WHERE aname = :search2 OR avorname = :search2 OR aplz = :search2 OR aid = :search2 OR aort = :search2 OR aid = :search2");
    $stmt2->bindParam(":search2", $_POST["searchfield"]);
    $stmt2->execute();

    //https://stackoverflow.com/questions/15251095/display-data-from-sql-database-into-php-html-table
    echo "<h2>Ergebnisse: </h2>";
    $users = $stmt->fetchAll();
    $users2 = $stmt2->fetchAll();

    if(count($users) >= 1) {
      echo "<h3>Patienten</h3>";
      echo "<table>";
      echo "<tr><td>ID</td><td>Nachname</td><td>Vorname</td><td>Geb. Datum</td><td>Strasse</td><td>PLZ</td><td>Ort</td></tr>";
      foreach ($users as $row) {
        echo "<tr><td>" . $row['pid'] . "</td><td>" . $row['pname'] . "</td><td>" . $row['pvorname'] . "</td><td>" . $row['pgebdat'] . "</td><td>" . $row['pstrasse'] . "</td><td>" . $row['pplz'] . "</td><td>" . $row['port'] . "</td></tr>";
      }
      echo "</table>";
    }
    echo "<br>";

    // aid, aname, avorname, afachgebiet, astrasse, aplz, aort
    // pid, pname, pvorname, pgebdat, pstrasse, pplz, port
    if(count($users2) >= 1) {
      echo "<h3>Ärzte</h3>";
      echo "<table>";
      echo "<tr><td>ID</td><td>Nachname</td><td>Vorname</td><td>Fachgebiet</td><td>Strasse</td><td>PLZ</td><td>Ort</td></tr>";
      foreach ($users2 as $row) {
        echo "<tr><td>" . $row['aid'] . "</td><td>" . $row['aname'] . "</td><td>" . $row['avorname'] . "</td><td>" . $row['afachgebiet'] . "</td><td>" . $row['astrasse'] . "</td><td>" . $row['aplz'] . "</td><td>" . $row['aort'] . "</td></tr>";
      }
      echo "</table>";
    }

  }
  ?>
  <br>
  <div class="linien" ></div>
</body>
