
<?php 
session_start();
 include '../connection.php';

 if(!isset($_SESSION['admin_id']))
 {
  header("location:AdminLogin.php");
    //echo "<script> location.href='AdminLogin.php;</script>";
 }




 ?>

<!--Header-part-->
<div id="header">
  <h1><a href="index.php"> BlueStar Admin </a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome Admin</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="profile.php"><i class="icon-user"></i> My Profile </a></li>
        <li class="divider"></li>
        
        <li><a href="logout.php"><i class="icon-key"></i> Log Out </a></li>
      </ul>
    </li>
 
  </ul>
</div>