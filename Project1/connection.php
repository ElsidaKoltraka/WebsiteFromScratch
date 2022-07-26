<?php 
$host="localhost";
$db_username = 'root';
$db_password = '';
$db="datatable1";
//if you want to use mysqli
$conn= new mysqli($host,$db_username,$db_password,$db);
if(!$conn)
{
   die("Fatal Error: Connection Failed!");
}

//If you want to use PDO
$con = new PDO( 'mysql:host=localhost;dbname=datatable1', $db_username, $db_password );
if(!$con)
{
   die("Fatal Error: Connection Failed!");
}



?>