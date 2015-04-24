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

<?php
   session_start(); //starts the session
   if($_SESSION['tutoruser']){ // checks if the user is logged in  
   }
   else{
      header("location: tutorhome.php"); // redirects if user is not logged in
   }
   $tutoruser = $_SESSION['tutoruser']; //assigns user value
   ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<center>
<h1> Please Enter The Details </h1>
<div style = "padding:10px">
</div>
<div id = "header-wrapper">
<div style = "padding: 30px">
 
<form action="createsessio	ns.php" method="POST">
<h1> Session Details: </h1>
<p> </p>
<h2> Session Name </h2>
<input type="text" name="sessname" placeholder="Session Name" required>
<h2> Session Description </h2>
<textarea name="sessdesc">Session Notes</textarea>
<h2> Session Notes </h2>
<textarea name="sessnotes">Session Notes</textarea>
<h2> Session Date and Time (2015-04-24 13:00:00 format) </h2>
<input type="text" name="sessdateandtime" placeholder="YYYY-MM-DD HH:MM:SS" required>
<h2> Session Duration </h2> 
<input type="text" name="sessduration" placeholder="HH:MM:SS" required>
<h2> Select Series Type</h2> 
<select name="sesstype">
	<option value="1">Yoga </option>
	<option value="2">Circuits </option>
	<option value="3">Personal training</option>
</select>	
<h2> Session Price</h2> 
<input type="text" name="sessprice" placeholder="£xx.xx" required>
	<h2> Click to Create Session </h2>
<input type="submit" value="Create"/>
</div>
</center> 


</form>
</div>
</div>

<div style="padding:20px">
<center><button><a href ="tutorhome.php"><h2> Click here to return</h2> </a></button> </center>
</div>

<div id="copyright" class="container">
  <p>&copy; ElliottDavidson. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div></body>
</html>

<?php 
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$sessname = mysql_real_escape_string($_POST['sessname']);
	$sessdesc = mysql_real_escape_string($_POST['sessdesc']);
	$sessnotes = mysql_real_escape_string($_POST['sessnotes']);
	$sessdateandtime = mysql_real_escape_string($_POST['sessdateandtime']);
	$sessduration = mysql_real_escape_string($_POST['sessduration']);
	$sesstype = mysql_real_escape_string($_POST['sesstype']);
	$sessprice = mysql_real_escape_string($_POST['sessprice']);
	$bool = true;
	
	$tutorname = $_SESSION['tutoruser'];
	
    mysql_connect("localhost", "root", "") or die("cannot connect to server");
	mysql_select_db("gym") or die("cannot select db");
	
	$query = "SELECT `Tutorverified` FROM `tutor` WHERE `TutorUsername`= '$tutoruser' ";
	$result = mysql_query($query);
	
	while ($row = mysql_fetch_assoc($result)) {
   
    $currentstatus = $row['Tutorverified'];
	}
	
	$query2 = "SELECT `Sessiondate` FROM `sessions`";
	$result2 = mysql_query($query2);
	
	$clashing = FALSE;
	while ($checker = mysql_fetch_assoc($result2)){
	if ($checker == $currentclash){
		$clashing = TRUE;
	}
	}
	if ($currentstatus == 'Yes' && $clashing == FALSE) {
		mysql_query("INSERT INTO `sessions`	(`Sessionnotes`, `Sessionduration`, `Sessiondate`, `SeriesID`) VALUES
		('$sessprice','$sessname','$sessdesc', '$sessnotes','$sessduration', '$sessdateandtime','$sesstype')");
	
		$query = mysql_query("SELECT `SessionID` FROM `sessions` WHERE `Sessioname` = '$sessname'");
		$row = mysql_fetch_array($query);
		$selector = $row[0]; // wont ever return more than 1 value, uniquie

		mysql_query("INSERT INTO `tutorsesjoin`(`TutorUsername`, `SessionID`) VALUES ('$tutorname' ,'$selector')");
	
		Print '<script>alert("Session created");</script>';
	
	} 
	elseif ($currentstatus == 'No'){
		Print '<script>alert("Please get verified before creating sessions");</script>';
		
	}
	else
		Print '<script>alert("Please check dates, there is a schedule clash");</script>';
	

}
?>