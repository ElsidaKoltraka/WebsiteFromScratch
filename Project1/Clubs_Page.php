<?php
 session_start();
 require 'connection.php';
 require 'functions.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);

//If the user is loged in
if(isset($_SESSION['username'], $_SESSION['password'])) {

// Get all groups that are in datebase
$getGroups = $con->prepare("SELECT * FROM `groupstable`");
$getGroups->execute();
$groupCount = $getGroups->rowCount(); 
$getGroups=$getGroups->fetchAll(PDO::FETCH_ASSOC);	   
	

//Function that get all member that are joind/booked in club
//When you click on a member it will take you to getMembersProfile and show a general information about the member	
function gettingMembers($trName,$grName,$gDay,$gTime)
{
include ('connection.php');
$getMembers = $con->prepare("SELECT id,username FROM bookingtable WHERE trainername LIKE '%$trName%' AND groupname LIKE '%$grName%' AND bDay LIKE '%$gDay%' AND bTime LIKE '%$gTime%' ;");
$getMembers->execute();
if($getMembers->rowCount()>0)
	{		 
	$getMembers=$getMembers->fetchAll(PDO::FETCH_ASSOC);
	foreach ($getMembers as $rw => $atr)
	{
		$id=$atr['id'];
		echo '<a href="getMembersProfile.php?id='.$id.'"> <li>'.$atr['username'].'</li></a>';
	}	

	}
	else
	echo "No member joined";	
}
//Function that collect how many members are joined
function gettingMembersCount($trName,$grName,$gDay,$gTime)
{
include ('connection.php');
$getMembers = $con->prepare("SELECT id,username FROM bookingtable WHERE trainername LIKE '%$trName%' AND groupname LIKE '%$grName%' AND bDay LIKE '%$gDay%' AND bTime LIKE '%$gTime%' ;");
$getMembers->execute();
$count = $getMembers->rowCount();
return $count;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<title>Our Clubs</title>
</head>
<body>
	<?php
include('header.php');
	?>
	  <div class="container">
			<div id="title"><h1><br>Our Clubs</h1></div>
			<div id="welocme">
				<p class="cont">
					Welcome to GYM7 clubs page! <br>
					Here you can find the different classes offered by our gym.<br>
					Come and try them!<br>
				</p>
			</div>
			<div class="row">
				<?php
				for( $i =0; $i<$groupCount;$i++)
				{
				?>
				<div class="col-lg-4 col-md-6">
				   <div class="card">
			        	<img class="card-img-top" src="<?php echo $getGroups[$i]['gImage']?>" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title"><?php echo $getGroups[$i]['gName']?></h5>
										<p class="card-text">
											<?php echo $getGroups[$i]['gDescription']?>	
										<p class="card-text"> Spaces taken: 
											<?php echo gettingMembersCount($getGroups[$i]['trainer'],$getGroups[$i]['gName'],$getGroups[$i]['gDay'],$getGroups[$i]['gTime'])?>
										/25 </p>
										<div class="row">
											<a href="bookingsPage.php" class="btn btn-primary join-group">Book</a>
										</div>
								</div>
						<div class="accordion accordion-flush" id="accordion<?php echo $i ?>">
							<div class="accordion-item">
								<h2 class="accordion-header" id="info<?php echo $i ?>">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#info-collapse<?php echo $i ?>" aria-expanded="false" aria-controls="info-collapse<?php echo $i ?>"> Info </button>
								</h2>
								<div id="info-collapse<?php echo $i ?>" class="accordion-collapse collapse" aria-labelledby="info<?php echo $i ?>" data-bs-parent="#accordion<?php echo $i ?>">
									<div class="accordion-body">
										<ul>
											<li><?php echo $getGroups[$i]['gDuration']?></li>
											<li>Difficulty:<?php echo $getGroups[$i]['gDifficulty']?></li>
											<li>Time: <?php  echo $getGroups[$i]['gTime']?></li>
											<li>Day: <?php  echo $getGroups[$i]['gDay']?></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="members<?php echo $i ?>">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#members-collapse<?php echo $i ?>" aria-expanded="false" aria-controls="members-collapse<?php echo $i ?>"> Members </button>
								</h2>
								<div id="members-collapse<?php echo $i ?>" class="accordion-collapse collapse" aria-labelledby="members<?php echo $i ?>" data-bs-parent="#accordion<?php echo $i ?>">
									<div class="accordion-body">
										<div class="accordion-body">
											<ul>
												<?php	 gettingMembers($getGroups[$i]['trainer'],$getGroups[$i]['gName'],$getGroups[$i]['gDay'],$getGroups[$i]['gTime']); ?>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
			    	</div>
				</div>
				<?php
				}
				?>
			</div>
	   </div>
	
</body>
</html>
<?php
include('footer.php');
?>

<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/ulg/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="app.js">
</script>


<?php
// If user is not logged in redirect into signin page
} else {
   header('Location: signin.php');
    exit;
  }

?>