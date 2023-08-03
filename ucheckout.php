<?php include 'unavbar.php' ?>

<div class="content" style=" padding: 8px 8px;margin :10px;">


<style>
        * {
    margin: 0; padding: 0;
  }
  html, body, #container {
      height: 100%;
  }
  header {
      height: 15%;

  }
  .p1{
    text-align: right;
    font-size :20px;
    color:black;
        }
        .p2{
    text-align: left;
    font-size :20px;
    color:black;
        }
  p{
    text-align: Center;
    font-size :15px;
    color:black;
        }
  h3{
    text-align: Center;
    font-size :0px;
    color:black;
        }
        h6{
    text-align: Center;
    color:black;
        }
  .divider-text{
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
    padding : 5px;
    
  }
  
  .divider-text::after{
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 2px solid rgb(11, 10, 10);
    top: 55%;
    left: 0;
    z-index: 1;
  }
  .divider-text1{
    position: relative;
    text-align: center;
    margin-top: 15px;
    margin-bottom: 15px;
    padding : 5px;
    
  }
  
  .divider-text1::after{
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 1px solid rgb(11, 10, 10);
    top: 55%;
    left: 0;
    z-index: 1;
  }
  .container-fluid {
    padding: 10px 10px;
    margin :10px;
  }
  
</style>
<main>
<?php
if(isset($_GET['resid'])){
  $resid = $_GET['resid'];
  $selectquery = "select * from signuphotel where resid='$resid' and status ='Active' ";
  $query = mysqli_query($con,$selectquery);
  $result =mysqli_fetch_array($query);
  $hotel=$result['hotel'];
  $image=$result['image'];
  $mobile=$result['mobile'];  
}
?>
  <div class="row">
  <div class="col-sm-2" style="padding:10px;">
  <a href="ufertilizer.php"><button class="btn btn-outline-primary" type="submit"><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a>
</div>
    <div class="col-sm-8" style="padding:5px;">
<p style="font-family:Serif;color:black;text-align:Center;font-size:20px">Farmagri Agro</p>
</div>
<div class="col-sm-2" style="padding:5px;">
</div>
</div>
<p class = "divider-text"></p>

<div class="row">
    <div class="col-sm-3" style="padding:5px;">
   <p>Fertilizer</p>
  </div>
  <div class="col-sm-3" style="padding:5px;">
   <p>Quantity</p>
  </div>
  <div class="col-sm-3" style="padding:5px;">
   <p>Price</p>
  </div>
  <div class="col-sm-3" style="padding:5px;">
   <p>Total</p>
  </div>
</div>

<?php
$resid = $_SESSION['loginid'];
$selectquery = "SELECT * FROM checkout inner join fertilizer on checkout.fetid=fertilizer.fetid where checkout.loginid='$resid'";
$query1 = mysqli_query($con,$selectquery);
while($result1 =mysqli_fetch_array($query1)){
  $t=$result1['total'];
  ?>
<div class="row">
    <div class="col-sm-3" style="padding:5px;">
   <p><?php echo $result1['fname'];?></p>
  </div>
  <div class="col-sm-3" style="padding:5px;">
  <form action ="ufertilizer2.php?fid=<?php echo $result1['fetid'];?>&&id=<?php echo $result1['loginid'];?>" method ="POST">
  <div class="row">
  <div class="col-sm-1" style="padding:8px;">
        <button class="btn btn-outline-danger" type="submit" name="submit3"><i class="fa fa-minus" aria-hidden="true"></i></button>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="col-sm-7" style="padding:5px;">
        <input class="form-control me-2"  type="number" id="quantity" name="quantity" min="0" max="1000" aria-label="Search" value="<?php echo $result1['quantity'];?>">
        </div>
        <div class="col-sm-1" style="padding:8px;">
        <button class="btn btn-outline-danger" type="submit" name="submit4"><i class="fa fa-plus" aria-hidden="true"></i></button>
        </div>
        </div>
      </form>
  </div>
  <div class="col-sm-3" style="padding:5px;">
   <p>Rs.<?php echo $result1['price'];?></p>
  </div>
  <div class="col-sm-3" style="padding:5px;">
   <p>Rs.<?php echo $result1['total'];?></p>
  </div>
</div>
<?php
}
$sum = "SELECT SUM(total) as total FROM checkout where loginid='$resid'";
$sum1 = mysqli_query($con,$sum);
$resul =mysqli_fetch_array($sum1);
$total=$resul['total'];
if($total>="1000" && $total<="2500"){
  $discount='5% Discount';
  $discount1=$total*5/100;
  $total1=$total-$discount1;
} elseif ($total>="2500" && $total<="5000") {
  $discount='8% Discount';
  $discount1=$total*8/100;
  $total1=$total-$discount1;
}
elseif ($total>="5000" && $total<="8000"){
  $discount='10% Discount';
  $discount1=$total*10/100;
  $total1=$total-$discount1;
}elseif($total>"8000"){
  $discount='12% Discount';
  $discount1=$total*12/100;
  $total1=$total-$discount1;
}else if($total<"1000"){
  $discount='2% Discount';
  $discount1=$total*2/100;
  $total1=$total-$discount1;
}

