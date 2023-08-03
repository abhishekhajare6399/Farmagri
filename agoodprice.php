<?php include 'anavbar.php' ?>
<?php include 'database/dbcon.php' ?>
  <style>
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
<p style="font-family:Serif;color:black;text-align:center;font-size:22px"> Goods Price </p>
<?php
    $sql = "SELECT * FROM goodprice";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res); 
                    ?>
<p style="font-family:Serif;color:black;text-align:center;font-size:20px"> Total Goods : <?php echo $count; ?>. </p>
</div>
<div class="col-sm-1" style="padding:5px;">
<a href="agoodpriceinsert.php"><button class="btn btn-outline-primary"  style="float: center;padding:5px;"><i class="fa fa-plus" aria-hidden="true"></i> Add Good</button></a>  
</div></div>
<p class = "divider-text"></p>

<div class="row" style="padding:5px;">
<div class="col-sm-2" style="padding:5px;">
<label for="inputEmail4">Good Information :</label>
      <p class = "divider-text"></p>
</div>
<div class="col-sm-6" style="padding:5px;">
<label for="inputEmail4">Good Description :</label>
      <p class = "divider-text"></p>
</div>
<div class="col-sm-2" style="padding:5px;">
<label for="inputEmail4">Good Image :</label>
      <p class = "divider-text"></p>
</div>
<div class="col-sm-2" style="padding:5px;">
<label for="inputEmail4">Action :</label>
      <p class = "divider-text"></p>
</div>
</div>


<?php
include 'database/dbcon.php';
$li=$_SESSION['loginid'];
$selectquery = "select * from goodprice order by id DESC";
$query = mysqli_query($con,$selectquery);
while($row = mysqli_fetch_array($query)){
?>
<div class="row" style="padding:5px;">
<div class="col-sm-2" style="padding:5px;">
<label for="inputEmail4">Good ID : <?php echo $row['gid'];?></label><br>
<label for="inputEmail4">Name : <?php echo $row['name'];?></label><br>
<label for="inputEmail4">Price : <?php echo $row['price'];?> Rs.</label><br>
</div>
<div class="col-sm-6" style="padding:5px;">
<label for="inputEmail4"><?php echo $row['description'];?></label><br>
</div>

<div class="col-sm-2" style="padding:5px;">
<a href="http://localhost/Farmagri/<?php echo $row['image'];?>"><img src=" <?php echo $row['image'];?>" alt="" style="width:220px;height:250px; border-radius: 10px;"></a>
</div>

<div class="col-sm-2" style="padding:5px;">
<div class="col-sm-12" style="padding:15px;">
<a href="agoodprice1.php?gid=<?php echo $row['gid'];?>"><button class="btn btn-outline-success"  style="float: left;padding:5px;"><i class="fa fa-check" aria-hidden="true"></i>  Change Price </button></a><br> 
</div>    
</div>
<p class = "divider-text"></p>
</div>
<?php } ?>







</div>