<?php include 'anavbar.php' ?>
<?php include 'database/dbcon.php' ?>

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

<?php
if(isset($_GET['cloginid'])){
$loginid = $_GET['cloginid'];

    $selectquery = "select * from signup  where loginid ='$loginid' and status='Active'";
    $query = mysqli_query($con,$selectquery);
    $result =mysqli_fetch_array($query);
    $username=$result['name'];
    $email=$result['email'];
    $mobile=$result['mobile'];
    $address=$result['address'];
    $city=$result['city'];
    $state=$result['state'];
    $token=$result['token'];

$updatequery = "update signup set  status='Cancel' where loginid='$loginid' ";
$iquery = mysqli_query($con, $updatequery);


if($iquery)
{
  $subject = "Farmagri Cancel Your membership";
  $headers = "From: Farmagrimitaoe@gmail.com\r\n";
  $headers .= "MTME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=ISO-8859\r\n";
  $message = "<html>
  <head>
  <title>Farmagri</title>
  <style>
  h1 {
      text-align: center;
      color:rgb(11, 10, 10);
      font-size: 20px;
      word-break: break-all;
    }
    h2 {
      text-align: center;
      color:rgb(11, 10, 10);
      font-size: 15px;
      word-break: break-all;
    }
    #hiderow,
  .delete {
    display: none;
  }
  /*
     CSS-Tricks Example
     by Chris Coyier
     http://css-tricks.com
  */
  
  * { margin: 0; padding: 0; }
  body { font: 14px/1.4 Georgia, serif; }
  #page-wrap { width: 800px; margin: 0 auto; }
  #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
  #header1 { height: 2px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
  #address { width: 250px; height: 100px; float: left; }
  #p1 { width: 250px; height: 100px; float: left; }
  #address1 { width: 250px; height: 100px; float: right; }
  #customer { overflow: hidden; }
    </style>
  <body>
          <h1>Farmagri</h1>
          <h2>Your Membership is cancel by Company</h2>
          <div id='page-wrap'>
          <p id='header'>Your ID : $loginid</p>
      <div id='identity'>
      
          <p id='address'>
          Farmagri<br>
          Mit Academy of Engineering<br>
          Alandi Pune 414001  <br>
          Phone: 9421017990</p>
  
          <p id='address1'>
          Name : $username<br>
          Email : $email<br>
          Mobile : $mobile<br>
          Address : $address $zip<br>
          $city $state</p>
      </div>
          </div><br><br>
          <div id='page-wrap'>
<br><br>
          <textarea id='header'>Terms And Conditions.
          </textarea>
          
          <div id='identity'>
          <h2>Your membership Cancel By company offical</h2>
  
          </body>
  </html>";
  $sender_email ="From: farmagrimitaoe@gmail.com";

  if(mail($email, $subject, $message,$headers, $sender_email)){
    ?>
    <script>
    alert("Membership is Cancel")
    location.replace("auser.php");
    </script>
    <?php
  }else{
    $_SESSION['msg'] ="Email Not Sent";
  }
}else{
    ?>
    <script>
      alert("No Inserted ")
    </script>
    <?php
}
}
?>


