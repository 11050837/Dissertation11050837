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
  if($_SESSION['aduser']){ // checks if the user is logged in  
  }
  else{
      header("location: index.php"); // redirects if user is not logged in
  }
    
	$recordselector = $_SESSION['record'];
	
	if ($recordselector == 0){
		$recordselector = 1;
	}
	print $recordselector;
	
    mysql_connect("localhost", "root", "") or die("cannot connect to server");
	mysql_select_db("gym") or die("cannot select db");
	$query = "SELECT * FROM `tutor` WHERE `TutorID`= '$recordselector' ";
	$result = mysql_query($query);

	
	while ($row = mysql_fetch_assoc($result)) {
   
	$currentID = $row['TutorID'];
    $currentusername = $row['TutorUsername'];
    $currentfirstname = $row['TutorFirstname'];
    $currentSurname =  $row['TutorSurname'];
	$currentaddress = $row['TutorAddress'];
	$currentnumber1 = $row['TutorNumber1'];
	$currentnumber2= $row['TutorNumber2'];
	$currentDoB = $row['TutorDOB'];
	$currentemail = $row['TutorEmail'];
	$currentpassword = $row['TutorPassword'];
	$currentstatus = $row['Tutorverified'];

	}	
	 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$tutpassword = mysql_real_escape_string($_POST['tutpassword']);
	if ($tutpassword == ""){
		$tutpassword= $currentpassword;
	}
	
	$tutsurname = mysql_real_escape_string($_POSaT['tutorSurname']);
	if ($tutsurname == ""){
		$tutsurname= $currentSurname;
	}
	$tutfirstname = mysql_real_escape_string($_POST['tutorFirstname']);
	if ($tutfirstname == ""){
		$tutfirstname= $currentfirstname;
	}
	$tutnumber1 = mysql_real_escape_string($_POST['tutorprimnumber']);
	if ($tutnumber1== ""){
		$tutnumber1= $currentnumber1;
	}
	$tutnumber2 = mysql_real_escape_string($_POST['tutorsecondnumber']);
	if ($tutnumber2 == ""){
		$tutnumber2= $currentnumber2;
	}
	$tutemail = mysql_real_escape_string($_POST['tutoremail']);
	if ($tutemail == ""){
		$tutemail= $currentemail;
	}
	$tutdob = mysql_real_escape_string($_POST['tutorDateofbirth']);
	if ($tutdob == ""){
		$tutdob= $currentDoB;
	}
	$tutaddress = mysql_real_escape_string($_POST['tutoraddress']);
	if ($tutaddress == ""){
		$tutaddress= $currentaddress;
	}
	$tutstatus = mysql_real_escape_string($_POST['tutorverified']);
	$bool = true;


	mysql_query("UPDATE `tutor` SET `TutorFirstname`= '$tutfirstname' ,`TutorSurname`= '$tutsurname',`TutorPassword`= '$tutpassword',`TutorNumber1`= '$tutnumber1',`TutorNumber2`='$tutnumber2',`TutorEmail`='$tutemail',`TutorAddress`='$tutaddress',`TutorDOB`='$tutdob',`Tutorverified`='$tutstatus' WHERE `TutorID` = '$recordselector'");
		
	//Print '<script>alert("Update Complete");</script>';
	//Print '<script>window.location.assign("home.php");</script>';
}
   ?>


</head>

<body>
<center>
<div style = "padding:10px">
</div>
<div id = "header-wrapper">
<div style = "padding: 30px">
 
<form action="adminpage.php" method="POST">
<h2>Id & Username cannot be changed </h2>
<h2> Tutor First Name </h2>
<input type="text" name="tutorFirstname" placeholder="<?PHP Print $currentfirstname ?>">
<h2> Tutor Surname </h2>
<input type="text" name="tutorSurname" placeholder="<?PHP Print $currentSurname ?>" >
<h2> Tutor Address </h2>
<input type="text" name="tutoraddress" placeholder="<?PHP Print $currentaddress ?> " >
<h2> Tutor Primary Telephone Number </h2>
<input type="text" name="tutorprimnumber" placeholder="<?PHP Print $currentnumber1 ?>" >
<h2> Tutor Secondary Telephone Number </h2> 
<input type="text" name="tutorsecondnumber" placeholder="<?PHP Print $currentnumber2 ?>" >
<h2> Tutor Date of Birth</h2>
<input type="text" name="tutorDateofbirth" placeholder="<?PHP Print $currentDoB ?>">
<h2> Tutor Email Address </h2>  
<input type="email" name="tutoremail" placeholder="<?PHP Print $currentemail ?>">
<h2> Tutor Password</h2> 
<input type="sub" name="tutpassword" placeholder="<?PHP Print $currentpassword ?>">
<h2> Verification Status (Click to Verify)</h2> 
<select name="tutorverified">
	<option value="<?PHP $currentstatus ?>"><?PHP print $currentstatus ?> </option>
	<option value="No"> No </option>
	<option value="Yes"> Yes </option>
</select>	
	<h2> Click to update </h2>
<input type="submit" value="Update"/>

</div>
</form>
<h2>Type in the Record ID you would like to see</h2>
<<form action="recordfinder.php" method="POST">
<input type="text" name="recordnumber" placeholder="<?PHP Print $recordselector ?>" >
<input type="submit" value="Update"/>
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