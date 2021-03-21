<?php

$servername = "localhost";
$username = "root";
$password = "root";
$db = "sussex";


function Createdb(){
    global $servername, $username, $password,$db;
// Create connection
$con = mysqli_connect($servername, $username, $password,$db);
return $con;
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
}

function CreatePODDB(){
global $servername, $username, $password,$db;
// DB credentials.
define('DB_HOST',$servername);
define('DB_USER',$username);
define('DB_PASS',$password);
define('DB_NAME',$db);
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
return $dbh;
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
}
