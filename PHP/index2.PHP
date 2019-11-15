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
    //$stmt = $mysql->prepare("SELECT * FROM T_Patienten WHERE pname = \':name\' OR pvorname = \':name\'");
    $stmt = $mysql->prepare("SELECT * FROM t_patienten WHERE pname = \':name\'");
    //$stmt = $mysql->prepare("SELECT * FROM t_patienten where pid = 5001");
    $stmt->bindParam(":name", $_POST["searchfield"]);
    $stmt->execute();


    //https://stackoverflow.com/questions/15251095/display-data-from-sql-database-into-php-html-table
    echo "<h2>Results: </h2>";
    $users = $stmt->fetchAll();
    echo "<table>";
    foreach ($users as $row) {
      echo "<tr><td>" . $row['pname'] . "</td><td>" . $row['pvorname'] . "</td></tr>";
    }
    echo "</table>"; //Close the table in HTML


  }
  ?>
  <br>
  <div class="linien" ></div>
</body>
