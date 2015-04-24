<?php
    session_start();
    $custusername = mysql_real_escape_string($_POST['custusername']);
    $custpassword = mysql_real_escape_string($_POST['custpassword']);
    $bool = true;
	
    mysql_connect("localhost", "root", "") or die("cannot connect to server");
	mysql_select_db("gym") or die("cannot select db");
    $query = mysql_query("SELECT * FROM customer WHERE Custusername = '$custusername' "); // Query the users table
    $exists = mysql_num_rows($query);//Checks if username exists
    $table_users = "";
    $table_password = "";
    if($exists > 0) //IF there are no returning rows or no existing username
    {
       while($row = mysql_fetch_assoc($query)) // display all rows from query
       { 	 	
          $table_users = $row['Custusername']; // the first username row is passed on to $table_users, and so on until the query is finished
          $table_password = $row['Custpassword']; // the first password row is passed on to $table_password, and so on until the query is finished
       }
       if(($custusername == $table_users) && ($custpassword == $table_password))// checks if there are any matching fields
       {
          if($custpassword == $table_password)
          {
             $_SESSION['custuser'] = $custusername; //set the username in a session. This serves as a global variable
             header("location:home.php "); // redirects the user to the authenticated home page
          }
       }
       else
       {
        Print '<script>alert("Incorrect Password!");</script>'; // Prompts the user
		Print '<script>window.location.assign("customerlogin.php");</script>'; // redirects to login.php
       }
    }
		else
	{
       Print '<script>alert("Incorrect username!");</script>'; // Prompts the user
       Print '<script>window.location.assign("customerlogin.php");</script>'; // redirects to login.php
    }
	
?>