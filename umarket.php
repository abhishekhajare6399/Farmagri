<?php include 'unavbar.php' ?>
<style>
      .divider-text{
    position: relative;
    text-align: center;
    margin-top: 1px;
    margin-bottom: 1px;
    padding : 1px;
    
  }
  .divider-text span{
    padding: 1px;
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
<div class="content" style=" padding: 8px 6px;margin :10px;">
<div class="row" style="padding:10px;">
<p style="font-family:Serif;color:black;text-align:center;font-size:30px">Market Goods </p>
<p class = "divider-text"></p>
<?php
include 'database/dbcon.php';
$li = $_SESSION['loginid'];
$selectquery = "select * from sell where sellstatus='pending' and Lid<>'$li' order by product ASC";
$query = mysqli_query($con,$selectquery);
while($result =mysqli_fetch_array($query)){
?>
<div class="col-sm-3" style="padding:10px;">
<div class="card" style="width: 19.5rem; padding:5px">
  <a href="umarket1.php?id=<?php echo $result['goodid'];?>"><img class="card-img-top" src="<?php echo $result['image'];?>" alt="Card image cap" style="width:100%;height:250px;"></a>
  <div class="card-body">
  <div class="row">
  <div class="col-sm-8">
    <p class="card-text"><?php echo $result['product'];?>.</p>
</div>
    <div class="col-sm-4">
    <p class="card-text"><?php echo $result['epu'];?> Rs/Kg.</p>
    </div></div>
  </div>
</div>
</div>
<?php
}
?>



</div>
</div>