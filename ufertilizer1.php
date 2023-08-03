<?php include 'unavbar.php' ?>

<div class="content" style=" padding: 8px 8px;margin :10px;">


<?php
include 'database/dbcon.php';
if(isset($_GET['id'])){
    $resid = $_GET['id'];
  $selectquery = "SELECT * FROM `fertilizer` where fetid='$resid' ";
$query = mysqli_query($con,$selectquery);
while($result =mysqli_fetch_array($query)){
?>
<div class="row" style="padding:5px;">
<div class="col-sm-1" style="padding:15px;">
<a href="ufertilizer.php" class="btn btn-outline-success"><i class="fa fa-arrow-left" aria-hidden="true"></i></a><br><br>
</div>

<div class="col-sm-5" style="padding:15px;">
<img alt="ecommerce" src="<?php echo $result['image'];?>"  style="width:80%;height:550px;border-radius:12px;">
</div>

<div class="col-sm-4" style="padding:15px;">
<h1 style="font-family:Serif;color:black;text-align:center;font-size:30px"><?php echo $result['fname'];?>.</h1>
<p style="font-family:Serif;color:black;text-align:center;font-size:15px"><?php echo $result['description'];?>.</p>
<div class="row" style="padding:5px;">
<div class="col-sm-2" style="padding:15px;">
</div>
<div class="col-sm-5" style="padding:15px;">
<p style="font-family:Serif;color:gray;text-align:left;font-size:20px">Status : </p>
<p style="font-family:Serif;color:gray;text-align:left;font-size:25px">Price : </p>
<p style="font-family:Serif;color:gray;text-align:left;font-size:25px">Quantity : </p>
</div>

<div class="col-sm-5" style="padding:15px;">
<p style="font-family:Serif;color:black;text-align:right;font-size:20px"><?php echo $result['status'];?></p>
<p style="font-family:Serif;color:black;text-align:right;font-size:25px"><?php echo $result['price'];?> Rs. </p>

<form action ="ufertilizer2.php?fid=<?php echo $result['fetid'];?>" method ="POST">
<input class="form-control me-2"  type="number" id="quantity" name="quantity" min="0" max="1000" value="0" aria-label="Search" required><br>
<?php if( $result['status']=='Avaliable'){?>
<button class="flex btn btn-outline-primary" type="submit" name="submit">Buy</button><br>
<?php } ?></form>
</div>
<div class="col-sm-2" style="padding:15px;">
</div>
</div>
</div>


<div class="col-sm-2" style="padding:15px;">
<?php if( $result['status']=='Avaliable'){?>
<a href="ucheckout.php"><button class="btn btn-outline-success" type="submit" style="float:center;padding:10px;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Checkout</button></a>
<?php } ?>
</div>
</div>

<?php } }?>


</div>
