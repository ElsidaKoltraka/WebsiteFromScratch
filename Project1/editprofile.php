<?php 

  session_start();

  require 'connection.php';
  require 'functions.php';

  if(isset($_POST['update'])) {

    $fname = clean($_POST['firstname']);
    $lname = clean($_POST['lastname']);
    $payment = clean($_POST['payment']);
    $city = clean($_POST['city']);

    $query = "UPDATE gym_users SET firstname = '$fname', lastname = '$lname', payment = '$payment', city = '$city'
    WHERE userid='".$_SESSION['userid']."'";

    if($result = mysqli_query($conn, $query)) {

      $_SESSION['prompt'] = "Profile Updated";
      header("location:profile.php");
      exit;

    } else {

      die("Error with the query");

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

	<title>Edit Profile - User Information System</title>

  <link href="users_style.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>

  <?php include 'header_for_users.php'; ?>

  <section>
    
    <div class="container">
      <strong class="title">Edit Profile</strong>
    </div>
    

    <div class="edit-form box-left clearfix">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

        <div class="form-group">
          <label>User ID:</label>
          
          <?php 
            $query = "SELECT userid FROM gym_users WHERE id = '".$_SESSION['userid']."'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_row($result);

            echo "<p>".$row[0]."</p>";
          ?>

        </div>


        <div class="form-group">
          <label for="firstname">First Name</label>
          <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
        </div>


        <div class="form-group">
          <label for="lastname">Last Name</label>
          <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
        </div>


        <div class="form-group">
          <label for="payment">payment</label>

          <select class="form-control" name="payment">
          <option value="1 month">1 month-30$</option>
                  <option value="2 months">2 months-55$</option>
                  <option value="3 months">3 months-80$ </option>
                  <option value="1 year">1 year  -200$</option>

              
            </select>

        </div>


        <div class="form-group">
          <label for="city">City</label>

          <select class="form-control" name="city">
            <option>Vasteras</option>
            <option>Stockholm</option>
            <option>Eskilstuna</option>
            <option>Uppsala</option>
          </select>

        </div>
        
        <div class="form-footer">
          <a href="profile.php">Go back</a>
          <input class="btn btn-primary" type="submit" name="update" value="Update Profile">
        </div>
        

      </form>
    </div>

  </section>

</body>
</html>

<?php 

  } else {
    header("location:profile.php");
  }

  mysqli_close($conn);

?>