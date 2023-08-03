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

<p style="font-family:Serif;color:black;text-align:center;font-size:30px">Offering Price</p>
<p style="font-family:Serif;color:gray;text-align:center;font-size:15px">Price Offer by buyer accept it or reject.</p>
<p class = "divider-text"></p>

<div class="row" style="padding:5px;">

<div class="col-sm-6" style="padding:15px;">
<label for="inputEmail4">Goods Information :</label>
      <p class = "divider-text"></p>

</div>
<div class="col-sm-3" style="padding:15px;">
      <label for="inputEmail4">Buy Information :</label>
      <p class = "divider-text"></p>
</div>
<div class="col-sm-3" style="padding:15px;">
      <label for="inputEmail4">Action :</label>
      <p class = "divider-text"></p>
</div>
</div>

<?php
include 'database/dbcon.php';
$li=$_SESSION['loginid'];
$selectquery = "select * from buyer inner join sell on sell.goodid=buyer.goodid where farmer ='$li' and status='pending' group by buyer.id  order by buyer.id DESC";
$query = mysqli_query($con,$selectquery);
while($result =mysqli_fetch_array($query)){
?>

<div class="row" style="padding:5px;">
<div class="col-sm-6" style="padding:15px;">
<div class="row">
<div class="col-sm-2">
</div>
<div class="col-sm-6"><br>
<label for="inputEmail4">Good Name : <?php echo $result['product'];?>.</label><br>
<label for="inputEmail4">Excepted Price : <?php echo $result['epu'];?> Rs.</label>
</div>
<div class="col-sm-4">
<img alt="ecommerce" src="<?php echo $result['image'];?>"  style="width:80%;height:100%;border-radius:12px;">
</div>
</div>
</div>
<div class="col-sm-3" style="padding:15px;"><br><br>
      <label for="inputEmail4">Offer Price : <?php echo $result['price'];?>.</label>
</div>
<div class="col-sm-3" style="padding:15px;">
      <div class="row">
      <div class="col-sm-2">
</div>
    <div class="col-sm-5" style="padding:10px;">
    <a href="uaupdate.php?ids=<?php echo $result['buyer'];?>&&gids=<?php echo $result['goodid'];?>"><button class="btn btn-outline-success"  style="float: left;padding:5px;"><i class="fa fa-check" aria-hidden="true"></i>  Accept </button></a>  
  </div>
  <div class="col-sm-4" style="padding:10px;">
  <a href="uaupdate.php?id=<?php echo $result['buyer'];?>&&gid=<?php echo $result['goodid'];?>"><button class="btn btn-outline-danger"  style="float: center;padding:5px;"><i class="fa fa-times" aria-hidden="true"></i>  Reject </button></a>  
  </div>
  </div>
</div>
<p class = "divider-text"></p>
</div>
<?php
}
?>
</div>

<?php
if(isset($_GET['id']) && isset($_GET['gid'])){
    $buyer = $_GET['id'];
    $goodid = $_GET['gid'];

    $updatequery = "update buyer set status='Rejected' where buyer='$buyer' and goodid='$goodid'";

    $query = mysqli_query($con, $updatequery);

    if($query){

            ?>
            <script>
                alert("Offer Rejected");
                location.replace("ubuyer.php");
            </script>
            <?php
        }
    }
    if(isset($_GET['ids']) && isset($_GET['gids'])){
        $buyer = $_GET['ids'];
        $goodid = $_GET['gids'];
    
        $updatequery = "update buyer set status='Accepted' where buyer='$buyer' and goodid='$goodid'";
        $query = mysqli_query($con, $updatequery);
        if($query){
                ?>
                <script>
                    alert("Offer Accepted");
                    location.replace("ubuyer.php");
                </script>
                <?php
            }
        }
?>

