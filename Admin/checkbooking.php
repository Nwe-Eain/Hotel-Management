<!DOCTYPE html>
<html lang="en">
<head>
<title> BlueStar</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<?php 
include('mainheader.php');
 ?>

<!--sidebar-menu-->
<div id="sidebar"><a href="index.php" class="visible-phone"><i class="icon icon-home"></i> Dashboard
</a>
  <ul>
    <li ><a href="index.php"><i class="icon icon-home"></i> <span>Check-In &amp; Out</span></a> </li>
    <li class="active"> <a href="bookingList.php"><i class="icon icon-signal"></i> <span> Booking List</span></a> </li>
    <li> <a href="bookingList.php"><i class="icon icon-signal"></i> <span> Payment List</span></a> </li>
    <li > <a href="resortfacilitiesUpdate.php"><i class="icon icon-list"></i> <span> Resort Facilities</span></a> </li>
    
    <li > <a href="event.php"><i class="icon icon-list"></i> <span> Events</span></a> </li>

    <li > <a href="activities.php"><i class="icon icon-list"></i> <span> Activities</span></a> </li>

    <li > <a href="cabintype.php"><i class="icon icon-list"></i> <span> Cabin Type</span></a> </li>

    <li> <a href="cabinfacilities.php"><i class="icon icon-list"></i> <span> Cabin's Facilities</span></a> </li>
      
    </li>
    <li ><a href="cabin.php"><i class="icon icon-pencil"></i> <span>Cabin</span></a></li>

  <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Report</span> <span class="label label-important">5</span></a>
      <ul>
        
        <li><a href="mostvisit.php"> Most Visit Month</a></li>
        <li><a href="dailyincome.php"> Daily Income </a></li>
        <li><a href="monthlyincome.php"> Monthly Income</a></li>
        <li><a href="yearlyincome.php">Yearly Income</a></li>
        
      </ul>
    </li>
   
  </ul>
</div>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Booking Lists</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5> Check Customers' Booking</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table table-responsive">
              <thead>
                <tr>

                  <th>No</th>
                  <th>Check-In Date</th>
                  <th>Check-Out Date</th>
                  <th>Check-In Time</th>
                  <th>Check-Out Time</th>
                  <th>Add Checkin</th>
                  <th>Chek Payment </th>

                </tr>
              </thead>
              <tbody>
 <?php 
 $i=1;
 $bid=$_GET['bid'];
 $sel=mysqli_query($conc,"SELECT * FROM 
customers c,booking b,bookingcabin bc,bookigdetail bd,cabin cb
WHERE c.custId=b.custId AND bc.bid=b.bid AND bd.bcid=bc.bcid AND bc.cid=cb.cid AND b.bid=$bid Order by b.bid DESC");
    while($ans=mysqli_fetch_assoc($sel))
    {
         
          $checkindate=$ans['checkindate'];
          $checkoutdate=$ans['checkoutdate'];
          $checkintime = $ans['checkintime'];
          $checkouttime=$ans['checkouttime'];
       
          $bid=$ans['bid'];
 ?>


        <tr>
          <td>  <?php echo $i; $i++;?> </td>
         
          <td> <?php echo $checkindate; ?></td>
          <td> <?php echo $checkoutdate; ?></td>
          <td> <?php echo $checkintime; ?></td>
          <td> <?php echo $checkouttime; ?></td>
          <td> 

<?php 

$ch=mysqli_query($conc,"SELECT status FROM payment WHERE bid=$bid");
$rn=mysqli_num_rows($ch);
if($rn>0)
{
$ac=mysqli_fetch_assoc($ch);
$st=$ac['status'];
if($st=="Confirm")
{ ?>
            <a href="index.php?act=checkin&bid=<?php echo $bid; ?>" class="btn btn-success btn-sm"> Checkin </a>
            <a href="index.php?act=checkout&bid=<?php echo $bid; ?>" class="btn btn-success btn-sm"> Checkout </a>

<?php }
elseif($st=="Cancel")
{
  echo "Booking Cancel";
}
} ?>
          </td>
          <td> <a href="checkpayment.php?bid=<?php echo $bid; ?>" class="btn btn-primary btn-sm"> Check Payment </a></td>


        </tr>

      <?php } ?>
                
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
</body>
</html>
