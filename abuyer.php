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
<div class="col-sm-12">
<p style="font-family:Serif;color:black;text-align:center;font-size:22px"> Buyer Information </p>
<?php
    $sql = "SELECT * FROM buyer";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res); 
                    ?>
<p style="font-family:Serif;color:black;text-align:center;font-size:20px"> Total buyer : <?php echo $count; ?>. </p>
</div>
</div>
<p class = "divider-text"></p>
<div class="row" style="padding:5px;">
<div class="col-sm-2" style="padding:5px;">
</div>
<div class="col-sm-8" style="padding:5px;">

<div class="row" style="padding:5px;">
<div class="col-sm-2" style="padding:5px;">
<label for="inputEmail4">Buyer :</label>
      <p class = "divider-text"></p>
</div>
<div class="col-sm-2" style="padding:5px;">
<label for="inputEmail4">Farmer :</label>
      <p class = "divider-text"></p>
</div>
<div class="col-sm-2" style="padding:5px;">
<label for="inputEmail4">Goodid :</label>
      <p class = "divider-text"></p>
</div>
<div class="col-sm-2" style="padding:5px;">
<label for="inputEmail4">Price :</label>
      <p class = "divider-text"></p>
</div>
<div class="col-sm-4" style="padding:5px;">
<label for="inputEmail4">Action :</label>
      <p class = "divider-text"></p>
</div>
</div>


<?php
include 'database/dbcon.php';
$selectquery = "select * from buyer order by id DESC";
$query = mysqli_query($con,$selectquery);
while($row = mysqli_fetch_array($query)){
?>
<div class="row" style="padding:5px;">
<div class="col-sm-2" style="padding:5px;">
<label for="inputEmail4" style="padding:5px;"><?php echo $row['buyer'];?></label>
</div>
<div class="col-sm-2" style="padding:5px;">
<label for="inputEmail4" style="padding:5px;"><?php echo $row['farmer'];?></label>
</div>
<div class="col-sm-2" style="padding:5px;">
<label for="inputEmail4" style="padding:5px;"><?php echo $row['goodid'];?></label>
</div>
<div class="col-sm-2" style="padding:5px;">
<label for="inputEmail4" style="padding:5px;"><?php echo $row['price'];?> Rs.</label>
</div>

<div class="col-sm-4">
<div class="row" style="padding:5px;">
<div class="col-sm-1">
</div>
<div class="col-sm-6" style="padding:5px;">
<?php if($row['status']<>'Pending'){ ?>
<a href="amarket1.php?gid=<?php echo $row['goodid'];?>"><button class="btn btn-outline-success"  style="float: left;padding:5px;">Change Price </button></a><br>
<?php }  ?>
</div>    
<div class="col-sm-4" style="padding:5px;">
<?php if($row['status']<>'Pending'){ ?>
<a href="amarket1.php?cgid=<?php echo $row['goodid'];?>"><button class="btn btn-outline-danger"  style="float: center;padding:5px;">Cancel</button></a> 
<?php }  ?>
</div> </div>
</div>

<p class = "divider-text"></p>
</div>
<?php } ?>

</div>
<div class="col-sm-2" style="padding:5px;">
</div>
</div>





</div>