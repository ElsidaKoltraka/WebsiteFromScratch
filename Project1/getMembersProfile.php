<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);

//get id number when clicked on member
$ii=$_GET['id'];

include ('connection.php');
//get member name from bookingtable 
$getMeb = $con->prepare("SELECT username FROM `bookingtable` WHERE id=$ii;");
$getMeb->execute();
	if($getMeb->rowCount()>0)
		{		 
			$getMeb=$getMeb->fetchObject();
			$usernn =$getMeb->username;
			$getMeb=null;
			$con = null;		
		}
	else
	{
		echo "No member joined";
	}

include('connection.php');
//get generally information about username. the information will be showed when clicked on member name 
$getMemb = $con->prepare("SELECT username,firstname,lastname,city FROM gym_users WHERE username='$usernn'");
$getMemb->execute();
if($getMemb->rowCount()>0)
	{		 
		$getMemb=$getMemb->fetchObject();
		$mName= $getMemb->username;
		$mfirst=$getMemb->firstname;
		$mLast = $getMemb->lastname;
		$mCity=$getMemb->city;	
		$getMemb = null;
		$con= null;	
	}
else
{
	echo "No member joined2";	
}
include('connection.php');
$getjoindGroups = $con->prepare("SELECT groupname FROM `bookingtable` WHERE username='$usernn';");
$getjoindGroups->execute();
	if($getjoindGroups->rowCount()>0)
		{		 
			$getjoindGroups=$getjoindGroups->fetchAll(PDO::FETCH_ASSOC);
		}
	else
	{
		echo "Not joind group founded";
	}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
   
</head>
<body>
<?php
include('header.php');
?>
	       <div id="cardProfilePage" class="col-lg-10 col-md-6">
		   <div class="card-body" id="bgcolorprofilePage">
							<h5 class="card-title">General Info About 	<?php echo $mName  ?></h5>
						</div>
				<div class="card">
					<div style="width: 150px; height:150px;">
					    <img class="card-img-top " style="border-radius:90%;" src="images/Cycle-3.jpg" alt="Card image cap">
					</div>
				<div class="card-body">
					<h5 class="card-title"></h5>
					<p class="card-text">
						First Name: <?php echo $mfirst ?> <br>
						Last Name: <?php echo $mLast ?> <br>
						Location: <?php echo $mCity ?> <br>
						joined groups:
						<?php
						foreach ($getjoindGroups as $row => $attr){
						//echo '<ul>';
						echo '<li>';
						echo $attr['groupname'];
						echo '</li>';
						//echo '</ul>';
						}
						?>
					</p>	
				</div>
				</div>
			</div>
<?php
include('footer.php');
?>

<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/ulg/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="app.js">
</script>
</body>
</html>