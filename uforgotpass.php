<?php
session_start();
?>
<html>
    <head>
        <title>Farmagri</title>
        <link rel="icon" href="image\Agriculture _crop.png" />
    </head>
</html>

<?php
include'database/dbcon.php';
if(isset($_GET['token'])){
    $token = $_GET['token'];
$otp =rand(1000,9999);
$updatequery = "update signup set otp='$otp' where token='$token' ";

    $query = mysqli_query($con, $updatequery);

    if($query){$emailquery =" select * from signup where token='$token' ";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount)
{
$userdata = mysqli_fetch_assoc($query);
$name = $userdata['name'];
$token = $userdata['token'];
$mobile = $userdata['mobile'];
$address = $userdata['address'];
$email = $userdata['email'];

$subject = "Farmagri New OTP";
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
          #header1 { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
          #header2 { height: 2px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
          #address { width: 250px; height: 100px; float: left; }
          #p1 { width: 250px; height: 100px; float: left; }
          #address1 { width: 250px; height: 100px; float: right; }
          #customer { overflow: hidden; }
            </style>
          <body>
                  <h1>Farmagri</h1>
                  <h2>Thank You Here is Your registration Details</h2>
                  <div id='page-wrap'>
                  <p id='header1'>Activate Your account</p>
              <div id='identity'>
              
                  <p id='address'>
                  Farmagri<br>
                  Mit Academy of Engineering<br>
                  Alandi Pune 414001  <br>
                  Phone: 9421017990<br>
                  Email : voteforyou@gmail.com</p>
          
                  <p id='address1'>
                  Name : $name<br>
                  Email : $email<br>
                  Mobile : $mobile<br>
                  Address : $address<br>
              </div>
                  </div>
                  <div id='page-wrap'>
        
                  <textarea id='header1'>Terms And Conditions.</textarea>
                  
                  <div id='identity'>
                  <h2>For Mobile Number Verification OTP is<h1>$otp</h1></h2>
          
                  </body>
          </html>";
          $sender_email ="From: farmagrimitaoe@gmail.com";
        
          if(mail($email, $subject, $message,$headers, $sender_email))
          {
  $_SESSION['msg'] ="Check your mail $email New OTP has Send." ;
  ?>
  <script>location.replace("uactivation.php?toke=<?php echo $token?>");</script>";
  <?php
  }else{
    ?>
    <script>
        alert(" Email not send")
    </script>
    <?php
}
}else{
    ?>
    <script>
        alert(" No Email Found")
    </script>
    <?php
}
}else{
    ?>
    <script>
        alert(" No not Found")
    </script>
    <?php
}
}
?>
