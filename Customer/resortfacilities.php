<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Blue Star Resort </title>
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
	            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span>Blog</span></p>
	            <h1 class="mb-4 bread">Blog</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
<?php 
  $total_pages;
    $total_pages_sql;
        if (isset($_GET['pageno'])) {
         $pageno = $_GET['pageno'];
        } 
        else 
        {
            $pageno = 1;
        }
        $no_of_records_per_page = 8;
        $offset = ($pageno-1) * $no_of_records_per_page;
        
        $total_pages_sql = "SELECT COUNT(*) FROM resortfacilities";
        
        $result = mysqli_query($conc,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }


  $query="SELECT * FROM resortfacilities LIMIT $offset, $no_of_records_per_page";
                $result= mysqli_query($conc,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                  $facid=$row["rsfacid"];
                  $name=$row["rsname"];
                  $desc=$row["rsdesc"];
                  $img="../Admin/SystemImage/ResortFacility/".$row["rsimg"]; ?>
          <div class="col-md-3">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('<?php echo $img; ?>');">
              </a>
              <div class="text mt-3 d-block">
                <h3 class="heading mt-3">
                <a href=""> <?php echo $name; ?></a>  
                </h3>
                <div class="meta mb-3">
                  <div><a href="#"> <?php echo $desc; ?></a></div>
                 
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
         
        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
                <ul>
          <?php 
    if ($total_pages <= 10)
      {       
    for ($counter = 1; $counter <= $total_pages; $counter++)
    {
    if ($counter == $pageno) 
    {
 ?>
   <li class='active'> <a> <?php echo $counter; ?></a> </li>
    <?php 
    
    }

    elseif($counter == $total_pages)
    {
    ?>
<li>
  <a href="?pageno=<?php echo $total_pages; ?>"> <?php echo $counter; ?> </a>
   </li>

    <?php  
 
  }
     else
    
   {
     ?>       
           
        <li>  <a href="?pageno=<?php echo $counter; ?>"> <?php echo $counter; ?> </a></li>
 <?php 
  }
 }
}
   ?>
 </ul>
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