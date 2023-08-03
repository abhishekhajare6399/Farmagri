<?php
session_start();
if(!isset($_SESSION['loginid'])){
    echo "You are logged out";
    header('location:ulogin.php');
  }

include 'database/dbcon.php';
$li=$_SESSION['loginid'];
if(isset($_GET['id']) && isset($_GET['gid'])){
    $id = $_GET['id'];
    $gid = $_GET['gid'];
    
            $emailquery =" select * from signup inner join buyer on buyer.buyer=signup.loginid where loginid ='$id'and signup.status='Active' and goodid='$gid' ";
            $mobilequery="select * from signup inner join buyer on buyer.farmer=signup.loginid where loginid='$li' and signup.status='Active' and goodid='$gid' ";
            $query = mysqli_query($con, $emailquery);
            $query1 = mysqli_query($con, $mobilequery);
            if($query1)
            {
              $userdata = mysqli_fetch_assoc($query);
              $email = $userdata['email'];
              $username = $userdata['name'];
              $mobile = $userdata['mobile'];
              $Lid = $userdata['loginid'];
              $address = $userdata['address'];
              $userdata = mysqli_fetch_assoc($query1);
              $username1 = $userdata['name'];
              $price = $userdata['price'];

              $subject = "Farmagri Offer price Rejected by farmer $username1";
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
              
              textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
              table { border-collapse: collapse; }
              table td, table th { border: 1px solid black; padding: 5px; }
              
              #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
              
              #address { width: 250px; height: 100px; float: left; }
              #address1 { width: 250px; height: 100px; float: right; }
              #customer { overflow: hidden; }
              
              
              #meta { margin-top: 1px; width: 300px; float: right; }
              #meta td { text-align: right;  }
              #meta td.meta-head { text-align: left; background: #eee; }
              #meta td textarea { width: 100%; height: 20px; text-align: right; }
              
              #items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
              #items th { background: #eee; }
              #items tr.item-row td { border: 0; vertical-align: top; }
              #items td.item-name { width: 175px; }
              #items td.total-line { border-right: 0; text-align: right; }
              #items td.total-value { border-left: 0; padding: 10px; }
              #items td.total-value textarea { height: 20px; background: none; }
              #items td.balance { background: #eee; }
              #items td.blank { border: 0; }
              
              #terms { text-align: center; margin: 20px 0 0 0; }
              #terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
              #terms p2 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif;  border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
              #terms textarea { width: 100%; text-align: center;}
              
              textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }
              
              .delete-wpr { position: relative; }
              .delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }
                
                </style>
              <body>
                      <h1>Farmagri</h1>
                      <h2>Your offered Price is Rejected</h2>
                      <div id='page-wrap'>
                      <p id='header'>Your Details Good Id : $gid</p>
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
                      Address : $address<br>
                      Registration Id : $Lid<br></p>
                  </div>
                      </div>
                      <div id='page-wrap'>
                      <textarea id='header'>Terms & Conditions.</textarea>
                      <div id='terms'>
                      </div>
                      </div>
                   <div id='terms'>
                    <h2 class='py-3 text-black'>Farmer $username1 has Rejected your offer price of Rs. $price. </h2>
                    <p2 class='py-3 text-black'></p2>
                  </div>
                  </body>
                  </html>";
                  $sender_email ="From: farmagrimitaoe@gmail.com";
                
                  if(mail($email, $subject, $message,$headers, $sender_email)){
                    $updatequery = "update buyer set status='Rejected' where buyer='$id' and goodid='$gid' and farmer='$li' ";
                    $query = mysqli_query($con, $updatequery);
                    if($query){
                    ?>
                    <script>
                        location.replace("ubuyer.php");
                    </script>
                    <?php
                    }
              }else{
                echo "Email not send";
              }
            }
        
    }

