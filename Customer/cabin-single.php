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
	            <p class="breadcrumbs mb-2" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2">
                <a href="cabin.php"> Cabin </a></span> <span> Cabin Single </span></p>
	            <h1 class="mb-4 bread">Cabin Single</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php 
$cid;
$price;
if(isset($_GET['cid']))
{
  $cid=$_GET['cid'];
  $sel=mysqli_query($conc,"SELECT * FROM cabin WHERE cid=$cid");
  $selc=mysqli_fetch_assoc($sel);
  $name=$selc['cname'];
  $price = $selc['cprice'];
  $img="../Admin/SystemImage/Cabin/".$selc['cimg'];
  $cno = $selc['cno'];

}
 ?>   
    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
          	<div class="row">
          		<div class="col-md-12 ftco-animate">
          			
                <h2 class="mb-4"> <?php echo $name; ?></h2>

          			<div class="single-slider owl-carousel">
          				<div class="item">
          					<div class="room-img" style="background-image: url(<?php echo $img; ?>);"></div>
          				</div>

                  <?php 
                  $imgsel=mysqli_query($conc,"SELECT img FROM cabinfacilities cf,facilities f,images i WHERE i.facid=f.facid AND cf.facid=f.facid AND cf.cbid=$cid");
                  while($rimg=mysqli_fetch_assoc($imgsel)) {
                    $fimg="../Admin/SystemImage/CabinFacility/".$rimg['img'];?>
          				<div class="item">
          					<div class="room-img" style="background-image: url(<?php echo $fimg; ?>);"></div>
          				</div>
          			<?php } ?>
          			</div>
          		</div>

          	 <div class="col-md-12 room-single mt-4 mb-5 ftco-animate">
    						<div class="d-md-flex mt-5 mb-5">
    							<ul class="list">
	    							<li class="text-info"><span>Price : </span> $ <?php echo $price ?></li>
	    							<li class="text-info"><span> Cabin No:</span> <?php echo $cno; ?></li>
	    						</ul>
    						</div>
          		</div>




<?php 
if(isset($_SESSION['customer']))
{ ?>
          		<div class="col-md-12 properties-single ftco-animate mb-5 mt-4">
          			<h4 class="mb-4"> Make Booking </h4>
          			<div class="row">
          				<div class="col-md-6">
          					<form method="post" class="" action="">
										  <div class="form-check">
												<label class="form-check-label" for="name">
                           Name
												</label>
                        <input type="text" class="form-control" name="name">
										  </div>

										  <div class="form-check">
                        <label class="form-check-label" for="nrc">
                          NRC
                        </label>
									      <input type="text" class="form-control" name="nrc">
										  </div>
										 
                      <div class="form-check">
                        <label class="form-check-label" for="arrivaldate">
                          Arrival Date
                        </label>
                        <input type="date" class="form-control" name="adate">
                      </div>

                       <div class="form-check">
                        <label class="form-check-label" for="nop">
                          No of People
                        </label>
                        <input type="number" class="form-control" name="nop" min="1">
                      </div>

                       <div class="form-check">
                        <label class="form-check-label" for="lstay">
                          Length Stay
                        </label>
              <input type="number" class="form-control" name="lstay" min="1" onchange="getP();" id="lstay">
                      </div>

                      <input type="hidden" name="price" id="price" value="<?php echo $price; ?>">
                       <div class="form-check">
                        <label class="form-check-label" for="ebed">
                         Extra Bed
                        </label>
                        <input type="number" class="form-control" name="ebed" min="0" id="ebed" onchange="getBookingPrice();" value="0">
                      </div>

                       <div class="form-check">
                        <label class="form-check-label" for="ebed">
                         Booking Price
                        </label>
                        <input type="number" class="form-control" name="bprice" min="0" id="bprice">
                      </div>

                      <input type="hidden" name="cid" value="<?php echo $cid; ?>">
                      <div class="form-check mt-4">
                      <input type="submit" name="booking" value="Book Now" class="btn btn-info">
                    </div>
										  </div>
										  
										  
										</form>
          				</div>
          			</div>
<?php } ?>


          		</div>

          
          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar ftco-animate">  
            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3> Facilities </h3>
    <?php 
     $selfac=mysqli_query($conc,"SELECT f.desc FROM cabinfacilities cf,facilities f WHERE cf.facid=f.facid AND cf.cbid=$cid");
     while($ro=mysqli_fetch_assoc($selfac))
     {
                 ?>
                <li><a href="#"> <?php echo $ro['desc']; ?> </a></li>
      <?php } ?>      
              </div>
            </div>
          
          </div>
        </div>
      </div>
    </section> <!-- .section -->


 
 <?php include('footer.php'); ?>
    

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


 <script type="text/javascript">
  
    function getP()
    {
      
      var d=document.getElementById('lstay').value;
      var p=document.getElementById('price').value;
      var t=Number(d)*Number(p);
      document.getElementById('bprice').value=t;
    }

 function getBookingPrice()
    {
      var bp=document.getElementById('bprice').value;
      var eb=document.getElementById('ebed').value;
      var ebt=Number(eb)*Number(100);
      var total =  Number(bp)+Number(ebt);
      document.getElementById('bprice').value=total;
    }

  </script>




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

<?php 
if(isset($_POST['booking']))
{
  $n=$_POST['name'];
  $nrc=$_POST['nrc'];
  $adate=$_POST['adate'];
  $nop=$_POST['nop'];
  $price=$_POST['bprice'];
  $lstay=$_POST['lstay'];
  $ebed = $_POST['ebed'];
  $cid=$_POST['cid'];
  $bdate = date('Y-m-d');

  $custid=$_SESSION['customer'];

  $ins=mysqli_query($conc,"INSERT INTO booking(custId,lengthofstay,extrabed,nop,arrivaldate,bprice) 
    VALUES($custid,$lstay,$ebed,$nop,'$adate',$price)");
  if($ins)
  {
    $bid=mysqli_insert_id($conc);

    $insertbc=mysqli_query($conc,"INSERT INTO bookingcabin(bid,cid,bookingdate) VALUES($bid,$cid,'$bdate')");

    if($insertbc)
    {
      $bcid=mysqli_insert_id($conc);
      $inbd=mysqli_query($conc,"INSERT INTO bookigdetail(custname,nrc,checkindate,checkoutdate,checkintime,checkouttime,bcid) VALUES('$n','$nrc','0000-00-00','0000-00-00','','',$bcid)");

      if($inbd)
      {
        echo "<script> alert('Booking Success! You need to pay your amount within 2 Hours'); 
              location.href='payment.php';
              </script>";
      }
     
    }
  }


} ?>