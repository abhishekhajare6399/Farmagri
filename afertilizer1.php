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

<?php
    include 'database/dbcon.php';
    if(isset($_GET['fetid'])){
    $gid = $_GET['fetid'];
    $selectquery = "select * from fertilizer where fetid='$gid'";
    $query = mysqli_query($con,$selectquery);
    while($result =mysqli_fetch_array($query)){
    ?>
    <div class="row">
    <div class="col-sm-7" style="padding:15px;">
    <div class="row">
    <div class="col-sm-1" style="padding:5px;"><br>
    <a href="agoodprice.php" class="btn btn-outline-success"><i class="fa fa-arrow-left" aria-hidden="true"></i></a><br><br>
    </div>
    <div class="col-sm-10" style="padding:5px;"><br>
    <h1 style="font-family:Serif;color:black;text-align:center;font-size:30px"><?php echo $result['fname'];?>.</h1>
    <p style="font-family:Serif;color:blue;text-align:center;font-size:20px">Description.</p>
    </div></div>
    <p class = "divider-text"></p>
    <p style="font-family:Serif;color:gray;text-align:center;font-size:15px"><?php echo $result['description'];?>.</p>

    <div class="row" style="padding:5px;">
    <div class="col-sm-2" style="padding:15px;">
    </div>
    <div class="col-sm-2" style="padding:15px;">
    <p style="font-family:Serif;color:black;text-align:left;font-size:20px">Price : </p>
    </div>
    <div class="col-sm-6" style="padding:15px;">
    <form action ="" method ="POST">
    <input class="form-control me-2"  type="number" id="quantity" name="quantity" min="0" max="10000" value="<?php echo $result['price'];?>" aria-label="Search" required><br>
    <button class="flex btn btn-outline-primary" type="submit" name="submit">Change Price</button><br>
    </form></div>
    <div class="col-sm-2" style="padding:15px;">
    </div>
    </div>

    <p class = "divider-text"></p>
    </div>
    <div class="col-sm-5" style="padding:5px;">
    <img alt="ecommerce" src="<?php echo $result['image'];?>"  style="width:80%;height:100%;border-radius:12px;">

    </div>
    </div>

          <?php
    }
    if(isset($_POST['submit']))
    {
    date_default_timezone_set("Asia/Calcutta");
    $price=mysqli_real_escape_string($con, $_POST['quantity']);
    $updatequery = "update fertilizer set  price='$price' where fetid='$gid' ";    
    $res = mysqli_query($con,$updatequery);
    if($res){
             ?>
                <script>
                location.replace("afertilizer.php")
                alert("Price is Updated");
                </script>
                <?php
                }else{
                }
            }
    }
?>

</div>