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
  include '../connection.php'
?>
<?php 
include('mainheader.php');
 ?>

<?php 
$mm =array();
$mm =['January','February','March','April','May','June','July','August','September','Octorber','November','December'];
 ?>

<!--sidebar-menu-->
<div id="sidebar"><a href="index.php" class="visible-phone"><i class="icon icon-home"></i> Dashboard
</a>
 <ul>
    <li><a href="index.php"><i class="icon icon-home"></i> <span>Check-In &amp; Out</span></a> </li>
    <li> <a href="bookingList.php"><i class="icon icon-signal"></i> <span> Booking List</span></a> </li>
    <li> <a href="bookingList.php"><i class="icon icon-signal"></i> <span> Payment List</span></a> </li>
    <li > <a href="resortfacilitiesUpdate.php"><i class="icon icon-list"></i> <span> Resort Facilities</span></a> </li>
    
    <li > <a href="event.php"><i class="icon icon-list"></i> <span> Events</span></a> </li>

    <li > <a href="activities.php"><i class="icon icon-list"></i> <span> Activities</span></a> </li>

    <li> <a href="cabintype.php"><i class="icon icon-list"></i> <span> Cabin Type</span></a> </li>

    <li> <a href="cabinfacilities.php"><i class="icon icon-list"></i> <span> Cabin's Facilities</span></a> </li>
      
    </li>
    <li ><a href="cabin.php"><i class="icon icon-pencil"></i> <span>Cabin</span></a></li>

    <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Report</span> <span class="label label-important">4</span></a>
      <ul>
        
        <li class="active"><a href="mostvisit.php"> Most Visit Month</a></li>
        <li><a href="dailyincome.php"> Daily Income </a></li>
        <li><a href="monthlyincome.php"> Monthly Income</a></li>
        <li><a href="yearlyincome.php">Yearly Income</a></li>
        
      </ul>
    </li>
   
  </ul>
</div>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Check-In Form" class="tip-bottom"><i class="icon-home"></i> Report </a> <a href="Check-Out.php" class="current"> Most Visit Month </a> </div>
    <h4 class="ml-4"> Top 3 Most Visit Month of the year </h4>
  </div>
  <div class="container-fluid">
    <hr>

<?php if(isset($_POST['view']))
{ 
  $y=$_POST['y'];
  ?>

  <div class="panel panel-default">
<form method="post" action="">
  <label> Enter year </label>
  <input type="number" name="y" class="form-control" value="<?php echo $y; ?>">
  <input type="submit" name="view" value="View" class="btn btn-success btn-sm">
</form>
</div>

 
    <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5 class="ml-4"> Top 3 Most Visit Month of the year </h5> 
          </div>
          <div class="widget-content nopadding">


            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th><h5>No</h5></th>
                  <th><h5>Month</h5></th>
                  <th><h5>Booking Count</h5></th>
                  
                </tr>
              </thead>
              <?php
              $no=1;
                $query="SELECT COUNT(bid) as totalcount,month(arrivaldate) as mo
                        FROM booking WHERE year(arrivaldate)='$y' GROUP BY month(arrivaldate) ORDER BY totalcount DESC LIMIT 3 ";
                $result= mysqli_query($conc,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                  $m=$row['mo']-1;
                  $fm=$mm[$m];
                  $c=$row['totalcount'];

                  echo "<tbody>";
                  echo "<tr>";
                  echo "<th> $no </th>";
                  echo "<th>$fm</th>"; $no++;
                  echo "<th>$c</th>";
                }
                  ?>
  
              <tbody>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>



<?php }
else {
   ?>

   <div class="panel panel-default">
<form method="post" action="">
  <label> Enter year </label>
  <input type="number" name="y" class="form-control">
  <input type="submit" name="view" value="View" class="btn btn-success btn-sm">
</form>
</div>

 
    <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5 class="ml-4"> Top 3 Most Visit Month of the year </h5> 
          </div>
          <div class="widget-content nopadding">


            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th><h5>No</h5></th>
                  <th><h5>Month</h5></th>
                  <th><h5>Booking Count</h5></th>
                </tr>
              </thead>
            
              <tbody>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>



<?php } ?>

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

