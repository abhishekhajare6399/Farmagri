<?php
session_start();
include'database/dbcon.php';
date_default_timezone_set("Asia/Calcutta");
?>
<html>
    <head>
    <title>Farmagri Admin</title>   
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
  background-image: url('image/bg3.jpg');
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
<h3 style="font-family:Serif;color:black;text-align:center;font-size:35px">Farmagri Admin</h3>
  <p style="font-family:Serif;color:black;text-align:center;font-size:20px">Login Your self With Farmagri and Sell your Goods anywhere at your Price.</p>
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
      <label for="inputEmail4">Email :</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" 
      value ="<?php if(isset($_COOKIE['emailcookie'])){echo $_COOKIE['emailcookie']; } ?>" required>
    </div>
  </div>
  <div class="row">
    <div class="form-group col-sm-12">
      <label for="inputEmail4">Password :</label>
      <input type="password" name="pass" class="form-control" id="inputPassword4" placeholder="Password"
      value ="<?php if(isset($_COOKIE['passwordcookie'])){echo $_COOKIE['passwordcookie']; } ?>" required>
    </div>
  </div>

  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type ="checkbox" name = "rememberme">
      <label class="form-check-label" for="gridCheck">
       Remember me.
      </label><br>
      <label class="form-check-label" for="gridCheck">
      Forgot Password <a href="#">Click </a> here.
      </label><br>
      <label class="form-check-label" for="gridCheck">
      Do not Have Account <a href="asignup.php">Sign up</a> here.
      </label>
    </div>
  </div><br>
  <div class="row">
    <div class="col-sm-3">
  </div>
  <div class="col-sm-6">
  <button type="submit" name="submit" class="btn btn-primary" style="padding: 10px 100px;">Login</button>
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

    $email1 =$_POST['email'];
    $password = $_POST['pass'];
    $email= strtolower($email1);
    $email_search =" select * from admin where email ='$email' and status='Active' and mstatus='Active' ";
    
    $query = mysqli_query($con, $email_search);
    
    $email_count = mysqli_num_rows($query);
    if($email_count)
    {
      
    
    $email_pass = mysqli_fetch_assoc($query);

    $_SESSION['loginid'] =$email_pass['loginid'];
    $_SESSION['email'] =$email_pass['email'];
    $_SESSION['mobile'] =$email_pass['mobile'];
    $_SESSION['city'] =$email_pass['city'];
    $_SESSION['image'] =$email_pass['image'];
    $_SESSION['name'] =$email_pass['name'];

    
    $db_pass = $email_pass['password'];
    $pass_decode = password_verify($password, $db_pass);

    if($pass_decode)
    {
      if(isset($_POST['rememberme'])){
        setcookie('emailcookie',$email,time()+86400);
        setcookie('passwordcookie',$password,time()+86400);

        ?>
      <script>
          //alert("login sucessfully")
          location.replace("ahome.php");
      </script>
      <?php
      }else{
        ?>
      <script>
          //alert("login sucessfully")
          location.replace("ahome.php");
      </script>
      <?php
      }
    }else
    {
        $_SESSION['msg'] ="Your Password is Not matching Try Again ";
        ?>
        <script>
            //alert("login sucessfully")
            location.replace("alogin.php");
        </script>
        <?php
    }
    }else
    {
        $_SESSION['msg'] ="Invaild Mail ID";
        ?>
        <script>
            //alert("login sucessfully")
            location.replace("alogin.php");
        </script>
        <?php
    }

}
?>