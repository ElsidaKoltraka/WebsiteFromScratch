<?php 

  session_start();

  require 'connection.php';
  require 'functions.php';

  if(isset($_POST['login'])) {

    $uname = clean($_POST['username']);
    $pword = clean($_POST['password']);

    $query = "SELECT * FROM gym_users WHERE username = '$uname' AND password = '$pword'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_assoc($result);

      $_SESSION['userid'] = $row['id'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['password'] = $row['password'];

      header("location:profile.php");
      exit;

    } else {

      $_SESSION['errprompt'] = "Wrong username or password.";

    }

  }

  if(!isset($_SESSION['username'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login - USER Information System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="users_style.css" rel="stylesheet">

    <script src="main.js" type="text/javascript"></script>
</head>
<body class="center-text">

  <?php include 'header.php'; ?>

  <section>
    


      <?php 

        if(isset($_SESSION['prompt'])) {
          showPrompt();
        }

        if(isset($_SESSION['errprompt'])) {
          showError();
        }

      ?>
      
     
      <div >
      <div id="cardProfilePage" class="col-lg-10 col-md-6">
					<div class="card">
			
						<div class="card-body" id="bgcolorprofilePage">
							<h5 class="">My membership</h5>
							<p class="card-text">
							My pages
							<div >
								
							</div>
							</p>
						</div>
      <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <div >
     
        <div class="conti">
          <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
        </div>

        <div class="conti">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        
        <button class="button12" type="submit" name="login" value="Log In"> Log in</button>
        <a href="register.php">Need an account?</a>
        
        </div>
    </div>
    </form> </div>
      </div>
     
      </div>
   

  </section>
<?php

include('footer.php');
?>
</body>
</html>

<?php

  } else {
    header("location:profile.php");
    exit;
  }

  unset($_SESSION['prompt']);
  unset($_SESSION['errprompt']);

  mysqli_close($conn);

?>
