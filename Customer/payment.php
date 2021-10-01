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
                <a href=""> Payment </a></span> <span> Payment </span></p>
	            <h1 class="mb-4 bread">Cabin Single</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php 
$cid;
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
          <div class="col-lg-12">
          	<div class="row">

          		<div class="col-md-6 properties-single ftco-animate mb-5 mt-4">
          			<h4 class="mb-4"> Check Booking </h4>
          			<div class="row">
          				<div class="col-md-12">
          					<form method="post" class="" action="">
										  <div class="form-check">
												<label class="form-check-label" for="name">
                           Email
												</label>
                        <input type="text" class="form-control" name="mail">
										  </div>

										  <div class="form-check">
                        <label class="form-check-label" for="nrc">
                          Password
                        </label>
									      <input type="password" class="form-control" name="psw">
										  </div>

                      <div class="form-check">
                        <label class="form-check-label" for="nrc">
                          Arrival Date
                        </label>
                        <input type="date" class="form-control" name="adate">
                      </div>

                      <div class="form-check mt-4">
                      <input type="submit" name="search" value="Check" class="btn btn-info">
                    </div>
                    </form>
										  </div>
                  </div>
          				</div>

          <?php 
          $bid;
          if(isset($_POST['search']))
          {
          $e=$_POST['mail'];
          $p=$_POST['psw'];
          $adate=$_POST['adate'];
          $selo=mysqli_query($conc,"SELECT * FROM 
customers c,booking b,bookingcabin bc,bookigdetail bd,cabin cb
WHERE c.custId=b.custId AND bc.bid=b.bid AND bd.bcid=bc.bcid AND c.custemail='$e' AND c.custpsw='$p' AND b.arrivaldate='$adate' AND bc.cid=cb.cid"); 
          $ans=mysqli_fetch_assoc($selo);
          $name=$ans['custn'];
          $cname=$ans['cname'];
          $nrc=$ans['nrc'];
          $nop=$ans['nop'];
          $lstay=$ans['lengthofstay'];
          $ebed=$ans['extrabed'];
          $price=$ans['bprice'];

          $bid=$ans['bid'];

          ?>


                    <div class="col-md-6">

                      <form method="post" class="" action="">

                        <div class="form-check">
                        <label class="form-check-label" for="name">
                           Name 
                        </label>
                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" disabled>
                      </div>

                      <div class="form-check">
                        <label class="form-check-label" for="name">
                           NRC 
                        </label>
                        <input type="text" class="form-control" name="nrc" value="<?php echo $nrc; ?>" disabled>
                      </div>

                      <div class="form-check">
                        <label class="form-check-label" for="name">
                           Cabin 
                        </label>
                        <input type="text" class="form-control" name="cname" value="<?php echo $cname; ?>" disabled>
                      </div>

                       <div class="form-check">
                        <label class="form-check-label" for="name">
                           No of People 
                        </label>
                        <input type="text" class="form-control" name="nop" value="<?php echo $nop; ?>" disabled>
                      </div>

                       <div class="form-check">
                        <label class="form-check-label" for="name">
                           Length of Stay 
                        </label>
                        <input type="text" class="form-control" name="lstay" value="<?php echo $lstay; ?>" disabled>
                      </div>

                       <div class="form-check">
                        <label class="form-check-label" for="name">
                           Extra Bed 
                        </label>
                        <input type="text" class="form-control" name="cname"  value="<?php echo $ebed; ?>" disabled>
                      </div>

                       <div class="form-check">
                        <label class="form-check-label" for="name">
                           Arrival Date 
                        </label>
                        <input type="text" class="form-control" name="adate" value="<?php echo $adate; ?>" disabled>
                      </div>

                       <div class="form-check">
                        <label class="form-check-label" for="name">
                           Total  
                        </label>
                        <input type="text" class="form-control" name="total" value="<?php echo $price; ?>" disabled>
                      </div>

                      <div class="form-check mt-4">
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#MakePayment" aria-expanded="false" aria-controls="MakePayment">
      Make Payment
  </button>
                    </div>
                    </form>
                    </div>
            <?php } ?>
          			</div>


          		</div>

          
          </div> <!-- .col-md-8 -->
        
        </div>

<div class="container mt-5">
<div class="collapse col-md-6" id="MakePayment">
  <div class="card card-body">

      <form method="post" class="" action="" enctype="multipart/form-data">
        <div class="form-check">
          <label class="form-check-label" for="name">
             Payment Image
          </label> <br> <br>
          <input type="file" class="form-control" name="pimg">
        </div>
        <input type="hidden" name="bid" value="<?php echo $bid; ?>">
        <div class="form-check mt-4">
        <input type="submit" name="pay" value="Pay" class="btn btn-info">
      </div>
      </form>

  </div>
</div>
</div>


<?php 
if(isset($_POST['pay']))
{
  $ptime=date("h:i:sa");
  $pimg = $_FILES['pimg']['name'];
  $tmp = $_FILES['pimg']['tmp_name'];
  $bid=$_POST['bid'];
  $pdate=date('Y-m-d');

$npay=mysqli_query($conc,"INSERT INTO payment(pimg,pmdate,pmtime,bid) VALUES('$pimg','$pdate','$ptime',$bid)");
  if($npay)
  {
    move_uploaded_file($tmp,"../Admin/SystemImage/Payment/".$pimg);
    echo "<script> alert('Payment Successful'); </script>";
  }
  else
  {
    echo "error";
  }
} ?>


      </div>
    </section> <!-- .section -->


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

  <script src="js/scrollax.min.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>

<?php 

 ?>