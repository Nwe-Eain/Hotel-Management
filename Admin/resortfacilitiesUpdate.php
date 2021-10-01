<!DOCTYPE html>
<html lang="en">
<head>
<title> BlueStar </title>
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
	function setName(n,des,img)
	{
		 document.getElementById('n').value=n;
		  document.getElementById('desc').value=des;
		   document.getElementById('output').src='SystemImage/ResortFacility/'+img;
		   	var btn=document.getElementById("insert");
			btn.innerHTML="UPDATE";
			btn.name="upd";
	}
	function clearName(n,des,img)
	{
		 document.getElementById('n').value=n;
		  document.getElementById('desc').value=des;
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
    <li class="active"> <a href="resortfacilitiesUpdate.php"><i class="icon icon-list"></i> <span> Resort Facilities</span></a> </li>
    
    <li > <a href="event.php"><i class="icon icon-list"></i> <span> Events</span></a> </li>

    <li > <a href="activities.php"><i class="icon icon-list"></i> <span> Activities</span></a> </li>

    <li > <a href="cabintype.php"><i class="icon icon-list"></i> <span> Cabin Type</span></a> </li>

    <li> <a href="cabinfacilities.php"><i class="icon icon-list"></i> <span> Cabin's Facilities</span></a> </li>
      
    </li>
    <li><a href="cabin.php"><i class="icon icon-pencil"></i> <span>Cabin</span></a></li>

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
    <div id="breadcrumb"> <a href="index.php" title="Go to Check-In Form" class="tip-bottom"><i class="icon-home"></i> Resort's Factilties </a> <a href="Check-Out.php" class="current"></a> </div>
    <h1>Resort's Factilties Management</h1>
  </div>
  <div class="container-fluid">
  	<hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5> Resort's Factilties Form</h5>
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
              <label class="control-label">Name :</label>
              <div class="controls">
                <input type="text" name="name"  id="n" class="span11" placeholder="Enter Full Name" required=""/>
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label">Descriptions</label>
              <div class="controls">
                <textarea name="description"  id="desc"  class="span11" style="height: 350px" required="">
              </textarea>
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
          	$ursfacid;

           if(isset($_GET["ursname"]))
           {
           
           	$ursname=$_GET["ursname"];
           	$ursdesc=$_GET["ursdesc"];
           	$ursimg=$_GET['ursimg'];
           	$ursfacid=$_GET["ursfacid"];

           	echo "<script> setName('$ursname','$ursdesc','$ursimg');</script>";

           }
           if(isset($_POST["ins"]))
           {
       
       $rsn=$_POST['name'];
 			 $rsdesc=$_POST['description'];
 			 $img=$_FILES['image']['name'];
 			 $tmp=$_FILES['image']['tmp_name'];
 			 $imagetype=$_FILES['image']['type'];

 			   if($img==true)
  			 {
 				move_uploaded_file($tmp,"SystemImage/ResortFacility/".$img);
  			 }
  				$query="Insert Into resortfacilities
  						(rsname,rsdesc,rsimg) 
  				values ('$rsn','$rsdesc','$img')";

  				mysqli_query($conc,$query);

 				echo "<script>alert('Successful!!!')</script>";
           }


           else if(isset($_POST["upd"]))
           {
           
           	$rsname=$_POST["name"];
           	$rsdesc=$_POST["description"];
           	$rsimg=$_FILES['image']['name'];
 		       	$tmp=$_FILES['image']['tmp_name'];
 		       	$imagetype=$_FILES['image']['type'];


 			if(strlen($rsimg)==0)
 			{
 					$q="UPDATE resortfacilities set rsname='$rsname', rsdesc='$rsdesc ' where rsfacid=$ursfacid";
		           	mysqli_query($conc,$q);
		           	echo "<script>clearName();</script>";
 			}
 			else
 			{
 					$q="update resortfacilities set rsname='$rsname', rsdesc='$rsdesc', rsimg='$rsimg'  where rsfacid=$ursfacid";
		           	mysqli_query($conc,$q);
                move_uploaded_file($tmp,"SystemImage/ResortFacility/".$rsimg);
		           	echo "<script>clearName();</script>";
 			}
           

           		echo "<script>alert('Updated');location.assign('resortfacilitiesUpdat	e.php');</script>";
           		
           }
           if (isset($_GET["drsfacid"])){
              $drsfacid=$_GET["drsfacid"];
              $q="Delete from resortfacilities where rsfacid='$drsfacid'";
              mysqli_query($conc,$q);

           }

          ?>

    <hr>
    <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Resort-Facilities Lists</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th><h5>No</h5></th>
                  <th><h5>Resort_Facilities Name</h5></th>
                  <th><h5>Resort Facilities Descriptions</h5></th>
                  <th><h5>Images</h5></th>
                  <th><h5>Action</h5></th>
                </tr>
              </thead>
              <tbody>
              <?php
              $no=1;
              	$query="select * from resortfacilities";
              	$result= mysqli_query($conc,$query);
              	while($row=mysqli_fetch_assoc($result))
              	{
              		$facid=$row["rsfacid"];
              		$name=$row["rsname"];
              		$desc=$row["rsdesc"];
              		$img=$row["rsimg"];

              		
              		echo "<tr>";
              		echo "<th>$no</th>";
                  $no++;
              		echo "<th>$name</th>";
              		echo "<th>$desc</th>";
              		?>
       <th> <img src="SystemImage/ResortFacility/<?php echo $img; ?>" style="height: 100px;width: 150px;"></th>
                  <?php
              		echo "<th><a href='?ursfacid=$facid&ursname=$name&ursdesc=$desc&ursimg=$img' class='btn btn-warning'>Update</a>";
              		echo "<a href='?drsfacid=$facid&drsname=$name&drsdesc=$desc &drsimg=$img' class='btn btn-danger'>Delete</a>";
              		echo "</th></tr>";
              		
              	}
              ?>
             
                
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

