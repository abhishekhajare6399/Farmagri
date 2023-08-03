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
<div class="row">
    <div class="col-sm-1" style="padding:5px;"><br>
    <a href="afertilizer.php" class="btn btn-outline-success"><i class="fa fa-arrow-left" aria-hidden="true"></i></a><br><br>
    </div>
    <div class="col-sm-11" style="padding:5px;"><br>
    <p style="font-family:Serif;color:black;text-align:center;font-size:30px"> Add New Fertilizer Information </p>
    </div></div>
<p class = "divider-text"></p>

<form action ="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method ="POST" enctype ="multipart/form-data">
<div class="row" style="padding:5px;">
<div class="col-sm-2" style="padding:15px;">
</div>

<div class="col-sm-8" style="padding:15px;">
      <label for="inputEmail4">Link :</label>
      <input type="age" name="good" class="form-control" id="inputnumber" placeholder="News Link" required>
</div>
<div class="col-sm-2" style="padding:15px;">
</div>

<div class="col-sm-2" style="padding:15px;">
</div>
<div class="col-sm-8" style="padding:15px;">
      <label for="inputEmail4">News Information :</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" placeholder="News Information" required></textarea>
</div>
<div class="col-sm-2" style="padding:15px;">
</div>



<div class="col-sm-6" style="padding:5px;">
</div>
<div class="col-sm-1" style="padding:5px;">
<button type="submit" name="submit" class="btn btn-outline-primary">Submit</button>
</div>
<div class="col-sm-5" style="padding:5px;">
</div>
</div>
</form>
</div>
</div>



<?php
include'database/dbcon.php';
if(isset($_POST['submit']))
{
date_default_timezone_set("Asia/Calcutta");
$name = mysqli_real_escape_string($con, $_POST['good']);
$description = mysqli_real_escape_string($con, $_POST['description']);
$date = date("Y-m-d");

$insertquery ="insert into news(news,link,date) 
values('$description','$name','$date')";

$iquery = mysqli_query($con, $insertquery);

if($iquery)
{
  ?>
  <script>
   location.replace("anews.php")
    alert("Information Inserted ")
  </script>
  <?php

}else{
    ?>
    <script>
     location.replace("anews.php")
      alert("No Inserted ")
    </script>
    <?php
}
}
?>