<?php
    session_start();
    $tutusername = mysql_real_escape_string($_POST['tutusername']);
    $tutpassword = mysql_real_escape_string($_POST['tutpassword']);
    $bool = true;
	
    mysql_connect("localhost", "root", "") or die("cannot connect to server");
	mysql_select_db("gym") or die("cannot select db");
    $query = mysql_query("SELECT * FROM tutor WHERE TutorUsername = '$tutusername' "); // Query the users table
    $exists = mysql_num_rows($query);//Checks if username exists
    $table_users = "";
    $table_password = "";
    if($exists > 0) //IF there are no returning rows or no existing username
    {
       while($row = mysql_fetch_assoc($query)) // display all rows from query
       { 	 	
          $table_users = $row['TutorUsername']; // the first username row is passed on to $table_users, and so on until the query is finished
          $table_password = $row['TutorPassword']; // the first password row is passed on to $table_password, and so on until the query is finished
       }
       if(($tutusername == $table_users) && ($tutpassword == $table_password))// checks if there are any matching fields
       {
          if($tutpassword == $table_password)
          {
             $_SESSION['tutoruser'] = $tutusername; //set the username in a session. This serves as a global variable
             header("location: tutorhome.php"); // redirects the user to the authenticated home page
          }
       }
       else
       {
        Print '<script>alert("Incorrect Password!");</script>'; // Prompts the user
		Print '<script>window.location.assign("tutorlogin.php");</script>'; // redirects to login.php
       }
    }
		else
	{
      Print '<script>alert("Incorrect username!");</script>'; // Prompts the user
      Print '<script>window.location.assign("tutorlogin.php");</script>'; // redirects to login.php
    }
	
?>