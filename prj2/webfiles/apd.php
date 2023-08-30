<?php
echo "<b>User connected to Wen Portal :</b> ";
echo gethostname();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Student Login Form</title>
</head>
<body>
<center> <h1> Student Login Form </h1> </center>   		
<form action="./system/chkusr.php" method="POST">
    <pre>UserName: <input type="text"
        name="login_user">
    </pre>
      
    <pre>Password: <input type="text"
        name="user_pass">
    </pre>
      
    <input type="submit" value="login">
</form>
</form>
</div>
</body>
</html> 
