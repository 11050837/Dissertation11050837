<?php

session_start();
$recordfinder = mysql_real_escape_string($_POST['recordnumber']);
$_SESSION['record'] = $recordfinder;
 

header("location: adminpage.php");
?>

