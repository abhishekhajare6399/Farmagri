<?php
session_start();
?>
<html>
    <head>
        <title>Farmagri</title>
        <link rel="icon" href="image\Agriculture _crop.png" />
    </head>
<style>
          * {
      margin: 0; padding: 0;
  }
  html, body, #container {
      height: 100%;
  }
  header {
      height: 11%;
  }
  label{
          text-align: left;
          color:black;
        }
        h3{
          text-align: center;
          color:black;
        }
        p{
          text-align: center;
          color:black;
        }
        body {
/* background-image : url('image/bg1.jpg'); */
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover; 
  } 
  .content {
      max-width: 65%;
     margin:auto;
      padding: 10px;
      border: 5px solid black;
    }
    .divider-text{
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
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
    border-bottom: 5px solid black;
    top: 55%;
    left: 0;
    z-index: 1;
  }
    </style>
    <?php include 'link/link.php'?>
    <body>
      <header>
</header>
<div class="content">
  <h3 style="font-family:Serif;color:black;text-align:center;font-size:35px">Farmagri</h3>
  <p style="font-family:Serif;color:black;text-align:center;font-size:20px">Register Your self With Farmagri and Sell your Goods anywhere at your Price.</p>
  <p class="bg-success text-white px-1"><?php
  if(isset($_SESSION['msg'])){
  echo $_SESSION['msg'];
  }
  ?>
</p>
  <p class = "divider-text"></p>

<form action ="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method ="POST" enctype ="multipart/form-data">
<div class="row">
    <div class="form-group col-sm-9">
      <label for="inputEmail4">Name :</label>
      <input type="name" class="form-control" id="inputname4" name="name" placeholder="Enter Your Name" required>
    </div>
  </div>


  <div class="form-group">
  <p style="font-family:Serif;color:white;text-align:left;font-size:15px">Click on the "Choose File" button to upload a photo of the good :</p>
  <input type="file" id="myFile" name="proof" required>
  </div>
  
 
  <div class="row">
    <div class="col-sm-4">
  </div>
  <div class="col-sm-6">
  <button type="submit" name="submit" class="btn btn-primary" style="padding: 10px 100px;">Submit</button>
  </div>
  </div>
</form>
</div>
</body>
</html>



<?php
include'database/dbcon.php';
if(isset($_POST['submit']))
{
date_default_timezone_set("Asia/Calcutta");
$username = mysqli_real_escape_string($con, $_POST['name']);
$file=$_FILES['proof'];
$rand = rand(10000,99999);

$filename = $file['name'];
      $filepath = $file['tmp_name'];
      $fileerror = $file['error'];
      if($fileerror == 0){
        $destfile = 'goods/'.$filename;
        move_uploaded_file($filepath, $destfile);
      
$insertquery ="insert into categories(goodid,goods,image) 
values('$rand','$username','$destfile')";

$iquery = mysqli_query($con, $insertquery);

if($iquery)
{

}else{
    ?>
    <script>
      alert("No Inserted ")
    </script>
    <?php
}
}}
?>