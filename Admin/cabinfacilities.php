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
  function setName(price,no,n,t,img)
  {
   
    document.getElementById('price').value=price;
     document.getElementById('no').value=no;
      document.getElementById('n').value=n;
      document.getElementById('t').value=t;
       document.getElementById('output').src='../Custommer/images/'+img;
        var btn=document.getElementById("insert");
      btn.innerHTML="UPDATE";
      btn.name="upd";

  }
  
  function clearName(price,no,n,t,img)
  {
     document.getElementById('price').value=price;
     document.getElementById('no').value=no;
      document.getElementById('n').value=n;
      document.getElementById('t').value=t;
       document.getElementById('output').src='../Custommer/images/'+img;
        var btn=document.getElementById("insert");
      btn.name="ins";
  }



  var loadFile = function(event) {
  var image = document.getElementById('output');
  image.src = URL.createObjectURL(event.target.files[0]);};


   var loadNew = function(event) {
  var image = document.getElementById('output1');
  image.src = URL.createObjectURL(event.target.files[0]);};

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

    <li > <a href="cabintype.php"><i class="icon icon-list"></i> <span> Cabin Type</span></a> </li>

    <li class="active"> <a href="cabinfacilities.php"><i class="icon icon-list"></i> <span> Cabin's Facilities</span></a> </li>
      
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
    <div id="breadcrumb"> <a href="index.php" title="Go to Check-In Form" class="tip-bottom"><i class="icon-home"></i>  Cabin Facility Management </a> <a href="Check-Out.php" class="current">Table</a> </div>
    <h1>  Cabin Facility Management</h1>
  </div>
  <div class="container-fluid">
    <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>  Cabin Facility Management </h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="POST" name="myform" enctype="multipart/form-data" class="form-horizontal">
            <?php
            if(isset($_GET['type']))
              {
               $type=$_GET['type'];
              }
            ?>

            <div class="control-group">
              <label class="control-label">Cabin Name :</label>
              <div class="controls">
              <select name="cname" id="cname" class="form-control">
             <?php

               $query="SELECT * FROM cabin";
                $result=mysqli_query($conc,$query);
                 while($row=mysqli_fetch_assoc($result)):
             ?>
            <option value="<?php echo $row['cid'];?>"><?php echo $row['cname'];?></option>
            <?php
               endwhile;
             ?>
            </select>
            </div>
            </div>

            <div class="control-group">
              <label class="control-label"> Facility  :</label>
              <div class="controls">
                <input type="text" name="facility"  id="facility" class="span11" placeholder="Enter Facility" required=""/>
              </div>
            </div>
        
        <div class="control-group">
              <label class="control-label"> Image1 Name  :</label>
              <div class="controls">
                <input type="text" name="img1name"  id="img1name" class="span11" placeholder="Enter Facility" required=""/>
              </div>
            </div>


            <div class="control-group" style="padding-left: 45px">
              <label >
                <img id="output" style="width:200px; height:200px;" required=""/>
              <input type="file" name="image1"  id="fileToUpload1" accept="image/*" onchange="loadFile(event)"/>
            </div> 

          <div class="control-group">
              <label class="control-label"> Image2 Name  :</label>
              <div class="controls">
                <input type="text" name="img2name"  id="img2name" class="span11" placeholder="Enter Facility" required=""/>
              </div>
            </div>

            <div class="control-group" style="padding-left: 45px">
              <label >
                <img id="output1" style="width:200px; height:200px;" required=""/>
              <input type="file" name="image2"  id="fileToUpload2" accept="image/*" onchange="loadNew(event)"/>
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
            $ucid;

           if(isset($_GET["ucname"]))
           {
            
            $ucprice=$_GET["ucprice"];
            $ucno=$_GET["ucno"];
            $ucname=$_GET['ucname'];
            $uctype=$_GET['uctype'];
            $ucimg=$_GET["ucimg"];

            echo "<script> setName('$ucprice','$ucno','$ucname','$uctype', '$ucimg');</script>";

           }

           if(isset($_POST["ins"]))
           {
            
           $cname = $_POST['cname'];
           $img1=$_FILES['image1']['name'];
           $tmp1=$_FILES['image1']['tmp_name'];
           $img2=$_FILES['image2']['name'];
           $tmp2=$_FILES['image2']['tmp_name'];

           $img1name = $_POST['img1name'];
           $img2name = $_POST['img2name'];
           $facility=$_POST['facility'];

           $infa=mysqli_query($conc,"INSERT INTO `facilities` (`desc`) VALUES ('$facility')");
           if($infa)
           {
           

            $faid=mysqli_insert_id($conc);
            mysqli_query($conc,"INSERT INTO cabinfacilities(cbid,facid) VALUES($cname,$faid)");

            $inphoto=mysqli_query($conc,"INSERT INTO images(imgname,img,facid) VALUES('$img1name','$img1',$faid)");
            if($inphoto)
            {
              $rimg=mysqli_query($conc,"INSERT INTO images(imgname,img,facid) VALUES('$img2name','$img2',$faid)");
              if($rimg)
              {
              move_uploaded_file($tmp1,"SystemImage/CabinFacility/$img1");
              move_uploaded_file($tmp2,"SystemImage/CabinFacility/$img2");
              }
              

            }

            echo "<script>alert('Successful!!!')</script>";
              echo "<script> location.href='cabinfacilities.php'; </script>";
           }

           else
           {
            echo "<script>alert('error!!!')</script>";

           }

              
           }

          
           if (isset($_GET["cfid"]))
           {
              $cfid=$_GET["cfid"];
              $facid = $_GET['facid'];

              $q=mysqli_query($conc,"DELETE FROM facilities where facid='$facid'");
              if($q)
              {
                $rr= mysqli_query($conc,"DELETE FROM cabinfacilities WHERE cfid=$cfid");
                if($rr)
                {
                  echo "<script> location.href='cabinfacilities.php';</script>";
                }

              }
           }

          ?>
    <hr>
    <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Events Lists</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th><h5> No </h5></th>
                  <th><h5> Cabin </h5></th>
                  <th><h5> Facility </h5></th>
                  <th><h5> Facility Photo1 </h5></th>
                  <th><h5> Facility Photo2 </h5></th>
                  <th><h5>Action</h5></th>

                </tr>
              </thead>
              <?php
              $no=1;
                $query="SELECT * FROM facilities fac,cabinfacilities caf,cabin c WHERE c.cid=caf.cbid AND fac.facid=caf.facid";
                $result= mysqli_query($conc,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                  $facid=$row['facid'];
                  $desc=$row["desc"];
                  $cid=$row["cid"];
                  $name=$row["cname"];
                  $selimg=mysqli_query($conc,"SELECT * FROM images WHERE facid=$facid");
                  $cfid=$row['cfid'];
                 
                 
                  echo "<tbody>";
                  echo "<tr>";
                  echo "<th>$no</th>";
                  $no++;
                  echo "<th>$name</th>";
                  echo "<th>$desc</th>";
                  while($rr=mysqli_fetch_assoc($selimg))
                  {
                    $img="SystemImage/CabinFacility/".$rr['img']; ?>
                    <th> <img src="<?php echo $img; ?>" style="height: 100px;width: 100px;">
                      <br>
                      <?php echo $rr['imgname']; ?>
                    </th>
              <?php    }
                  
                 
                 
                  ?>
                  <?php
                 
                  
                  echo "<th> <a href='?cfid=$cfid&facid=$facid' class='btn btn-danger'>Delete</a>";
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


