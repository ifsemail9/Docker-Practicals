<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Function to generate the random numbers
function generateUniqueRandomNumbers($min, $max, $count) 
{
  if ($max - $min + 1 < $count) 
  {
      // Not enough unique numbers available in the range
      return false;
  }

  $uniqueNumbers = [];
  while (count($uniqueNumbers) < $count) 
  {
      $randomNumber = mt_rand($min, $max); // Generate a random number

      if (!in_array($randomNumber, $uniqueNumbers)) 
      {
          // Check if the number is already in the array
          $uniqueNumbers[] = $randomNumber; // Add it if it's not already there
      }
  }

  return $uniqueNumbers;
}



// Main code
include '../db-config/db.php';

// Create connection
$db = mysqli_connect($servername, $username, $password, $mydb);

if (!$db)
{
  die("Connection failed: " . mysqli_connect_error());
}
else
{

  $sql="SELECT * from question";

  if ($result=mysqli_query($db,$sql))
  {
    // Return the number of rows in result set
    $rowcount=mysqli_num_rows($result);
    //printf("<br>Result set has %d rows.\n",$rowcount);
    // Free the memory associated with result set
    mysqli_free_result($result);
  }
  
  $min = 1;   // Minimum number
  //$max = 100; // Maximum number
  $max = $rowcount;
  $count = 7; // Number of unique random numbers(Basically No of Questions) to generate

  $uniqueNumbers = generateUniqueRandomNumbers($min, $max, $count);

  if ($uniqueNumbers !== false) 
  {
      // Unique random numbers have been generated
      //print_r($uniqueNumbers);
      echo "<br><b>Questions generated!!!</b><br>";
  } 
  else 
  {
      // Error message for not enough unique numbers in the range
      echo "Not enough unique numbers available in the specified range.";
  }
 
  mysqli_close($db);
}
?>