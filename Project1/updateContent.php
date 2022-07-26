<?php  
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);
if(!isset($_SESSION['login']))
{
  header('Location:signInAdmin.php'); die();
}
include('connection.php');
?>
<!DOCTYPE html>

 <?php
    if(isset($_POST["logOut"]))
    {
      unset($_SESSION['login']);
      header("Location:index.php");
    }


// Send data to database
  if(isset($_POST['upload'])){
    $fileData = file_get_contents($_FILES['file']["tmp_name"]);
    if(file_exists($fileData))
    {
      echo "";
    }
    $array = json_decode($fileData,true);
        for($i =0; $i <= sizeof($array); $i++)
        {
              $link= $array['image'][$i];
            
            $addData = $con->prepare("INSERT INTO `imageslider` (`id`, `link`) VALUES (NULL, '$link')");
            $sended=$addData->execute();
            if($sended == true)
            {
              echo "data sended";
            }
            else
            {
              echo "couldn't send";
            }
        }
  if($sended == true)
  {
    $con = null;
    $addData = null;
    header('Location: AdminPage.php', true);
  }
   
  }   

  //update video
  if(isset($_POST['choseVideo'])){
    $videoData = file_get_contents($_FILES['videofile']["tmp_name"]);
    if(file_exists($videoData))
    {
      echo "";
    }
    $arra = json_decode($videoData,true);
    $videolink= $arra['link'][0];
    $insertVideo = $con->prepare("INSERT INTO `videocontainer` (`id`, `link`) VALUES (NULL, '$videolink')");
      $videosended=$insertVideo->execute();
      if($videosended == true)
      {
        echo "data sended";
      }
      else
      {
        echo "couldn't send";
      }
  
  if($videosended == true)
  {
    $con = null;
    $insertVideo = null;
    $videoData= null;
    header('Location: AdminPage.php', true);
  }
   
  }   
   //Add offer
   if(isset($_POST['addoffer'])){
    $offerData = file_get_contents($_FILES['offerfile']["tmp_name"]);
    if(file_exists($offerData))
    {
      echo "";
    }
    $arr = json_decode($offerData,true);
        $offerheader= $arr['text'][0];
        $offerdesc= $arr['description'][0];
      $inserOffer = $con->prepare("INSERT INTO `maincontent` (`id`, `text`, `description`) VALUES (NULL, '$offerheader', '$offerdesc')");
      $offersended=$inserOffer->execute();
      if($offersended == true)
      {
        echo "data sended";
      }
      else
      {
        echo "couldn't send";
      }
  
  if($offersended == true)
  {
    $con = null;
    $inserOffer = null;
    header('Location: AdminPage.php', true);
  }
   
  }  
    ?> 
<head>
<title>Update content</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="user_style.css">
<link rel="stylesheet" href="booking.css">

</head>
 <body >
 <?php include 'header.php'; ?>

 
 <div id="cardProfilePage" class="col-lg-10 col-md-6">
					<div class="card">
			
						<div class="card-body" id="bgcolorprofilePage">
							<h5 class="">Change content on main page:</h5>
							<p class="card-text">
							My pages
							<div >
								
							</div>
							</p>
						</div>
              <form method='post'>
              <input  class="buttonlog" form="returnForm" type="submit" name="ReturnBack" value="Go Back" />
              <input class="buttonlog" type = 'submit' name ='logOut' value ="Sign Out" >
              </form>
              <form action="AdminPage.php" method="" id="returnForm">
              </form>
          </div>
   <div class="">
      <div class="">
        
            <form method="POST" enctype="multipart/form-data" class="" action="">
                <label for="">Select a File for slider:</label><br>
                <input class="chooseFilebtn" type="file" name="file"  required/>
                <button class="button2" type="submit" name="upload"> Add slider</button>
            </form>
      </div>
      <div class="">
            <form method="POST" enctype="multipart/form-data" class="" action="">
                <label for="">Select a video:</label><br>
                <input class="chooseFilebtn" type="file" name="videofile"  required/>
                <button class="button2" type="submit" name="choseVideo"> Add video</button>
            </form>
      </div>
      <div class="">
            <form method="POST" enctype="multipart/form-data" class="" action="">
                <label for="">Add new offers:</label><br>
                <input class="chooseFilebtn" type="file" name="offerfile"  required/>
                <button class="button2" type="submit" name="addoffer"> Add Offer</button>
            </form>
      </div>
   </div>
 </div>
   <?php

include('footer.php');
?>
</body>
</html>