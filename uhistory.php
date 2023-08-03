<?php include 'unavbar.php' ?>
<style>
      .divider-text{
    position: relative;
    text-align: center;
    margin-top: 5px;
    margin-bottom: 5px;
    padding : 5px;
    
  }
  .divider-text span{
    padding: 7px;
    font-size: 12px;
    position: relative;
    z-index: 2;
  }
  .divider-text::after{
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid rgb(11, 10, 10);
    top: 80%;
    left: 0;
    z-index: 1;
  }
  </style>
<div class="content" style=" padding: 8px 8px;margin :10px;">

<p style="font-family:Serif;color:black;text-align:center;font-size:30px"> History </p>
<p style="font-family:Serif;color:gray;text-align:center;font-size:15px"> Enter the correct Information of Goods and Expected price Should be match to market price. </p>
<p class = "divider-text"></p>

<div class="row" style="padding:5px;">
<div class="col-sm-3" style="padding:15px;">
<label for="inputEmail4">Good Sell Information :</label>
      <p class = "divider-text"></p>
      <?php
include 'database/dbcon.php';
$li=$_SESSION['loginid'];
$selectquery = "select * from signup inner join sell on sell.Lid=signup.loginid where loginid ='$li' group by id  order by id DESC";
$query = mysqli_query($con,$selectquery);
while($row = mysqli_fetch_array($query)){
?>
<div class="row">
<div class="col-sm-8" style="padding:5px;">
<label for="inputEmail4">Good Name : <?php echo $row['product'];?>.</label><br>
<label for="inputEmail4">Excepted Price : <?php echo $row['epu'];?> Rs.</label><br>
<label for="inputEmail4">Status : <?php echo $row['sellstatus'];?></label>
</div>
<div class="col-sm-4" style="padding:5px;">
<img alt="ecommerce" src="<?php echo $row['image'];?>"  style="width:80%;height:100%;border-radius:12px;">
</div>
<?php if($row['sellstatus']=='Pending'){ ?>
  <div class="col-sm-2" style="padding:5px;">
</div>
<div class="col-sm-4" style="padding:5px;">
<a href="uhistory1.php?gid=<?php echo $row['goodid'];?>"><button class="btn btn-outline-success"  style="float: left;padding:5px;"><i class="fa fa-check" aria-hidden="true"></i>  Change Price </button></a>  
</div>
<div class="col-sm-4" style="padding:5px;">
<a href="uaupdate.php?cgid=<?php echo $row['goodid'];?>"><button class="btn btn-outline-danger"  style="float: center;padding:5px;"><i class="fa fa-times" aria-hidden="true"></i>  Cancel Sell </button></a>  
</div>
<?php } else if($row['sellstatus']=='Sold'){ ?>
<div class="col-sm-4" style="padding:5px;">
</div>
<div class="col-sm-4" style="padding:5px;">
<a href="ubill.php?gid=<?php echo $row['goodid'];?>"><button class="btn btn-outline-warning"  style="float: center;padding:5px;"><i class="fa fa-print" aria-hidden="true"></i>  Print Bill </button></a>
</div>
<?php } ?>
</div>
<p class = "divider-text"></p>

<?php } ?>
</div>



<div class="col-sm-3" style="padding:15px;">
      <label for="inputEmail4">Good Buy Information :</label>
      <p class = "divider-text"></p>

      <?php
include 'database/dbcon.php';
$li=$_SESSION['loginid']; 
$selectquery = "select * from buyer inner join sell on sell.goodid=buyer.goodid where buyer ='$li' group by buyer.id order by buyer.id DESC";
$query = mysqli_query($con,$selectquery);
while($result =mysqli_fetch_array($query)){
?>
<div class="row">
<div class="col-sm-12" style="padding:5px;">
<label for="inputEmail4">Good Name : <?php echo $result['product'];?>.</label><br>
<label for="inputEmail4">Offer Price : <?php echo $result['price'];?> Rs.</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label for="inputEmail4">Status : <?php echo $result['status'];?></label>
</div>
<div class="col-sm-2" style="padding:5px;">
</div>
<?php if($result['status']=='Pending'){ ?>
<div class="col-sm-4" style="padding:5px;">
<a href="uhistory1.php?changesell=<?php echo $result['goodid'];?>"><button class="btn btn-outline-success"  style="float: left;padding:5px;"><i class="fa fa-check" aria-hidden="true"></i>  Change Price </button></a>  
</div>
<div class="col-sm-4" style="padding:5px;">
<a href="uaupdate.php?csell=<?php echo $result['goodid'];?>"><button class="btn btn-outline-danger"  style="float: center;padding:5px;"><i class="fa fa-times" aria-hidden="true"></i>  Cancel Sell </button></a>  
</div>
<?php } else if($result['status']=='Accepted') { ?>
  <div class="col-sm-2" style="padding:5px;">
</div>
  <div class="col-sm-4" style="padding:5px;">
<a href="ubill.php?goid=<?php echo $result['goodid'];?>"><button class="btn btn-outline-warning"  style="float: center;padding:5px;"><i class="fa fa-print" aria-hidden="true"></i>  Print Bill </button></a>  
</div>
<?php } ?>
</div>
<p class = "divider-text"></p>

<?php } ?>

