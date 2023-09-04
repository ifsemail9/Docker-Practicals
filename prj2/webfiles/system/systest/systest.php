<!DOCTYPE html>
<html lang="en">
<head>
<title>Student Test System</title>
</head>
<body style="text-align:center;">
<center> <h1> Student TEST SYSTEM </h1> </center>  

<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
//Now your PHP compiler will show all errors except 'Notice.'
//error_reporting (E_ALL ^ E_NOTICE);
// Show all errors
//error_reporting(E_ALL);



session_start();

// Function to save the exam data to DB
function save_exam_data($db, $examRef, $username, $useremail, $saveques)
{
  $date_test = date("y-m-d"); 

  // if (!$db) {
  //   die("Connection failed: " . mysqli_connect_error());
  // }
  // else
  // {
    $sql = "INSERT INTO exam (examref, examdate, examstudent, examstudmail, examquelist) VALUES ($examRef, '$date_test', '$username', '$useremail', '$saveques')";

    if (mysqli_query($db, $sql)) 
    {
      echo "New record created successfully";
    } 
    else 
    {
      echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

  //}
}

// Print-questions() function
function print_questions(&$array) {
  $arrlength = count($array);
  //$y = 1;

  // Fis for 'PHP Warning:  Undefined variable $listques in'
  $listques = "";

  for($x=0;$x<$arrlength;$x++)
  {
    //This is appeding the question to string
    $listques .= $array[$x].",";
    //echo $listques."<br>";

    //echo "Question $y - $array[$x]";
    //echo "<br>";
    //$y++;
  }

  return $listques;

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

  echo "<br>==========From Random Que Generator page : $rowcount [otal No of Questions].==========<br>";

  //echo "<br>==========Questions.==========<br><br>";

  //var_dump($uniqueNumbers);

  // Passing the questions array to print-questions() function
  $saveques = print_questions($uniqueNumbers);

  save_exam_data($db, $examRef, $username, $useremail, $saveques);


  // Close the DB connection
  mysqli_close($db);

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

<form action="./loadexam.php" method="POST">
    <pre>Exam Ref No: <input type="text"
        name="exam_ref">
    </pre>
            
    <input type="submit" value="load-test">
</form>
<br><br>
<a href="../logout.php">UserLogOut</a>
<br>
</body>
</html> 


