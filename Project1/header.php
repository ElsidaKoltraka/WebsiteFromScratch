<nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="nb">
	<div class="container">
		<a class="navbar-brand" href="index.php">
			<img src="./images/logo.png" alt="GYM7" height="40px">
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarColor02">
		<ul class="navbar-nav ms-auto">
				
				<li class="nav-item">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="Clubs_Page.php">Clubs</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="trainers.php">Trainers</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="support_page.php">Support</a>
				</li>
				<button type="button" class="btn btn-primary" onclick="document.location='signin.php'">Log In/Register</button>
				<!--For small devices-->
				<li class="nav-item d-xl-none d-lg-none">
					<a class="nav-link" href="profile.php">My Page</a>
				</li>
				<!--<li class="nav-item d-xl-none d-lg-none">
					<a class="nav-link" href="Clubs_Page.php">Groups</a>
				</li>-->
				<li class="nav-item d-xl-none d-lg-none">
					<a class="nav-link" href="AdminPage.php">Admin</a>
				</li>
				<!--For big devices-->
				<li class="nav-item dropdown d-none d-lg-block">
		          	<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
					  		<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
						</svg>
					</a>
		          	<div class="dropdown-menu">
		            	<a class="dropdown-item" href="profile.php">My Page</a>
		            	<!--<a class="dropdown-item" href="Clubs_Page.php">Groups</a>-->
						<a class="dropdown-item" href="AdminPage.php">Admin</a>
		         	</div>
		        </li>
			

				
				
			</ul>
		</div>
	</div>
</nav>