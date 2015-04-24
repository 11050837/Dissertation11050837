<?php
    session_start();
    $adusername = mysql_real_escape_string($_POST['adminusername']);
    $adpassword = mysql_real_escape_string($_POST['adminpassword']);
    $bool = true;
	
    mysql_connect("localhost", "root", "") or die("cannot connect to server");
	mysql_select_db("gym") or die("cannot select db");
    $query = mysql_query("SELECT * FROM admin WHERE adusername = '$adusername' "); // Query the users table
    $exists = mysql_num_rows($query);//Checks if username exists
    $table_users = "";
    $table_password = "";
    if($exists > 0) //IF there are no returning rows or no existing username
    {
       while($row = mysql_fetch_assoc($query)) // display 	all rows from query
       { 	 	
          $table_users = $row['adusername']; // the first username row is passed on to $table_users, and so on until the query is finished
          $table_password = $row['adpassword']; // the first password row is passed on to $table_password, and so on until the query is finished
       }
       if(($adusername == $table_users) && ($adpassword == $table_password))// checks if there are any matching fields
       {
          if($adpassword == $table_password)
          {
             $_SESSION['aduser'] = $adusername; //set the username in a session. This serves as a global variable
			 $_SESSION['record'] = 1;
             header("location: adminpage.php"); // redirects the user to the authenticated home page
          }
       }
       else
       {
        Print '<script>alert("Incorrect Password!");</script>'; // Prompts the user
		Print '<script>window.location.assign("adminlogin.php");</script>'; // redirects to login.php
       }
    }
		else
	{
       Print '<script>alert("Incorrect username!");</script>'; // Prompts the user
       Print '<script>window.location.assign("adminlogin.php");</script>'; // redirects to login.php
    }
	
?>