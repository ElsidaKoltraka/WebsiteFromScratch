<?php 

  session_start();

  require 'connection.php';
  require 'functions.php';


  if(isset($_POST['register'])) {

    $uname = clean($_POST['username']); 
    $pword = clean($_POST['password']); 
    $userid = clean($_POST['userid']); 
    $fname = clean($_POST['firstname']); 
    $lname = clean($_POST['lastname']); 

    //$payment = clean($_POST['payment']); 
   $city = clean($_POST['city']); 

    $query = "SELECT username FROM gym_users WHERE username = '$uname'";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) == 0) {

      $query = "SELECT userid FROM gym_users WHERE userid = '$userid'";
      $result = mysqli_query($conn,$query);

      if(mysqli_num_rows($result) == 0) {

        $query = "INSERT INTO gym_users (username, password, userid, firstname, lastname, city, date_joined)
        VALUES ('$uname', '$pword', '$userid', '$fname', '$lname', '$city',NOW())";

        if(mysqli_query($conn, $query)) {

          $_SESSION['prompt'] = "Account registered. You can now log in.";
          header("location:signin.php");
          exit;

        } else {

          die("Error with the query");

        }

      } else {

        $_SESSION['errprompt'] = "That user number already exists.";

      }

    } else {

      $_SESSION['errprompt'] = "Username already exists.";

    }

  } 

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<title>Register - User Information System</title>

  <link href="users_style.css" rel="stylesheet">

</head>
<?php include 'header.php'; ?>

<body>

    <?php 
        if(isset($_SESSION['errprompt'])) {
          showError();
        }
    ?>


<body>
<div id="cardProfilePage" class="col-lg-10 col-md-6">
					<div class="card" class="">
			
						<div class="card-body" id="bgcolorprofilePage">
							<h5 class="card-title">Rregistration for the membership</h5>
							<p class="card-text">
							
							<div >
							
							</div>
							</p>
						</div>
          
  <form class="container"class="card" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="form-container">
      <div class="personal-information">
  
              <legend>Personal Info</legend>
              <div >
      <form class="modal-content animate ">
      <div class="">
     
        <div class="conti" class="card-text">
                <label for="userid">Enter your personal data</label></div>
                <div class="conti">
                <input type="text" class="form-control" name="userid" placeholder="User Number (must be unique)" required>
                </div>
                <div class="conti"> <input type="text" class="form-control" name="username" placeholder="username" required></div>
                <div class="conti"> <input type="text" class="form-control" name="password" placeholder="password" required>
                </div>
                <div class="conti"> <input  type="text"class="form-control" name="firstname" placeholder="First Name"/></div>
                <div class="conti">  <input  type="text"class="form-control" name="lastname" placeholder="Surname"/>
                </div> 
      </div> <br><br>

      <button class="button12" id="" type="submit"name="register" value="register">Register</button>
          <a id=" "href="signin.php">Go back</a>
        
    </div>
      </div>
      </div>
      
    
  </form>
          </div>
        
    
  </div>
  <script>
function ddselect(){
  //var d=document.getElementById("ddselect");
  //var displaytext=d.options["d.selectedIndex"].text;
 var ddd = "ddddd";
  document.getElementById["txtvalue"].value=displaytext;
  ddd.value=displaytext;
}

    function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
    /* Card.js plugin by Jesse Pollak. https://github.com/jessepollak/card */

$('form').card({
    container: '.card-wrapper',
    width: 280,

    formSelectors: {
        nameInput: 'input[name="firstname"], input[name="lastname"]'
    }
});
  </script>
<?php

include('footer.php');
?>
</body>
</html>

<?php 

  unset($_SESSION['errprompt']);
  mysqli_close($conn);

?>