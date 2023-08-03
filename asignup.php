<?php
session_start();
?>
<html>
    <head>
        <title>Farmagri</title>
        <link rel="icon" href="image\Agriculture _crop.png" />
    </head>
<style>
          * {
      margin: 0; padding: 0;
  }
  html, body, #container {
      height: 100%;
  }
  header {
      height: 11%;
  }
  label{
          text-align: left;
          color:black;
        }
        h3{
          text-align: center;
          color:black;
        }
        p{
          text-align: center;
          color:black;
        }
        body {
 background-image : url('image/bg3.jpg'); 
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover; 
  } 
  .content {
    backdrop-filter: blur(10px);
      max-width: 65%;
     margin:auto;
      padding: 10px;
      border: 5px solid black;
    }
    .divider-text{
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
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
    border-bottom: 5px solid black;
    top: 55%;
    left: 0;
    z-index: 1;
  }
    </style>
    <?php include 'link/link.php'?>
    <body>
      <header>
</header>
<div class="content">
  <h3 style="font-family:Serif;color:black;text-align:center;font-size:35px">Farmagri</h3>
  <p style="font-family:Serif;color:black;text-align:center;font-size:20px">Register Your self With Farmagri and Sell your Goods anywhere at your Price.</p>
  <p class="bg-success text-white px-1"><?php
  if(isset($_SESSION['msg'])){
  echo $_SESSION['msg'];
  }
  ?>
</p>
  <p class = "divider-text"></p>

<form action ="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method ="POST" enctype ="multipart/form-data">
<div class="row">
    <div class="form-group col-sm-12">
      <label for="inputEmail4">Name :</label>
      <input type="name" class="form-control" id="inputname4" name="name" placeholder="Enter Your Name" required>
    </div>
  </div>
<div class="row">
    <div class="form-group col-sm-6">
      <label for="inputEmail4">Email :</label>
      <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email" required>
    </div>
    <div class="form-group col-sm-6">
      <label for="inputPassword4">Mobile Number :</label>
      <input type="mobile" class="form-control" id="inputmobile4" name="mobile" placeholder="Mobile Number" required>
    </div>
  </div>
  <div class="row">
  <div class="form-group col-sm-6">
      <label for="inputPassword4">Password :</label>
      <input type="password" class="form-control" id="inputPassword4" name="pass" placeholder="Password" required>
    </div>
    <div class="form-group col-sm-6">
      <label for="inputPassword4">Confirm Password :</label>
      <input type="password" class="form-control" id="inputPassword4" name="cpass" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address :</label>
    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St" required>
  </div>
  <div class="row">
    <div class="col-sm-5">
      <label for="inputCity">City :</label>
      <input type="text" class="form-control" id="inputCity" name="city" required>
    </div>
    <div class="col-sm-5">
      <label for="inputState">State :</label>
               <select name="state" id="country" class="form-control" required>
                  <option value=""> Select State</option>
                  <?php 
                     include('database/dbcon.php');
                     $query= "select * from state_list order by name ASC";
                     $result= mysqli_query($con,$query);
                     while ($row= mysqli_fetch_array($result)) { ?>
                  <option value="<?php echo $row['name']; ?>"><?php echo $row['name'] ?></option>
                  <?php } ?>
               </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip :</label>
      <input type="text" class="form-control" id="inputZip" name="zip" required>
    </div>
  </div>

  <div class="form-group">
  <p style="font-family:Serif;color:white;text-align:left;font-size:15px">Click on the "Choose File" button to upload a photo of the good :</p>
  <input type="file" id="myFile" name="proof" required>
  </div>
  
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" required>
      <label class="form-check-label" for="gridCheck">
        Accept All <a href="#">Terms and Conditions</a>
      </label><br>
      <label class="form-check-label" for="gridCheck">
       Already Have Account <a href="alogin.php">Login</a> here.
      </label>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4">
  </div>
  <div class="col-sm-6">
  <button type="submit" name="submit" class="btn btn-primary" style="padding: 10px 100px;">Sign in</button>
  </div>
  </div>
