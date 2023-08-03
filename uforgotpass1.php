<?php
session_start();
?>
<html>
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
            color:white;
        }
        h3{
            text-align: center;
            color:white;
        }
        p{
            text-align: center;
            color:white;
        }
        body {
          background-image: url('image/LB1.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    }
    .content {
      backdrop-filter: blur(10px);
        max-width: 35%;
        margin: auto ;
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
  <p style="font-family:Serif;color:black;text-align:center;font-size:20px">Please Enter the registered Email Address.</p>
  <p class="bg-success text-white px-1"><?php
  if(isset($_SESSION['msg'])){
  echo $_SESSION['msg'];
  }
  ?>
</p>
  <p class = "divider-text"></p>

  <form ction ="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method ="POST">
<div class="row">
<div class="form-group col-sm-12">
      <label for="inputEmail4">Email :</label>
      <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email" required>
    </div>
  </div><br>

  <div class="form-group">
    <div class="form-check">
      <label class="form-check-label" for="gridCheck">
    Already Have Account <a href="ulogin.php">Login now</a>
      </label><br>
      <label class="form-check-label" for="gridCheck">
       Do not Have Account <a href="usignup.php">Sign up here</a> here.
      </label>
    </div>
  </div>

  <br>
  <div class="row">
    <div class="col-sm-3">
  </div>
  <div class="col-sm-6">
  <button type="submit" name="submit" class="btn btn-primary" style="padding: 10px 100px;">Send</button>
  </div>
  </div><br>
</form>
</div>
</body>
</html>

<?php
include'database/dbcon.php';

if(isset($_POST['submit']))
{
$email1 = mysqli_real_escape_string($con, $_POST['email']);
$email= strtolower($email1);
$emailquery =" select * from signup where email ='$email' ";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount)
{
$userdata = mysqli_fetch_assoc($query);
$name = $userdata['name'];
$mobile = $userdata['mobile'];
$state = $userdata['state'];
$city = $userdata['city'];
$address = $userdata['address'];
$email = $userdata['email'];
$pin = $userdata['pincode'];
$token = $userdata['token'];

$subject = "Farmagri Password Resetting";
  $headers = "From: farmagrimitaoe@gmail.com\r\n";
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
          <h2>Thank you for Using Farmagri</h2>
          <div id='page-wrap'>
          <p id='header'>Activate Your account</p>
      <div id='identity'>
      
          <p id='address'>
          Farmagri<br>
          Mit Academy of Engineering<br>
          Alandi Pune 414001  <br>
          Phone: 9421017990</p>
  
          <p id='address1'>
          Name : $name<br>
          Email : $email<br>
          Mobile : $mobile<br>
          Address : $address $pin<br>
          $city $state</p>
      </div>
          </div>
          <div id='page-wrap'>

          <textarea id='header1'>Terms And Conditions.<br></textarea>
          
          <div id='identity'>
          <h2>Click here to Reset your Password
          http://localhost/Farmagri/uresettingpass.php?token=$token</h2>
         
          </body>
  </html>";
  $sender_email ="From: farmagrimitaoe@gmail.com";

  if(mail($email, $subject, $message,$headers, $sender_email)){
    $_SESSION['msg'] ="Check your mail account $email You recive Password Resetting Link";

    ?>
    <script>
    location.replace("ulogin.php");
    </script>
    <?php
  }else{
    $_SESSION['msg'] ="Email Not Sent Try again !!";
    ?>
    <script>
        location.replace("uforgotpass1.php");
    </script>
    <?php
  }
  
}else{
    $_SESSION['msg'] = "Invaild Mail ID.";
    ?>
    <script>
        location.replace("uforgotpass1.php");
    </script>
    <?php
}
}
?>