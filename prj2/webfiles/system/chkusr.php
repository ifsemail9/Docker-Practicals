<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Starting the session, necessary
// for using session variables
session_start();
  
// Declaring and hoisting the variables
$username = "";
$email    = "";
$_SESSION['success'] = "";

include './db-config/db.php';

// Create connection
$db = mysqli_connect($servername, $username, $password, $mydb);

// Check connection
// if (!$db) {
//     die("Connection failed: " . mysqli_connect_error());
//   }
//   else
//   {
//    echo "Connected successfully";

    // User login
    if (isset($_POST['login_user']))
    {
            // Data sanitization to prevent SQL injection
            $username = mysqli_real_escape_string($db, $_POST['login_user']);
            echo "<br>";
            echo $username;

            $password = mysqli_real_escape_string($db, $_POST['user_pass']);
            echo "<br>";
            echo $password;

            $query = "SELECT * FROM `user` WHERE `una`='$username'";
            //echo $query;
            //echo "<br>";

                $results = mysqli_query($db, $query);
                // Return the number of rows in result set
                //$rowcount=mysqli_num_rows($results);
                //echo $rowcount;

                //echo "<br>";
                //var_dump($results);
                //var_dump(mysqli_num_rows($results));

                    // $results = 1 means that one user with the
                    // entered username exists
                    if (mysqli_num_rows($results) == 1) 
                    {
                        echo "<br>";
                        echo "User is there";

                        // Storing username in session variable
                        $_SESSION['username'] = $username;
             
                        // Welcome message
                        $_SESSION['success'] = "1";
                        
                        // Page on which the user is sent
                        // to after logging in
                        header('location: landing.php');
                    }
                    else
                    {
                            // If the username and password doesn't match
                            //array_push($errors, "Username or password incorrect");
                            echo "<br><br>User is not there!!!"; 
                            
                            // remove all session variables
                            session_unset();

                            // destroy the session
                            session_destroy();
			    
                            mysqli_close($db);

                            header('location: ../error/nosession.php');
                    }
    }
    else
    {
            // If the username and password doesn't match
            //array_push($errors, "Username or password incorrect");
            echo "DB Not connected!!!";

            // remove all session variables
            session_unset();

            // destroy the session
            session_destroy();

            mysqli_close($db);
    }
// }
  
?>
