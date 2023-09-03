<?php
session_start();

#if (!isset($_SESSION['success']))
if (isset($_SESSION['success']))
{
  echo $_SESSION['username'];
  echo "<br>";
  echo $_SESSION['success'];



}
else
{
  // remove all session variables
  session_unset();
  // destroy the session
  session_destroy();  

  header('location: ../error/nosession.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Student Login Form</title>
</head>
<body style="text-align:center;">
<center> <h1> Student Login Form </h1> </center>   		

</body>
</html> 