</form>
</div>
</body>
</html>



<?php
include'database/dbcon.php';
if(isset($_POST['submit']))
{
date_default_timezone_set("Asia/Calcutta");
$id=mysqli_real_escape_string($con, $_POST['id']);
$username = mysqli_real_escape_string($con, $_POST['name']);
$email1 = mysqli_real_escape_string($con, $_POST['email']);
$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
$password = mysqli_real_escape_string($con, $_POST['pass']);
$cpassword = mysqli_real_escape_string($con, $_POST['cpass']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$city = mysqli_real_escape_string($con, $_POST['city']);
$state = mysqli_real_escape_string($con, $_POST['state']);
$zip = mysqli_real_escape_string($con, $_POST['zip']);
$file=$_FILES['proof'];
$pass = password_hash($password, PASSWORD_BCRYPT);
$cpass = password_hash($cpassword, PASSWORD_BCRYPT);
$token =bin2hex(random_bytes(15));
$rand = "AD". rand(1000000,9999999);
$otp = rand(1000,9999);
$date = date("Y-m-d");
$time= date("h:i:sa");
$email= strtolower($email1);
$filename = $file['name'];
      $filepath = $file['tmp_name'];
      $fileerror = $file['error'];
      if($fileerror == 0){
        $destfile = 'proof/'.$filename;
        move_uploaded_file($filepath, $destfile);
      

$emailquery =" select * from signup where email ='$email' ";
$query = mysqli_query($con, $emailquery);

$emailcount = mysqli_num_rows($query);
if($emailcount>0)
{
  $_SESSION['msg'] ="$email These Mail ID is Already taken You have Recive Mail";
  ?>
  <script>
  location.replace("alogin.php");
  </script>
  <?php
}else{
$emalquery =" select * from signup where loginid ='$rand' ";
$query = mysqli_query($con, $emalquery);
$emalcount = mysqli_num_rows($query);
if($emalcount>0)
{
  $_SESSION['msg'] ="Sorry your Id was not genrated Try Again !!!";
}

else{
  if($password == $cpassword)
  {
$insertquery ="insert into admin(loginid,name,mobile,email,password,cpassword,address,city,state,pincode,date,time,image,proof,status,mstatus,token,otp) 
values('$rand','$username','$mobile','$email','$pass','$pass','$address','$city','$state','$zip','$date','$time','image/profile.jpg','$destfile','Inactive','Inactive','$token','$otp')";

$iquery = mysqli_query($con, $insertquery);

if($iquery)
{
  ?>
    <script>
      alert("Check Mail"$email" You have Recived Your Login ID")
    </script>
    <?php
  $subject = "Farmagri Account Activation";
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
          <h2>Thank you for Using Foodies</h2>
          <div id='page-wrap'>
          <p id='header'>Activate Your account</p>
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
          <textarea id='header1'>Terms And Conditions.<br><br>
          </textarea>
          
          <div id='identity'>
          <h2>Click here to activate your account
          http://localhost/Farmagri/aactivation.php?token=$token</h2>
          <h2>For Mobile Activation OTP : $otp</h2>
  
          </body>
  </html>";
  $sender_email ="From: farmagrimitaoe@gmail.com";

  if(mail($email, $subject, $message,$headers, $sender_email)){
    $_SESSION['msg'] ="Check your mail account $email You recive OTP";
    ?>
    <script>
    location.replace("alogin.php");
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
  }else{
    $_SESSION['msg'] ="Your Password is Not matching Try Again ";
   }
}
}
$selectquery = "select * from admin where loginid ='$rand' ";
  $query = mysqli_query($con,$selectquery);
  $email_count = mysqli_num_rows($query);
    if($email_count)
    {
    $email_pass = mysqli_fetch_assoc($query);
    $_SESSION['loginid'] =$email_pass['loginid'];
    $_SESSION['email'] =$email_pass['email'];
}}
}
?>