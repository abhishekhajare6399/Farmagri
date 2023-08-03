<?php
session_start();
if(!isset($_SESSION['loginid'])){
    echo "You are logged out";
    header('location:ulogin.php');
  }
?>
<?php
$loginid=$_SESSION['loginid'];
$city =$_SESSION['city'];
$image =$_SESSION['image'];
$name =$_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Farmagri</title>   
    <link rel="icon" href="image/Agriculture _crop.png" />
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<?php include 'link/link.php'?>
<?php include 'css/style.css'?>
<?php include 'css/message.css'?>
<style>
  a{
    text-decoration: none;
  }
  </style>
<body>

<div class="wrapper">
    <div class="sidebar">
    <div class="row" style="padding:5px">
    <div class="col-sm-3">
    <img src="image/Agriculture _crop.png" alt="" style="padding:5px;width:50px;height:50px;">
    </div>
    <div class="col-sm-5">
        <h3 style="color:white;padding:10px;">Farmagri</h3>
        </div>
        <p style="font-family:Serif;color:white;text-align:left;font-size:15px">Registeration Id : <?php echo $loginid?>.</p>
    </div>
        <ul>
            <li><a href="uhome.php"><i class="fa fa-home"></i>  Home</a></li>
            <li><a href="umarket.php"><i class="fa fa-shopping-cart"></i>  Market</a></li>
            <li><a href="usell.php"><i class="fa fa-address-card"></i>  Sell</a></li>
            <li><a href="ufertilizer.php"><i class="fa fa-list"></i>  Fertilizer</a></li>
            <li><a href="ugoodprice.php"><i class="fa fa-list"></i></i>  Goods Price</a></li>
            <li><a href="http://127.0.0.1:5000/<?php echo $loginid?>-<?php echo $name?>"><i class="fa fa-check"></i>  Detect</a></li>
            <li><a href="unews.php"><i class="fa fa-newspaper-o"></i>  News</a></li>
            <li><a href="ubuyer.php"><i class="fa fa-list"></i>  Buyer</a></li>
            <li><a href="uhistory.php"><i class="fa fa-history"></i>  History</a></li>
            <li><a href="ulogout.php"><i class="fa fa-sign-out"></i>  Logout</a></li>
        </ul> 
        <div class="social_media">
          <a href="#"><i class="fa fa-facebook-f"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-instagram"></i></a><br>
      </div>
    </div>
    <div class="main_content">
        <div class="header">
        <div class="row">
    <div class="col-sm-6">
       <h3 style="font-family:Serif;color:black;text-align:left;font-size:25px">Welcome <?php echo $name?>.</h3>
        </div>
        
        <div class="col-sm-4">
        <form class="d-flex" action ="usearch.php" method ="POST">
        <input class="form-control me-2" type="search" name="search" placeholder="Search...." aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="submit"><i class ="fa fa-search"></i></button>
      </form>
      </div>

      <?php 
      include 'database/dbcon.php';
      $li=$_SESSION['loginid'];
                        $sql1 = "SELECT * FROM buyer where noti='0' and  farmer='$li'  ";
                        $res1 = mysqli_query($con, $sql1);
                        $sql2 = "SELECT * FROM buyer where (status='Accepted' or status='Rejected')and  buyer='$li' and noti='1'  ";
                        $res2 = mysqli_query($con, $sql2);
                        $sql3 = "SELECT * FROM order1 where status='Completed' and noti='0' and  loginid='$li' group by orderid ";
                        $res3 = mysqli_query($con, $sql3);
                        $count =  mysqli_num_rows($res2) +  mysqli_num_rows($res1) +  mysqli_num_rows($res3);

                        $sql4 = "SELECT * FROM contact where status<>'Pending' and noti='0' and  loginid='$li' group by pid ";
                        $res4 = mysqli_query($con, $sql4);
                        $count1 =  mysqli_num_rows($res4)
                    ?>

      <div class="col-sm-2">
      <button class="btn btn-outline-danger" onclick="openForm1()"><i class ="fa fa-bell"> <?php if($count!=0){ echo $count; } else { }?></i></button>
      <button class="btn btn-outline-warning" onclick="openForm2()"><i class="fas fa-hands-helping"></i> <?php if($count1!=0){ echo $count1; } else { }?></button>&nbsp;&nbsp;
      <a href="uprofile.php?id=<?php echo $loginid?>"><img src="<?php echo $image?>" alt="" style="width:40px;height:40px; border-radius: 50%;"></a>
      </div>
      </div>
        </div>  

<div class="form-popup1" id="myForm1">
  <form action="" class="form-container1">

