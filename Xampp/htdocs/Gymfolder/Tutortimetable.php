<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : FirstBase 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140404

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
   session_start(); //starts the session
   if($_SESSION['tutoruser']){ // checks if the user is logged in  
   }
   else{
      header("location: tuturhome.php"); // redirects if user is not logged in
   }
   $tutoruser = $_SESSION['tutoruser']; //assigns user value
   
   mysql_connect("localhost", "root", "") or die("cannot connect to server");
   mysql_select_db("gym") or die("cannot select db");
   $query ="SELECT `sessions`.`Sessioname`, `sessions`.`Sessiondate`, `sessions`.`Sessionduration` FROM `sessions` JOIN `tutorsesjoin` ON `tutorsesjoin`.`SessionID` WHERE (`tutorsesjoin`.`TutorUsername` ='$tutoruser') AND ( `sessions`.`SessionID` = `tutorsesjoin`.`SessionID`) AND ( `sessions`.`Sessiondate` > NOW() )";
   $tutortimetable = mysql_query($query);
 ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
</head>

<body>
<div id="header-wrapper">
<h1><center> Your timetable</center></h1>
<div style="padding: 100px">

</div>
</div>
<center>	
<div style="padding: 30px">
</div>

<table width="600" border = "1" cellpadding = "1" cellspacing = "1">
<tr>
<th>Session Name</th>
<th>Session Date</th>
<tr>

<?php

while ($timetable=mysql_fetch_assoc($tutortimetable)){
	echo "<tr>";
	
	echo "<td>".$timetable['Sessioname']."</td>";
	
	echo "<td>".$timetable['Sessiondate']."</td>";
	
		echo "<td>".$timetable['Sessionduration']."</td>";
	
	echo "</tr>";
	
}


?>

</table>
</center>

<div style="padding:20px">
<center><button><a href ="tutorhome.php"><h2> Click here to return</h2> </a></button> </center>
</div>

<div id="copyright" class="container">
  <p>&copy; ElliottDavidson. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div
></body>
</html>


