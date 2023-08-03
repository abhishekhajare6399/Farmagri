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

<p style="font-family:Serif;color:black;text-align:center;font-size:30px"> Good Information </p>
<p style="font-family:Serif;color:gray;text-align:center;font-size:15px">This are the details of prices of goods that change on Daliy bases.</p>
<p class = "divider-text"></p>

<form>
<div class="row" style="padding:5px;">
<div class="col-sm-12" style="padding:15px;">
<?php
include 'database/dbcon.php';
$selectquery = "select * from goodprice  order by name ASC";
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
</form>
</div>


