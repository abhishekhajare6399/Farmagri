<?php
session_start();
if(!isset($_SESSION['loginid'])){
    echo "You are logged out";
    header('location:ulogin.php');
  }
include 'database/dbcon.php';
if(isset($_GET['buy']) && isset($_GET['far'])){
    $id = $_GET['buy'];
    $gid = $_GET['far'];
    $updatequery = "update buyer set noti='1' where (buyer='$id' and farmer='$gid') ";
    $query = mysqli_query($con, $updatequery);
    if($query){
        ?>
        <script>
            location.replace("uhome.php");
        </script>
        <?php
    }
}
if(isset($_GET['by']) && isset($_GET['fa'])){
    $id = $_GET['by'];
    $gid = $_GET['fa'];
    $updatequery = "update buyer set noti='2' where (buyer='$id' and farmer='$gid') ";
    $query = mysqli_query($con, $updatequery);
    if($query){
        ?>
        <script>
            location.replace("uhome.php");
        </script>
        <?php
    }
}
if(isset($_GET['order']) && isset($_GET['li'])){
    $id = $_GET['order'];
    $gid = $_GET['li'];
    $updatequery = "update order1 set noti='1' where (orderid='$id' and loginid='$gid') ";
    $query = mysqli_query($con, $updatequery);
    if($query){
        ?>
        <script>
            location.replace("uhome.php");
        </script>
        <?php
    }
}

if(isset($_GET['pid']) && isset($_GET['li'])){
    $id = $_GET['pid'];
    $gid = $_GET['li'];
    $updatequery = "update contact set noti='1' where (pid='$id' and loginid='$gid') ";
    $query = mysqli_query($con, $updatequery);
    if($query){
        ?>
        <script>
            location.replace("uhome.php");
        </script>
        <?php
    }
}
?>

<?php
include'database/dbcon.php';
if(isset($_POST['sub']))
{
date_default_timezone_set("Asia/Calcutta");
$problem = mysqli_real_escape_string($con, $_POST['problem']);
$rand = rand(1000000,9999999);
$loginid=$_SESSION['loginid'];
      
$insertquery ="insert into contact(pid,loginid,problem,solution,status,noti) 
values('$rand','$loginid','$problem','','Pending','0')";

$iquery = mysqli_query($con, $insertquery);

if($iquery)
{
  ?>
  <script>
    location.replace("uhome.php")
    alert("Problem has send")
  </script>
  <?php

}else{
    ?>
    <script>
      alert("No Inserted")
    </script>
    <?php
}
}

?>