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
<div class="row" style="padding:5px;">
<div class="col-sm-10" style="padding:15px;">
<p style="font-family:Serif;color:black;text-align:center;font-size:30px"> Profile : </p>
</div>
<div class="col-sm-2" style="padding:15px;">
<a href="uprofile1.php"><button class="btn btn-outline-primary"  style="float: center;padding:5px;"> <i class="fa fa-edit" aria-hidden="true"></i>  Edit  </button></a>  
</div></div>

<p class = "divider-text"></p>

<?php
include 'database/dbcon.php';
$li=$_SESSION['loginid'];
$selectquery = "select * from signup  where loginid ='$li' and status='Active'";
$query = mysqli_query($con,$selectquery);
while($result =mysqli_fetch_array($query)){
?>
<div class="row" style="padding:5px;">
<div class="col-sm-8" style="padding:15px;">
<form action ="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method ="POST" enctype ="multipart/form-data">
<div class="row" style="padding:5px;">

<div class="col-sm-12" style="padding:15px;">
      <label for="inputEmail4">Name :</label>
      <input type="age" name="age" class="form-control" id="inputnumber" value="<?php echo $result['name'];?>" placeholder="<?php echo $result['name'];?>" required>
      </div>
<div class="col-sm-6" style="padding:15px;">
      <label for="inputEmail4">Email :</label>
      <input type="age" name="age" class="form-control" id="inputnumber" value="<?php echo $result['email'];?>" placeholder="<?php echo $result['email'];?>" required>
</div>
<div class="col-sm-6" style="padding:15px;">
      <label for="inputEmail4">Mobile :</label>
      <input type="quantity" name="quantity" class="form-control" value="<?php echo $result['mobile'];?>" id="inputnumber" placeholder="<?php echo $result['mobile'];?>" required>
</div>
<div class="col-sm-12" style="padding:15px;">
      <label for="inputEmail4">Address :</label>
      <input type="price" name="price" class="form-control" value="<?php echo $result['address'];?>" id="inputnumber" placeholder="<?php echo $result['address'];?>" required>
</div>
<div class="col-sm-5" style="padding:15px;">
      <label for="inputEmail4">City :</label>
      <input type="price" name="price" class="form-control" value="<?php echo $result['city'];?>" id="inputnumber" placeholder="<?php echo $result['city'];?>" required>
</div>
<div class="col-sm-5" style="padding:15px;">
      <label for="inputEmail4">State  :</label>
      <input type="price" name="price" class="form-control" value="<?php echo $result['state'];?>" id="inputnumber" placeholder="<?php echo $result['state'];?>" required>
</div>
<div class="col-sm-2" style="padding:15px;">
      <label for="inputEmail4">Zip :</label>
      <input type="price" name="price" class="form-control" value="<?php echo $result['pincode'];?>" id="inputnumber" placeholder="<?php echo $result['pincode'];?>" required>
</div>

</div>
</form>
</div>
<div class="col-sm-4" style="padding:15px;">
<img alt="ecommerce" src="<?php echo $result['image'];?>"style="width:80%;height:100%;border-radius:12px;">
</div>
<?php } ?>
</div>

</div>