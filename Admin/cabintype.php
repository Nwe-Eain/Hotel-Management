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

<script type="text/javascript">
	function setCabintype(t,img)
	{
   
		   document.getElementById('t').value=t;
		   document.getElementById('output').src='SystemImage/CabinType/'+img;
		  var btn=document.getElementById("insert");
			btn.innerHTML="UPDATE";
			btn.name="upd";
	}
	function clearTypeName()
	{
		 document.getElementById('t').value="";
		   //document.getElementById('output').src='../Custommer/images/'+img;
		   	var btn=document.getElementById("insert");
			btn.innerHTML="Insert";
			btn.name="ins";
	}

  var loadFile = function(event) {
  var image = document.getElementById('output');
  image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
</head>
<body>
<?php
  include '../connection.php'
?>
<?php 
include('mainheader.php');
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

    <li class="active"> <a href="cabintype.php"><i class="icon icon-list"></i> <span> Cabin Type</span></a> </li>

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
    <div id="breadcrumb"> <a href="index.php" title="Go to Check-In Form" class="tip-bottom"><i class="icon-home"></i> Check-In</a> <a href="Check-Out.php" class="current">Table</a> </div>
    <h1>Cabin Type</h1>
  </div>
  <div class="container-fluid">
  	<hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Check-In Registration Form</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="POST" name="myform" enctype="multipart/form-data" onsubmit="return validateFile()" class="form-horizontal">
            <?php
            if(isset($_GET['type']))
              {
               $type=$_GET['type'];
              }
            ?>

            <div class="control-group">
              <label class="control-label">Cabin Type :</label>
              <div class="controls">
                <input type="text" name="ctype"  id="t" class="span11" placeholder="Enter Full Name" required=""/>
              </div>
            </div> 
        
            <div class="control-group" style="padding-left: 45px">
              <label ><div><img id="output" style="width:200px; height:200px;" required=""/>
              <input type="file" name="image"  id="fileToUpload" accept="image/*" onchange="loadFile(event)"/>
            </div>       
                 
            <div class="form-actions">
              <button type="submit" class="btn btn-success" id="insert" name="ins">Insert</button>
            </div>
          </form>
          
        </div>
      </div>
</div>
</div>
<?php
          	$uctid;

           if(isset($_GET["utype"]))
           {

            $uctid=$_GET['uctid'];
           	$utype=$_GET["utype"];
           	$uctimg=$_GET["uctimg"];

           	echo "<script> setCabintype('$utype','$uctimg');</script>";

           }
           if(isset($_POST["ins"]))
           {
           	 $ct=$_POST['ctype'];
 			       $img=$_FILES['image']['name'];
 			       $tmp=$_FILES['image']['tmp_name'];
 			       $imagetype=$_FILES['image']['type'];

 			  
 				   
  			 
  				$query="Insert Into cabintype
  						(type,ctimg) 
  				values ('$ct','$img')";

  				mysqli_query($conc,$query);
          move_uploaded_file($tmp,"SystemImage/CabinType/".$img);

 				echo "<script>alert('Successful!!!')</script>";
           }


           else if(isset($_POST["upd"]))
           {
           
            $type=$_POST["ctype"];

           	$ctimg=$_FILES['image']['name'];
 			      $tmp=$_FILES['image']['tmp_name'];
 		       	$imagetype=$_FILES['image']['type'];

 			if($tmp==NULL)
 			{
 					$q="UPDATE cabintype set type='$type' where ctid=$uctid";
		           	mysqli_query($conc,$q);
		            echo "<script> location.href='cabintype.php';</script>";
 			}
 			else
 			{
 					$q="UPDATE cabintype SET type='$type',ctimg='$ctimg' where ctid=$uctid";
          
          move_uploaded_file($tmp,"SystemImage/CabinType/".$ctimg);
         
		      mysqli_query($conc,$q);
		       echo "<script> location.href='cabintype.php';</script>";
 			}
           

           		//echo "<script>alert('Updated');location.assign('cabintype.php');</script>";
           		
      }
           if (isset($_GET["dctid"])){
              $dctid=$_GET["dctid"];
              $q="Delete from cabintype where ctid='$dctid'";
              mysqli_query($conc,$q);

           }

          ?>

    <hr>
    <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Cabin Type</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th><h5>No</h5></th>
                  <th><h5>Cabin Type</h5></th>
                  <th><h5>Images</h5></th>
                  <th><h5>Action</h5></th>
                </tr>
              </thead>
              <?php
              $no=1;
              	$query="select * from cabintype";
              	$result= mysqli_query($conc,$query);
              	while($row=mysqli_fetch_assoc($result))
              	{
              		$cctid=$row["ctid"];
              		$ctype=$row["type"];
              		$cctimg=$row["ctimg"];
              		echo "<tbody>";
              		echo "<tr>";
              		echo "<th>$no</th>"; $no++;
              		echo "<th>$ctype</th>";
                  ?>
   <th> <img src="SystemImage/CabinType/<?php echo $cctimg; ?>" style="height: 100px;width: 150px;"></th>
              	<?php

              		echo "<th><a href='?uctid=$cctid&utype=$ctype&uctimg=$cctimg' class='btn btn-warning'>Update</a>";
              		echo "<a href='?dctid=$cctid&dtype=$ctype&dctimg=$cctimg' class='btn btn-danger'>Delete</a>";
              		echo "</th></tr>";
              		echo"</tbody>";
              	}
              ?>
              <tbody>
                
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

