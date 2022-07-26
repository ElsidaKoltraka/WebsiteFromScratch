<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="support_page.css">
</head>
<body>

<?php

$ToSearch=$_GET['q'];
include('connection.php');
$getData = $con->prepare("SELECT * FROM support_table WHERE question LIKE '%$ToSearch%' ORDER BY id DESC LIMIT 5");


$getData->execute();
$getCount = $getData->rowCount();
$getData = $getData->fetchAll(PDO::FETCH_ASSOC);
 
    for($i=0; $i<$getCount ;$i++)
    {
      $res=$getData[$i]['question'];
      if($i % 2 ==0 ) // this statement just to display the results in two different colors  
      {
      ?>
      <a href="" target="_self" id="SearchedItem1"> &nbsp <?php echo $res ?></a></br>
      <?php 
      }
      else
      {
        ?>
        <a href="" target="_self" id="SearchedItem2"> &nbsp <?php echo $res ?></a></br>
        <?php 
      }
    }

?>
</body>
</html> 