$to=$total-$discount1;
?>
  <form action ="" method ="POST">

<div class="form-group">
<div class="row">
<div class="col-sm-2" style="padding:5px;">
  </div>
  <div class="col-sm-8" style="padding:5px;"><?php
  $selectquery = "SELECT * FROM checkout inner join signup on checkout.loginid=signup.loginid where checkout.loginid='$resid' limit 1";
$query1 = mysqli_query($con,$selectquery);
while($result1 =mysqli_fetch_array($query1)){ ?>
  <p>Delivery Address : <?php echo $result1['address'];?> <?php echo $result1['city'];?> <?php echo $result1['pincode'];?> <?php echo $result1['state'];?></p>
  <?php } ?>
  </div></div>
  </div>
  <p class = "divider-text"></p>
  <div class="row">
    <div class="col-sm-9" style="padding:5px;"><br><br><br>
    <h5 style="padding:10px;">Total Bill With <?php echo $discount?> :</h5>
  </div>
  <div class="col-sm-3" style="padding:5px;">
    <h7 style="padding:10px;">Rs.<?php echo $total;?></h7><br>
    <h7 style="padding:10px;">Rs.<?php echo $discount1;?>(<?php echo $discount;?>)</h7>
    <p class = "divider-text1"></p>
    <h5 style="padding:10px;">Rs.<?php echo $total1;?></h5>
  </div>
  <div class="row">
    <div class="col-sm-10" style="padding:5px;">
</div>
<div class="col-sm-2" style="padding:5px;">

  <button class="btn btn-outline-success" type="submit" name="submit"  style="float: right;padding:5px;">Place Order</button> 
  </div></div>
  </form>

  </div>  
  </div>
 </div>
</main>
</div>

    </body>
</html>

<?php
include 'database/dbcon.php';

$rand = rand(100000000,9999999999);
date_default_timezone_set("Asia/Calcutta");
$date = date("Y-m-d");
$time= date("h:i:sa");
$loginid=$_SESSION['loginid'];


