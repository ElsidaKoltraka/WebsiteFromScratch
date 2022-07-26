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

//Delete users from database 
if(isset($_POST['Delete']))
  {
    $item = $_POST['selectedUser'];
    if($item=="Select_a_user")
    {
      echo "";
    }
    else
    {
    $deleteUser = $con->prepare("DELETE FROM gym_users WHERE id='$item'");
     $deleteUser->execute();
    }
  }
//Get users list from database
  $getUser = $con->prepare("SELECT id,username FROM gym_users ");
  $getUser->execute();
  $getUser = $getUser->fetchAll();

  //Add new trainers
  if(isset($_POST['AddTrainer']))
		{
			$tFirst = $_POST['firstname'];
			$tLast = $_POST['lastname'];
			$tTitle = $_POST['title'];
			$tDesc = $_POST['description'];
			$tCertified = $_POST['certified'];
			$tImage1 ="images/".$_POST['uploadImage1'];
			$insertTrainer = $con->prepare("INSERT INTO `trainers` (`id`, `firstname`, `lastname`, `description`, `image`, `certified1`, `title`) VALUES (NULL, '$tFirst', '$tLast', '$tDesc', '$tImage1', '$tCertified', '$tTitle')");
			if($insertTrainer->execute())
			{
				echo "Group has been created";
				header('Location:AdminPage.php'); die();
			}
			else
			{
				echo "Faild to create group";
			}
    }
 //Delete trainer from database
if(isset($_POST['DeleteTrainer']))
{
  $item = $_POST['selectedTrainer'];
  if($item=="Select_a_trainer")
  {
    echo "";
  }
  else
  {
  $deleteUser = $con->prepare("DELETE FROM trainers WHERE id='$item'");
   $deleteUser->execute();
  }
}
//Get trainers list from database
$getTrainer = $con->prepare("SELECT id,firstname,lastname FROM trainers ");
$getTrainer->execute();
$getTrainer = $getTrainer->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
  
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>ADMIN</title>
  <link href="users_style.css" rel="stylesheet">

    <script src="main.js" type="text/javascript"></script>
<title>Admin Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link rel="stylesheet" href="users_styles.css">

</head>

<body class="center-text">

<?php include 'header.php'; ?>


          <div class="form-container">
      
  
              
      
      <div class="card-body">
					<legend>Manage the GYM07</legend>
              <div >
							<h5 class="">This webpage is only accessable by admin</h5>
							<p class="card-text">
							
							<div >
              <div class="logoutsec"> 
              <form method='post'>
              <input  class="" form="returnForm" type="submit" name="ReturnBack" value="Go Back" />
              <input class="" type = 'submit' name ='logOut' value ="Sign Out" >
              </form>
              <form action="index.php" method="" id="returnForm">
              </form>
          </div>
							</div>
							</p>
						
      </div>
      
      </div>
          </div>
          

