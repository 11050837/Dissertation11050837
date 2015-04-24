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
<?php
   session_start(); //starts the session
	if($_SESSION['tutoruser']){ 	
	}
   else{
      header("location:tuturhome.php"); // redirects if user is not logged in
   }
   $tutoruser = $_SESSION['tutoruser']; //assigns user value
    print $tutoruser;
   
    mysql_connect("localhost", "root", "") or die("cannot connect to server");
	mysql_select_db("gym") or die("cannot select db");
	$query = "SELECT `TutorPassword`, `TutorFirstname`, `TutorSurname`, `TutorNumber1`, `TutorNumber2`, `TutorEmail`, `TutorNotes`, `TutorAddress`, `TutorDOB` FROM `tutor` WHERE `TutorUsername`= '$tutoruser' ";
	$result = mysql_query($query);
	
	while ($row = mysql_fetch_assoc($result)) {
   
    $currentfirstname = $row['TutorFirstname'];
    $currentSurname =  $row['TutorSurname'];
	$currentaddress = $row['TutorAddress'];
	$currentnumber1 = $row['TutorNumber1'];
	$currentnumber2= $row['TutorNumber2'];
	$currentDoB = $row['TutorDOB'];
	$currentemail = $row['TutorEmail'];
	$currentpassword = $row['TutorPassword'];
	}

	
	 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$tutorpassword = mysql_real_escape_string($_POST['tutorpassword']);
	if ($tutorpassword == ""){
		$tutorpassword = $currentpassword;
	}
	$tutorsurname = mysql_real_escape_string($_POST['tutorSurname']);
	if ($tutorsurname == ""){
		$tutorsurname = $currentSurname;
	}
	$tutorfirstname = mysql_real_escape_string($_POST['tutorFirstname']);
	if ($tutorfirstname == ""){
		$tutorfirstname= $currentfirstname;
	}
	$tutornumber1 = mysql_real_escape_string($_POST['tutorprimnumber']);
	if ($tutornumber1 == ""){
		$tutornumber1= $currentnumber1;
	}
	$tutornumber2 = mysql_real_escape_string($_POST['tutorsecondnumber']);
	if ($tutornumber2 == ""){
		$tutornumber2 = $currentnumber2;
	}
	$tutoremail = mysql_real_escape_string($_POST['tutoremail']);
	if ($tutoremail == ""){
		$tutoremail = $currentemail;
	}
	$tutordob = mysql_real_escape_string($_POST['tutorDateofbirth']);
	if ($tutordob == ""){
		$tutordob = $currentDob;
	}
	$tutoraddress = mysql_real_escape_string($_POST['tutoraddress']);
	if ($tutoraddress == ""){
		$tutoraddress = $currentaddress;
	}
	$bool = true;
	
	mysql_query ("UPDATE `tutor` SET `TutorFirstname`= '$tutorfirstname' ,`TutorSurname`= '$tutorsurname', `TutorPassword`= '$tutorpassword',`TutorNumber1`= '$tutornumber1',`TutorNumber2`='$tutornumber2',`TutorEmail`='$tutoremail',`TutorAddress`='$tutoraddress',`TutorDOB`='$tutordob' WHERE `TutorUsername` = '$tutoruser'");
		
	Print '<script>alert("Update Complete");</script>';
	Print '<script>window.location.assign("tutorhome.php");</script>';
}
   ?>


</head>

<body>
<center>
<h1> Please Enter Your Details </h1>
<div style = "padding:10px">
</div>
<div id = "header-wrapper">
<div style = "padding: 30px">
 
<form action="accountdetails.php" method="POST">
<h2> Your First Name </h2>
<input type="text" name="tutorFirstname" placeholder="<?PHP Print $currentfirstname ?>" >
<h2> Your Surname </h2>
<input type="text" name="tutorSurname" placeholder="<?PHP Print $currentSurname ?>" >
<h2> Your Address </h2>
<input type="text" name="tutoraddress" placeholder="<?PHP Print $currentaddress ?> ">
<h2> Your Primary Telephone Number </h2>
<input type="text" name="tutorprimnumber" placeholder="<?PHP Print $currentnumber1 ?>" >
<h2> Your Secondary Telephone Number </h2> 
<input type="text" name="tutorsecondnumber" placeholder="<?PHP Print $currentnumber2 ?>">
<h2> Your Date of Birth</h2>
<input type="text" name="tutorDateofbirth" placeholder="<?PHP Print $currentDoB ?>">
<h2> Your Email Address </h2>  
<input type="email" name="tutoremail" placeholder="<?PHP Print $currentemail ?>">
<h2> Your Password</h2> 
<input type="password" name="tutorpassword" placeholder="<?PHP Print $currentpassword ?>" >
<h2> Username cannot be changed </h2>
<div style ="padding: 10px">
<input type="submit" value="Update"/>
</div>
</form>
</div>
</div>
<a href = "deleteaccount.php">
 <input type="submit" value="Delete Account"/></a>

<div style="padding:20px">
<center><button><a href ="tutorhome.php"><h2> Click here to return</h2> </a></button> </center>
</div> 
 
<div id="copyright" class="container">
  <p>&copy; ElliottDavidson. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div></body>
</html>

