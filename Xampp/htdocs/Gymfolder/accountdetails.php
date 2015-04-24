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
<?PHP
   session_start(); //starts the session
   if($_SESSION['custuser']){ // checks if the user is logged in  
   }
   else{
      header("location: index.php"); // redirects if user is not logged in
   }
   $custuser = $_SESSION['custuser']; //assigns user value
   
   
    mysql_connect("localhost", "root", "") or die("cannot connect to server");
	mysql_select_db("gym") or die("cannot select db");
	$query = "SELECT `CustFirstname`, `CustSurname`, `Custusername`, `Custpassword`, `Custnumber1`, `Custnumber2`, `CustEmail`, `Custaddress`, `CustDob` FROM `customer` WHERE `Custusername`= '$custuser' ";
	$result = mysql_query($query);
	
	while ($row = mysql_fetch_assoc($result)) {
   
    $currentfirstname = $row['CustFirstname'];
    $currentSurname =  $row['CustSurname'];
	$currentaddress = $row['Custaddress'];
	$currentnumber1 = $row['Custnumber1'];
	$currentnumber2= $row['Custnumber2'];
	$currentDoB = $row['CustDob'];
	$currentemail = $row['CustEmail'];
	$currentpassword = $row['Custpassword'];
	}

	print $currentfirstname;
	
	 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$custpassword = mysql_real_escape_string($_POST['custpassword']);
	$custsurname = mysql_real_escape_string($_POST['custSurname']);
	$custfirstname = mysql_real_escape_string($_POST['custFirstname']);
	$custnumber1 = mysql_real_escape_string($_POST['custprimnumber']);
	$custnumber2 = mysql_real_escape_string($_POST['custsecondnumber']);
	$custemail = mysql_real_escape_string($_POST['custemail']);
	$custdob = mysql_real_escape_string($_POST['custDateofbirth']);
	$custaddress = mysql_real_escape_string($_POST['custaddress']);
	$bool = true;
	
	print $custpassword;
	mysql_query ("UPDATE `customer` SET`CustFirstname`= '$custfirstname' ,`CustSurname`= '$custsurname',`Custpassword`= '$custpassword',`Custnumber1`= '$custnumber1',`Custnumber2`='$custnumber2',`CustEmail`='$custemail',`Custaddress`='$custaddress',`CustDob`='$custdob' WHERE `Custusername` = '$custuser'");
		
	Print '<script>alert("Update Complete");</script>';
	Print '<script>window.location.assign("home.php");</script>';
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
<input type="text" name="custFirstname" placeholder="<?PHP Print $currentfirstname ?>" required>
<h2> Your Surname </h2>
<input type="text" name="custSurname" placeholder="<?PHP Print $currentSurname ?>" required>
<h2> Your Address </h2>
<input type="text" name="custaddress" placeholder="<?PHP Print $currentaddress ?> " required>
<h2> Your Primary Telephone Number </h2>
<input type="text" name="custprimnumber" placeholder="<?PHP Print $currentnumber1 ?>" required>
<h2> Your Secondary Telephone Number </h2> 
<input type="text" name="custsecondnumber" placeholder="<?PHP Print $currentnumber2 ?>" required>
<h2> Your Date of Birth</h2>
<input type="text" name="custDateofbirth" placeholder="<?PHP Print $currentDoB ?>" required>
<h2> Your Email Address </h2>  
<input type="email" name="custemail" placeholder="<?PHP Print $currentemail ?>" required>
<h2> Your Password</h2> 
<input type="password" name="custpassword" placeholder="<?PHP Print $currentpassword ?>" required>
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

