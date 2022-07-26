
<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);
include('connection.php');


$adminName = $_POST["AdminName"];
$adminPassword = $_POST["AdminPassWord"];
$errorMsg = "";
$validUser = $_SESSION["login"] === true;
if(isset($_POST["submit"])) 
{
  $checkAdmin = $con->prepare("SELECT * FROM admins WHERE admin_name = :U");
  $checkAdmin->bindParam("U",$adminName);
  $checkAdmin->execute();
  if($checkAdmin->rowCount()>0)
     {
       $checkAdmin=$checkAdmin->fetchObject();
          if($checkAdmin->admin_password === $adminPassword)
           {
              $validUser = $adminName == "$checkAdmin->admin_password";
               if(!$validUser)
               {
                 $errorMsg  ="Inavalid admin name or password";
               }
               else
               { 
                  $_SESSION["login"] = true;
               }
            }
            else
            {
              $errorMsg = "Inavalid admin name or password";
            }    
      }    
}
if($validUser)
{ 
   $_SESSION['user'] = $adminName;
   header("Location:AdminPage.php");
   exit();
} else {

   $_SESSION['errprompt'] = "Wrong username or password.";

 }
?>

<!DOCTYPE html>
<head>
<title>Sign in</title>



<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login - USER Information System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="users_style.css" rel="stylesheet">
</head>

<body class="center-text">

  <?php include 'header.php'; ?>
<section>

        
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
         <form action="" method="post">
            <div class="container3">
            <label for="Uname">Enter Your Name:</label> &nbsp&nbsp &nbsp&nbsp
            <input class="form-control" id="AdminName" type="text" name="AdminName" /> <br>
            </div><br>
            <div class="container3">
            <label for="PassW">Enter Your Password:</label>
            <input  class="form-control" id="AdminPassWord" type="password" name="AdminPassWord" />
            <br>
            </div>
            <div class="container3">
            <label><?php echo $errorMsg;  ?></label>
            </div>
            <br><br>
            

         <button class="button12" type="submit" name="submit" value="Log In"> Log in</button>
        <a href="index.php">Go back to home page</a>
        <div class="container" style="background-color:#f1f1f1">
        </div>
               </div>
         
         </div>               </div>

   </div>
</section>
   <?php

include('footer.php');
?>
</body>
</html>