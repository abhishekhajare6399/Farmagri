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
  <p style="font-family:Serif;color:black;text-align:center;font-size:20px">Reset Your Password.</p>
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
      <label for="inputPassword4">Password :</label>
      <input type="password" class="form-control" id="inputPassword4" name="pass" placeholder="Password" required>
    </div>
    <div class="form-group col-sm-12">
      <label for="inputPassword4">Confirm Password :</label>
      <input type="password" class="form-control" id="inputPassword4" name="cpass" placeholder="Password" required>
    </div>
  </div>

  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
       Accept All <a href="#">Terms and Condition</a>.
      </label><br>
    </div>
  </div><br>
  <div class="row">
    <div class="col-sm-3">
  </div>
  <div class="col-sm-6">
  <button type="submit" name="submit" class="btn btn-primary" style="padding: 10px 100px;">Reset</button>
  </div>
  </div><br>
</form>
</div>
</body>
</html>

<?php
include'database/dbcon.php';
if(isset($_GET['token'])){
$token = $_GET['token'];
if(isset($_POST['submit']))
{
  $password = mysqli_real_escape_string($con, $_POST['pass']);
  $cpassword = mysqli_real_escape_string($con, $_POST['cpass']);
  $pass = password_hash($password, PASSWORD_BCRYPT);
  $cpass = password_hash($cpassword, PASSWORD_BCRYPT);   
  $emailquery =" select * from signup where token ='$token' ";
  $query = mysqli_query($con, $emailquery);
  
  $emailcount = mysqli_num_rows($query);
  if($emailcount)
  {
    if($password == $cpassword)
  {
    $updatequery = "update signup set password='$pass' , cpassword='$cpass' where token='$token' ";

$iquery = mysqli_query($con, $updatequery);

    if($iquery){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] ="Password Reset Successfully";
            ?>
            <script>
                location.replace("ulogin.php");
            </script>
            <?php
        }else{
            $_SESSION['msg'] = "Invaild OTP.";
            ?>
            <script>
          location.replace("uresettingpass.php?token=<?php echo $token?>");
            </script>
            <?php
        }
        }
}else{
    $_SESSION['msg'] = "Password is not matching Try Again !!.";
    ?>
    <script>
        location.replace("uresettingpass.php?token=<?php echo $token?>");
    </script>
    <?php
}
}}}
?>
