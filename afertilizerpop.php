<?php
session_start();
if(!isset($_SESSION['loginid'])){
    echo "You are logged out";
    header('location:alogin.php');
  }
?>

<?php
include'database/dbcon.php';
if(isset($_GET['order'])){
    $t = $_GET['order'];
if(isset($_POST['submit']))
{
    $updatequery = "update order1 set status='Accepted' where orderid='$t' ";
    $query = mysqli_query($con, $updatequery);
    if($query){
      $emailquery1 =" select * from signup inner join order1 on order1.loginid=signup.loginid ";
      $query1 = mysqli_query($con, $emailquery1);
      $emailcount1 = mysqli_num_rows($query1);
      if($emailcount1)
      {
      $userdata1 = mysqli_fetch_assoc($query1);
      $name1 = $userdata1['name'];
      $email = $userdata1['email'];
      }
            $subject = "Farmagri Agro Accept Your Order";
            $headers = "From: farmagrimitaoe@gmail.com";
            $message = "Your Fertilizer Order $t is Accepted your order will be completed soon.
            Thank You For Ordering";
            $sender_email ="From: farmagrimitaoe@gmail.com";
               
            if(mail($email, $subject, $message, $sender_email)){
        ?>
        <script>
      alert("Order Accepted")
      location.replace("afertilizer2.php")
        </script>
        <?php
    }else{
        ?>
        <script>
      alert("Not Accepted")
      location.replace("afertilizer2.php")
        </script>
        <?php
    }
}}
}
if(isset($_GET['order'])){
    $t = $_GET['order'];
if(isset($_POST['sub']))
{
    $updatequery4= "update order1 set status='Completed' where orderid='$t' ";
    $query4 = mysqli_query($con, $updatequery4);
    if($query4){
      $emailquery1 =" select * from signup inner join order1 on order1.loginid=signup.loginid ";
      $query1 = mysqli_query($con, $emailquery1);
      $emailcount1 = mysqli_num_rows($query1);
      if($emailcount1)
      {
      $userdata1 = mysqli_fetch_assoc($query1);
      $name1 = $userdata1['name'];
      $email = $userdata1['email'];
      }
            $subject = "Farmagri Agro has Complete Your Order";
            $headers = "From: farmagrimitaoe@gmail.com";
            $message = "Your Order $t is Completed your order will Deliver soon.
            Thank You For Ordering";
            $sender_email ="From: farmagrimitaoe@gmail.com";
               
            if(mail($email, $subject, $message, $sender_email)){
               ?>
        <script>
      alert("Order Completed")
      location.replace("afertilizer2.php")
        </script>
        <?php
    }else{
        ?>
        <script>
      alert("Not Completed")
      location.replace("afertilizer2.php")
        </script>
        <?php
    }}
}}
if(isset($_GET['order'])){
    $t = $_GET['order'];
if(isset($_POST['submi']))
{
    $updatequery2 = "update order1 set status='Delivered' where orderid='$t'";
    $query2 = mysqli_query($con, $updatequery2);
    if($query2){

$emailquery1 =" select * from signup inner join order1 on order1.loginid=signup.loginid ";
$query1 = mysqli_query($con, $emailquery1);
$emailcount1 = mysqli_num_rows($query1);
if($emailcount1)
{
$userdata1 = mysqli_fetch_assoc($query1);
$name1 = $userdata1['name'];
$email = $userdata1['email'];
}
      $subject = "Farmagri Agro Delivered Your Food Order Thank you";
      $headers = "From: farmagrimitaoe@gmail.com";
      $message = "Your Order $t is Delivered Thank you for placing Order You can Take Bill Copy From website.
      Thank You.";
      $sender_email ="From: farmagrimitaoe@gmail.com";
         
      if(mail($email, $subject, $message, $sender_email)){
        ?>
        <script>
      alert("Order Deliverd")
      location.replace("afertilizer2.php")
        </script>
        <?php
       }else{
         ?>
         ?>
        <script>
      alert("Not Deliverd")
      location.replace("afertilizer2.php")
        </script>
        <?php
      }
    }
}}
?>