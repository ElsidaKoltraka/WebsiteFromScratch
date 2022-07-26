<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);
include('connection.php');   
//redirection
$usernam = $_SESSION["user"];
if(!isset($_SESSION['login']))
{
  header('Location:signInAdmin.php'); die();
}
if(isset($_POST["logOut"]))
{
  unset($_SESSION['login']);
  header("Location:index.php");
}
//getting date from CreateNewGroup
if(isset($_POST['toDataBase']))
{

}

?>
<?php
/********************************** Delete user from database************* */
if(isset($_POST['Delete']))
  {
    $item = $_POST['selectedUser'];
    if($item=="Select_a_user")
    {
      echo "";
    }
    else
    {
    $deleteUser = $con->prepare("DELETE FROM users WHERE id='$item'");
     $deleteUser->execute();
    }
  }
/********************************Get users list from database ***************/
  $getUser = $con->prepare("SELECT id,username FROM gym_users ");
  $getUser->execute();
  $getUser = $getUser->fetchAll();
?>
<!DOCTYPE html>

   <head>
   <title>Admin Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
 
</head>
<body>
<div> 
       <form method='post'>
         <p>You are logged in as admin: <?php echo $usernam ?></p>
         <input type = 'submit' name ='logOut' value ="Sign Out" >
      </form>
      <form action="index.php" method="" id="returnForm">
        <input form="returnForm" type="submit" name="ReturnBack" value="ReturnBack" />
      </form>
  </div>
  <br><br>

	<div class="col-lg-2 col-md-5">
					<div class="card">
						<img class="card-img-top" src="" alt="Card image cap">
						<div class="card-body">
						

						</div>

						<div class="accordion accordion-flush" id="accordion2">

							<div class="accordion-item">
								<h2 class="accordion-header" id="info2">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#info-collapse2" aria-expanded="false" aria-controls="info-collapse2">
										Remove a User
									</button>
								</h2>
								<div id="info-collapse2" class="accordion-collapse collapse" aria-labelledby="info2" data-bs-parent="#accordion2">
									<div class="accordion-body">
                  <div>
                  <h5 class="card-title">
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" id="form1">
    <label> Remove a user: <br>&nbsp
    <select name="selectedUser">
      <option>Select_a_user</option>
      <?php foreach ($getUser as $out)   {?>
       <option value="<?php echo $out["id"]?>"><?php echo $out["username"]; ?></option> 
       <!-- <option><?php echo $out["username"]; ?></option>-->
        <?php }?>
    </select>
    </label>
      </h4>
    <div class="row">
    <input class="btn btn-primary join-group" type="submit" value="Delete" name="Delete" >
    </div>
  </form>
  </div>
									</div>
								</div>
							</div>


						</div>
					</div>

				</div> 
        <script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/ulg/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="app.js">
</script>
</body>
</html>