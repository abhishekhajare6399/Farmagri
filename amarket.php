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
<div class="col-sm-12" style="padding:5px;">
<p style="font-family:Serif;color:black;text-align:center;font-size:22px"> Good Information </p>
<?php
    $sql = "SELECT * FROM sell";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res); 
                    ?>
<p style="font-family:Serif;color:black;text-align:center;font-size:20px"> Total Goods : <?php echo $count; ?>. </p>
</div>
</div>
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
$selectquery = "select * from sell order by id DESC";
$query = mysqli_query($con,$selectquery);
while($row = mysqli_fetch_array($query)){
?>
<div class="row" style="padding:5px;">
<div class="col-sm-2" style="padding:5px;">
<label for="inputEmail4">Good ID : <?php echo $row['goodid'];?>.</label><br>
<label for="inputEmail4">Good Name : <?php echo $row['product'];?>.</label><br>
<label for="inputEmail4">Quantity : <?php echo $row['quantity'];?> Quintal </label><br>
<label for="inputEmail4">Price : <?php echo $row['epu'];?> Rs.</label><br>
<label for="inputEmail4">Status : <?php echo $row['sellstatus'];?>.</label><br>
</div>
<div class="col-sm-6" style="padding:5px;">
<label for="inputEmail4"><?php echo $row['description'];?></label><br>
</div>
<div class="col-sm-2" style="padding:5px;">
<a href="http://localhost/Farmagri/<?php echo $row['image'];?>"><img src=" <?php echo $row['image'];?>" alt="" style="width:220px;height:150px; border-radius: 10px;"></a>
</div>

<div class="col-sm-2">
<div class="col-sm-12">
<div class="row">
<div class="col-sm-2">
</div>
<div class="col-sm-10"><br>
<?php if($row['sellstatus']=='Pending'){ ?>
<a href="amarket1.php?gid=<?php echo $row['goodid'];?>"><button class="btn btn-outline-success"  style="float: left;padding:5px;"><i class="fa fa-check" aria-hidden="true"></i>  Change Price </button></a><br>
<?php }  ?>
</div></div>
</div>    <br>
<div class="col-sm-12" style="padding:15px;">

<?php if($row['sellstatus']=='Pending'){ ?>
<div class="row">
<div class="col-sm-3">
</div>
<div class="col-sm-8">
<a href="amarket1.php?cgid=<?php echo $row['goodid'];?>"><button class="btn btn-outline-danger"  style="float: center;padding:5px;">Cancel</button></a> 
</div></div>
<?php }  ?>
   
</div> 
</div>
<p class = "divider-text"></p>
</div>
<?php } ?>







</div>