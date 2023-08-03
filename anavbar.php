<?php
session_start();
if(!isset($_SESSION['loginid'])){
    echo "You are logged out";
    header('location:alogin.php');
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
	<title>Farmagri Admin</title>   
    <link rel="icon" href="image/Agriculture _crop.png" />
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<?php include 'link/link.php'?>
<?php include 'css/admin.css'?>
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
            <li><a href="ahome.php"><i class="fa fa-home"></i>  Home</a></li>
            <li><a href="auser.php"><i class="fa fa-address-card"></i>  User</a></li>
            <li><a href="amarket.php"><i class="fa fa-shopping-cart"></i>  Market</a></li>
            <li><a href="afertilizer.php"><i class="fa fa-list"></i>  Fertilizer</a></li>
            <li><a href="afertilizer2.php"><i class="fa fa-list"></i>  Fertilizer Order</a></li>
            <li><a href="agoodprice.php"><i class="fa fa-list"></i></i>  Goods Price</a></li>
            <li><a href="anews.php"><i class="fa fa-newspaper-o"></i>  News</a></li>
            <li><a href="abuyer.php"><i class="fa fa-list"></i>  Buyer</a></li>
            <li><a href="acontact.php"><i class="fa fa-address-book"></i>  Contact</a></li>
            <li><a href="adetect.php"><i class="fa fa-address-book"></i>  Detect</a></li>
            <li><a href="asellrepo.php"><i class="fa fa-file"></i>  Sell Report</a></li>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">
        <div class="row">
    <div class="col-sm-5">
       <h3 style="font-family:Serif;color:black;text-align:left;font-size:25px">Welcome Admin <?php echo $name?>.</h3>
        </div>
        <div class="col-sm-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
        <div class="col-sm-4">
        <form class="d-flex" action ="asearch.php" method ="POST">
        <input class="form-control me-2" type="search" name="search" placeholder="Search...." aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="submit"><i class ="fa fa-search"></i></button>
      </form>
      </div>
      <div class="col-sm-1">
      <a href="alogout.php"><button class="btn btn-outline-danger"><i class="fa fa-sign-out"> Logout</i></button></a>
</div>
      
      <div class="col-sm-1">
      <a href="aprofile.php?id=<?php echo $loginid?>"><img src="<?php echo $image?>" alt="" style="width:40px;height:40px; border-radius: 50%;"></a>
      </div>

      </div>
    </div>  


