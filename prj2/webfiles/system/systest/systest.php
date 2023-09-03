<!DOCTYPE html>
<html lang="en">
<head>
<title>Student Test System</title>
</head>
<body style="text-align:center;">
<center> <h1> Student TEST SYSTEM </h1> </center>  

<a href="../logout.php">UserLogOut</a>

</body>
</html> 


<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

// Print-questions() function
function print_questions(&$array) {
  $arrlength=count($array);
  $y = 1;

  for($x=0;$x<$arrlength;$x++)
  {
  echo "Question $y - $array[$x]";
  echo "<br>";
  $y++;
  }
}

#if (!isset($_SESSION['success']))
if (isset($_SESSION['success']))
{
  echo "<br>";
  echo "System Admin Details - <br>";
  echo $_SESSION['username'];
  echo "<br>";
  echo $_SESSION['success'];

  $username = $_POST['user-na'];
  $useremail = $_POST['user_email'];

  echo "<br>Student logged: $username";
  echo "<br>Student email: $useremail<br>";

  include './random-que.php';

  echo "<br><br>==========From Random Que Generator page : $rowcount [otal No of Questions].==========<br><br>";

  echo "<br><br>==========Questions.==========<br><br>";

  //var_dump($uniqueNumbers);

  // Passing the questions array to print-questions() function
  print_questions($uniqueNumbers);
}
else
{
  // remove all session variables
  session_unset();
  // destroy the session
  session_destroy();  

  header('location: ../../error/nosession.php');
}
?>


