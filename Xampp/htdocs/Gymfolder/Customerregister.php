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
<body>
<center>
<h1> Please Enter Your Details </h1>
<div style = "padding:10px">
</div>
<div id = "header-wrapper">
<div style = "padding: 30px">
 
<form action="Customerregister.php" method="POST">

<li><h2> Your First Name </h2>
<input type="text" name="custFirstname" placeholder="Your Firstname" required>
<h2> Your Surname </h2>
<input type="text" name="custSurname" placeholder="Your Surname" required>
<h2> Your Address </h2>
<input type="text" name="custaddress" placeholder="Your Address " required>
<h2> Your Primary Telephone Number </h2>
<input type="text" name="custprimnumber" placeholder="Your telephone number" required>
<h2> Your Secondary Telephone Number </h2> 
<input type="text" name="custsecondnumber" placeholder="Your second telephone number">
<h2> Your Date of Birth</h2>
<input type="text" name="custDateofbirth" placeholder="Your dateofbirth" required>
<h2> Your Email Address </h2>  
<input type="text" name="custemail" placeholder="Your Email" required>
<h2> Desired Username </h2> 
<input type="text" name="custusername" placeholder="Your username" required>
<h2> Desired Password</h2> 
<input type="password" name="custpassword" placeholder="Your password" required>
</li>
<div style ="padding: 5px">
<input type="submit" value="Register"/>
</div>
</center> 


</form>
</div>
</div>
<div id="copyright" class="container">
  <p>&copy; ElliottDavidson. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div></body>
</html>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$custusername = mysql_real_escape_string($_POST['custusername']);
	$custpassword = mysql_real_escape_string($_POST['custpassword']);
	$custsurname = mysql_real_escape_string($_POST['custSurname']);
	$custfirstname = mysql_real_escape_string($_POST['custFirstname']);
	$custnumber1 = mysql_real_escape_string($_POST['custprimnumber']);
	$custnumber2 = mysql_real_escape_string($_POST['custsecondnumber']);
	$custemail = mysql_real_escape_string($_POST['custemail']);
	$custdob = mysql_real_escape_string($_POST['custDateofbirth']);
	$custaddress = mysql_real_escape_string($_POST['custaddress']);
	$bool = true;
	
    mysql_connect("localhost", "root", "") or die("cannot connect to server");
	mysql_select_db("gym") or die("cannot select db");
	$query = mysql_query("SELECT * FROM `customer`");
	while($row = mysql_fetch_array($query)) 
		{
			$table_users = $row['Custusername'];
			if ($custusername == $table_users)
				{
				$bool = false;
				Print '<script>alert("Username already in use");</script>';
				Print '<script>window.location.assign("Customerregister.php");</script>';
				}
		}
	if ($bool)
	{
		mysql_query ("INSERT INTO `customer` (`CustFirstname`, `CustSurname`, `Custusername`, `Custpassword`, `Custnumber1`, `Custnumber2`, `CustEmail`,`Custaddress`, `CustDob`) VALUES
		('$custfirstname','$custsurname', '$custusername', '$custpassword','$custnumber1','$custnumber2','$custEmail','$custaddress', '$custdob')");
		
		
		Print '<script>alert("Registration Complete,");</script>';
		Print '<script>window.location.assign("index.php");</script>';
	}
	
}

?>