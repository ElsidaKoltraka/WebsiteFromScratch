<?php  
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);
//If admin is not loged in redirect into adminsign page
if(!isset($_SESSION['login']))
{
  header('Location:signInAdmin.php'); die();
}
include('connection.php');
//get a trainer from trainers table  
$getTrainer = $con->prepare("SELECT id,firstname,lastname FROM `trainers`");
$getTrainer->execute();
$getTrainer = $getTrainer->fetchAll();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Create New Group</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">	
</head>
<body>
		<?php
		include('header.php');
		//Insert data into groups table 
		if(isset($_POST['submitToDateBase']))
		{
			$grName = $_POST['formName'];
			$grDur = $_POST['formDuration']." minutes";
			$grDiff = $_POST['formDifficulty'];
			$grDay = $_POST['checkDay'];
			$grTime = $_POST['formTime'];
			$grDesc = $_POST['formDesc'];
			$grImage = $_POST['uploadImage'];
			$grTrainer = $_POST['selectedTrainer'];
			$insert = $con->prepare("INSERT INTO `groupstable` (`id`, `gName`, `gDuration`, `gDifficulty`, `gDay`, `gTime`, `gDescription`, `gImage`, `trainer`) VALUES (NULL, '$grName', '$grDur', '$grDiff', '$grDay', '$grTime ', '$grDesc', '$grImage','$grTrainer')");
			if($insert->execute())
			{
				echo "Group has been created";
				header('Location:AdminPage.php'); die();
			}
			else
			{
				echo "Faild to create group";
			}

		}
		?>

		<div class="container">
			<h1>Create a New Group</h1>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
				<div class="form-group">
					<label for="formName">Group Name</label>
					<input type="text" class="form-control" id="formName" name="formName" placeholder="Yoga">
					<small class="form-text text-muted">The Group name must be unique.</small>
				</div>
				<div class="form-group">
					<label for="formDuration">Duration of class (in minutes)</label>
					<input type="number" class="form-control" id="formDuration" name="formDuration" placeholder="Minutes">
				</div>
				<div class="form-group">
					<label for="formDifficulty">Difficulty</label>
					<div class="form-check">
						<input type="radio" class="form-check-input" id="formDifficulty1" name="formDifficulty" value="Easy">
						<label for="formDifficulty1">Easy</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" id="formDifficulty2" name="formDifficulty" value="Medium">
						<label for="formDifficulty2">Medium</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" id="formDifficulty3" name="formDifficulty" value="Hard">
						<label for="formDifficulty3">Hard</label>
					</div>
				</div>
				<div class="form-group">
					<label for="">Select the day(s) in which the group classes will be held</label>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="checkMonday" name="checkDay" value="Monday">
						<label for="checkMonday">Monday</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="checkTuesday" name="checkDay" value="Tuesday">
						<label for="checkTuesday">Tuesday</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="checkWednessday" name="checkDay" value="Wednesday">
						<label for="checkWednessday">Wednesday</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="checkThursday" name="checkDay" value="Thursday">
						<label for="checkThursday">Thursday</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="checkFriday" name="checkDay" value="Friday">
						<label for="checkFriday">Friday</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="checkSaturday" name="checkDay" value="Saturday">
						<label for="checkSaturday">Saturday</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="checkSunday" name="checkDay" value="Sunday" disabled>
						<label for="checkSunday">Sunday</label>
					</div>
				</div>

				<div class="form-group">
					<label for="formTime">Select a time:</label>
					<input type="time" id="formTime" name="formTime">
				</div>

				<div class="form-group">
					<label for="formDesc">Description:</label>
					<textarea class="form-control" rows="8" id="formDesc" name="formDesc"></textarea>
				</div>

				<div class="form-group">
					<label for="uploadImage">Select an image for this Group:</label>
					<input type="file" class="form-control-file" id="uploadImage" name="uploadImage"><br>
				</div>

				<div>
				<label for="formTrain"><br>Trainer:&nbsp</label>
					<select name="selectedTrainer">
					<option>Select_a_trainer</option>
					<?php foreach ($getTrainer as $out)   {?>
					<option ><?php echo $out["firstname"];?> <?php echo $out["lastname"];?></option> 
					<?php }?>
					</select>
				</div>
				<br><br>
				<input type="submit" value="submitToDateBase" name="submitToDateBase">
			</form>
		</div>
		<?php
			include('footer.php')
		?>
	</body>
</html>