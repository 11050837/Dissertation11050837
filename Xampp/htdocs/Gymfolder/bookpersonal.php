
   
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
<?php
   session_start(); //starts the session
   if($_SESSION['custuser']){ // checks if the user is logged in  
   }
   else{
	  $redirection = "bookpersonal.php";
	  $_SESSION['redirect'] = $redirection;
      header("location: customerloginredirect.php"); // redirects if user is not logged in
   }
   $custuser = $_SESSION['custuser']; //assigns user value
   mysql_connect("localhost", "root", "") or die("cannot connect to server");
   mysql_select_db("gym") or die("cannot select db");
   $query ="SELECT `Sessioname`,`Price`,`Sessiondesc`,`Sessionduration`,`Sessiondate` FROM `sessions`  WHERE (`Sessiondate` > NOW()) AND (`SeriesID` ='3') ORDER BY `Sessiondate` DESC ";
   $custtimetable = mysql_query($query);
 
   ?>

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

<div style = "padding:10px">
</div>
<div id = "header-wrapper">
<div id="logo">
			<h1><p>Manchester Yoga &amp; Health Club</p>
			<p>-Contact Information</p>
			</h1>
		</div>
<div style = "padding: 140px">

</div> 
</div>

<div style ="padding: 30px">
</div>

<center>
<table width="600" border = "1" cellpadding = "1" cellspacing = "1">
<tr>
<th>Session Name</th>
<th>Session Description</th>
<th>Session Duration</th>
<th>Sessiondate</th>
<th>Price</th>
<th>Select Session
<tr>

<?php

echo "<form action='bookyoga.php' method='POST'>";

while ($timetable=mysql_fetch_assoc($custtimetable)){
	echo "<tr>";
	
	echo "<td>".$timetable['Sessioname']."</td>";
	
	echo "<td>".$timetable['Sessiondesc']."</td>";
	
	echo "<td>".$timetable['Sessionduration']."</td>";
	
	echo "<td>".$timetable['Sessiondate']."</td>";
	
	echo "<td>".$timetable['Price']."</td>";
	
	echo "<td><button name='booksession' type='submit' value='". $timetable['Sessioname'] . "'>Book Session</button></td>";
		
	echo "</tr>";
	
}
echo "</form>";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$Sessionname= mysql_real_escape_string($_POST['booksession']);
	// $custuser in place
	
	
	mysql_query("INSERT INTO `attendance` (`customerusername`, `sessionname`) VALUES ('$custuser', '$Sessionname')");
		
	Print '<script>alert("Session Booked");</script>';
	Print '<script>window.location.assign("home.php");</script>';
}

?>

</table>
</center>

<div style="padding:20px">
<center><button><a href ="tutorhome.php"><h2> Click here to return</h2> </a></button> </center>
</div>

<div id="copyright" class="container">
  <p>&copy; ElliottDavidson. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>