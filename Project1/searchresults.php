<?php 

  session_start();

  require 'connection.php';
  require 'functions.php';


  if(isset($_SESSION['username'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Search Result - User Information System</title>

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

    <?php 

      if(isset($_GET['search'])) {

        $s = clean($_GET['searchbox']);

        $query = "SELECT userid, firstname, lastname, payment, city, DATE_FORMAT(date_joined, '%m/%d/%Y') as date_joined, CONCAT(firstname, ' ', lastname) as fullname 
        FROM gym_users WHERE CONCAT(firstname, ' ', lastname) = '$s' OR firstname = '$s' OR lastname = '$s' ORDER BY date_joined DESC LIMIT 5";
    ?>

    <div class="container">
      <strong class="title">Search results for "<?php echo $s; ?>".</strong>


    


    <?php

        if($result = mysqli_query($conn, $query)) {

          if(mysqli_num_rows($result) == 0) {

            echo "<p>No results matches to your query.</p>";
            echo "</div>";

          } else {
            echo "</div>";
            echo "<ul class='profile-results'>";

            while($row = mysqli_fetch_assoc($result)) {

          ?>

              <li>
                <div class="result-box box-left">
                  <div class='info'><strong>User ID:</strong> <span><?php echo $row['userid']; ?></span></div>
                  <div class='info'><strong>User Name:</strong> <span><?php echo $row['lastname']. ", ".$row['firstname']; ?></span></div>
                  <div class='info'><strong>Payment:</strong> <span><?php echo $row['payment']; ?></span></div>
                  <div class='info'><strong>City:</strong> <span><?php echo $row['city']; ?></span></div>
                  <div class='info'><strong>Date Joined:</strong> <span><?php echo $row['date_joined']; ?></span></div>
                </div>
              </li>

          <?php

            }

            echo "</ul>";

          }

        } else {
          die("Error with the query");
        }

      }

    ?>
  
    <div class="container">
      <a href="profile.php">Go back to My Profile</a>
    </div>
    

  </section>


	<script src="assets/js/jquery-3.1.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>

<?php 

  } else {
    header("location:signin.php");
    exit;
  }

  mysqli_close($conn);

?>