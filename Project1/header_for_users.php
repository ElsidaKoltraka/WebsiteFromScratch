<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

    

      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

    <?php 

      if(isset($_SESSION['username'], $_SESSION['password'])) {

    ?>

      <form class="navbar-form navbar-right"  action="searchresults.php" method="GET">

        <div class="search-area">
          <div class="form-group">

            <div class="search-wrap">

              <label for="searchbox" class="sr-only">Search:</label>
              <input type="text" class="form-control" name="searchbox" id="searchbox" placeholder="Search USER name here" required autocomplete="off">
              
              <div class="search-results hide"></div>

            </div>
            

          </div>
          <input type="submit" name="search" id="search-btn" value="Search" class="btn btn-default">

        </div>
        
     <span class="psw1"><div  class="welcome" id="link"><?php echo "Welcome, ".$_SESSION['username']."  !";?></div></span>   

       <span class="psw"  aria-hidden="true"> <a href="logout.php">Log Out </span></a>

      </form>

      <?php 

        } else {
          echo "<span class='not-logged'>Not logged in.</span>";
        }

      ?>

      


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>