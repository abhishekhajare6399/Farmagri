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

<p style="font-family:Serif;color:black;text-align:center;font-size:25px"> User </p>
<?php
    $sql = "SELECT * FROM signup where status='Active' ";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res); 
    $sql = "SELECT SUBSTRING(loginid, 1, 2) AS loginid FROM signup WHERE SUBSTRING(loginid, 1, 2) ='FM' and status='Active'";
    $res = mysqli_query($con, $sql);
    $count1 = mysqli_num_rows($res);
    $sql = "SELECT SUBSTRING(loginid, 1, 2) AS loginid FROM signup WHERE SUBSTRING(loginid, 1, 2) ='IN' and status='Active'";
    $res = mysqli_query($con, $sql);
    $count2 = mysqli_num_rows($res);
                    ?>


<p style="font-family:Serif;color:black;text-align:center;font-size:20px"> Total User : <?php echo $count; ?>&nbsp;&nbsp;&nbsp;  Farmer : <?php echo $count1; ?>&nbsp;&nbsp;&nbsp; Industrialist : <?php echo $count2; ?> </p>
<p class = "divider-text"></p>

<div class="row" style="padding:5px;">
<div class="col-sm-4" style="padding:5px;">
<label for="inputEmail4">User Information :</label>
      <p class = "divider-text"></p>
</div>
<div class="col-sm-3" style="padding:5px;">
<label for="inputEmail4">Profile Image :</label>
      <p class = "divider-text"></p>
</div>
<div class="col-sm-3" style="padding:5px;">
<label for="inputEmail4">ID Proof Image :</label>
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
$selectquery = "select * from signup where status='Active'  group by cid  order by cid DESC";
$query = mysqli_query($con,$selectquery);
while($row = mysqli_fetch_array($query)){
?>
<div class="row" style="padding:5px;">
<div class="col-sm-4" style="padding:5px;">
<label for="inputEmail4">Loginid : <?php echo $row['loginid'];?></label><br>
<label for="inputEmail4">Name : <?php echo $row['name'];?></label><br>
<label for="inputEmail4">Email : <?php echo $row['email'];?></label><br>
<label for="inputEmail4">Mobile : <?php echo $row['mobile'];?></label><br>
<label for="inputEmail4">Address : <?php echo $row['address'];?> <?php echo $row['pincode'];?> <?php echo $row['city'];?> <?php echo $row['state'];?></label>
</div>

<div class="col-sm-3" style="padding:5px;">
<a href="http://localhost/Farmagri/<?php echo $row['image'];?>"><img src="<?php echo $row['image'];?>" alt="" style="width:250px;height:150px; border-radius: 10px;"></a>
</div>
<div class="col-sm-3" style="padding:5px;">
<a href="http://localhost/Farmagri/<?php echo $row['proof'];?>"><img src=" <?php echo $row['proof'];?>" alt="" style="width:250px;height:150px; border-radius: 10px;"></a>
</div>

<div class="col-sm-2" style="padding:5px;">
<div class="col-sm-12" style="padding:15px;">
<a href="auser1.php?loginid=<?php echo $row['loginid'];?>"><button class="btn btn-outline-success"  style="float: left;padding:5px;"><i class="fa fa-check" aria-hidden="true"></i>  Change Information </button></a><br> 
</div><br>
<div class="col-sm-12" style="padding:15px;">
<a href="auser1.php?cloginid=<?php echo $row['loginid'];?>"><button class="btn btn-outline-danger"  style="float: center;padding:5px;"><i class="fa fa-times" aria-hidden="true"></i>  Cancel  Membership </button></a>  
</div>
    
</div>
<p class = "divider-text"></p>
</div>
<?php } ?>







</div>