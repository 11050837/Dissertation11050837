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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<?php
   session_start(); //starts the session
   if($_SESSION['tutoruser']){ // checks if the user is logged in  
   }
   else{
      header("location: home.php"); // redirects if user is not logged in
   }
   $tutoruser = $_SESSION['tutoruser']; //assigns user value
   ?>
<div align= "right">
		<div>
		<h2>
	<?php
	echo ("You are logged in as "); 
	echo $tutoruser;
	echo (".  ");
	?>
	</h2>
	</div>
		</div>
<body>

<div id="header-wrapper">
	<div id="header" class="container">
		
		<div id="logo">
			<h1>Manchester Yoga &amp; Health Club</h1>
		</div>
		<div id="menu">
			<ul>
				<li class="active"><a href="tutordetails.php" accesskey="1">Your account</a></li>
				<li class="active"><a href="Sessionspage.php" accesskey="2">Our Sessions</a></li>
				<li class="active"><a href="logout.php" accesskey="3" title="">Logout</a></li>
				<li class="active"><a href="tutorcustomernotes.php" accesskey="4" title="">Contact Us</a></li>
			</ul>
		</div>
	</div>

<div id="banner-wrapper">
	<div id="banner" class="container">
		<div class="title">
		  <h2>For synchronizing your body and mind</h2>
		  Or just to relax</div>
		<ul class="actions">
			<li></li>
		</ul>
	</div>
</div>
</div>


<div id="wrapper">
	<div id="three-column" class="container">
	<div class="boxA">  
		  <a href="Tutortimetable.php" class="button button-alt">View Timetable</a></div>
		<div class="boxB">		
		  <a href="createsessions.php" class="button button-alt">Create Sessions</a></div>
		<div class="boxC">
		  <a href="findus.php" class="button button-alt">Find us</a></div>
	</div>
</div>


</div>
<div id="copyright" class="container">
  <p>&copy; ElliottDavidson. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>