if(isset($_GET['ids']) && isset($_GET['gids'])){
    date_default_timezone_set("Asia/Calcutta");
    $id = $_GET['ids'];
    $gid = $_GET['gids'];
    $emailquery =" select * from signup inner join buyer on buyer.buyer=signup.loginid where loginid ='$id'and signup.status='Active' and goodid='$gid' ";
            $mobilequery="select * from signup inner join buyer on buyer.farmer=signup.loginid where loginid='$li' and signup.status='Active' and goodid='$gid' ";
            $query = mysqli_query($con, $emailquery);
            $query1 = mysqli_query($con, $mobilequery);
            if($query1)
            {
              $userdata = mysqli_fetch_assoc($query);
              $email = $userdata['email'];
              $username = $userdata['name'];
              $mobile = $userdata['mobile'];
              $Lid = $userdata['loginid'];
              $address = $userdata['address'];
              $userdata = mysqli_fetch_assoc($query1);
              $username1 = $userdata['name'];
              $price = $userdata['price'];

              $subject = "Farmagri Offer price Accepted by farmer $username1";
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
              
              textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
              table { border-collapse: collapse; }
              table td, table th { border: 1px solid black; padding: 5px; }
              
              #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
              
              #address { width: 250px; height: 100px; float: left; }
              #address1 { width: 250px; height: 100px; float: right; }
              #customer { overflow: hidden; }
              
              
              #meta { margin-top: 1px; width: 300px; float: right; }
              #meta td { text-align: right;  }
              #meta td.meta-head { text-align: left; background: #eee; }
              #meta td textarea { width: 100%; height: 20px; text-align: right; }
              
              #items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
              #items th { background: #eee; }
              #items tr.item-row td { border: 0; vertical-align: top; }
              #items td.item-name { width: 175px; }
              #items td.total-line { border-right: 0; text-align: right; }
              #items td.total-value { border-left: 0; padding: 10px; }
              #items td.total-value textarea { height: 20px; background: none; }
              #items td.balance { background: #eee; }
              #items td.blank { border: 0; }
              
              #terms { text-align: center; margin: 20px 0 0 0; }
              #terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
              #terms p2 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif;  border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
              #terms textarea { width: 100%; text-align: center;}
              
              textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }
              
              .delete-wpr { position: relative; }
              .delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }
                
                </style>
              <body>
                      <h1>Farmagri</h1>
                      <h2>Your offered Price is Accepted</h2>
                      <div id='page-wrap'>
                      <p id='header'>Your Details Good Id : $gid</p>
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
                      Address : $address<br>
                      Registration Id : $Lid<br></p>
                  </div>
                      </div>
                      <div id='page-wrap'>
                      <textarea id='header'>Terms & Conditions.</textarea>
                      <div id='terms'>
                      </div>
                      </div>
                   <div id='terms'>
                    <h2 class='py-3 text-black'>Farmer $username1 has Accepted your offer price of Rs. $price. </h2>
                    <p2 class='py-3 text-black'></p2>
                  </div>
                  </body>
                  </html>";
                  $sender_email ="From: farmagrimitaoe@gmail.com";
                
                  if(mail($email, $subject, $message,$headers, $sender_email)){

                    $selectquery = "select * from buyer where buyer='$id' and goodid='$gid' and farmer='$li' ";
                    $query = mysqli_query($con,$selectquery);
                    $result =mysqli_fetch_array($query);
                    $farmer= $result['farmer'];
                    $goodid= $result['goodid'];
                    $buyer= $result['buyer'];
                    $price= $result['price'];
                    $date = date("Y-m-d");
                    $time= date("h:i:sa");
                    $insertquery = "insert into sold(farmer,goodid,buyer,price,time,date) values('$farmer','$goodid','$buyer','$price','$time','$date')";
                    $res = mysqli_query($con,$insertquery);
                        if($res){
                        $updatequery = "update buyer set status='Accepted' where buyer='$id' and goodid='$gid' and farmer='$li' ";
                        $query = mysqli_query($con, $updatequery);
                        $updatequery = "update sell set sellstatus='Sold' where goodid='$gid' and Lid='$li' ";
                        $query = mysqli_query($con, $updatequery);
                            ?>
                            <script>
                                location.replace("ubuyer.php");
                            </script>
                            <?php
                        }
                    }
              }else{
                echo "Email not send";
              }
    


}
?>

