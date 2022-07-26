<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);
include('connection.php');

//get user name, it needed for booking
$usernam = $_SESSION["username"];


//Function that returns specific day      
function getDays($day)
{
include('connection.php');
    $getDay = $con->prepare("SELECT * FROM groupstable WHERE gDay LIKE '%$day%' ORDER BY gTime ASC");
    $getDay->execute();
    $getDayCount = $getDay->rowCount();
    $getDay=$getDay->fetchAll(PDO::FETCH_ASSOC); 
    return $getDay;
}

//Function that returns number of available groups according on the day
function getDaysCount($day)
{
include('connection.php');
    $getDay = $con->prepare("SELECT * FROM groupstable WHERE gDay LIKE '%$day%' ORDER BY gTime ASC");
    $getDay->execute();
    $getDayCount = $getDay->rowCount();
    return $getDayCount;
}
   

// create DateTime object with current time
$dt = new DateTime();
// set object to Monday on next week
$dt->setISODate($dt->format('o'), $dt->format('W') + 1);
// get all 1day periods from Monday to +6 days 
$periods = new DatePeriod($dt, new DateInterval('P1D'), 6);
// convert DatePeriod object to array
//echo $days[0]->format('Y-m-d');
$days = iterator_to_array($periods);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="booking.css">
   
    
	<title>Our Clubs</title>

