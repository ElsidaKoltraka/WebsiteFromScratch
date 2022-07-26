<?php 


	require 'connection.php';
	require 'functions.php';

	$s = clean($_GET['s']);

	$query = "SELECT userid, firstname, lastname, payment, city, CONCAT(firstname, ' ', lastname) as fullname 
	FROM gym_users WHERE CONCAT(firstname, ' ', lastname) LIKE '".$s."%' OR lastname LIKE '".$s."%' ORDER BY date_joined DESC LIMIT 5";

	if($result = mysqli_query($conn, $query)) {

		if(mysqli_num_rows($result) == 0) {
			echo "<ul><li class='none'>No results to display</li></ul>";
		} else {

			echo "<ul>";

			while($row = mysqli_fetch_assoc($result)) {
				echo "<li>";
				echo "<span class='name'>".$row['fullname']."</span>";

				echo "<div class='details'>";

				echo "<span><strong>#: </strong>".$row['userid']."</span>";
				echo "<span><strong>Payment: </strong>".$row['payment']."</span>";
				echo "<span><strong>City: </strong>".$row['city']."</span>";

				echo "</div></li>";

			}

			echo "</ul>";

		}

	} else {
		die("Error with the query");
	}

	mysqli_close($conn);

?>