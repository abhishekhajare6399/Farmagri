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
    <a href="agoodprice.php" class="btn btn-outline-success"><i class="fa fa-arrow-left" aria-hidden="true"></i></a><br><br>
    </div>
    <div class="col-sm-11" style="padding:5px;"><br>
    <p style="font-family:Serif;color:black;text-align:center;font-size:30px"> Add New Good Information </p>
    </div></div>
<p class = "divider-text"></p>

<form action ="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method ="POST" enctype ="multipart/form-data">
<div class="row" style="padding:5px;">
<div class="col-sm-2" style="padding:15px;">
</div>

<div class="col-sm-8" style="padding:15px;">
      <label for="inputEmail4">Good Name :</label>
      <input type="age" name="good" class="form-control" id="inputnumber" placeholder="Good Name" required>
</div>
<div class="col-sm-2" style="padding:15px;">
</div>

<div class="col-sm-2" style="padding:15px;">
</div>
<div class="col-sm-8" style="padding:15px;">
      <label for="inputEmail4">Price :</label>
      <input type="quantity" name="price" class="form-control" id="inputnumber" placeholder="Price" required>
</div>
<div class="col-sm-2" style="padding:15px;">
</div>

<div class="col-sm-2" style="padding:15px;">
</div>
<div class="col-sm-8" style="padding:15px;">
      <label for="inputEmail4">Good Information :</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" placeholder="Good Information" required></textarea>
</div>
<div class="col-sm-2" style="padding:15px;">
</div>

<div class="col-sm-2" style="padding:5px;">
</div>
<div class="col-sm-8" style="padding:5px;">
<p style="font-family:Serif;color:gray;text-align:left;font-size:15px">Click on the "Choose File" button to upload a photo of the good :</p>
<input type="file" id="myFile" name="image" required>
</div>
<div class="col-sm-2" style="padding:5px;">
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

<?php
include'database/dbcon.php';
if(isset($_POST['submit']))
{
    date_default_timezone_set("Asia/Calcutta");
$name = mysqli_real_escape_string($con, $_POST['good']);
$price = mysqli_real_escape_string($con, $_POST['price']);
$description = mysqli_real_escape_string($con, $_POST['description']);

$file=$_FILES['image'];
$rand = rand(10000,99999);

$filename = $file['name'];
      $filepath = $file['tmp_name'];
      $fileerror = $file['error'];
      if($fileerror == 0){
        $destfile = 'goodimage/'.$filename;
        move_uploaded_file($filepath, $destfile);
      
$insertquery ="insert into goodprice(gid,name,description,price,image) 
values('$rand','$name','$description','$price','$destfile')";

$iquery = mysqli_query($con, $insertquery);

if($iquery)
{
  ?>
  <script>
    location.replace("agoodprice.php")
    alert("Good Price Added")
  </script>
  <?php

}else{
    ?>
    <script>
      alert("No Inserted ")
    </script>
    <?php
}
}
}
?>
</div>
