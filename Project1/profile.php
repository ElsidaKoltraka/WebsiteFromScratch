<?php 

  session_start();
  require 'connection.php';
  require 'functions.php';

  if(isset($_POST['updatePassword'])) {

    $oldpass = clean($_POST['oldpass']);
    $newpass = clean($_POST['newpass']);
    $confirmpass = clean($_POST['confirmpass']);

    $query = "SELECT password FROM gym_users WHERE password = '$oldpass'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {

      if($newpass == $confirmpass) {

        $query = "UPDATE gym_users SET password = '$newpass' WHERE id='".$_SESSION['userid']."'";

        if($result = mysqli_query($conn, $query)) {

          $_SESSION['prompt'] = "Password updated.";
          $_SESSION['password'] = $newpass;
          header("location:profile.php");
          exit;

        } else {

          die("Error with the query");

        }

      } else {

        $_SESSION['errprompt'] = "The new passwords you entered doesn't match.";;

      }

    } else {

      $_SESSION['errprompt'] = "You've entered a wrong old password.";

    }

  }

  if(isset($_SESSION['username'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile -User Information System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="users_style.css">

</head>
<body>

  <?php include 'header.php'; ?>

  <?php

if(isset($_SESSION['prompt'])) {
  showPrompt();
}


$query = "SELECT * FROM gym_users WHERE username = '".$_SESSION['username']."' AND password = '".$_SESSION['password']."'";

;

if($result = mysqli_query($conn, $query)) {
  $row1 = mysqli_fetch_assoc($result);
  $query_date = "SELECT DATE_FORMAT(date_joined, '%m/%d/%Y') FROM gym_users WHERE id = '".$_SESSION['userid']."'";
  $result = mysqli_query($conn, $query_date);
  $row = mysqli_fetch_row($result);
} else {
  die("Error with the query in the database");
}

?>
  	<div id="cardProfilePage" class="col-lg-10 col-md-6">
					<div class="card">
			
						<div class="card-body" id="bgcolorprofilePage">
							<h5 class="">My membership</h5>
							<p class="card-text">
							My pages
							<div >
								<a id="logoutbutton"  href="logout.php">Log Out</a>
							</div>
							</p>
						</div>

						<div class="accordion accordion-flush" id="accordion2">
              <div class="accordion-item">
								<h2 class="accordion-header" id="members2">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#members-collapse2" aria-expanded="false" aria-controls="members-collapse2">
										MY DETAILS
									</button>
								</h2>
								<div id="members-collapse2" class="accordion-collapse collapse" aria-labelledby="members2" data-bs-parent="#accordion2">
									<div class="accordion-body">
										<div class="accordion-body">
                    <p class="card-text">
							      Name    : <?php echo $row1['firstname']; echo $row1['lastname']  ?>
						      	</p> 
                    <p class="card-text">
							      Member ID    :<?php echo $row1['userid']; ?>
						      	</p> 
                    <p class="card-text">
							      Home gym     :<?php echo $row1['city'];  ?>
						      	</p> 
                    <p class="card-text">
							      Memership    : <?php echo $row[0]; ?>
						      	</p> 
										</div>
									</div>
								</div>
							</div>
              <div class="accordion-item">
								<h2 class="accordion-header" id="members3">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#members-collapse3" aria-expanded="false" aria-controls="members-collapse3">
										CHANGE PASSWORD
									</button>
								</h2>
								<div id="members-collapse3" class="accordion-collapse collapse" aria-labelledby="members3" data-bs-parent="#accordion2">
									<div class="accordion-body">
										<div class="accordion-body">
										<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
											<div class="form-group">
											<input type="password" class="form-control" id="formName" name="oldpass" placeholder="Current password" required>
											</div>
											<div class="form-group">
											<input type="password" class="form-control" id="formName" name="newpass" placeholder="New password" required>
											</div>
											<div class="form-group">
											<input type="password" class="form-control" id="formName" name="confirmpass" placeholder="Repeat the password" required>
											</div>
											<br>
											<div class="row">
											<input type="submit" class="button12"value="SAVE" name="updatePassword">
											</div>
										</form>
										</div>
									</div>
								</div>
							</div>
              <div class="accordion-item">
								<h2 class="accordion-header" id="members4">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#members-collapse4" aria-expanded="false" aria-controls="members-collapse4">
									DIRECT DEBIT
									</button>
								</h2>
								<div id="members-collapse4" class="accordion-collapse collapse" aria-labelledby="members4" data-bs-parent="#accordion2">
									<div class="accordion-body">
										<div class="accordion-body">
                    <p class="card-text">
							      With direct debit, you can set up payment so it is quick and easy every month. Set up direct debit below so you do not forget to pay and can focus on your training.   
						      	</p> 
                    <p class="card-text">
							      OBS
                    Please note that if you change your account number on the 16th and 22nd of the month, you will receive a double draw next month. If you change account number after the 22nd of the month, you will receive the invoice home in the mailbox.
						      	</p>

										</div>
									</div>
								</div>
							</div>
            
             
              <div class="accordion-item">
								<h2 class="accordion-header" id="members7">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#members-collapse7" aria-expanded="false" aria-controls="members-collapse7">
									TERMINATION OF MEMBERSHIP
									</button>
								</h2>
								<div id="members-collapse7" class="accordion-collapse collapse" aria-labelledby="members7" data-bs-parent="#accordion2">
									<div class="accordion-body">
										<div class="accordion-body">
                    <p class="card-text">
							       12 month Direct debit   
						      	</p> 
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div> 


</body>
</html>
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/ulg/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="app.js">
</script>
<?php
include('footer.php');

  } else {
    header("location:signin.php");
    exit;
  }

  unset($_SESSION['prompt']);
  mysqli_close($conn);

?>