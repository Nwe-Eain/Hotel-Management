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
       document.getElementById('output').src='SystemImage/Cabin/'+img;
        var btn=document.getElementById("insert");
      btn.innerHTML="UPDATE";
      btn.name="updcabin";

  }
  
  // function clearName(price,no,n,t,img)
  // {
  //    document.getElementById('price').value=price;
  //    document.getElementById('no').value=no;
  //     document.getElementById('n').value=n;
  //     document.getElementById('t').value=t;
  //      //document.getElementById('output').src='../Custommer/images/'+img;
  //       var btn=document.getElementById("insert");
  //     btn.name="ins";
  // }
   var loadFile = function(event) {
  var image = document.getElementById('output');
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

    <li> <a href="cabinfacilities.php"><i class="icon icon-list"></i> <span> Cabin's Facilities</span></a> </li>
      
    </li>
    <li class="active"><a href="cabin.php"><i class="icon icon-pencil"></i> <span>Cabin</span></a></li>

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
    <h1>  Cabin  Management</h1>
  </div>
  <div class="container-fluid">
    <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Cabin Management Form</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="POST" name="myform" enctype="multipart/form-data" onsubmit="return validateFile()"  class="form-horizontal">
            <?php
            if(isset($_GET['type']))
              {
               $type=$_GET['type'];
              }
            ?>

            <div class="control-group">
              <label class="control-label">Price :</label>
              <div class="controls">
                <input type="number" name="price"  id="price" class="span11" placeholder="Enter Full Name" required=""/>
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label">Cabin No :</label>
              <div class="controls">
                <input type="number" name="no"  id="no" class="span11" placeholder="Enter Full Name" required=""/>
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label">Cabin Name :</label>
              <div class="controls">
                <input type="text" name="cname"  id="n" class="span11" placeholder="Enter Full Name" required=""/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Cabin Type :</label>
              <div class="controls">
              <select name="ctype" id="t" class="form-control">
             <?php

               $query="SELECT * FROM cabintype";
                $result=mysqli_query($conc,$query);
                 while($row=mysqli_fetch_assoc($result)):
             ?>
            <option value="<?php echo $row['ctid'];?>"><?php echo $row['type'];?></option>
            <?php
               endwhile;
             ?>
            </select>
            </div>
            </div>
            <div class="control-group" style="padding-left: 45px">
              <label ><div>
                <img id="output" style="width:200px; height:200px;" required=""/>
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
            $ucid;

           if(isset($_GET["ucname"]))
           {

            $ucid = $_GET['ucid'];
            $ucprice=$_GET["ucprice"];
            $ucno=$_GET["ucno"];
            $ucname=$_GET['ucname'];
            $uctype=$_GET['uctype'];
            $ucimg=$_GET["ucimg"];

            echo "<script> setName('$ucprice','$ucno','$ucname','$uctype', '$ucimg');</script>";

           }
           if(isset($_POST["ins"]))
           {
             $cpr=$_POST['price'];  
             $cnm=$_POST['no'];     
             $cn=$_POST['cname'];
             $ct=$_POST['ctype'];

             $img=$_FILES["image"]["name"];
             $tmp=$_FILES["image"]["tmp_name"];
             $imagetype=$_FILES['image']['type'];

           
          $query="INSERT INTO cabin(cprice,cno,cname,cimg,ctid) VALUES ('$cpr','$cnm','$cn','$img','$ct')";

            $res=mysqli_query($conc,$query);
            if($res)
            {
               move_uploaded_file($tmp,"SystemImage/Cabin/".$img);
               echo "<script>alert('Successful!!!')</script>";
               echo "<script> location.href='cabin.php';</script>";
            }
           
           }

           else if(isset($_POST["updcabin"]))
           {
              $cprice=$_POST["price"];
              $cno=$_POST["no"];
              $cname=$_POST["cname"];
              $ctid=$_POST["ctype"];
              $cimg=$_FILES['image']['name'];
              $tmp=$_FILES['image']['tmp_name'];
              $imagetype=$_FILES['image']['type'];
              $var=strlen($cimg);
              
            if($var<0)
             {
              echo "<script>alert('null')</script>";
              
                $q="update cabin set cprice='$cprice',cno='$cno',cname='$cname',ctid='$ctid' where cid=$ucid";
              
                 mysqli_query($conc,$q);
                 echo "<script>alert('Successful!!!')</script>";
                 echo "<script> location.href='cabin.php';</script>";
             }
            else
            {
              //echo "<script>alert('$tmp')</script>";
              
                $q="update cabin set cprice='$cprice',cno='$cno',cname='$cname',ctid='$ctid',cimg='$cimg' where cid=$ucid";
                
                $res=mysqli_query($conc,$q);
                if($res)
                {
                  move_uploaded_file($tmp,"SystemImage/Cabin/".$cimg);
                  echo "<script>alert('Successful!!!')</script>";
                  echo "<script> location.href='cabin.php';</script>";
                }
                
            }
            
           }
           if (isset($_GET["dcid"])){
              $dcid=$_GET["dcid"];
              $q="Delete from cabin where cid='$dcid'";
              mysqli_query($conc,$q);

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
                  <th><h5>No</h5></th>
                  <th><h5>Price</h5></th>
                  <th><h5>Cabin No</h5></th>
                  <th><h5>Cabin Name</h5></th>
                  <th><h5>Cabin Type</h5></th>
                  <th><h5>Image</h5></th>
                  <th><h5>Action</h5></th>

                </tr>
              </thead>
              <?php
              $n=1;
                $query="SELECT * FROM cabin,cabintype where cabin.ctid=cabintype.ctid";
                $result= mysqli_query($conc,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                  $id=$row["cid"];
                  $price=$row["cprice"];
                  $no=$row["cno"];
                  $name=$row["cname"];
                  $type=$row["ctid"];
                  $tname=$row['type'];
                  $img=$row["cimg"];
                  echo "<tbody>";
                  echo "<tr>";
                  echo "<th>$n</th>"; $n++;
                  echo "<th>$price</th>";
                  echo "<th>$no</th>";
                  echo "<th>$name</th>";
                  echo "<th>$tname</th>";
                  ?>
 <th> <img src="SystemImage/Cabin/<?php echo $img; ?>" style="height: 100px;width: 150px;"></th>
                  <?php
                 
                  echo "<th><a href='?ucid=$id&ucprice=$price&ucimg=$img&ucno=$no&ucname=$name&uctype=$type' class='btn btn-warning'>Update</a>";
                  echo "<a href='?dcid=$id&dcprice=$price&dcimg=$img &dcno=$no&dcname=$name&dctype=$type' class='btn btn-danger'>Delete</a>";
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


