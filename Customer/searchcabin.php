<!DOCTYPE html>
<html lang="en">
  <head>
    <title> BLue Star Resort</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

   <?php include('topnav.php'); ?>
    <!-- END nav -->

    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> Rooms <span></span></p>
	            <h1 class="mb-4 bread">Rooms</h1>
            </div>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
	        <div class="col-lg-12">
		    <div class="row">
 <?php 
if(isset($_POST['search']))
{
 $ctid=$_POST['ctid'];
 $cindate=$_POST['cindate'];
 $coutdate = $_POST['coutdate'];
 $nop=$_POST['nop'];


 $selroom=mysqli_query($conc,"SELECT * FROM cabin,cabintype WHERE cabin.ctid=cabintype.ctid AND cabin.ctid=$ctid");
 while($r=mysqli_fetch_assoc($selroom))
 {
 	$img='../Admin/SystemImage/Cabin/'.$r['cimg'];
 	$name=$r['cname'];
 	$no=$r['cno'];
 	$price=$r['cprice'];
 	$cid=$r['cid'];
  $type=$r['type'];
 ?>
		    			
		    			<div class="col-sm col-md-4 col-lg-4 ftco-animate">
		    				<div class="room">
		    					<a href="cabin-single.php?cid=<?php echo $cid; ?>" class="img d-flex justify-content-center align-items-center" style="background-image: url(<?php echo $img; ?>);">
		    						<div class="icon d-flex justify-content-center align-items-center">
		    							<span class="icon-search2"></span>
		    						</div>
		    					</a>
		    					<div class="text p-3 text-center">
		    						<h3 class="mb-3"><a href="cabin-single.php?cid=<?php echo $cid; ?>"> <?php echo $name; ?></a></h3>
		    						<p><span class="price mr-2">$<?php echo $price; ?></span> <span class="per">per night</span></p>
		    						<hr>
		    						<p class="pt-1"><a href="cabin-single.php?cid=<?php echo $cid; ?>" class="btn-custom"> Detail <span class="icon-long-arrow-right"></span></a></p>
		    					</div>
		    				</div>
		    			</div>
		    			
		    <?php } 
      }?>

		    		</div>
		
		    	</div>
		    	
	      		
	        </div>
		    </div>
    	</div>
    </section>

<?php include('footer.php'); ?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>