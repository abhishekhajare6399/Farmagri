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
<p style="font-family:Serif;color:black;text-align:center;font-size:22px"> Help Information </p>
<?php
    $sql = "SELECT * FROM contact where status ='Pending'";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res); 
                    ?>
<p style="font-family:Serif;color:black;text-align:center;font-size:20px"> Total user : <?php echo $count; ?>. </p>
</div>
</div>
<p class = "divider-text"></p>

<div class="row" style="padding:5px;">
<div class="col-sm-3" style="padding:5px;">
<label for="inputEmail4">User Information :</label>
      <p class = "divider-text"></p>
</div>
<div class="col-sm-3" style="padding:5px;">
<label for="inputEmail4">Problem :</label>
      <p class = "divider-text"></p>
</div>
<div class="col-sm-6" style="padding:5px;">
<label for="inputEmail4">Solution :</label>
      <p class = "divider-text"></p>
</div>
</div>


<?php
include 'database/dbcon.php';
$selectquery = "select * from contact inner join signup on signup.loginid=contact.loginid where contact.status='Pending' order by id DESC";
$query = mysqli_query($con,$selectquery);
while($row = mysqli_fetch_array($query)){
?>
<div class="row" style="padding:5px;">
<div class="col-sm-3" style="padding:5px;">
<label for="inputEmail4">Problem ID : <?php echo $row['pid'];?>.</label><br>
<label for="inputEmail4">Name : <?php echo $row['name'];?>.</label><br>
<label for="inputEmail4">Mobile : <?php echo $row['mobile'];?>.</label><br>
<label for="inputEmail4">Email : <?php echo $row['email'];?>.</label><br>
<label for="inputEmail4">Address : <?php echo $row['address'];?>.</label><br>
</div>
<div class="col-sm-3" style="padding:5px;">
<label for="inputEmail4"><?php echo $row['problem'];?></label><br>
</div>
<div class="col-sm-6" style="padding:5px;">
<form action ="acontact1.php?pid=<?php echo $row['pid'];?>" method ="POST" enctype ="multipart/form-data">
<textarea class="form-control" id="exampleFormControlTextarea1" name="<?php echo $row['pid'];?>" rows="5" placeholder="Problem Solution" required></textarea>

<div class="row">
<div class="col-sm-8">
</div>
<div class="col-sm-2" style="padding:15px;">
<button type="submit" name="submit" class="btn btn-outline-primary">Send</button>
</div>
</form>
<div class="col-sm-2" style="padding:15px;">
<form action ="acontact1.php?pid=<?php echo $row['pid'];?>" method ="POST" enctype ="multipart/form-data">
<button type="submit1" name="submit1" class="btn btn-outline-danger">Cancel</button>
</div></div>
</form>
</div> 

<p class = "divider-text"></p>
</div>
<?php } ?>
</div>