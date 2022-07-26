function getTrainers($image1,$firstname2,$lastname1,$description2,$certified)
{
	echo	 '<div class="col-lg-4 col-md-6">';
	echo       '<div class="card">';
	echo         '<img class="card-img-top" src="'.$image1.'" alt="Card image cap">';
	echo          '<div class="card-body">';
	echo            '<h5 class="card-title">'.$firstname2. $lastname1.'</h5>';
	echo              '<p class="card-text">';
	//echo                 ''.$attr['gDescription'].'';			 
	echo             "</p>";
	echo		'</div>';
	echo		'<div class="accordion accordion-flush" id="accordion1">';
	echo			'<div class="accordion-item">';
	echo				'<h2 class="accordion-header" id="info1">';
	echo					'<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#info-collapse1" aria-expanded="false" aria-controls="info-collapse1"> Read me</button>';
	echo			'</h2>';
	echo			'<div id="info-collapse1" class="accordion-collapse collapse" aria-labelledby="info1" data-bs-parent="#accordion1">';
	echo				'<div class="accordion-body">';
	
	echo              '<p class="card-text">';
	echo                 ''.$description2.'';			 
	echo             "</p>";

	echo				'</div>';
	echo			'</div>';
	echo		'</div>';
	'<div class="accordion-item">';
	echo				'<h2 class="accordion-header" id="info2">';
	echo					'<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#info-collapse2" aria-expanded="false" aria-controls="info-collapse2"> certified</button>';
	echo			'</h2>';
	echo			'<div id="info-collapse2" class="accordion-collapse collapse" aria-labelledby="info2" data-bs-parent="#accordion1">';
	echo				'<div class="accordion-body">';
	
	echo              '<p class="card-text">';
	echo                 ''.$certified.'';			 
	echo             "</p>";

	echo				'</div>';
	echo			'</div>';
	echo		'</div>';
	echo '</div>';
	echo '</div>';

}


?>