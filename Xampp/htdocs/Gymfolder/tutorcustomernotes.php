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
	$query = "SELECT * FROM `customer` WHERE `CustID`= '$recordselector' ";
	$result = mysql_query($query);

	
	while ($row = mysql_fetch_assoc($result)) {
   
	$currentID = $row['CustID'];
    $currentusername = $row['Custusername'];
    $currentfirstname = $row['CustFirstname'];
    $currentSurname =  $row['CustSurname'];
	$currentnotes = $row['Custnotes'];

	}	
	 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$customernotes = mysql_real_escape_string($_POST['custnotes']);
	if ($customernotes == ""){
		$customernotes= $currentnotes;
	}
	
	
	$bool = true;


	mysql_query("UPDATE `customer` SET `Custnotes`= '$customernotes' WHERE `CustID` = '$recordselector'");
		
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
 
<form action="tutorcustomernotes.php" method="POST">

<h2> Customer First Name </h2>
<?PHP Print $currentfirstname ?>
<h2> Customer Surname </h2>
<?PHP Print $currentSurname ?>
<h2> Customer ID</h2>
<?PHP Print $currentID ?>
<h2> Customer Notes </h2>
<textarea name="custnotes"><?PHP Print $currentnotes ?></textarea>
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