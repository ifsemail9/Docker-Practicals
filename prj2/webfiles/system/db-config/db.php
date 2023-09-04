<?php

// DBMS connection code -> hostname,
// username, password, database name
$servername = "db";
$username = "test";
$password = "test";
$mydb = "test";

$db = mysqli_connect($servername, $username, $password, $mydb);

// Check connection
if (!$db) 
{
  die("Connection failed: " . mysqli_connect_error());
}

?>