<div class="conti">
  <div class="container">
          <div class="">
              <div class="container3">
                <form action="CreateNewGroup.php" method="POST" id="form2">
                  <input type="submit" class="button2" value="Create a club" name="Create" >
                </form>
              </div>
              <div class="container3">
              <form action="updateContent.php" method="POST" id="form2">
                <input type="submit" class="button2" value="Update the content Main page" name="updateTheContent" >
              </form>
              </div>
          </div>

          <div id="divControl">
               <div  class="container3">
                  <div>
                  <button class="button2" onclick="document.getElementById('id01').style.display='block'">Remove a user </button>
                  </div>
               </div>                    
                   <div id="id01" class="modal1" >                                
                       <form class="modal-content animate" action="" method="post">
                            <div class="contain1"><h5><br>Remove a user</h5><br> <h4 ></h4></div>
                                <div class="container1">  
                                    <form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" id="form1">
                                              <label > Select a user: &nbsp
                                                    <select name="selectedUser" >
                                                        <option>Select_a_user</option>
                                                        <?php foreach ($getUser as $out)   {?>
                                                        <option value="<?php echo $out["id"]?>"><?php echo $out["username"]; ?></option> 
                                                          <?php }?>
                                                    </select>
                                              </label>
                                           <br>
                                        <input class="button2" type="submit" value="Delete" name="Delete" >
                                     </form>                        
                                   <span onclick="document.getElementById('id01').style.display='none'" class="close"  title="Close Modal">&times;</span>
                              </div>
                         </form>
                      </div>
          </div>
          <div id="divControl">
                   <div  class="container3">
                    <div >
                    <button class="button2" onclick="document.getElementById('id02').style.display='block'">Add new trainer </button>
                    </div>
                 </div>
                 <div id="id02" class="modal1" >                                
                       <form class="modal-content animate" action="" method="post">
                          <div class="contain1"><h5><br>Add new trainer</h5><br> <h4 ></h4></div>
                                <div class="container1">
                                     <div class="contain2">
                                         <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                                                <div class="">
                                                    <label for="formName">First Name:</label>
                                                    <input type="text" class="textBox" id="firstname" name="firstname" placeholder="">
                                                </div>
                                                <br>
                                                <div class="">
                                                    <label for="">Last Name:</label>
                                                    <input type="text" class="textBox" id="lastname" name="lastname" placeholder="">
                                                </div>
                                                <br>
                                                <div class="">
                                                    <label for="">Title:</label>
                                                    <input type="text" class="titleBox" id="title" name="title" placeholder="">
                                                </div>
                                                <br>
                                                <div class="">
                                                    <label for="formDesc">Description:</label>
                                                    <textarea class="DescriptionBox" rows="3" id="description" name="description"></textarea>
                                                </div>
                                                <br>
                                                <div class="">
                                                    <label for="formDesc">Certified:</label>
                                                    <textarea class="CertifiedBox" rows="1" id="certified" name="certified"></textarea>
                                                </div>
                                                <br>
                                                <div class="">
                                                    <label for="uploadImage">Select an image:</label>
                                                    <input type="file" class="" id="uploadImage1" name="uploadImage1"><br>
                                                </div>
                                                <br>
                                                <input class="button5" type="submit" value="SUBMIT" name="AddTrainer">
                                          </form>                                                                                                                                         
                                          </div>
                                             <span onclick="document.getElementById('id02').style.display='none'" class="close"  title="Close Modal">&times;</span>
                                          </div>
                                    </form>
                               </div>
                           </div>
          <div id="divControl">
                          <div  class="container3">
                                        <div>
                                        <button class="button2" onclick="document.getElementById('id04').style.display='block'">Remove a Trainer </button>
                                        </div>
                          </div>
                      
                      <div id="id04" class="modal1" >                                
                              <form class="modal-content animate" action="" method="post">
                                  <div class="contain1"><h5><br>Remove a Trainer</h5><br> <h4 ></h4></div>
                                        <div class="container1">  
                                                  <form class="modal-content animate" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" id="form1">
                                                    <label > Select a trainer: &nbsp
                                                    <select name="selectedTrainer" >
                                                      <option>Select_a_trainer</option>
                                                      <?php foreach ($getTrainer as $out)   {?>
                                                      <option value="<?php echo $out["id"]?>"><?php echo $out["firstname"]; ?> <?php echo $out["lastname"]; ?> </option> 
                                                      <!-- <option><?php echo $out["username"]; ?></option>-->
                                                        <?php }?>
                                                    </select>
                                                    </label>
                                                    <br>
                                                    <input class="button4" type="submit" value="DeleteTrainer" name="DeleteTrainer" >
                                                  </form>                        
                                                  <span onclick="document.getElementById('id04').style.display='none'" class="close"  title="Close Modal">&times;</span>
                                                </div>
                                       </form>
                         </div>
             </div>
  </div>
</div>     
          </div>
      </div>
      
</section>    
<script>
        // Get the modal
        var modal = document.getElementById('id01');
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>  
</body>
</html>