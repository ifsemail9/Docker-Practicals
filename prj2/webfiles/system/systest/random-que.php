<?php

#https://stackoverflow.com/questions/5612656/generating-unique-random-numbers-within-a-range
#https://www.propatel.com/generate-unique-number-php/

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

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

  $quesarray = array();

  $min = 1;
  $max = $rowcount;
  $no_of_ques = 7;
  $x = 0;
  $y = 0;
  

  echo "<br>============Random ques=========<br>";

  while($x <= $no_of_ques)
  {

    $arrary_size = count($quesarray);

    echo "<br> Generate Question Array element X: $x <br>";

    echo "Generate RAND<br>";
    $queno = rand($min,$max);
    echo "Selected Question (RAND): $queno <br>";

    if(!empty($quesarray))
    {
      echo "Array Status : NOT EMPTY !!! <br>";

      while ($y <= $arrary_size)
      {
        echo "Y - $y <br>";
        $array_element = $quesarray[$y];
        echo "Question NO : $y - Question Reffernece : $array_element<br>";

        if ($array_element == $queno)
         {

          echo "Same found ";
          $queno2 = rand($min,$max);
          $quesarray[$x] = $queno2;
          echo "#####################################################<br>";          
         }
         else
         {

          echo "Same not found ... Added as next Question";
          $quesarray[$x] = $queno;
          echo "<br>";
          echo "#####################################################<br>";
         }

        $y++;
      }

    }
    else
    {
      echo "Array Status : EMPTY !!! <br>";
      $quesarray[$x] = $queno;
      echo "<b>First Question added to ARRAY....</b><br>";
    }

    $x++;

  }

 

  echo "<br><br><br>Complete Array<br>";
  echo "--------------<br>";
  var_dump($quesarray);
  mysqli_close($db);
}
?>