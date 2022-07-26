<?php


include('connection.php');
$rec = $_POST['rec1'];

$conn->prepare("DELETE FROM users where id='$rec'");

?>