<?php
include 'database/dbcon.php';
if(isset($_GET['fetid'])){
    date_default_timezone_set("Asia/Calcutta");
    $id = $_GET['fetid'];
    $li=$_SESSION['loginid'];
    $sum = "SELECT SUM(total) as total,discount FROM order1 where orderid='$id' and loginid='$li'";
    $sum1 = mysqli_query($con,$sum);
    $resul =mysqli_fetch_array($sum1);
    $total=$resul['total'];
    $emailquery =" select * from signup inner join order1 on order1.loginid=signup.loginid where order1.loginid ='$li'and signup.status='Active' and orderid='$id' ";
            $query = mysqli_query($con, $emailquery);
            if($query)
            {
              $userdata = mysqli_fetch_assoc($query);
              $email = $userdata['email'];
              $username = $userdata['name'];
              $mobile = $userdata['mobile'];
              $Lid = $userdata['loginid'];
              $address = $userdata['address'];

              $subject = "Farmagri Agro Cancel Fertilizer Order $id";
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
              
              textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
              table { border-collapse: collapse; }
              table td, table th { border: 1px solid black; padding: 5px; }
              
              #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
              
              #address { width: 250px; height: 100px; float: left; }
              #address1 { width: 250px; height: 100px; float: right; }
              #customer { overflow: hidden; }
              
              
              #meta { margin-top: 1px; width: 300px; float: right; }
              #meta td { text-align: right;  }
              #meta td.meta-head { text-align: left; background: #eee; }
              #meta td textarea { width: 100%; height: 20px; text-align: right; }
              
              #items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
              #items th { background: #eee; }
              #items tr.item-row td { border: 0; vertical-align: top; }
              #items td.item-name { width: 175px; }
              #items td.total-line { border-right: 0; text-align: right; }
              #items td.total-value { border-left: 0; padding: 10px; }
              #items td.total-value textarea { height: 20px; background: none; }
              #items td.balance { background: #eee; }
              #items td.blank { border: 0; }
              
              #terms { text-align: center; margin: 20px 0 0 0; }
              #terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
              #terms p2 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif;  border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
              #terms textarea { width: 100%; text-align: center;}
              
              textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }
              
              .delete-wpr { position: relative; }
              .delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }
                
                </style>
              <body>
                      <h1>Farmagri Agro</h1>
                      <h2>Your Have Cancel Your Fertilizer Order</h2>
                      <div id='page-wrap'>
                      <p id='header'>Your Order Id : $id</p>
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
                      Address : $address<br>
                      Registration Id : $li<br></p>
                  </div>
                      </div>
                      <div id='page-wrap'>
                      <textarea id='header'>Terms & Conditions.</textarea>
                      <div id='terms'>
                      </div>
                      </div>
                   <div id='terms'>
                    <h2 class='py-3 text-black'>You have canceled Your fertilizer order of value Rs. $total. </h2>
                    <p2 class='py-3 text-black'></p2>
                  </div>
                  </body>
                  </html>";
                  $sender_email ="From: farmagrimitaoe@gmail.com";
                
                  if(mail($email, $subject, $message,$headers, $sender_email)){
                        $updatequery = "update order1 set status='Cancel' where orderid='$id' and loginid='$li' ";
                        $query = mysqli_query($con, $updatequery);
                            ?>
                            <script>
                                location.replace("uhistory.php");
                            </script>
                            <?php
                        }
              }else{
                echo "Email not send";
              }

}
?>

