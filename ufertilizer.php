<?php include 'unavbar.php' ?>
<div class="content" style=" padding: 8px 8px;margin :10px;">
<div class="row">
  <div class="col-sm-10" style="padding:10px;">
  <p style="font-family:Serif;color:black;text-align:left;font-size:20px">Buy Fertilizer : </p>
</div>
  <div class="col-sm-2" style="padding:10px;">
  <a href="ucheckout.php"><button class="btn btn-outline-success" type="submit" style="float:right;padding:10px;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Checkout</button></a>
</div>
</div>

<div class="row" style="padding:5px;">

<?php
include 'database/dbcon.php';
$selectquery = "select * from fertilizer ";
$query = mysqli_query($con,$selectquery);
while($result =mysqli_fetch_array($query)){
?>
<div class="col-sm-3" style="padding:5px;">
<a href="ufertilizer1.php?id=<?php echo $result['fetid'];?>."><img alt="ecommerce" src="<?php echo $result['image'];?>."  style="width:100%;height:300px;border-radius:2px;"></a>
<div class="row" style="padding:5px;">
<div class="col-sm-8" style="padding:5px;">
<p style="font-family:Serif;color:black;text-align:left;font-size:20px;padding:15px;"><?php echo $result['fname'];?>.</p>
</div>
<div class="col-sm-4" style="padding:5px;">
<p style="font-family:Serif;color:black;text-align:right;font-size:18px;padding:15px;"><?php echo $result['price'];?> Rs. </p>
</div>
</div>  
</div>
<?php } ?>
</div>


</div>