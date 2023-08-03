<?php
session_start();
?>
<?php

include 'database/dbcon.php';
if(isset($_GET['token'])){
    $token = $_GET['token'];
    $updatequery = "update signup set status='Active' where token='$token' ";

    $query = mysqli_query($con, $updatequery);

    if($query){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] ="Email Account updated Successfully";
            ?>
            <script>
                location.replace("uactivation.php?toke=<?php echo $token?>");
            </script>
            <?php
        }else{
            $_SESSION['msg'] = "You are logged out.";
            header('location:logins.php');
        }
        }else{
            $_SESSION['msg'] ="Account not updated";
            header('location:registration.php');
        }
}

if(isset($_GET['toke'])){
    $token = $_GET['toke'];
    

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
        margin-left: 20%;
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
  <p style="font-family:Serif;color:black;text-align:center;font-size:20px">Enter The OTP that send to your registered Email Address.</p>
  <p class="bg-success text-white px-1"><?php
  if(isset($_SESSION['msg'])){
  echo $_SESSION['msg'];
  }else{
    echo $_SESSION['msg'] = "You are logged out. Please login again.";
  }
  ?>
</p>
  <p class = "divider-text"></p>

  <form ction ="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method ="POST">
<div class="row">
    <div class="form-group col-sm-12">
      <label for="inputEmail4">Enter OTP :</label>
      <input type="otp" class="form-control" id="inputotp4" maxlength="4" name="otp" placeholder="Enter OPT" required>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <label class="form-check-label" for="gridCheck">
      Do not Have Account <a href="usignup.php">Sign up</a> here.
      </label><br>
      <label class="form-check-label" for="gridCheck">
      Resend OTP <a href="uforgotpass.php?token=<?php echo $token?>">Click </a> here.
      </label>
    </div>
  </div><br>
  <div class="row">
    <div class="col-sm-3">
  </div>
  <div class="col-sm-6">
  <button type="submit" name="submit" class="btn btn-primary" style="padding: 10px 100px;">Submit</button>
  </div>
  </div><br>
</form>
</div>
</body>
</html>


<?php
if(isset($_POST['submit']))
{
    $otp = mysqli_real_escape_string($con, $_POST['otp']);
    $emailquery =" select * from signup where token ='$token'  and otp ='$otp' and status='Active'";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount)
{
    $updatequery = "update signup set mstatus='Active' where token='$token' ";

  $query1 = mysqli_query($con, $updatequery);


    if($query1){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] ="Account updated Successfully";
            ?>
            <script>
                location.replace("ulogin.php");
            </script>
            <?php
        }else{
            $_SESSION['msg'] = "Invaild OTP.";
            ?>
            <script>
                location.replace("uactivation.php?toke=<?php echo $token?>");
            </script>
            <?php
        }
        }
}else{
    $_SESSION['msg'] = "Invaild OTP.";
    ?>
    <script>
        location.replace("uactivation.php?toke=<?php echo $token?>");
    </script>
    <?php
}
}}
?>
