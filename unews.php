<?php include 'unavbar.php' ?>
<style>
html
   {
    scroll-behavior: smooth;
   }
   .center{
    flex: auto;
    max-width: 300px;
    max-height:300px;
    background: white;
    padding: 5px;
   }
</style>
<div class="content" style=" padding: 8px 8px;margin :10px;">

<div class="row"  style="padding:10px;">

<?php
include 'database/dbcon.php';
$li=$_SESSION['loginid'];
$selectquery = "select * from news order by date DESC";
$query = mysqli_query($con,$selectquery);
while($row = mysqli_fetch_array($query)){
?>
<div class="col-sm-3" style="padding:5px;">
<iframe width="320" height="300"  style="padding:10px;" src="https://www.youtube.com/embed/<?php echo $row['link'];?>">
</iframe>
<p><?php echo $row['news'];?></p>
</div>
<?php } ?>




</div>
</div>