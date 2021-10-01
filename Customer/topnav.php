
<?php
session_start();

include('../connection.php'); 	
 ?>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Blue Star </a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link"> Home </a></li>
	          <li class="nav-item"><a href="cabin.php" class="nav-link"> Cabins </a></li>
	        <li class="nav-item"><a href="resortfacilities.php" class="nav-link"> Resort Facilities </a></li>

	      <?php 	
	      if(isset($_SESSION['member']))
	      { ?>
            <li class="nav-item"><a href="event.php" class="nav-link"> Events </a></li>
            <li class="nav-item"><a href="activities.php" class="nav-link"> Activities </a></li>
           <?php 	
       		}
       		elseif(isset($_SESSION['customer']))
       		{
            ?>
           <li class="nav-item"><a href="payment.php" class="nav-link">Payment Info</a></li>
            <?php 
            }
             ?>

	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>


            <li class="nav-item"><a href="signin.php" class="nav-link">SignIn</a> </li>

           <?php
           if(isset($_SESSION['member']) || isset($_SESSION['customer']))
           { ?>
           		<li class="nav-item">
           			<a href="logout.php" class="nav-link">Logout</a> 
           		</li>
           	<?php 	} ?>
	        </ul>
	      </div>
	    </div>
	  </nav>