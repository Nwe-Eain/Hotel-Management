
<!DOCTYPE html>
<html lang="en">
<head>
<title> BlueStar </title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<?php 

include('mainheader.php');

$cdid;

 ?>

<script>

  function checktotal()
  {
   
    var cid=document.getElementById('cid').value;
    //alert(cid);
    document.cookie="cookieName="+cid;
    var cc=document.cookie;
    //alert(cc);
    <?php 
    $cdid=$_COOKIE['cookieName'];
    $conc=mysqli_connect("localhost","root","","bluestar");
    $sel=mysqli_query($conc,"SELECT cprice FROM cabin WHERE cid=12");
    $n=mysqli_fetch_assoc($sel);
    $price=$n['cprice'];
  
    
     ?>
     var p=<?php echo $price; ?>;
     //alert(p);

     var eb=document.getElementById('ebed').value;
     var costeb=Number(eb)*Number(1000);

     var ls=document.getElementById('lstay').value;
     var t=Number(ls) * Number(p);

     var total = Number(t)+Number(costeb);
     document.getElementById('bprice').value=total;
    
  }
</script>

<!--sidebar-menu-->
<div id="sidebar"><a href="index.php" class="visible-phone">
  <i class="icon icon-home"></i> Dashboard
</a>
  <ul>
    <li class="active"><a href="index.php"><i class="icon icon-home"></i> <span>Check-In &amp; Out</span></a> </li>
    <li> <a href="bookingList.php"><i class="icon icon-signal"></i> <span> Booking List</span></a> </li>
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
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="Check-Out.php" title="Go to Home" class="tip-bottom"><i class="icon icon-info-sign"></i> Check-Out</a></div>
  </div>
<!--End-breadcrumbs-->  
    <div class="container-fluid">
  <hr>

