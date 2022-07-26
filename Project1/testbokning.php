<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(5);
include('connection.php');

$usernam = $_SESSION["user"];


$getGroups = $con->prepare("SELECT * FROM `groupstable`");
 $getGroups->execute();
 if($getGroups->rowCount()>0)
     {
		 
       $getGroups=$getGroups->fetchAll(PDO::FETCH_ASSOC);
	 //  foreach ($getGroups as $row => $attr){}
	  // print_r($getGroups);
	   
	 }
     $getMonday = $con->prepare("SELECT * FROM groupstable WHERE gDay LIKE '%Monday%' ORDER BY gTime ASC");
     $getMonday->execute();
     if($getMonday->rowCount()>0)
         { 
           $getMonday=$getMonday->fetchAll(PDO::FETCH_ASSOC); 
         }
    $getTuesday = $con->prepare("SELECT * FROM groupstable WHERE gDay LIKE '%Tuesday%' ORDER BY gTime ASC");
    $getTuesday->execute();
    if($getTuesday->rowCount()>0)
        { 
        $getTuesday=$getTuesday->fetchAll(PDO::FETCH_ASSOC); 
        }
        
    $getWednesday = $con->prepare("SELECT * FROM groupstable WHERE gDay LIKE '%Wednesday%' ORDER BY gTime ASC");
    $getWednesday->execute();
    if($getWednesday->rowCount()>0)
        { 
        $getWednesday=$getWednesday->fetchAll(PDO::FETCH_ASSOC); 
        }

    $getThursday = $con->prepare("SELECT * FROM groupstable WHERE gDay LIKE '%Thursday%' ORDER BY gTime ASC");
    $getThursday->execute();
    if($getThursday->rowCount()>0)
        { 
        $getThursday=$getThursday->fetchAll(PDO::FETCH_ASSOC); 
        }    

    $getFriday = $con->prepare("SELECT * FROM groupstable WHERE gDay LIKE '%Friday%' ORDER BY gTime ASC");
    $getFriday->execute();
    if($getFriday->rowCount()>0)
        { 
        $getFriday=$getFriday->fetchAll(PDO::FETCH_ASSOC); 
        }

    $getSaturday = $con->prepare("SELECT * FROM groupstable WHERE gDay LIKE '%Saturday%' ORDER BY gTime ASC");
    $getSaturday->execute();
    if($getSaturday->rowCount()>0)
        { 
        $getSaturday=$getSaturday->fetchAll(PDO::FETCH_ASSOC); 
        }

        $dt = new DateTime();
        // create DateTime object with current time
        
        $dt->setISODate($dt->format('o'), $dt->format('W') + 1);
        // set object to Monday on next week
        
        $periods = new DatePeriod($dt, new DateInterval('P1D'), 6);
        // get all 1day periods from Monday to +6 days
        
        $days = iterator_to_array($periods);
        // convert DatePeriod object to array
        
        //echo $days[0]->format('Y-m-d');

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="booking.css">
	<title>Our Clubs</title>

