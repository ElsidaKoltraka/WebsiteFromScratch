<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
error_reporting(0);
include('connection.php');

$query="SELECT * FROM `imageslider` ORDER BY `imageslider`.`id` DESC";
$resultat=mysqli_query($conn,$query);
$x=mysqli_fetch_all($resultat,MYSQLI_ASSOC);

$query1="SELECT * FROM `maincontent` ORDER BY `maincontent`.`id` DESC";
$result1=mysqli_query($conn,$query1);
$x1=mysqli_fetch_all($result1,MYSQLI_ASSOC);

$query2="SELECT * FROM `trainingcontentheader` ORDER BY `trainingcontentheader`.`name` DESC";
$result2=mysqli_query($conn,$query2);
$x2=mysqli_fetch_all($result2,MYSQLI_ASSOC);

$query3="SELECT * FROM `groupstable` ORDER BY `groupstable`.`id` DESC";
$result3=mysqli_query($conn,$query3);
$x3=mysqli_fetch_all($result3,MYSQLI_ASSOC);


$query4="SELECT * FROM `videocontainer` ORDER BY `videocontainer`.`id` DESC";
$result4=mysqli_query($conn,$query4);
$x4=mysqli_fetch_all($result4,MYSQLI_ASSOC);

$query5="SELECT * FROM `videocontent`";
$result5=mysqli_query($conn,$query5);
$x5=mysqli_fetch_all($result5,MYSQLI_ASSOC);

$query6="SELECT * FROM `gymmapheader` ORDER BY `gymmapheader`.`name` DESC";
$result6=mysqli_query($conn,$query6);
$x6=mysqli_fetch_all($result6,MYSQLI_ASSOC);

$query7="SELECT * FROM `calculator` ORDER BY `calculator`.`id` DESC";
$result7=mysqli_query($conn,$query7);
$x7=mysqli_fetch_all($result7,MYSQLI_ASSOC);