<?php
include 'database/dbcon.php';
if(isset($_GET['csell'])){
    date_default_timezone_set("Asia/Calcutta");
    $id = $_GET['csell'];
    $li=$_SESSION['loginid'];
    $emailquery =" select * from signup inner join buyer on buyer.buyer=signup.loginid where buyer ='$li'and signup.status='Active' and goodid='$id' ";
            $query = mysqli_query($con, $emailquery);
            if($query)
            {
              $userdata = mysqli_fetch_assoc($query);
              $email = $userdata['email'];
              $username = $userdata['name'];
              $mobile = $userdata['mobile'];
              $Lid = $userdata['loginid'];
              $address = $userdata['address'];
              $price = $userdata['price'];

              $subject = "Farmagri Cancel Buying Offer";
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
              
              textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
              table { border-collapse: collapse; }
              table td, table th { border: 1px solid black; padding: 5px; }
              
              #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
              
              #address { width: 250px; height: 100px; float: left; }
              #address1 { width: 250px; height: 100px; float: right; }
              #customer { overflow: hidden; }
              
              
              #meta { margin-top: 1px; width: 300px; float: right; }
              #meta td { text-align: right;  }
              #meta td.meta-head { text-align: left; background: #eee; }
              #meta td textarea { width: 100%; height: 20px; text-align: right; }
              
              #items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
              #items th { background: #eee; }
              #items tr.item-row td { border: 0; vertical-align: top; }
              #items td.item-name { width: 175px; }
              #items td.total-line { border-right: 0; text-align: right; }
              #items td.total-value { border-left: 0; padding: 10px; }
              #items td.total-value textarea { height: 20px; background: none; }
              #items td.balance { background: #eee; }
              #items td.blank { border: 0; }
              
              #terms { text-align: center; margin: 20px 0 0 0; }
              #terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
              #terms p2 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif;  border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
              #terms textarea { width: 100%; text-align: center;}
              
              textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }
              
              .delete-wpr { position: relative; }
              .delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }
                
                </style>
              <body>
                      <h1>Farmagri</h1>
                      <h2>Your Have Cancel Your Buying Offer</h2>
                      <div id='page-wrap'>
                      <p id='header'>Good Id : $id</p>
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
                      Address : $address<br>
                      Registration Id : $li<br></p>
                  </div>
                      </div>
                      <div id='page-wrap'>
                      <textarea id='header'>Terms & Conditions.</textarea>
                      <div id='terms'>
                      </div>
                      </div>
                   <div id='terms'>
                    <h2 class='py-3 text-black'>You have canceled Buying Offer of price $price.</h2>
                    <p2 class='py-3 text-black'></p2>
                  </div>
                  </body>
                  </html>";
                  $sender_email ="From: farmagrimitaoe@gmail.com";
                
                  if(mail($email, $subject, $message,$headers, $sender_email)){
                        $updatequery = "update buyer set status='Cancel' where goodid='$id' and buyer='$li' ";
                        $query = mysqli_query($con, $updatequery);
                            ?>
                            <script>
                                location.replace("uhistory.php");
                            </script>
                            <?php
                        }
              }else{
                echo "Email not send";
              }

}
?>

<?php
include 'database/dbcon.php';
if(isset($_GET['cgid'])){
    date_default_timezone_set("Asia/Calcutta");
    $id = $_GET['cgid'];
    $li=$_SESSION['loginid'];
    $emailquery =" select * from signup inner join sell on sell.Lid=signup.loginid where Lid ='$li'and signup.status='Active' and goodid='$id' ";
            $query = mysqli_query($con, $emailquery);
            if($query)
            {
              $userdata = mysqli_fetch_assoc($query);
              $email = $userdata['email'];
              $username = $userdata['name'];
              $mobile = $userdata['mobile'];
              $Lid = $userdata['loginid'];
              $address = $userdata['address'];
              $price = $userdata['price'];
              $pro = $userdata['product'];

              $subject = "Farmagri Cancel Sell Order of $pro";
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
              
              textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
              table { border-collapse: collapse; }
              table td, table th { border: 1px solid black; padding: 5px; }
              
              #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
              
              #address { width: 250px; height: 100px; float: left; }
              #address1 { width: 250px; height: 100px; float: right; }
              #customer { overflow: hidden; }
              
              
              #meta { margin-top: 1px; width: 300px; float: right; }
              #meta td { text-align: right;  }
              #meta td.meta-head { text-align: left; background: #eee; }
              #meta td textarea { width: 100%; height: 20px; text-align: right; }
              
              #items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
              #items th { background: #eee; }
              #items tr.item-row td { border: 0; vertical-align: top; }
              #items td.item-name { width: 175px; }
              #items td.total-line { border-right: 0; text-align: right; }
              #items td.total-value { border-left: 0; padding: 10px; }
              #items td.total-value textarea { height: 20px; background: none; }
              #items td.balance { background: #eee; }
              #items td.blank { border: 0; }
              
              #terms { text-align: center; margin: 20px 0 0 0; }
              #terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
              #terms p2 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif;  border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
              #terms textarea { width: 100%; text-align: center;}
              
              textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }
              
              .delete-wpr { position: relative; }
              .delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }
                
                </style>
              <body>
                      <h1>Farmagri</h1>
                      <h2>Your Have Cancel Your Sell Order of Good $pro</h2>
                      <div id='page-wrap'>
                      <p id='header'>Good Id : $id</p>
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
                      Address : $address<br>
                      Registration Id : $li<br></p>
                  </div>
                      </div>
                      <div id='page-wrap'>
                      <textarea id='header'>Terms & Conditions.</textarea>
                      <div id='terms'>
                      </div>
                      </div>
                   <div id='terms'>
                    <p2 class='py-3 text-black'></p2>
                  </div>
                  </body>
                  </html>";
                  $sender_email ="From: farmagrimitaoe@gmail.com";
                
                  if(mail($email, $subject, $message,$headers, $sender_email)){
                        $updatequery = "update sell set sellstatus='Cancel' where goodid='$id' and Lid='$li' ";
                        $query = mysqli_query($con, $updatequery);
                            ?>
                            <script>
                                location.replace("uhistory.php");
                            </script>
                            <?php
                        }
              }else{
                echo "Email not send";
              }

}
?>