if(isset($_POST['submit']))
{
$selectquery = "SELECT * FROM checkout inner join fertilizer on checkout.fetid=fertilizer.fetid where checkout.loginid='$resid'";
$query1 = mysqli_query($con,$selectquery);
while($result1 =mysqli_fetch_array($query1)){
  $foodid=$result1['fetid'];
  $price=$result1['price'];
  $qty=$result1['quantity'];
  $foodname=$result1['fname'];
  $total1=$result1['total'];
  $sum = "SELECT SUM(total) as total FROM checkout where  loginid='$loginid'";
  $sum1 = mysqli_query($con,$sum);
  $resul =mysqli_fetch_array($sum1);
  $total=$resul['total'];

  if($total>="1000" && $total<="2500"){
    $discount1=$total*5/100;
  } elseif ($total>="2500" && $total<="5000") {
    $discount1=$total*8/100;
  }
  elseif ($total>="5000" && $total<="8000"){
    $discount1=$total*10/100;
  }elseif($total>"8000"){
    $discount1=$total*12/100;
  }else if($total<"1000"){
    $discount1=$total*2/100;
  }

  $insertquery ="insert into order1(orderid,loginid,fetid,fname,price,quantity,discount,total,date,time,status,noti) 
values('$rand','$loginid','$foodid','$foodname','$price','$qty','$discount1','$total1','$date','$time','Pending','0')";
  $iquery = mysqli_query($con, $insertquery);    
  if($iquery)
{
  ?>
    <script>
      alert("Order Place Sucessfully");
      location.replace("ufertilizer.php");
    </script>
    <?php
}else{
  ?>
    <script>
      alert("Order Place Not Sucessfully");
      location.replace("ufertilizer.php");
    </script>
    <?php
}
}
$emailquery =" select * from signup where loginid ='$loginid' ";
$query = mysqli_query($con, $emailquery);
$emailcount = mysqli_num_rows($query);
if($emailcount)
{
$userdata = mysqli_fetch_assoc($query);
$name = $userdata['name'];
$address = $userdata['address'];
$mobile = $userdata['mobile'];
$email = $userdata['email'];
$city = $userdata['city'];
$state = $userdata['state'];



$subject = "Farmagri Agro Order Place Sucessfully";
              $headers = "From: foodiesmitaoe@gmail.com\r\n";
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
              table { border-collapse: collapse;width:60% }
              table td, table th { border: 1px solid black; padding: 5px; }
              
              #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 2px; padding: 8px 0px; }
              
              #address { width: 250px; height: 100px; float: left; }
              #address1 { width: 300px; height: 110px; float: right; }
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
              content {
                max-width: 70%;
                margin: auto;
                background: rgb(243, 240, 240);
                padding: 10px;
    }
                </style>
              <body>
                      <h1>Farmagri Agro</h1>
                      <h2>Thank you for Placing Order Confrmation Will Get soon.</h2>
                      <div id='page-wrap'>
                      <p id='header'></p>
                  <div id='identity'>
                  
                      <p id='address'>
                      Farmagri Agro.<br>
                      Mit Academy of Engineering Alandi.<br>
                      Pune $state.<br>
                      Phone: 9421017990.</p>
              
                      <p id='address1'>
                      Name : $name.<br>
                      Email : $email.<br>
                      Mobile : $mobile.<br>
                      Address : $address.<br>
                      $city $state.<br>
                      Order ID : $rand</p>
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
                              <td><div class='due py-3 text-black'>$time</td>
                          </tr>
                      </table>
                   </div><br><br>
                   <table id='items'>
                    <tr>
                        <th class='py-3 text-black'>Food</th>
                        <th class='py-3 text-black'>Quantity</th>
                        <th class='py-3 text-black'>Price</th>
                        <th class='py-3 text-black'>Total</th>
                    </tr>

                  <tr class='item-row'>
                  <td class='cost py-3 text-black'><p>$foodname</p></td>
                  <td class='qty py-3 text-black'><p>$qty.</p></td>
                  <td class='qty py-3 text-black'><p>$price</p></td>
                  <td><p class='cost py-3 text-black'>$t Rs.</p></td>
              </tr>
  

             <tr>
                    <tr>
                    <td colspan='1' class='blank'> </td>
                    <td colspan='1' class='blank'> </td>
                    <td colspan='1' class='total-line py-3 text-black'>Sub Total : </td>
                    <td class='total-value py-3 text-black'><div id='total'>$total Rs.</div></td>
                    </tr>
                    <tr>
                    <td colspan='1' class='blank'> </td>
                    <td colspan='1' class='blank'> </td>
                    <td colspan='1' class='total-line py-3 text-black'>$discount : </td>
                    <td class='total-value py-3 text-black'><div id='total'>$discount1 Rs.</div></td>
                    </tr>
                    <tr>
                    <td colspan='1' class='blank'> </td>
                    <td colspan='1' class='blank'> </td>
                    <td colspan='1' class='total-line py-3 text-black'>Total: </td>
                    <td class='total-value py-3 text-black'><div id='total'>$to Rs.</div></td>
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
            $email1 ="farmagrimitaoe@gmail.com";
             $subject = "Farmagri Agro Someone Place Order";
             $headers = "From: foodiesmitaoe@gmail.com";
             $message = "You Got order From Framer $name of value $to Rs.";
             $sender_email ="From: farmagrimitaoe@gmail.com";
                
             if(mail($email1, $subject, $message, $sender_email)){
                    $updatequery = "delete from checkout where loginid='$loginid' ";
                    $query1 = mysqli_query($con, $updatequery);
                    ?>
                    <script>
                      alert("Order Place Sucessfully")
                      location.replace("ufertilizer.php");
                    </script>
                    <?php
              }else{
                ?>
                <script>
                  alert("00")
                  location.replace("ufertilizer.php");
                </script>
                <?php
             }}
            }}

?>