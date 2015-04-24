<?php

$host="localhost";
$username="root";
$password="";
$db_name="gym";

mysql_connect("$host", "$username", "$password") or die("cannot connect to server");
mysql_select_db("$gym") or die("cannot select db");
?>