<?php 
$bid;
if(isset($_GET['bid']))
{ 
  $bid=$_GET['bid'];
  $act=$_GET['act'];

  if($act=="checkin")
{
   $sel=mysqli_query($conc,"SELECT * FROM 
customers c,booking b,bookingcabin bc,bookigdetail bd,cabin cb
WHERE c.custId=b.custId AND bc.bid=b.bid AND bd.bcid=bc.bcid AND bc.cid=cb.cid AND b.bid=$bid");
  $ans=mysqli_fetch_assoc($sel);
          
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
          $bdid=$ans['bdid'];
          $checkindate=$ans['checkindate'];
          $checkintime = $ans['checkintime'];
        

  ?>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Check-In Registration Form</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                <input type="text" class="span11" value="<?php echo $mail; ?>" disabled />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Full Name :</label>
              <div class="controls">
                <input type="text" class="span11" value="<?php echo $name; ?>" disabled />
              </div>
            </div>           
            <div class="control-group">
              <label class="control-label">Phone Number</label>
              <div class="controls">
                <input type="text"  class="span11"  value="<?php echo $ph; ?>" disabled/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">NRC-No :</label>
              <div class="controls">
                <input type="text" class="span11" value="<?php echo $nrc; ?>"  disabled/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label"> Cabin </label>
              <div class="controls">
                <input type="text" class="span11" value="<?php echo $cname; ?>"  disabled/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Cabin-No :</label>
              <div class="controls">
                <input type="text" class="span11"  value="<?php echo $cno; ?>" disabled/>
              </div>
            </div>
           
            <div class="control-group">
              <label class="control-label">Number of People :</label>
              <div class="controls">
                <input type="Number" class="span11" value="<?php echo $nop; ?>" disabled />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Extra Bed :</label>
              <div class="controls">
                <input type="Number" class="span11" value="<?php echo $ebed; ?>"  disabled/>
              </div>
            <div class="control-group">
              <label class="control-label">Length of Stay:</label>
              <div class="controls">
                <input type="Number" class="span11" value="<?php echo $lstay; ?>"  disabled/>
            </div>
            </div>
            <div class="control-group">
              <label class="control-label">Total Amount:</label>
              <div class="controls">
                <input type="Number" class="span11" value="<?php echo $price; ?>" disabled />
            </div>
            </div>
            <div class="control-group">
              <label class="control-label">Checkin Date:</label>
              <div class="controls">
                <?php if($checkindate=="0000-00-00")
                { ?>
                <input type="date" class="span11" placeholder="" name="indate" />
              <?php }
              else{ ?>
                <input type="date" class="span11" placeholder="" name="indate" value="<?php echo $checkindate; ?>" />
              <?php } ?>

            </div>
            </div>
            <div class="control-group">
              <label class="control-label">Checkin Time:</label>
              <div class="controls">
                <?php if($checkindate=="00:00:00")
                { ?>
                <input type="time" class="span11" name="intime" />
                <?php 
                }else
                { ?>
                  <input type="time" class="span11" name="intime" value="<?php echo $checkintime; ?>" />
                <?php } ?>
            </div>
            </div>
            <input type="hidden" name="bdid" value="<?php echo $bdid; ?>">
            <div class="form-actions">
              <button type="submit" class="btn btn-success" name="checkin">Check-In</button>
            </div>
          </form>
        </div>
      </div>
</div> 
  </div>
<?php 
}
elseif($act=="checkout")
{
   $sel=mysqli_query($conc,"SELECT * FROM 
customers c,booking b,bookingcabin bc,bookigdetail bd,cabin cb
WHERE c.custId=b.custId AND bc.bid=b.bid AND bd.bcid=bc.bcid AND bc.cid=cb.cid AND b.bid=$bid");
  $ans=mysqli_fetch_assoc($sel);
          
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
          $checkindate=$ans['checkindate'];
          $checkoutdate=$ans['checkoutdate'];
          $checkintime = $ans['checkintime'];
          $checkouttime=$ans['checkouttime'];
          $bdid=$ans['bdid'];
        
?>

<!-- checkout -->
 <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Check-In Registration Form</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal">
             <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                <input type="text" class="span11" value="<?php echo $mail; ?>" disabled />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Full Name :</label>
              <div class="controls">
                <input type="text" class="span11" value="<?php echo $name; ?>" disabled />
              </div>
            </div>           
            <div class="control-group">
              <label class="control-label">Phone Number</label>
              <div class="controls">
                <input type="text"  class="span11"  value="<?php echo $ph; ?>" disabled/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">NRC-No :</label>
              <div class="controls">
                <input type="text" class="span11" value="<?php echo $nrc; ?>"  disabled/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label"> Cabin </label>
              <div class="controls">
                <input type="text" class="span11" value="<?php echo $cname; ?>"  disabled/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Cabin-No :</label>
              <div class="controls">
                <input type="text" class="span11"  value="<?php echo $cno; ?>" disabled/>
              </div>
            </div>
           
            <div class="control-group">
              <label class="control-label">Number of People :</label>
              <div class="controls">
                <input type="Number" class="span11" value="<?php echo $nop; ?>" disabled />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Extra Bed :</label>
              <div class="controls">
                <input type="Number" class="span11" value="<?php echo $ebed; ?>"  disabled/>
              </div>
            <div class="control-group">
              <label class="control-label">Length of Stay:</label>
              <div class="controls">
                <input type="Number" class="span11" value="<?php echo $lstay; ?>"  disabled/>
            </div>
            </div>
            <div class="control-group">
              <label class="control-label">Total Amount:</label>
              <div class="controls">
                <input type="Number" class="span11" value="<?php echo $price; ?>" disabled />
            </div>
            </div>
            <div class="control-group">
              <label class="control-label">Checkin Date:</label>
              <div class="controls">
                <input type="date" class="span11" placeholder="" name="indate" value="<?php echo $checkindate; ?>" disabled/>
            </div>
            </div>
            <div class="control-group">
              <label class="control-label"> Checkin Time:</label>
              <div class="controls">
                <input type="time" class="span11" name="intime" value="<?php echo $checkintime; ?>" disabled/>
            </div>
            </div>
            <div class="control-group">
              <label class="control-label"> Checkout Date:</label>
              <div class="controls">
              <?php 
              if($checkoutdate=="0000-00-00"){ ?>
                <input type="date" class="span11" placeholder="" name="outdate" />
              <?php }
              else{ ?>
                <input type="date" class="span11" placeholder="" name="outdate" value="<?php echo $checkoutdate; ?>" />
              <?php } ?>
            </div>
            </div>
            <div class="control-group">
              <label class="control-label"> Checkout Time:</label>
              <div class="controls">
                <?php if($checkouttime=="00:00:00"){ ?>
                <input type="time" class="span11" placeholder="" name="outtime" />
              <?php }
              else{ ?>
                <input type="time" class="span11" placeholder="" name="outtime" value="<?php echo $checkouttime; ?>" />
              <?php } ?>
            </div>
            </div>
            <input type="hidden" name="bdid" value="<?php echo $bdid; ?>"> 
            <div class="form-actions">
              <button type="submit" class="btn btn-success" name="checkout">Check-Out</button>
            </div>
          </form>
        </div>
      </div>
</div> 
  </div>

<?php
}
}
else
{ ?>

 <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5> New Check-In Registration Form</h5>
         
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Enter Email" name="mail" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Full Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Enter Full Name" name="name" />
              </div>
            </div>           
            <div class="control-group">
              <label class="control-label">Phone Number</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Enter Phone Number" name="ph" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">NRC-No :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="NRC-No" name="nrc" />
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">Cabin Name | Cabin No :</label>
              <div class="controls">
              <select name="cid" class="form-control" id="cid">
                <option> Name | No </option>
                <?php 
                $c=mysqli_query($conc,"SELECT * FROM cabin");
                while($r=mysqli_fetch_assoc($c))
                { ?>
                  <option value="<?php echo $r['cid']; ?>"> <?php echo $r['cname']." | ".$r['cno']; ?></option>
                <?php } ?>
              </select>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label"> Arrival Date :</label>
              <div class="controls">
                <input type="date" class="span11" placeholder="" name="adate" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Number of People :</label>
              <div class="controls">
                <input type="Number" class="span11" placeholder="Number of People" name="nop" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Extra Bed :</label>
              <div class="controls">
                <input type="Number" class="span11" placeholder="Extra Bed" name="ebed" id="ebed" />
              </div>
            <div class="control-group">
              <label class="control-label">Length of Stay:</label>
              <div class="controls">
<input type="Number" class="span11" placeholder="Length of Stay" name="lstay" id="lstay" onclick ="checktotal()" />
            </div>
          </div>
           <div class="control-group">
              <label class="control-label">Total Amount:</label>
              <div class="controls">
                <input type="Number" class="span11"  name="bprice" id="bprice"/>
            </div>
            </div>
            <div class="control-group">
              <label class="control-label">Checkin Date:</label>
              <div class="controls">
                <input type="date" class="span11" placeholder="" name="indate"/>
            </div>
            </div>
            <div class="control-group">
              <label class="control-label"> Checkin Time:</label>
              <div class="controls">
                <input type="time" class="span11" name="intime"/>
            </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-success" name="newcheckin">Check-In</button>
            </div>
          </form>
        </div>
      </div>
</div> 
  </div>

<div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5> <a href="newcheckin.php"> New Checkin List </a> </h5>
        </div>
        </div>
      </div>
    </div>

<?php } ?>




</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> <a href=""> Blue Star Admin </a> </div>
</div>

<!--end-Footer-part-->


<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.dashboard.js"></script> 
<script src="js/jquery.gritter.min.js"></script> 
<script src="js/matrix.interface.js"></script> 
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 


</body>
</html>

<?php 
if(isset($_POST['checkin']))
{
  $bdid=$_POST['bdid'];
  $indate=$_POST['indate'];
  $intime=$_POST['intime'];
  
  $upd=mysqli_query($conc,"UPDATE bookigdetail SET checkindate='$indate',checkintime='$intime' WHERE bdid=$bdid");
  if($upd)
  {
    echo "<script> alert('Check In');location.href='?act=checkin&bid=$bid;</script>";
  }

}

if(isset($_POST['checkout']))
{
  $bdid=$_POST['bdid'];
  $outdate=$_POST['outdate'];
  $outtime=$_POST['outtime'];
  $upd=mysqli_query($conc,"UPDATE bookigdetail SET checkoutdate='$outdate',checkouttime='$outtime' WHERE bdid=$bdid");
  if($upd)
  {
    echo "<script> alert('Check Out');location.href='?act=checkout&bid=$bid';</script>";
  }

}

if(isset($_POST['newcheckin']))
{
  $name=$_POST['name'];
  $mail=$_POST['mail'];
  $ph=$_POST['ph'];
  $nrc=$_POST['nrc'];
  $cid=$_POST['cid'];
  $nop=$_POST['nop'];
  $adate=$_POST['adate'];
  $lstay=$_POST['lstay'];
  $ebed=$_POST['ebed'];
  $bprice=$_POST['bprice'];
  $cdate=$_POST['cdate'];
  $ctime=$_POST['ctime'];
  $bdate=date('Y-m-d');

  $inscu=mysqli_query($conc,"INSERT INTO customers(custn,custemail,custph) VALUES('$name','$mail','$ph')");
  if($inscu)
  {
    $custid=mysqli_insert_id($conc);

    $ins=mysqli_query($conc,"INSERT INTO booking(custId,lengthofstay,extrabed,nop,arrivaldate,bprice) 
    VALUES($custid,$lstay,$ebed,$nop,'$adate',$bprice)");
  if($ins)
  {
    $bid=mysqli_insert_id($conc);

    $insertbc=mysqli_query($conc,"INSERT INTO bookingcabin(bid,cid,bookingdate) VALUES($bid,$cid,'$bdate')");

    if($insertbc)
    {
      $bcid=mysqli_insert_id($conc);
      $inbd=mysqli_query($conc,"INSERT INTO bookigdetail(custname,nrc,checkindate,checkoutdate,checkintime,checkouttime,bcid) VALUES('$n','$nrc','$cdate','0000-00-00','$ctime','',$bcid)");

      if($inbd)
      {
        echo "<script> alert('Checkin Success'); 
              location.href='newcheckin.php';
              </script>";
      }
     
    }
  }

  }


}

 ?>

