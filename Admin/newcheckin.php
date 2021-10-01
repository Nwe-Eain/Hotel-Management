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
            <h5> Customers' Booking</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table table-responsive">
              <thead>
                <tr>

                  <th>No</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Phone Number</th>
                  <th>NRC_No</th>
                  <th>Cabin</th>
                  <th>Cabin No</th>
                  <th>Number of People</th>
                  <th>Extra Bed</th>
                  <th>Length of Stay</th>
                  <th>Price</th>
                  <th>Check Out</th>

                 

                </tr>
              </thead>
              <tbody>
 <?php 
 $i=1;
 $selp=mysqli_query($conc,"SELECT booking.bid FROM booking LEFT OUTER JOIN payment ON (payment.bid=booking.bid) WHERE payment.bid is NULL");

if(isset($selp))
{
while($cp=mysqli_fetch_assoc($selp))
{
  $bid=$cp['bid'];

$sel=mysqli_query($conc,"SELECT * FROM 
customers c,booking b,bookingcabin bc,bookigdetail bd,cabin cb
WHERE c.custId=b.custId AND bc.bid=b.bid AND bd.bcid=bc.bcid AND bc.cid=cb.cid AND b.bid=$bid");
    while($ans=mysqli_fetch_assoc($sel))
    {
          $name=$ans['custname'];
          $mail =$ans['custemail'];
          $cno=$ans['cno'];
          $cname=$ans['cname'];
          $nrc=$ans['nrc'];
          $nop=$ans['nop'];
          $lstay=$ans['lengthofstay'];
          $ebed=$ans['extrabed'];
          $price=$ans['bprice'];
         
          $ph = $ans['custph'];


          $bid=$ans['bid'];
 ?>


        <tr>
          <td>  <?php echo $i; $i++;?> </td>
          <td> <?php echo $mail; ?></td>
          <td> <?php echo $name;?> </td>
          <td> <?php echo $ph; ?></td>
          <td> <?php echo $nrc; ?></td>
          <td> <?php echo $cname; ?></td>
          <td> <?php echo $cno; ?></td>
          <td> <?php echo $nop; ?></td>
          <td> <?php echo $ebed; ?></td>
          <td> <?php echo $lstay; ?></td>
          <td> <?php echo $price; ?></td>
          <td> <a href="index.php?act=checkout&bid=<?php echo $bid; ?>" class="btn btn-info"> Check Out</a></td>

        </tr>

      <?php }
      }
      } ?>
                
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