$query8="SELECT * FROM `supportdiv` ORDER BY `supportdiv`.`name` DESC";
$result8=mysqli_query($conn,$query8);
$x8=mysqli_fetch_all($result8,MYSQLI_ASSOC);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Welcome to our fitness gym club">
        <!-- CSS only -->
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">


        <title>Fitness club</title>

    </head>
    <body>
		<?php include_once("header.php"); ?>
        <div class="left-container"></div>


        <div  class="web-containerrr" >
            <div class="slider-image">
                <figure>
                       <img class="pic" src="<?php echo $x[0]['link'] ?>" alt="gymPic1">
                       <img class="pic" src="<?php echo $x[1]['link'] ?>" alt="gymPic1">
                       <img class="pic" src="<?php echo $x[2]['link'] ?>" alt="gymPic1">
                       <img class="pic" src="<?php echo $x[0]['link'] ?>" alt="gymPic1">
                       <img class="pic" src="<?php echo $x[1]['link'] ?>" alt="gymPic1">
                </figure>


            </div>
            <div class="main-content">
                <h1 class="section-header"><?php echo $x1[0]['text'] ?></h1>
                <h4 class="section-header-content"><?php echo $x1[0]['description'] ?></h4>
                <button class="button-click" type="button" onclick="window.location.href='signin.php';"> Be a member </button>
            </div>

            <div class="training-content-header">
                <h1><?php echo $x2[2]['text'] ?></h1>
                <h3><?php echo $x2[1]['text'] ?></h3>
                <h5><?php echo $x2[0]['text'] ?></h5>

            </div>
            <div class="training-content">
                <a class="pic1" href="Clubs_Page.php">

                    <img class="image" src="<?php echo $x3[4]['gImage'] ?>" alt="">

                    <div class="hover-container" >


                        <h2 class="headline"><?php echo $x3[4]['gName'] ?>  </h2>
                        <div class="overlay">
                            <div class="textingTT"><?php echo $x3[4]['gDescription']?></div>
                        </div>
                    </div>


                </a>
                <a class="pic2" href="Clubs_Page.php">

                    <img class="image" src="<?php echo $x3[3]['gImage'] ?>" alt="">

                    <div class="hover-container" >


                        <h2 class="headline"><?php echo $x3[3]['gName'] ?></h2>
                        <div class="overlay">
                            <div class="textingTT" ><?php echo $x3[3]['gDescription']?></div>
                        </div>
                    </div>


                </a>
                <a class="pic3" href="Clubs_Page.php">

                    <img class="image" src="<?php echo $x3[2]['gImage'] ?>" alt="">

                    <div class="hover-container" >


                        <h2 class="headline"><?php echo $x3[2]['gName'] ?></h2>
                        <div class="overlay">
                            <div class="textingTT" ><?php echo $x3[2]['gDescription']?></div>
                        </div>
                    </div>


                </a>
                <a class="pic4" href="Clubs_Page.php">

                    <img class="image" src="<?php echo $x3[1]['gImage'] ?>" alt="">

                    <div class="hover-container" >


                        <h2 class="headline"><?php echo $x3[1]['gName'] ?></h2>
                        <div class="overlay">
                            <div class="textingTT" ><?php echo $x3[1]['gDescription']?></div>
                        </div>
                    </div>


                </a>
                <a class="pic5" href="Clubs_Page.php">

                    <img class="image" src="<?php echo $x3[0]['gImage'] ?>" alt="">

                    <div class="hover-container" >


                        <h2 class="headline"><?php echo $x3[0]['gName'] ?></h2>
                        <div class="overlay">
                            <div class="textingTT" ><?php echo $x3[0]['gDescription']?></div>
                        </div>
                    </div>


                </a>
            </div>

            <div class="video-container">

                <video id="classes" autoplay muted loop src="<?php echo $x4[0]['link'];  ?>"></video>

                <!-- some overlay text to describe the video -->
                <div class="video-content">
                    <h1><?php echo $x5[1]['text']?></h1>
                    <p><?php echo $x5[2]['text']?></p>
                    <button id="book-class" onclick="window.location.href='Clubs_Page.php';"><?php echo $x5[0]['text']?></button>
                </div>
            </div>
            <div class="gym-map-header">
                <h1><?php echo $x6[1]['text']?></h1>
                <h4><?php echo $x6[0]['text']?></h4>
            </div>
            <!-- ------------------------------------------------------------------------------------------------------------------------- -->
            <div class="calc-container">
                <div class="gym-calc">
                    <div class="calc-content">
                        <h2>BMI Calculator</h2>
                        <p class="form-text">Height</p>
                        <input type="text" id="h">
                        <p class="form-text">Weight</p>
                        <input type="text" id="w">
                        <p id="result"></p>
                        <button id="btn" onClick="BMI()">Calculate</button>
                        <p id="info">Please enter height [cm] and weight [kg]</p>
		            </div>
                </div>
                <div class="gym-info">

                    <h2><?php echo $x7[1]['text']?></h2>
                    <article><?php echo $x7[0]['text']?> </article>
                </div>
            </div>
            <!-- ----------------------------------------------------------------------------------------------------------------------------- -->
            <div class="support-div">
                <h1><?php echo $x8[1]['text']?></h1>
                <button class="button-click" type="button" onclick="window.location.href='support_page.php'"><?php echo $x8[0]['text']?></button>


            </div>


        </div>
        <div class="right-container"></div>
        <script >
            function BMI() {
                var h=document.getElementById('h').value;
                var w=document.getElementById('w').value;
                var bmi=w/(h/100*h/100);
                var bmio=(bmi.toFixed(2));
                if(bmio < 18.5){
                    document.getElementById("result").innerHTML="Your BMI is " + bmio + "<br>" + "Underweight";
                }
                else if( bmio>=18.5 && bmio<24.9){
                    document.getElementById("result").innerHTML="Your BMI is " + bmio + "<br>" + "Normal weight";
                }
                else if ( bmio>=25 && bmio<29.9 ){
                    document.getElementById("result").innerHTML="Your BMI is " + bmio + "<br>" + "overweight";
                }
                else if ( bmio>=30 && bmio<39.9 ){
                    document.getElementById("result").innerHTML="Your BMI is " + bmio + "<br>" + "obese";
                }
                else
                    document.getElementById("result").innerHTML="Your BMI is " + bmio + "<br>" + "severely obese";
            }
	    </script>
		<?php include_once("footer.php"); ?>
    </body>



</html>
