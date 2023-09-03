<?php
session_start();

#if (!isset($_SESSION['success']))
if (isset($_SESSION['success']))
{
  echo "System Admin Details - <br>";  
  echo $_SESSION['username'];
  echo "<br>";
  echo $_SESSION['success'];
  $visib = "";
}
else
{
  // remove all session variables
  session_unset();
  // destroy the session
  session_destroy();  

  //++$_SESSION['count'];
  //echo "Session not created!!!";
  //$visib = "disabled";

  echo getcwd(), "\n";
  echo exec('pwd'), "\n";

  //header('location: ../error/nosession.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Login Form</title>
</head>
    <body style="text-align:center;">
        <center> <h1> Student Details Add </h1> </center>   		
        <form action="./systest/systest.php" method="POST">
            <pre>Name of the user : <input type="text"
                name="user-na">
            </pre>           
            <pre>Email of the user: <input type="text"
                name="user_email">
            </pre>            
            <input type="submit" value="Submit and Start test" <?php echo $visib?> >
        </form>
        <a href="./logout.php">UserLogOut</a>
    </body>
</html> 