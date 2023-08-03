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
<p style="font-family:Serif;color:black;text-align:center;font-size:22px"> News Information </p>
<?php
    $sql = "SELECT * FROM news";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res); 
                    ?>
<p style="font-family:Serif;color:black;text-align:center;font-size:20px"> Total News : <?php echo $count; ?>. </p>
</div>
<div class="col-sm-1" style="padding:5px;">
<a href="anews1.php"><button class="btn btn-outline-primary"  style="float: center;padding:5px;"><i class="fa fa-plus" aria-hidden="true"></i> Add News</button></a>  
</div></div>
<p class = "divider-text"></p>

<div class="row" style="padding:5px;">
<?php
include 'database/dbcon.php';
$li=$_SESSION['loginid'];
$selectquery = "select * from news order by id DESC";
$query = mysqli_query($con,$selectquery);
while($row = mysqli_fetch_array($query)){
?>
<div class="col-sm-3" style="padding:5px;">
<iframe width="320" height="300"  style="padding:10px;" src="https://www.youtube.com/embed/<?php echo $row['link'];?>">
</iframe>
<p><?php echo $row['news'];?></p>

<a href="amarket1.php?news=<?php echo $row['id'];?>"><button class="btn btn-outline-danger"  style="float: center;padding:5px;">Delete</button></a> 
</div>
<?php } ?>
</div>
<p class = "divider-text"></p>


</div>