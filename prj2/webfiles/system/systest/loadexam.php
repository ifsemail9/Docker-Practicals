<!DOCTYPE html>
<html lang="en">
<head>
<title>Student Test System</title>
</head>
<body style="text-align:center;">
<center> <h1> Student EXAM STARTED </h1> </center>  

<?php
    include '../db-config/db.php';

    function search_examref($db, $exam_ref)
    {
        $sql = "SELECT * FROM exam WHERE examref = '$exam_ref'";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0)
        {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) 
            {
              echo "<br>";
              //echo "id: " . $row["examid"]. " - Exam Ref: " . $row["examref"]. " - Questions : " . $row["examquelist"]. "<br>";
              echo " - Exam Student: " . $row["examstudent"]."<br>";
              echo " - Exam Email: " . $row["examstudmail"]."<br>";
              $str = $row["examquelist"];
              echo "<br>";
            }

            //print_r (explode(",",$str));
            $wordChunksLimited = explode(",", $str);

            //adjust the last comma
            $num = count($wordChunksLimited);
           
            $adjustment = $num - 1;
            //echo "888888888888888888888888888888------$adjustment-----------------";
            //echo "<br>";
            $idx = 1;

            //for($i = 0; $i < count($wordChunksLimited); $i++)
            for($i = 0; $i < $adjustment; $i++)
            {
                //echo "Question $idx : $wordChunksLimited[$i] <br />";
                echo "Question $idx : <br />";
                $selqid = $wordChunksLimited[$i];

                $sql = "SELECT * FROM question WHERE qid = '$selqid'";

                $result = mysqli_query($db, $sql);

                if (mysqli_num_rows($result) > 0) 
                {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) 
                    {
                      $quedesc =  $row["qna"];
                      echo "Question Description : " . $quedesc . "<br>";

                        $sql = "SELECT * FROM answer WHERE qid = '$selqid'";

                        $result = mysqli_query($db, $sql);

                        if (mysqli_num_rows($result) > 0)
                        {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) 
                            {
                              $ans1 = $row["ansna"];
                              //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                              echo "<input type=\"radio\" id=\"$ans1\" name=\"$quedesc\" value=\"$ans1\">";
                              echo "<label for=\"html\">$ans1</label><br>";
                            }
                        } 
                        else 
                        {
                            echo "0 results";
                        }

                    }

                    echo "<br>";
                } 
                else 
                {
                    echo "0 results";
                }




                $idx++;
            }

        } 
        else 
        {
            echo "0 results";
        }

    }

    
    
    
    echo "-----------------------------------------------";

    $exam_ref = $_POST['exam_ref'];

    echo "<br>Exam Refference Number: " . "$exam_ref";

    search_examref($db, $exam_ref);


mysqli_close($db);

?>

<form action="./loadexam.php" method="POST">
        <pre>User Notes: <input type="text"
            name="notes">
        </pre>
                
        <input type="submit" value="Submit-test">
    </form>
    <br>
    <br>
    <a href="../logout.php">UserLogOut</a>
    <br>
</body>
</html> 