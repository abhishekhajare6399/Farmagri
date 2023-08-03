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
<?php
include'database/dbcon.php';
if(isset($_POST['submit']))
{
date_default_timezone_set("Asia/Calcutta");
$search=mysqli_real_escape_string($con, $_POST['search']);

$emailquery =" select * from sell where product ='$search' ";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount>0)
{?>
<div class="content" style=" padding: 8px 6px;margin :10px;">
<div class="row" style="padding:5px;">
<p style="font-family:Serif;color:black;text-align:center;font-size:30px">Market Goods </p>
<p class = "divider-text"></p>
<?php
include 'database/dbcon.php';
$selectquery = "select * from sell where product='$search' and sellstatus='Pending' order by id DESC";
$query = mysqli_query($con,$selectquery);
while($result =mysqli_fetch_array($query)){
?>
<div class="col-sm-3">
<div class="card" style="width: 18rem; padding:3px">
  <a href="umarket1.php?id=<?php echo $result['goodid'];?>"><img class="card-img-top" src="<?php echo $result['image'];?>" alt="Card image cap" style="width:100%;height:250px;"></a>
  <div class="card-body">
  <div class="row">
  <div class="col-sm-9">
    <p class="card-text"><?php echo $result['product'];?>.</p>
</div>
    <div class="col-sm-3">
    <p class="card-text"><?php echo $result['epu'];?> Rs.</p>
    </div></div>
  </div>
</div>
</div>
<?php
}
?>
</div>
</div>
<?php
}

$emailquery =" select * from goodprice where name ='$search' ";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount>0)
{?>
    <div class="content" style=" padding: 8px 8px;margin :10px;">
    <p class = "divider-text"></p>
    <p style="font-family:Serif;color:black;text-align:center;font-size:30px">History </p>
    <div class="row" style="padding:5px;">
    <div class="col-sm-12" style="padding:15px;">
    
    <div class="row" style="padding:5px;">
<div class="col-sm-6" style="padding:15px;">
<label for="inputEmail4">Good Sell Information :</label>
      <p class = "divider-text"></p>
      <?php
include 'database/dbcon.php';
$li=$_SESSION['loginid'];
$selectquery = "select * from signup inner join sell on sell.Lid=signup.loginid where loginid ='$li' and product='$search' group by id  order by id DESC";
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



<div class="col-sm-6" style="padding:15px;">
      <label for="inputEmail4">Good Buy Information :</label>
      <p class = "divider-text"></p>

      <?php
include 'database/dbcon.php';
$li=$_SESSION['loginid']; 
$selectquery = "select * from buyer inner join sell on sell.goodid=buyer.goodid where buyer ='$li' and product='$search' group by buyer.id order by buyer.id DESC";
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
</div>

    </div>
    </div>
    </div>
    <?php
}


$emailquery =" select * from goodprice where name ='$search' ";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount>0)
{?>
    <div class="content" style=" padding: 8px 8px;margin :10px;">
    <p style="font-family:Serif;color:black;text-align:center;font-size:30px"> Good Information </p>
    <p style="font-family:Serif;color:gray;text-align:center;font-size:15px">This are the details of prices of goods that change on Daliy bases.</p>
    <p class = "divider-text"></p>
    <div class="row" style="padding:5px;">
    <div class="col-sm-12" style="padding:15px;">
    <?php
    include 'database/dbcon.php';
    $selectquery = "select * from goodprice where name='$search' order by gid DESC";
    $query = mysqli_query($con,$selectquery);
    while($result =mysqli_fetch_array($query)){?>
    <div class="row" style="padding:5px;">
    <div class="col-sm-2" style="padding:15px;">
    <label for="inputEmail4">Good Name : <?php echo $result['name'];?></label><br><br>
    <label for="inputEmail4">Good Price : <?php echo $result['price'];?> Rs.</label>
    </div>
    <div class="col-sm-7" style="padding:15px;">
    <label for="inputEmail4">Good Description : <?php echo $result['description'];?></label>
    </div>
    <div class="col-sm-3" style="padding:15px;">
    <img src="<?php echo $result['image'];?>" alt="<?php echo $result['name'];?>" style="width:100%;height:250px;">
    </div>
    </div>
    <p class = "divider-text"></p>
    <?php } ?>
    </div>
    </div>
    </div>
    <?php
}

}
?>