<?php
if(isset($_GET['changeid'])){
  $id = $_GET['changeid'];
  if(isset($_POST['submit']))
{
date_default_timezone_set("Asia/Calcutta");
$epu = mysqli_real_escape_string($con, $_POST['quantity']);
$date = date("Y-m-d");
$time= date("h:i:sa");
$loginid=$_SESSION['loginid'];

            $emailquery =" select * from signup inner join sell on sell.Lid=signup.loginid where loginid ='$loginid' and goodid='$id' and status='Active' ";
            $query = mysqli_query($con, $emailquery);
            $emailcount = mysqli_num_rows($query);
            if($emailcount)
            {
              $userdata = mysqli_fetch_assoc($query);
              $email = $userdata['email'];
              $username = $userdata['name'];
              $Lid = $userdata['loginid'];
              $address = $userdata['address'];
              $mobile = $userdata['mobile'];
              $product = $userdata['product'];
              $quantity = $userdata['quantity'];
              $total = $quantity * 100 * $epu;
              $subject = "Farmagri Updating Sell Information of $product ";
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
              
              textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
              table { border-collapse: collapse; }
              table td, table th { border: 1px solid black; padding: 5px; }
              
              #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
              
              #address { width: 250px; height: 100px; float: left; }
              #address1 { width: 250px; height: 100px; float: right; }
              #customer { overflow: hidden; }
              
              
              #meta { margin-top: 1px; width: 300px; float: right; }
              #meta td { text-align: right;  }
              #meta td.meta-head { text-align: left; background: #eee; }
              #meta td textarea { width: 100%; height: 20px; text-align: right; }
              
              #items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
              #items th { background: #eee; }
              #items tr.item-row td { border: 0; vertical-align: top; }
              #items td.item-name { width: 175px; }
              #items td.total-line { border-right: 0; text-align: right; }
              #items td.total-value { border-left: 0; padding: 10px; }
              #items td.total-value textarea { height: 20px; background: none; }
              #items td.balance { background: #eee; }
              #items td.blank { border: 0; }
              
              #terms { text-align: center; margin: 20px 0 0 0; }
              #terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
              #terms textarea { width: 100%; text-align: center;}
              
              textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }
              
              .delete-wpr { position: relative; }
              .delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }
                
                </style>
              <body>
                      <h1>Farmagri</h1>
                      <h2>Changing Price of good $product</h2>
                      <div id='page-wrap'>
                      <p id='header'>Good ID : $id</p>
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
                      Address : $address<br>
                      Registration Id : $Lid<br></p>
                  </div>
                      </div>
                      <div id='page-wrap'>
                      <textarea id='header'></textarea>
                      <div id='terms'>                  
                      <table id='meta'>
                      <tr>
                              <td class='meta-head py-3 text-black'>Date :</td>
                              <td><div class='due py-3 text-black'>$date</div></td>
                          </tr>
                          <tr>
                              <td class='meta-head py-3 text-black'>Time :</td>
                              <td><div class='due py-3 text-black'>$time</div></td>
                          </tr>
                      </table><br>
                   </div>
                   <table id='items'>
                   <tr>
                       <th class='py-3 text-black'>Product</th>
                       <th class='py-3 text-black'>Quantity</th>
                       <th class='py-3 text-black'>Price</th>
                       <th class='py-3 text-black'>Total</th>
                   </tr>

                 <tr class='item-row'>
                 <td class='cost py-3 text-black'><p>$product</p></td>
                 <td class='qty py-3 text-black'><p>$quantity. Quintal</p></td>
                 <td class='qty py-3 text-black'><p>$epu Rs.</p></td>
                 <td><p class='cost py-3 text-black'>$total Rs.</p></td>
             </tr>

                   <tr>
                   <td colspan='2' class='total-line py-3 text-black'>Total :</td>
                   <td class='total-value py-3 text-black'><div id='subtotal'></div></td>
                   <td colspan='1' class='total-value py-3 text-black'><div id='subtotal'>$total Rs. </td>

               </tr>
                 
                  </table>
                  
                  
                  
                   <div id='terms'>
                    <h5 class='py-3 text-black'>Terms & Conditions.</h5>
                  </div>
                  </div>   
                  </div>
                  </body>
                  </html>";
                  $sender_email ="From: farmagrimitaoe@gmail.com";
                
                  if(mail($email, $subject, $message,$headers, $sender_email)){
                    $updatequery = "update sell set epu='$epu', date='$date' , time='$time' where goodid='$id' and Lid='$loginid' ";
                    $query = mysqli_query($con, $updatequery);
                ?>
              <script>
                alert(" Update the Sell Information");
                location.replace("uhistory.php");
              </script>
              <?php
              }else{
                echo "Email not send";
             }
                            
              $to_email = "supprot.farmagri@gmail.com";
              $subject = "Some one place sell order";
              $body = "User $username Registration ID $loginid And Good Id $id has place sell order for his goods i.e $product of Quantity $quantity Quintal at price of $epu Rs/kg  ";
              $headers = "From: farmagrimitaoe@gmail.com";

              if (mail($to_email, $subject, $body, $headers)) {
              } else {
                 
              }
            }
}