<div class="row" style="padding:5px;">
<div class="col-sm-7" style="padding:5px;">
<?php
include 'database/dbcon.php';
$li=$_SESSION['loginid'];
?>
    <h5>Notification</h5>
    </div>
    <div class="col-sm-3">
    </div>
    <div class="col-sm-1">
    <button  class="btn btn-light" type="button" onclick="closeForm1()">X</button>
    </div>
</div>
<?php
include 'database/dbcon.php';
$li=$_SESSION['loginid'];
$selectquery = "select * from buyer where (buyer ='$li' and (status='Accepted' or status='Rejected') and noti='1') group by id  order by id DESC";
$query = mysqli_query($con,$selectquery);
while($result =mysqli_fetch_array($query)){ ?>
<div class="content" style="border:1px solid black;background:white;">
<div class="row" style="padding:5px;">
<div class="col-sm-10">
<p>Your offering price <?php echo $result['price'];?> Rs. to Goods was <?php echo $result['status'];?> by farmer.</p>
</div>
<div class="col-sm-2">
<a href="unavbar1.php?by=<?php echo $result['buyer'];?>&&fa=<?php echo $result['farmer'];?>" style="text-decoration:none;">View</a>
</div>
</div>
</div>
<?php } ?>

<?php
include 'database/dbcon.php';
$li=$_SESSION['loginid'];
$selectquery = "select * from buyer where (farmer ='$li' and noti='0') group by id  order by id DESC";
$query = mysqli_query($con,$selectquery);
while($result =mysqli_fetch_array($query)){ ?>
<div class="content" style="border:1px solid black;background:white;">
<div class="row" style="padding:5px;">
<div class="col-sm-10">
<p>Someone show interest in your goods offering price is <?php echo $result['price'];?> Rs.</p>
</div>
<div class="col-sm-2">
<a href="unavbar1.php?buy=<?php echo $result['buyer'];?>&&far=<?php echo $result['farmer'];?>" style="text-decoration:none;">View</a>
</div>
</div>
</div>
<?php } ?>

<?php
include 'database/dbcon.php';
$li=$_SESSION['loginid'];
$selectquery = "select * from order1 where (loginid ='$li' and status='Completed' and noti='0') group by orderid  order by cid DESC";
$query = mysqli_query($con,$selectquery);
while($result =mysqli_fetch_array($query)){ ?>
<div class="content" style="border:1px solid black;background:white;">
<div class="row" style="padding:5px;">
<div class="col-sm-10">
<p>Your Fertilizer order of orderid : <?php echo $result['orderid'];?> is Successfully Completed.</p>
</div>
<div class="col-sm-2">
<a href="unavbar1.php?order=<?php echo $result['orderid'];?>&&li=<?php echo $result['loginid'];?>" style="text-decoration:none;">View</a>
</div>
</div>
</div>
<?php } ?>

  </form>
</div>


<script>
function openForm1() {
  document.getElementById("myForm1").style.display = "block";
}

function closeForm1() {
  document.getElementById("myForm1").style.display = "none";
}
</script>



<div class="form-popup2" id="myForm2">
  <div class="form-container2">
<div class="row" style="padding:5px;">
<div class="col-sm-9" style="padding:5px;">
    <h5>Help Center</h5>
    </div>
    <div class="col-sm-2">
    <button  class="btn btn-light" type="button" onclick="closeForm2()">X</button>
    </div>
</div>
<div class="form-container3" id="myForm2">
<?php
include 'database/dbcon.php';
$li=$_SESSION['loginid'];
$selectquery = "select * from contact where (loginid ='$li' and status<>'Cancel') group by id  order by id DESC";
$query = mysqli_query($con,$selectquery);
while($result =mysqli_fetch_array($query)){ ?>
<div class="content" style="border:1px solid black;background:white;padding:5px;">
<div class="row" style="padding:5px;">
<div class="col-sm-10" style="padding:5px;">
<p>Problem : <?php echo $result['problem'];?>.</p>
<p>Solution : <?php echo $result['solution'];?>.</p>
</div>
<div class="col-sm-2">
<a href="unavbar1.php?pid=<?php echo $result['pid'];?>&&li=<?php echo $result['loginid'];?>" style="text-decoration:none;">View</a>
</div>
</div>
</div>
<?php } ?>
</div>


<form action="unavbar1.php"  method="post">
<div class="row" style="padding:5px;">
<div class="col-sm-9">
<textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="problem" placeholder="Send your Query"></textarea>
</div>
    <div class="col-sm-2">
    <button class="btn btn-outline-success" type="submit" name="sub">Send</button>
    </div>
</div>
  </form>
  </div> 
</div>


<script>
function openForm2() {
  document.getElementById("myForm2").style.display = "block";
}

function closeForm2() {
  document.getElementById("myForm2").style.display = "none";
}
</script>


