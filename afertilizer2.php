<?php include 'anavbar.php' ?>
<?php include 'database/dbcon.php' ?>
  <style>
       h4 {text-align: center;
        font-size: 20px;}
        h5 {
        font-size: 20px;}

    p{text-align: center;
        font-size: 15px;}

    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
.form-container3 {
    padding: 15px;
    width: 100%;
    height:auto;
    background-color: lightgray;
    border-radius:10px;
  }
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
<div class="content" style=" padding: 4px 4px;margin :10px;">

<div class="row" style="padding:5px;">
<div class="col-sm-11" style="padding:5px;">
<p style="font-family:Serif;color:black;text-align:center;font-size:22px"> Fertilizer Order </p>
<?php
    $sql = "SELECT * FROM order1 group by orderid";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res); 
                    ?>
<p style="font-family:Serif;color:black;text-align:center;font-size:20px"> Total Fertilizer : <?php echo $count; ?>. </p>
</div>
<div class="col-sm-1" style="padding:5px;">
</div></div>
<p class = "divider-text"></p>


<div class="row">
        <div class="col-sm-12">
          <div class="well" style="height: 560px;">
          <h5>Order :</h5>

          <div class="row slideanim">
  <?php
include'database/dbcon.php';
date_default_timezone_set("Asia/Calcutta");
$date =date('Y-m-d');
$li=$_SESSION['loginid'];
$query = "Select * from order1  group by orderid";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
$t = $row['orderid'];
$dis= $row['discount'];
$sum = "SELECT SUM(total) as total FROM order1 where orderid='$t'";
$sum1 = mysqli_query($con,$sum);
$resul =mysqli_fetch_array($sum1);
$tot=$resul['total'];
$total=$tot-$dis;
$d=$dis*100/$tot;

$query = "Select signup.name,order1.status,order1.discount,order1.total,order1.orderid,order1.date from order1 inner join signup on order1.loginid=signup.loginid group by orderid";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result)){
  $st=$row['status'];
   if($st=="Pending"){
    $color='yellow';
    $text='black';
   }
   if($st=="Accepted"){
    $color='orange';
    $text='black';
   }
   if($st=="Cancel"){
    $color='red';
    $text='white';
   }
   if($st=="Delivered"){
    $color='lightgreen';
    $text='black';
   }
   if($st=="Completed"){
    $color='lightgreen';
    $text='black';
   }
  ?>
    <div class="col-sm-4">
        <div class="thumbnail" style="background-color:white;padding:10px;">
        <p><strong>From : <?php echo $row['name'];?>.</strong></p>
        <p>Order Date : <?php echo $row['date'];?>.</p>
        <p style="background-color:<?php echo $color;?>;padding:px;color:<?php echo $text;?>;">Order <?php echo $st;?>.</p>
<p class = "divider-text"></p>
<div class="row">
    <div class="col-sm-6">
    <p>Total with <?php echo $d;?>% Discount :</p>
    </div>
    <div class="col-sm-3">
    </div>
    <div class="col-sm-3">
    <p><?php echo $tot;?> Rs.</p>
    <p><?php echo $total;?> Rs.</p>
    </div>
    </div>



        <form action ="afertilizerpop.php?order=<?php echo $row['orderid']; ?>" method ="POST">
<div class="row">
    <div class="col-sm-3">
    <button type="submit" name="submit" class="btn btn-outline-primary">Accept</button>
    </div>
    <div class="col-sm-4">
    <button type="submit" name="sub" class="btn btn-outline-warning">Completed</button>
    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="col-sm-4">
    <button type="submit" name="submi" class="btn btn-outline-success">Delivered</button>
    </div>
    </div>
</form>
      </div>
    </div>
    <?php
    }
    ?>
  
    </div>
          </div>
        </div>