<?php
include 'database/dbcon.php';
if(isset($_GET['loginid'])){
$loginid = $_GET['loginid'];
?>
<p style="font-family:Serif;color:black;text-align:center;font-size:30px"> Editing Profile of User : <?php echo $loginid;?>. </p>
<p class = "divider-text"></p>

<?php
$selectquery = "select * from signup  where loginid ='$loginid' and status='Active'";
$query = mysqli_query($con,$selectquery);
while($result =mysqli_fetch_array($query)){
?>
<div class="row" style="padding:5px;">
<div class="col-sm-8" style="padding:15px;">
<form action ="" method ="POST" enctype ="multipart/form-data">
<div class="row" style="padding:5px;">

<div class="col-sm-12" style="padding:15px;">
      <label for="inputEmail4">Name :</label>
      <input type="age" name="name" class="form-control" id="inputnumber" value="" placeholder="<?php echo $result['name'];?>" required>
      </div>
<div class="col-sm-6" style="padding:15px;">
      <label for="inputEmail4">Email :</label>
      <input type="age" name="email" class="form-control" id="inputnumber" value="" placeholder="<?php echo $result['email'];?>" required>
</div>
<div class="col-sm-6" style="padding:15px;">
      <label for="inputEmail4">Mobile :</label>
      <input type="quantity" name="mobile" class="form-control" value="" id="inputnumber" placeholder="<?php echo $result['mobile'];?>" required>
</div>
<div class="col-sm-12" style="padding:15px;">
      <label for="inputEmail4">Address :</label>
      <input type="price" name="address" class="form-control" value="" id="inputnumber" placeholder="<?php echo $result['address'];?>" required>
</div>
<div class="col-sm-5">
      <label for="inputEmail4">City :</label>
      <input type="price" name="city" class="form-control" value="" id="inputnumber" placeholder="<?php echo $result['city'];?>" required>
</div>
<div class="col-sm-5">
      <label for="inputEmail4">State  :</label>
      <input type="price" name="state" class="form-control" value="" id="inputnumber" placeholder="<?php echo $result['state'];?>" required>
</div>
<div class="col-sm-2">
      <label for="inputEmail4">Zip :</label>
      <input type="price" name="zip" class="form-control" value="" id="inputnumber" placeholder="<?php echo $result['pincode'];?>" required>
</div>

<div class="col-sm-6" style="padding:5px;">
</div><br>
<div class="col-sm-1" style="padding:5px;">
<button type="submit" name="submit" class="btn btn-outline-primary">Submit</button>
</div>
<div class="col-sm-5" style="padding:5px;">
</div>

</div>
</form>
</div>
<div class="col-sm-4" style="padding:15px;">
<img alt="ecommerce" src="<?php echo $result['image'];?>"style="width:80%;height:100%;border-radius:12px;">
</div>

</div>
<?php } ?>
</div>    

<?php

if(isset($_POST['submit']))
{
date_default_timezone_set("Asia/Calcutta");
$username = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$city = mysqli_real_escape_string($con, $_POST['city']);
$state = mysqli_real_escape_string($con, $_POST['state']);
$zip = mysqli_real_escape_string($con, $_POST['zip']);
$date = date("Y-m-d");
$time= date("h:i:sa");
        
$emailquery =" select * from signup where email ='$email' ";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount>0)
{
  $_SESSION['msg1'] ="$email These Mail ID is Already taken You have Recive Mail";
  ?>
  <script>
    alert("This Email is Already Taken");
  location.replace("auser1.php?loginid=<?php echo $loginid;?>");
  </script>
  <?php
}else{
    $selectquery = "select * from signup  where loginid ='$loginid' and status='Active'";
    $query = mysqli_query($con,$selectquery);
    $result =mysqli_fetch_array($query);
    $token=$result['token'];

$updatequery = "update signup set name='$username',  email='$email', mobile='$mobile', address='$address', city='$city', state='$state', pincode='$zip', status='Inactive', date='$date', time='$time' where loginid='$loginid' ";
$iquery = mysqli_query($con, $updatequery);


if($iquery)
{
  $subject = "Farmagri Profile Updation by Company";
  $headers = "From: Farmagrimitaoe@gmail.com\r\n";
  $headers .= "MTME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=ISO-8859\r\n";
  $message = "<html>
  <head>
  <title>Farmagri</title>
  <style>
  h1 {
      text-align: center;
      color:rgb(11, 10, 10);
      font-size: 20px;
      word-break: break-all;
    }
    h2 {
      text-align: center;
      color:rgb(11, 10, 10);
      font-size: 15px;
      word-break: break-all;
    }
    #hiderow,
  .delete {
    display: none;
  }
  /*
     CSS-Tricks Example
     by Chris Coyier
     http://css-tricks.com
  */
  
  * { margin: 0; padding: 0; }
  body { font: 14px/1.4 Georgia, serif; }
  #page-wrap { width: 800px; margin: 0 auto; }
  #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
  #header1 { height: 2px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
  #address { width: 250px; height: 100px; float: left; }
  #p1 { width: 250px; height: 100px; float: left; }
  #address1 { width: 250px; height: 100px; float: right; }
  #customer { overflow: hidden; }
    </style>
  <body>
          <h1>Farmagri</h1>
          <h2>Your profile is updated by Company person</h2>
          <div id='page-wrap'>
          <p id='header'>Your ID : $loginid</p>
      <div id='identity'>
      
          <p id='address'>
          Farmagri<br>
          Mit Academy of Engineering<br>
          Alandi Pune 414001  <br>
          Phone: 9421017990</p>
  
          <p id='address1'>
          Name : $username<br>
          Email : $email<br>
          Mobile : $mobile<br>
          Address : $address $zip<br>
          $city $state</p>
      </div>
          </div><br><br>
          <div id='page-wrap'>
<br><br>
          <textarea id='header'>Terms And Conditions.
          </textarea>
          
          <div id='identity'>
          <h2>Click here to activate your account
          http://localhost/Farmagri/uactivation.php?token=$token</h2>
  
          </body>
  </html>";
  $sender_email ="From: farmagrimitaoe@gmail.com";

  if(mail($email, $subject, $message,$headers, $sender_email)){
    ?>
    <script>
    alert("Profile is Updated")
    location.replace("auser.php");
    </script>
    <?php
  }else{
    $_SESSION['msg'] ="Email Not Sent";
  }
}else{
    ?>
    <script>
      alert("No Inserted ")
    </script>
    <?php
}
}
}
}
?>