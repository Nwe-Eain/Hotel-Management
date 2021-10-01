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

   <?php

    include('topnav.php');

    ?>
    <!-- END nav -->

    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span>SingUp</span></p>
	            <h1 class="mb-4 bread"> Sign Up </h1>
            </div>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h3"> </h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3 d-flex bg-primary">
          	<div class="info bg-white p-4">
	            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#singupcustomer" aria-expanded="true" aria-controls="singupcustomer">
               Customer Singup
          </button>
	          </div>
          </div>
          <div class="col-md-3 d-flex bg-info">
          	<div class="info bg-white p-4">
	          <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#singincustomer"  aria-expanded="true" aria-controls="singincustomer">
               Customer SignIn
          </button>
	          </div>
          </div>
          <div class="col-md-3 d-flex bg-warning">
          	<div class="info bg-white p-4">
	           <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#signupmember"  aria-expanded="true" aria-controls="signupmember">
               Member Singup
          </button>
	          </div>
          </div>
          <div class="col-md-3 d-flex bg-success">
          	<div class="info bg-white p-4">
	           <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#signinmember"  aria-expanded="true" aria-controls="signinmember">
               Member SignIn
          </button>
	          </div>
          </div>
        </div>

<div class="accordion" id="infoparent">

        <div class="row block-9 collapse show" id="singupcustomer" data-parent="#infoparent">
          <div class="col-md-6 order-md-last d-flex">

            <form action="" class="bg-white p-5 contact-form" method="post">
              <h4>  Customer Singup Form </h4> <br> <br>  
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name" name="name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email" name="email">
              </div>
              <div class="form-group">
                <input type="number" class="form-control" placeholder="Phone" min="1" name="phone">
              </div>
              <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" name="psw">
              </div>

              <div class="form-group">
              <input type="password" class="form-control" placeholder="Confirm Password" name="repsw">
              </div>

              <div class="form-group">
                <input type="submit" value="SingUp" class="btn btn-primary py-3 px-5" name="csignup">
              </div>
            </form>
          
          </div>
        </div>

        <div class="row block-9 collapse" id="singincustomer" data-parent="#infoparent">
          <div class="col-md-6 order-md-last d-flex">

            <form action="" class="bg-white p-5 contact-form" method="post">
              <h4>  Customer SignIn Form </h4> <br> <br>  
              
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email" name="email">
              </div>
             
              <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" name="psw">
              </div>

              <div class="form-group">
                <input type="submit" value="SingIn" class="btn btn-primary py-3 px-5" name="csignin">
              </div>
            </form>
          
          </div>
        </div>


        <div class="row block-9 collapse" id="signupmember" data-parent="#infoparent">
          <div class="col-md-6 order-md-last d-flex">

            <form action="" class="bg-white p-5 contact-form" method="post">
              <h4>  Member Singup Form </h4> <br> <br>  
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Member Name" name="name">
              </div>

              <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" name="psw">
              </div>

              <div class="form-group">
                <input type="submit" value="SingUp" class="btn btn-primary py-3 px-5" name="msignup">
              </div>

            </form>
          
          </div>
        </div>

           <div class="row block-9 collapse" id="signinmember" data-parent="#infoparent">
          <div class="col-md-6 order-md-last d-flex">

            <form action="" class="bg-white p-5 contact-form" method="post">
              <h4>  Member Singin Form </h4> <br> <br>  
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Member Name" name="name">
              </div>

              <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" name="psw">
              </div>

              <div class="form-group">
                <input type="submit" value="SingUp" class="btn btn-primary py-3 px-5" name="msignin">
              </div>

            </form>
          
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


<?php  

if(isset($_POST['csignin']))
{


  $e=$_POST['email'];
  $p=$_POST['psw'];

  $sel=mysqli_query($conc,"SELECT * FROM customers WHERE custemail='$e' AND custpsw='$p'");
  $rn=mysqli_num_rows($sel);

  if($rn>0)
  {
    $s=mysqli_fetch_assoc($sel);

    $_SESSION['customer']=$s['custId'];
      unset($_SESSION['member']);
    echo "<script> location.href='index.php'; </script>";


  }
  else
  {
      echo "<script> alert('eee'); </script>";

  }



} 


if(isset($_POST['msignin']))
{
 

  $n=$_POST['name'];
  $p=$_POST['psw'];

  $sel=mysqli_query($conc,"SELECT * FROM members WHERE mname='$n' AND mpsw='$p'");
  $rn=mysqli_num_rows($sel);

  if($rn>0)
  {
    $s=mysqli_fetch_assoc($sel);

    $_SESSION['member']=$s['mid'];
     unset($_SESSION['customer']);
    echo "<script> location.href='index.php'; </script>";

  }
  
}

 ?>