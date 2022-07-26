<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);
  include('connection.php')
?>
<?php
$getTraine = $con->prepare("SELECT * FROM `trainers`");
$getTraine->execute();
$trainersCount = $getTraine->rowCount();		 
$getTraine=$getTraine->fetchAll(PDO::FETCH_ASSOC);	   
	
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
			<div id="title"><h1>Our Trainers</h1></div>
			<div id="welocme">
				<p>
					Welcome to GYM7 trainers page! <br>
					Here you can find the information needed for  fitness trainers working in our gym.<br>
					Come and try to work with them!<br>
				</p>
			</div>
			<div class="row">

				<?php for($i=0;$i<$trainersCount;$i++) {?>

						<div class="col-lg-4 col-md-6">
							<div class="card">
								<img class="card-img-top" src="<?php echo $getTraine[$i]['image']?>" alt="Card image cap">
								<div class="card-body">
									<h5 class="card-title"><?php echo $getTraine[$i]['firstname']?> <?php echo $getTraine[$i]['lastname'] ?></h5>
									  <p class="card-text"> 
									 </p>
								</div>
								<div class="accordion accordion-flush" id="accordion<?php echo $i ?>">
									<div class="accordion-item">
										<h2 class="accordion-header" id="info<?php echo $i ?>">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#info-collapse<?php echo $i ?>" aria-expanded="false" aria-controls="info-collapse<?php echo $i ?>"> Read me</button>
										</h2>
										<div id="info-collapse<?php echo $i ?>" class="accordion-collapse collapse" aria-labelledby="info<?php echo $i ?>" data-bs-parent="#accordion<?php echo $i ?>">
											<div class="accordion-body">
												<p class="card-text">
												   <?php echo $getTraine[$i]['description']?>			 
												</p>
											</div>
										</div>
									</div>
									<div class="accordion-item">
										<h2 class="accordion-header" id="members<?php echo $i ?>">
										<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#members-collapse<?php echo $i ?>" aria-expanded="false" aria-controls="members-collapse<?php echo $i ?>"> certified</button>
										</h2>
										<div id="members-collapse<?php echo $i ?>" class="accordion-collapse collapse" aria-labelledby="members<?php echo $i ?>" data-bs-parent="#accordion<?php echo $i ?>">
											<div class="accordion-body">
												<p class="card-text">
											    	<?php echo $getTraine[$i]['certified1']?>			 
												</p>		
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
				<?php } ?>			
			</div>
			
		</div>
	</div>


<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/ulg/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="app.js">
</script>
<?php
include('footer.php');
?>
</body>
</html>