</div>
<div class="col-sm-3" style="padding:15px;">
      <label for="inputEmail4">Fertilizer Buy Information :</label>
      <p class = "divider-text"></p>

      <?php
include 'database/dbcon.php';
$li=$_SESSION['loginid'];
$selectquery = "select * from order1 where loginid ='$li' group by orderid order by cid DESC";
$query = mysqli_query($con,$selectquery);
while($result =mysqli_fetch_array($query)){
  $orderid=$result['orderid'];
  $sum = "SELECT SUM(total) as total,discount FROM order1 where orderid='$orderid' and loginid='$li'";
  $sum1 = mysqli_query($con,$sum);
  $resul =mysqli_fetch_array($sum1);
  $total=$resul['total'];
  $dis=$total - $resul['discount'];
?>
<div class="row">
<div class="col-sm-12" style="padding:5px;">
<label for="inputEmail4">Fertilizer Order ID : <?php echo $orderid;?>.</label><br>
<label for="inputEmail4">Sub Total : <?php echo $total;?> Rs.</label><br>
<label for="inputEmail4">Total : <?php echo $dis;?> Rs.</label><br>
<label for="inputEmail4">Status : <?php echo $result['status'];?></label>

</div>

<div class="col-sm-2" style="padding:2px;">
</div>
<?php if($result['status']=='Pending'){ ?>
  <div class="col-sm-2" style="padding:5px;">
</div>
<div class="col-sm-4" style="padding:5px;">
<a href="uaupdate.php?fetid=<?php echo $result['orderid'];?>"><button class="btn btn-outline-danger"  style="float: center;padding:5px;"><i class="fa fa-times" aria-hidden="true"></i>  Cancel Order </button></a>  
</div>
<?php } else if($result['status']<>'Pending' && $result['status']<>'Cancel' ) { ?>
  <div class="col-sm-2" style="padding:5px;">
</div>
<div class="col-sm-4" style="padding:5px;">
<a href="ubill.php?fetid=<?php echo $result['orderid'];?>"><button class="btn btn-outline-warning"  style="float: center;padding:5px;"><i class="fa fa-print" aria-hidden="true"></i>  Print Bill </button></a>  
</div>
<?php } ?>

</div>
<p class = "divider-text"></p>
<?php } ?>
</div>

<div class="col-sm-3" style="padding:15px;">
      <label for="inputEmail4">Plant Disease Detection :</label>
      <p class = "divider-text"></p>

      <?php
include 'database/dbcon.php';
$li=$_SESSION['loginid'];
$selectquery = "select * from detect where Lid ='$li' group by id  order by id DESC";
$query = mysqli_query($con,$selectquery);
while($row = mysqli_fetch_array($query)){
?>
<div class="row">
<div class="col-sm-8" style="padding:5px;">
<label for="inputEmail4">Plant Name : <?php echo $row['plant'];?>.</label><br>
<label for="inputEmail4">Disease Name : <?php echo $row['result'];?>.</label><br>
<label for="inputEmail4">Date : <?php echo $row['date'];?></label>


</div>
<div class="col-sm-4" style="padding:5px;">
<img  src="farmagri/env/<?php echo $row['image'];?>"  alt="farmagri/env/<?php echo $row['image'];?>" style="width:80%;height:100%;border-radius:12px;">
</div>
</div>
<p class = "divider-text"></p>

<?php } ?>

</div>



</div>

</div>