</head>
<body>
<?php
include('header.php');
?>
<script>
// Get the modal
var modal = document.getElementById('<?php echo $bID ?>');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
    <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-2">
        <h3 class="weektitle">Monday</h3><br>
          <?PHP
         
            foreach ($getMonday as $row => $attr)
            {

                if($row ==0)
                {
                    $ii="R1E1";
                    $ss="submitR1E1";
                   // func($usernam,$attrgName, $attrgTime,$days,$attrgDuration,$attrtrainer,$attrgDescription){
                    func($usernam,$attr['gName'],$attr['gTime'],$days[0]->format('Y-m-d'),$attr['gDuration'],$attr['trainer'],$attr['gDescription'],$ii,$ss);
                    $ii=null;
                    $ss=null;
                    break;
                }
                if($row ==1)
                {
                    $ii="R2E1";
                    $ss="submitR2E1";
                   // func($usernam,$attrgName, $attrgTime,$days,$attrgDuration,$attrtrainer,$attrgDescription){
                    func($usernam,$attr['gName'],$attr['gTime'],$days[0]->format('Y-m-d'),$attr['gDuration'],$attr['trainer'],$attr['gDescription'],$ii,$ss);
                    $ii=null;
                    $ss=null;
                    break;
                }
                if($row ==2)
                {
                    $ii="R3E1";
                    $ss="submitR3E1";
                    func($usernam,$attr['gName'],$attr['gTime'],$days[0]->format('Y-m-d'),$attr['gDuration'],$attr['trainer'],$attr['gDescription'],$ii,$ss);
                    $ii=null;
                    $ss=null;
                    break;
                }
                if($row ==3)
                {
                    echo	'<div class="card">';
                    echo			'<div class="card-body">';
                    echo				'<h5 class="card-title">'.$attr['gName'].'</h5>';
                    echo		        	'<p class="card-text">Time:'.$attr['gTime'].'<br>'.$days[0]->format('Y-m-d').'<br>'.$attr['gDuration'].'</p>';
                    echo                 '<div>';
                    ?>
                     <button class="button1" onclick="document.getElementById('R4E1').style.display='block'">Book</button>
                   <?PHP
                    echo                 '</div>';
                    echo			'</div>';
                    echo	'</div>';   
                    echo       '<div id="R4E1" class="modal">';                                  
                    echo          '<form class="modal-content animate" action="" method="post">';
                    echo              '<div class="contain"><h5><br>Book a club</h5><br> <h4 class="card-title">'.$attr['gName'].'</h4></div>';
                    echo              '<div class="container">';
                    echo                '<label><b>Club: '.$attr['gName'].'</b></label><br>';
                    echo                 '<label><b>Day: Monday</b></label><br>';
                    echo                 '<label><b>Time: '.$attr['gTime'].'</b></label><br>';
                    echo                 '<label><b>Date: '.$days[0]->format('Y-m-d').'</b></label><br>';
                    echo                 '<label><b>Trainer: '.$attr['trainer'].'</b></label><br><br>';
                    echo                 '<label><b>Description: '.$attr['gDescription'].'</b></label><br>';
                    echo                   '<button class="button2" value="submitR4E1" name="submitR4E1" type="submit">Book Club</button>';
                    ?>                                       
                                           <span onclick="document.getElementById('R4E1').style.display='none'" class="close" title="Close Modal">&times;</span>
                   <?PHP
                    echo              '</div>';
                    echo           '</form>';
                    echo       '</div>';
                    if(isset($_POST['submitR4E1']))
                    {
                        bookingFunction($usernam,$attr['trainer'],$attr['gName'],'Monday',$attr['gTime'],$days[0]->format('Y-m-d'));
 
                    }
                }
            }  
            ?>
            
     </div>
     
            
               
        </div>
    </div>
                

<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/ulg/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="app.js">
</script>

<?Php
function bookingFunction($uname,$tname,$gname,$bday,$btime,$bDate) {
   
  include('connection.php');
    /* echo $uname;
      echo $tname;
      echo $gname;
      echo $bday;
      echo $btime;
      echo $bDate;*/

      $checkUser = $con->prepare("SELECT * FROM bookingtable WHERE username ='$uname' AND groupname='$gname' AND bDay='$bday' AND bTime='$btime' AND bdate='$bDate'");
      $checkUser->execute();
      if($checkUser->rowCount()>0)
          {
            echo "You Already have booked";
          }
          else
          {

                $insert = $con->prepare("INSERT INTO `bookingtable` (`id`, `username`, `trainername`, `groupname`, `bDay`, `bTime`, `bdate`) VALUES (NULL, '$uname', '$tname', '$gname', '$bday', '$btime', '$bDate')");
                if($insert->execute())
                {
                
                    $insert = null;
                    $con = null;
                    die();
                   
                    // header('Location: Clubs_Page.php');
                  //  header('Location: http://localhost/Project/Clubs_Page.php');
                    
                  //  die();
                }
                else
                {
                    echo "Faild to booking group";
                }

            }
 
    }

function func($usernam,$attrgName, $attrgTime,$days,$attrgDuration,$attrtrainer,$attrgDescription,$bID,$submittype){
  
        ?>
<div class="card">
<div class="card-body">
<h5 class="card-title"><?php echo $attrgName?></h5>
<p class="card-text">Time:<?php echo $attrgTime ?><br><?php echo $days?><br><?php echo $attrgDuration?></p>
<div>

    <button class="button1" onclick="document.getElementById('<?php echo $bID ?>').style.display='block'">Book</button>
</div>
</div>
</div> 
<div id="<?php echo $bID ?>" class="modal">                                
<form class="modal-content animate" action="" method="post">
<div class="contain"><h5><br>Book a club</h5><br> <h4 class="card-title"><?php echo $attrgName ?></h4></div>
<div class="container" >
<label><b>Club:<?php echo $attrgName ?></b></label><br>
<label><b>Day: Monday</b></label><br>
<label><b>Time: <?php echo $attrgTime ?></b></label><br>
<label><b>Date: <?php echo $days?></b></label><br>
<label><b>Trainer: <?php echo $attrtrainer ?></b></label><br><br>
<label><b>Description: <?php echo $attrgDescription ?></b></label><br>
<button class="button2" value="<?php $submittype ?>" name="<?php $submittype ?>" type="submit">Book</button>
                                
<span onclick="document.getElementById('<?php echo $bID ?>').style.display='none'" class="close" title="Close Modal">&times;</span>

</div>
</form>
</div>
<?php
//if(isset($_POST['$submittype']))
  }
    ?>
    <?php

include('footer.php');
?>
</body>
</html>