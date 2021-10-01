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

include('mfunction.php');
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
        
        <li><a href="mostvisit.php"> Most Visit Month</a></li>
        <li class="active"><a href="dailyincome.php"> Daily Income </a></li>
        <li><a href="monthlyincome.php"> Monthly Income</a></li>
        <li><a href="yearlyincome.php">Yearly Income</a></li>
        
      </ul>
    </li>
   
  </ul>
</div>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Check-In Form" class="tip-bottom"><i class="icon-home"></i> Report </a> <a href="Check-Out.php" class="current"> Monthly Income </a> </div>
    <h4 class="ml-4"> Monthly Income </h4>
  </div>
  <div class="container-fluid">
    <hr>

<?php if(isset($_POST['view']))
{ 
  $fm=$_POST['frmonth'];
  $tm=$_POST['tomonth'];

  ?>

 <div class="panel panel-default">
<form method="post" action="">
 <label> From Month </label>
      <select name="frmonth" class="form-control" id="mt">
      <option value="<?php echo htmlentities($fm); ?>"> <?php $sm=choose($fm); echo $sm; ?></option>
        <option value="1"> January </option>
        <option value="2">February </option>
        <option value="3"> March </option>
        <option value="4">April </option>
        <option value="5"> May </option>
        <option value="6">June </option>
        <option value="7"> July </option>
        <option value="8">August </option>
        <option value="9"> September </option>
        <option value="10">October </option>
        <option value="11"> November </option>
        <option value="12">December </option>
      </select>

   <label> To Month </label>
      <select name="tomonth" class="form-control" id="mt">
         <option value="<?php echo htmlentities($tm); ?>"> <?php $sm=choose($tm); echo $sm; ?></option>
        <option value="1"> January </option>
        <option value="2">February </option>
        <option value="3"> March </option>
        <option value="4">April </option>
        <option value="5"> May </option>
        <option value="6">June </option>
        <option value="7"> July </option>
        <option value="8">August </option>
        <option value="9"> September </option>
        <option value="10">October </option>
        <option value="11"> November </option>
        <option value="12">December </option>
      </select>

  <input type="submit" name="view" value="View" class="btn btn-success btn-sm">
</form>
</div>

 
    <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5 class="ml-4"> Monthly Income </h5> 
          </div>
          <div class="widget-content nopadding">


            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th><h5>No</h5></th>
                  <th><h5>Month</h5></th>
                  <th><h5>Income</h5></th>
                  
                </tr>
              </thead>
              <?php
              $allsum=0;
              $yy=date('Y');
              $no=1;
             $query="SELECT SUM(b.bprice) as price,month(p.pmdate) pmonth
             FROM booking b,payment p
             WHERE p.bid=b.bid AND month(p.pmdate) BETWEEN '$fm' AND '$tm' AND year(p.pmdate)='$yy' GROUP BY month(p.pmdate)";
                $result= mysqli_query($conc,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                  $m=$row['pmonth']-1;
                  $fm=$mm[$m];
                  $c=$row['price'];
                  $allsum+=$c;
                  echo "<tbody>";
                  echo "<tr>";
                  echo "<th> $no </th>";
                  echo "<th>$fm</th>"; $no++;
                  echo "<th>$c</th>";
                }
                  ?>
  
    <tfoot>
     <tr>
      <td colspan="2"> Total Monthly Income </td>
      <td> <?php echo $allsum; ?></td>
    </tr>
  </tfoot>
            </table>
          </div>
        </div>
      </div>



<?php }
else {
   ?>

<div class="panel panel-default">
<form method="post" action="">
 <label> From Month </label>
      <select name="frmonth" class="form-control" id="mt">
        <option> ----- </option>
        <option value="1"> January </option>
        <option value="2">February </option>
        <option value="3"> March </option>
        <option value="4">April </option>
        <option value="5"> May </option>
        <option value="6">June </option>
        <option value="7"> July </option>
        <option value="8">August </option>
        <option value="9"> September </option>
        <option value="10">October </option>
        <option value="11"> November </option>
        <option value="12">December </option>
      </select>

   <label> To Month </label>
      <select name="tomonth" class="form-control" id="mt">
       <option> ----- </option>
        <option value="1"> January </option>
        <option value="2">February </option>
        <option value="3"> March </option>
        <option value="4">April </option>
        <option value="5"> May </option>
        <option value="6">June </option>
        <option value="7"> July </option>
        <option value="8">August </option>
        <option value="9"> September </option>
        <option value="10">October </option>
        <option value="11"> November </option>
        <option value="12">December </option>
      </select>

  <input type="submit" name="view" value="View" class="btn btn-success btn-sm">
</form>
</div>

 
    <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5 class="ml-4"> Monthly Income </h5> 
          </div>
          <div class="widget-content nopadding">


            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th><h5>No</h5></th>
                  <th><h5>Month</h5></th>
                  <th><h5> Income </h5></th>
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