if(isset($_POST['submit1']))
{
date_default_timezone_set("Asia/Calcutta");
$epu = mysqli_real_escape_string($con, $_POST['quantity']);
$date = date("Y-m-d");
$time= date("h:i:sa");
$loginid=$_SESSION['loginid'];

$emailquery =" select * from signup inner join buyer on buyer.farmer=signup.loginid where goodid ='$id' and buyer='$loginid' and signup.status='Active' ";
$mobilequery="select * from signup where loginid='$loginid' and signup.status='Active'";
$query = mysqli_query($con, $emailquery);
$query1 = mysqli_query($con, $mobilequery);
if($query1)
{
  $userdata = mysqli_fetch_assoc($query);
  $email = $userdata['email'];
  $username = $userdata['name'];
  $mobile = $userdata['mobile'];
  $Lid = $userdata['farmer'];
  $address = $userdata['address'];
  $userdata = mysqli_fetch_assoc($query1);
  $mobile1 = $userdata['mobile'];
  $address1 = $userdata['city'];
  $username1 = $userdata['name'];
  $ail = $userdata['email'];

  $subject = "Farmagri Buyer Update his Offer Price";
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
  
  textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
  table { border-collapse: collapse; }
  table td, table th { border: 1px solid black; padding: 5px; }
  
  #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
  
  #address { width: 250px; height: 100px; float: left; }
  #address1 { width: 250px; height: 100px; float: right; }
  #customer { overflow: hidden; }
  
  
  #meta { margin-top: 1px; width: 300px; float: right; }
  #meta td { text-align: right;  }
  #meta td.meta-head { text-align: left; background: #eee; }
  #meta td textarea { width: 100%; height: 20px; text-align: right; }
  
  #items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
  #items th { background: #eee; }
  #items tr.item-row td { border: 0; vertical-align: top; }
  #items td.item-name { width: 175px; }
  #items td.total-line { border-right: 0; text-align: right; }
  #items td.total-value { border-left: 0; padding: 10px; }
  #items td.total-value textarea { height: 20px; background: none; }
  #items td.balance { background: #eee; }
  #items td.blank { border: 0; }
  
  #terms { text-align: center; margin: 20px 0 0 0; }
  #terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
  #terms p2 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif;  border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
  #terms textarea { width: 100%; text-align: center;}
  
  textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }
  
  .delete-wpr { position: relative; }
  .delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }
    
    </style>
  <body>
          <h1>Farmagri</h1>
          <h2>Buyer Change his Offer Price</h2>
          <div id='page-wrap'>
          <p id='header'> Good Id : $id</p>
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
          Address : $address<br>
          Registration Id : $Lid<br></p>
      </div>
          </div>
          <div id='page-wrap'>
          <textarea id='header'>Terms & Conditions.</textarea>
          <div id='terms'>
          </div>
          </div>
       <div id='terms'>
        <h2 class='py-3 text-black'>Some one is Intersted in Good. His name is : $username1 from $address1  Contact Number : $mobile1 and </h2> <h2 class='py-3 text-black'> Email ID : $ail. He offers you $epu Rs./per kg.</h2>
        <p2 class='py-3 text-black'></p2>
      </div>
      </body>
      </html>";
      $sender_email ="From: farmagrimitaoe@gmail.com";
    
      if(mail($email, $subject, $message,$headers, $sender_email)){
    ?>
  <script>
   
  </script>
  <?php
  }else{
    echo "Email not send";
  }
}
$emailquery =" select * from ((signup inner join sell on sell.Lid=signup.loginid) inner join buyer on buyer.farmer=signup.loginid) where buyer.goodid ='$id' and buyer='$loginid' and signup.status='Active' ";
$mobilequery="select * from signup  where loginid='$loginid' and signup.status='Active'";
$query3 = mysqli_query($con, $emailquery);
$query4 = mysqli_query($con, $mobilequery);
if($query4)
{
$userdata = mysqli_fetch_assoc($query3);
$username2 = $userdata['name'];
$mobile2 = $userdata['mobile'];
$address4 = $userdata['city'];
$ail = $userdata['email'];
$userdata = mysqli_fetch_assoc($query4);
$mobile3 = $userdata['mobile'];
$username3 = $userdata['name'];
$email = $userdata['email'];
$Lid=$userdata['loginid'];
$address2=$userdata['address'];

$subject = "Farmagri Change The Buying Offer";
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

textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
table { border-collapse: collapse; }
table td, table th { border: 1px solid black; padding: 5px; }

#header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }

#address { width: 250px; height: 100px; float: left; }
#address1 { width: 250px; height: 100px; float: right; }
#customer { overflow: hidden; }


#meta { margin-top: 1px; width: 300px; float: right; }
#meta td { text-align: right;  }
#meta td.meta-head { text-align: left; background: #eee; }
#meta td textarea { width: 100%; height: 20px; text-align: right; }

#items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
#items th { background: #eee; }
#items tr.item-row td { border: 0; vertical-align: top; }
#items td.item-name { width: 175px; }
#items td.total-line { border-right: 0; text-align: right; }
#items td.total-value { border-left: 0; padding: 10px; }
#items td.total-value textarea { height: 20px; background: none; }
#items td.balance { background: #eee; }
#items td.blank { border: 0; }

#terms { text-align: center; margin: 20px 0 0 0; }
#terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
#terms p2 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif;  border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
#terms textarea { width: 100%; text-align: center;}

textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }

.delete-wpr { position: relative; }
.delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }
  </style>
<body>
        <h1>Farmagri</h1>
        <h2>You have Change the offer Price of Good</h2>
        <div id='page-wrap'>
        <p id='header'>Good ID : $id</p>
    <div id='identity'>
    
        <p id='address'>
        Farmagri<br>
        Mit Academy of Engineering<br>
        Alandi Pune 414001  <br>
        Phone: 9421017990</p>

        <p id='address1'>
        Name : $username3<br>
        Email : $email<br>
        Mobile : $mobile3<br>
        Address : $address2<br>
        Registration Id : $Lid<br></p>
    </div>
        </div>
        <div id='page-wrap'>
        <textarea id='header'>Terms & Conditions.</textarea>
        <div id='terms'>
        </div>
        </div>
     <div id='terms'>
      <h2 class='py-3 text-black'>You Have Shown Intrest in goods of Farmer $username2 From $address4 Contact Number $mobile2 and</h2> <h2 class='py-3 text-black'> Email ID : $ail . You give offer For his Goods of price $epu Rs./per kg.</h2>
      <p2 class='py-3 text-black'></p2>
    </div>
    </body>
    </html>";
    $sender_email ="From: farmagrimitaoe@gmail.com";
  
    if(mail($email, $subject, $message,$headers, $sender_email)){
      $updatequery = "update buyer set price='$epu', date='$date' , time='$time' , noti='0' where goodid='$id' and buyer='$loginid' ";
      $query = mysqli_query($con, $updatequery);
  ?>
<script>
  alert(" Update the Offering Price Information");
  location.replace("uhistory.php");
</script>
<?php
}else{
  echo "Email not send";
}}
}
}
?>


