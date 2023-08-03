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
<p style="font-family:Serif;color:black;text-align:center;font-size:22px"> Plant disease Detection </p>
<?php
    $sql = "SELECT * FROM detect";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res); 
                    ?>
<p style="font-family:Serif;color:black;text-align:center;font-size:20px"> Total : <?php echo $count; ?>. </p>
</div>
<div class="col-sm-1" style="padding:5px;">
</div></div>
<p class = "divider-text"></p>


<div class="row" style="padding:5px;">
<?php
include 'database/dbcon.php';
$li=$_SESSION['loginid'];
$selectquery = "select * from detect order by id DESC";
$query = mysqli_query($con,$selectquery);
while($row = mysqli_fetch_array($query)){
?>
<div class="col-sm-3" 8style="padding:5px;">
<a href="http://localhost/Farmagri/farmagri/env/<?php echo $row['image'];?>"><img src="farmagri/env/<?php echo $row['image'];?>" alt="" style="width:220px;height:250px; border-radius: 10px;"></a><br>
<label for="inputEmail4">Plant Name : <?php echo $row['plant'];?></label><br>
<label for="inputEmail4">Disease Name : <?php echo $row['result'];?></label><br>
<label for="inputEmail4">Date : <?php echo $row['date'];?> Rs.</label><br>
</div><br>
<?php } ?>
<p class = "divider-text"></p> 
</div>






</div>