</head>
<body>
<?php
include('header.php');
?>
<script>
// Get the modal
var modal = document.getElementById('id01');
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
                $mondayCount = getDaysCount('Monday');
                $getMonday=getDays('Monday');
                for($i =0 ; $i<$mondayCount;$i++)  { ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $getMonday[$i]['gName']?></h5>
                            <p class="card-text">Time:<?php echo $getMonday[$i]['gTime']?><br> <?php echo $days[0]->format('Y-m-d')?><br><?php echo $getMonday[$i]['gDuration']?></p>
                            <div>
                            <button class="button1" onclick="document.getElementById('<?php echo 'idMonday'.$i ?>').style.display='block'">Book</button>
                            </div>
                        </div>
                    </div>  
                    <div id="<?php echo 'idMonday'.$i ?>" class="modal">                                 
                        <form class="modal-content animate" action="" method="post">
                            <div class="contain">
                                <h5><br>Book a club</h5><br> <h4 class="card-title"><?php echo $getMonday[$i]['gName']?></h4>
                            </div>
                            <div class="container" >
                                <label><b>Club: <?php echo $getMonday[$i]['gName']?></b></label><br>
                                <label><b>Day: Monday</b></label><br>
                                <label><b>Time: <?php echo $getMonday[$i]['gTime']?></b></label><br>
                                <label><b>Date: <?php echo $days[0]->format('Y-m-d') ?></b></label><br>
                                <label><b>Trainer: <?php echo $getMonday[$i]['trainer']?></b></label><br><br>
                                <label><b>Description: <?php echo $getMonday[$i]['gDescription']?></b></label><br>
                                <button class="button2" value="" name="<?php echo 'subMonday'.$i ?>" type="submit">Confirm</button>                              
                                <span onclick="document.getElementById('<?php echo 'idMonday'.$i ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
                            </div>
                        </form>
                    </div>
                <?php   $strM = 'subMonday'.$i;
                    if(isset($_POST[$strM]))
                    {
                        bookingFunction($usernam,$getMonday[$i]['trainer'],$getMonday[$i]['gName'],'Monday',$getMonday[$i]['gTime'],$days[0]->format('Y-m-d'));
                    }
                }?>    
        </div>
        <div class="col-lg-2 col-md-3">
            <h3 class="weektitle">Tuesday</h3><br>
            <?PHP  
            $tuesdayCount = getDaysCount('Tuesday');
            $getTuesday=getDays('Tuesday');

            for($t =0 ; $t<$tuesdayCount;$t++)  { ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $getTuesday[$t]['gName']?></h5>
                        <p class="card-text">Time:<?php echo $getTuesday[$t]['gTime']?><br> <?php echo $days[1]->format('Y-m-d')?><br><?php echo $getTuesday[$t]['gDuration']?></p>
                        <div>
                            <button class="button1" onclick="document.getElementById('<?php echo 'idTuesday'.$t ?>').style.display='block'">Book</button>
                        </div>
                    </div>
                </div>  
                <div id="<?php echo 'idTuesday'.$t ?>" class="modal">                                 
                    <form class="modal-content animate" action="" method="post">
                        <div class="contain">
                            <h5><br>Book a club</h5><br> <h4 class="card-title"><?php echo $getTuesday[$t]['gName']?></h4>
                        </div>
                        <div class="container" >
                            <label><b>Club: <?php echo $getTuesday[$t]['gName']?></b></label><br>
                            <label><b>Day: Tuesday</b></label><br>
                            <label><b>Time: <?php echo $getTuesday[$t]['gTime']?></b></label><br>
                            <label><b>Date: <?php echo $days[1]->format('Y-m-d') ?></b></label><br>
                            <label><b>Trainer: <?php echo $getTuesday[$t]['trainer']?></b></label><br><br>
                            <label><b>Description: <?php echo $getTuesday[$t]['gDescription']?></b></label><br>
                            <button class="button2" value="" name="<?php echo 'subTuesday'.$t ?>" type="submit">Confirm</button>                              
                            <span onclick="document.getElementById('<?php echo 'idTuesday'.$t ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
                        </div>
                    </form>
                </div>
            <?php   $strTu = 'subTuesday'.$t;
                if(isset($_POST[$strTu]))
                {
                    bookingFunction($usernam,$getTuesday[$t]['trainer'],$getTuesday[$t]['gName'],'Tuesday',$getTuesday[$t]['gTime'],$days[1]->format('Y-m-d'));
                }
                }?>    
        </div> 
         <div class="col-lg-2 col-md-3">
            <h3 class="weektitle">Wednesday</h3><br>
            <?PHP  
            $wednesdayCount = getDaysCount('Wednesday');
            $getWednesday=getDays('Wednesday');

            for($w =0 ; $w < $wednesdayCount;$w++)  { ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $getWednesday[$w]['gName']?></h5>
                        <p class="card-text">Time:<?php echo $getWednesday[$w]['gTime']?><br> <?php echo $days[2]->format('Y-m-d')?><br><?php echo $getWednesday[$w]['gDuration']?></p>
                        <div>
                           <button class="button1" onclick="document.getElementById('<?php echo 'idWednesday'.$w ?>').style.display='block'">Book</button>
                        </div>
                    </div>
                </div>  
                <div id="<?php echo 'idWednesday'.$w ?>" class="modal">                                 
                    <form class="modal-content animate" action="" method="post">
                        <div class="contain">
                            <h5><br>Book a club</h5><br> <h4 class="card-title"><?php echo $getWednesday[$w]['gName']?></h4>
                        </div>
                        <div class="container" >
                            <label><b>Club: <?php echo $getWednesday[$w]['gName']?></b></label><br>
                            <label><b>Day: Wednesday</b></label><br>
                            <label><b>Time: <?php echo $getWednesday[$w]['gTime']?></b></label><br>
                            <label><b>Date: <?php echo $days[2]->format('Y-m-d') ?></b></label><br>
                            <label><b>Trainer: <?php echo $getWednesday[$w]['trainer']?></b></label><br><br>
                            <label><b>Description: <?php echo $getWednesday[$w]['gDescription']?></b></label><br>
                            <button class="button2" value="" name="<?php echo 'subWednesday'.$w ?>" type="submit">Confirm</button>                              
                            <span onclick="document.getElementById('<?php echo 'idWednesday'.$w ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
                        </div>
                    </form>
                </div>
                <?php   $strWed = 'subWednesday'.$w;
                    if(isset($_POST[$strWed]))
                    {
                        bookingFunction($usernam,$getWednesday[$w]['trainer'],$getWednesday[$w]['gName'],'Wednesday',$getWednesday[$w]['gTime'],$days[2]->format('Y-m-d'));
                    }
                }?>  

	    	</div> 
            <div class="col-lg-2 col-md-3">
                    <h3 class="weektitle">Thursday</h3><br>
                    <?PHP  
                    $thursdayCount = getDaysCount('Thursday');
                    $getThursday=getDays('Thursday');

                    for($th =0 ; $th<$thursdayCount;$th++)  { ?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $getThursday[$th]['gName']?></h5>
                                <p class="card-text">Time:<?php echo $getThursday[$th]['gTime']?><br> <?php echo $days[3]->format('Y-m-d')?><br><?php echo $getThursday[$th]['gDuration']?></p>
                                <div>
                                <button class="button1" onclick="document.getElementById('<?php echo 'idThursday'.$th ?>').style.display='block'">Book</button>
                                </div>
                            </div>
                        </div>  
                        <div id="<?php echo 'idThursday'.$th ?>" class="modal">                                 
                            <form class="modal-content animate" action="" method="post">
                                <div class="contain">
                                    <h5><br>Book a club</h5><br> <h4 class="card-title"><?php echo $getThursday[$th]['gName']?></h4>
                                </div>
                                <div class="container" >
                                    <label><b>Club: <?php echo $getThursday[$th]['gName']?></b></label><br>
                                    <label><b>Day: Thursday</b></label><br>
                                    <label><b>Time: <?php echo $getThursday[$th]['gTime']?></b></label><br>
                                    <label><b>Date: <?php echo $days[3]->format('Y-m-d') ?></b></label><br>
                                    <label><b>Trainer: <?php echo $getThursday[$th]['trainer']?></b></label><br><br>
                                    <label><b>Description: <?php echo $getThursday[$th]['gDescription']?></b></label><br>
                                    <button class="button2" value="" name="<?php echo 'subThursday'.$th ?>" type="submit">Confirm</button>                              
                                    <span onclick="document.getElementById('<?php echo 'idThursday'.$th ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
                                </div>
                            </form>
                        </div>
                    <?php   $strTh = 'subThursday'.$th;
                        if(isset($_POST[$strTh]))
                        {
                            bookingFunction($usernam,$getThursday[$th]['trainer'],$getThursday[$th]['gName'],'Thursday',$getThursday[$th]['gTime'],$days[3]->format('Y-m-d'));
                        }
                    }?>  
			 </div> 
             <div class="col-lg-2 col-md-3">
                        <h3 class="weektitle">Friday</h3><br>
                    <?PHP  
                    $fridayCount = getDaysCount('Friday');
                    $getFriday=getDays('Friday');

                    for($f =0 ; $f<$fridayCount;$f++)  { ?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $getFriday[$f]['gName']?></h5>
                                <p class="card-text">Time:<?php echo $getFriday[$f]['gTime']?><br> <?php echo $days[4]->format('Y-m-d')?><br><?php echo $getFriday[$f]['gDuration']?></p>
                                <div>
                                <button class="button1" onclick="document.getElementById('<?php echo 'idFriday'.$f ?>').style.display='block'">Book</button>
                                </div>
                            </div>
                        </div>  
                        <div id="<?php echo 'idFriday'.$f ?>" class="modal">                                 
                            <form class="modal-content animate" action="" method="post">
                                <div class="contain">
                                    <h5><br>Book a club</h5><br> <h4 class="card-title"><?php echo $getFriday[$f]['gName']?></h4>
                                </div>
                                <div class="container" >
                                    <label><b>Club: <?php echo $getFriday[$f]['gName']?></b></label><br>
                                    <label><b>Day: Friday</b></label><br>
                                    <label><b>Time: <?php echo $getFriday[$f]['gTime']?></b></label><br>
                                    <label><b>Date: <?php echo $days[4]->format('Y-m-d') ?></b></label><br>
                                    <label><b>Trainer: <?php echo $getFriday[$f]['trainer']?></b></label><br><br>
                                    <label><b>Description: <?php echo $getFriday[$f]['gDescription']?></b></label><br>
                                    <button class="button2" value="" name="<?php echo 'subFriday'.$f ?>" type="submit">Confirm</button>                              
                                    <span onclick="document.getElementById('<?php echo 'idFriday'.$f ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
                                </div>
                            </form>
                        </div>
                        <?php   $strFr = 'subFriday'.$f;
                            if(isset($_POST[$strFr]))
                            {
                                bookingFunction($usernam,$getFriday[$f]['trainer'],$getFriday[$f]['gName'],'Friday',$getFriday[$f]['gTime'],$days[4]->format('Y-m-d'));
                            }
                        }?>  
			  </div> 
              <div class="col-lg-2 col-md-3">
                    <h3 class="weektitle">Saturday</h3><br>
                    <?PHP  
                    $saturdayCount = getDaysCount('Saturday');
                    $getSaturday=getDays('Saturday');

                    for($s =0 ; $s<$saturdayCount;$s++)  { ?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $getSaturday[$s]['gName']?></h5>
                                <p class="card-text">Time:<?php echo $getSaturday[$s]['gTime']?><br> <?php echo $days[5]->format('Y-m-d')?><br><?php echo $getSaturday[$s]['gDuration']?></p>
                                <div>
                                <button class="button1" onclick="document.getElementById('<?php echo 'idSaturday'.$s?>').style.display='block'">Book</button>
                                </div>
                            </div>
                        </div>  
                        <div id="<?php echo 'idSaturday'.$s ?>" class="modal">                                 
                            <form class="modal-content animate" action="" method="post">
                                <div class="contain">
                                    <h5><br>Book a club</h5><br> <h4 class="card-title"><?php echo $getSaturday[$s]['gName']?></h4>
                                </div>
                                <div class="container" >
                                    <label><b>Club: <?php echo $getSaturday[$s]['gName']?></b></label><br>
                                    <label><b>Day: Saturday</b></label><br>
                                    <label><b>Time: <?php echo $getSaturday[$s]['gTime']?></b></label><br>
                                    <label><b>Date: <?php echo $days[5]->format('Y-m-d') ?></b></label><br>
                                    <label><b>Trainer: <?php echo $getSaturday[$s]['trainer']?></b></label><br><br>
                                    <label><b>Description: <?php echo $getSaturday[$s]['gDescription']?></b></label><br>
                                    <button class="button2" value="" name="<?php echo 'subSaturday'.$s ?>" type="submit">Confirm</button>                              
                                    <span onclick="document.getElementById('<?php echo 'idSaturday'.$s ?>').style.display='none'" class="close" title="Close Modal">&times;</span>
                                </div>
                            </form>
                        </div>
                    <?php   $strSat = 'subSaturday'.$s;
                        if(isset($_POST[$strSat]))
                        {
                            bookingFunction($usernam,$getSaturday[$s]['trainer'],$getSaturday[$s]['gName'],'Saturday',$getSaturday[$s]['gTime'],$days[5]->format('Y-m-d'));
                        }
                    }?>   
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
//Function that book a club
function bookingFunction($uname,$tname,$gname,$bday,$btime,$bDate) {
   
  include('connection.php');
      $checkUser = $con->prepare("SELECT * FROM bookingtable WHERE username ='$uname' AND groupname='$gname' AND bDay='$bday' AND bTime='$btime' AND bdate='$bDate'");
      $checkUser->execute();
      if($checkUser->rowCount()>0)
          {
            echo '<p class="ttext">You Already have booked it</p>';
          }
          else
          {
                $insert = $con->prepare("INSERT INTO `bookingtable` (`id`, `username`, `trainername`, `groupname`, `bDay`, `bTime`, `bdate`) VALUES (NULL, '$uname', '$tname', '$gname', '$bday', '$btime', '$bDate')");
                if($insert->execute())
                {     
                    echo '<p class="ttext1">The club has been booked</p>';       
                    $insert = null;
                    $con = null;
                    AskingFunc();
                }
                else
                {
                    echo '<p class="ttext">Faild to booking group</p>';
                }
            }
    }
//Function that will be called when a club successfully
//Function redirect the page depending on which button is clicked
function AskingFunc(){
        ?>
        <div id="R4E" class="mdal">
                    <div class="container">
                        <form class="modal-content animate" action="" method="post">
                        <p class="ttext1">The club has been booked</p> 
                        <button class="button2"  type="button" onclick="window.location.href='index.php'" autofocus>Home page</button> 
                        <button class="button2" type="button" onclick="window.location.href='bookingsPage.php'" autofocus>Stay, book more</button> 
                        <button class="button2" type="button" onclick="window.location.href='logout.php'" autofocus>Log out</button> 
                       </form>
                    </div>
        </div>
        <?php

}
include('footer.php');
?>
</body>
</html>