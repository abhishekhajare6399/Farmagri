
<?php include 'unavbar.php' ?>
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
<?php
    include 'database/dbcon.php';
    if(isset($_GET['disease'])){
    $disease = $_GET['disease'];
    if($disease == 'Late_blight'){
  ?> 

<div class="content" style=" padding: 8px 8px;margin :10px;">
<div class="row" style="padding:5px;">
<div class="col-sm-1" style="padding:15px;">
</div>
<div class="col-sm-10" style="padding:15px;">
<p style="font-family:Serif;color:black;text-align:center;font-size:30px"> The Plant has Late Blight Disease. </p>
<p style="font-family:Serif;color:gray;text-align:center;font-size:15px">You can use these product to protect your crop from these disease here is the information of Fertilzers.</p>
<p class = "divider-text"></p></div>
<div class="col-sm-1" style="padding:15px;">
<a href="ufertilizer.php"><button type="submit" class="btn btn-outline-success">Buy Fertilzers</button></a>
</div></div>

<div class="row">
<div class="form-group col-sm-2">
</div>
<div class="form-group col-sm-10">
<h3 style="font-family:Serif;color:black;text-align:left;font-size:20px">Preventive Measures : 
<br>The fungus over-summers as mycelium in the infected seed potato kept in cold stores.
<br>These tubers when planted in the next crop season (main crop and subsequent ones) serve as the source of primary inoculum.
<br>When the plants emerge from such tubers, the fungus invades a few of the growing sprouts and sporulates (produce sporangia) under humid conditions. Further spread of the disease takes place by these sporangia through air or rain splashes.
<br>Initiation of the disease generally takes about 3-7 days before clearly visible symptoms develop. The fungus produces white sporulation on the underside of the leaves which is clearly visible in the early morning hours.
<br>These sporangia further infect new leaves and stems of the nearby plants and this cycle continues after every 4-10 days depending upon the prevailing temperature and humidity levels.
.</h3>
</div></div>
<br>

<div class="row">
<div class="form-group col-sm-1">
</div>
<div class="form-group col-sm-3">
<a href="ufertilizer1.php?id=11363"><img src="fertilizer/uk fertilizer2.jpg" alt="" style="width:100%;height:250px;"></a>
</div>
<div class="form-group col-sm-3">
<a href="ufertilizer1.php?id=99732"><img src="fertilizer/uk fertilizer3" alt="" style="width:100%;height:250px;"></a>
</div>
<div class="form-group col-sm-3">
<a href="ufertilizer1.php?id=20666"><img src="fertilizer/uk fertilizer4.jpg" alt="" style="width:100%;height:250px;"></a>
</div>

</div>
</div>
 
<?php
    }
    else if($disease == 'Early_blight'){
?>


<div class="content" style=" padding: 8px 8px;margin :10px;">
<div class="row" style="padding:5px;">
<div class="col-sm-1" style="padding:15px;">
</div>
<div class="col-sm-10" style="padding:15px;">
<p style="font-family:Serif;color:black;text-align:center;font-size:30px"> The Plant has Early Blight Disease. </p>
<p style="font-family:Serif;color:gray;text-align:center;font-size:15px">You can use these product to protect your crop from these disease here is the information of Fertilzers.</p>
<p class = "divider-text"></p></div>
<div class="col-sm-1" style="padding:15px;">
<a href="ufertilizer.php"><button type="submit" class="btn btn-outline-success">Buy Fertilzers</button></a>
</div></div>

<div class="row">
<div class="form-group col-sm-2">
</div>
<div class="form-group col-sm-10">
<h3 style="font-family:Serif;color:black;text-align:left;font-size:20px">Preventive Measures : <br> Use certified disease-free seeds and ensure transplants are healthy.
<br>Control whitefly populations and protect seedlings in particular from them.
<br>Ensure a weed-free field and surroundings.
<br>Practice crop rotation by not planting cotton near alternative hosts.
<br>Plow under or burn all plant debris after harvest.</h3>
</div></div>
<br>

<div class="row">
<div class="form-group col-sm-1">
</div>
<div class="form-group col-sm-3">
<a href="ufertilizer1.php?id=28160"><img src="fertilizer/uk fertilizer6.jpg" alt="" style="width:100%;height:250px;"></a>
</div>
<div class="form-group col-sm-3">
<a href="ufertilizer1.php?id=19664"><img src="fertilizer/uk fertilizer9.jpg" alt="" style="width:100%;height:250px;"></a>
</div>
<div class="form-group col-sm-3">
<a href="ufertilizer1.php?id=92398"><img src="fertilizer/uk fertilizer10.jpg" alt="" style="width:100%;height:250px;"></a>
</div>

</div>
</div>



 
<?php
    }
$li=$_SESSION['loginid'];
    $emailquery =" select * from signup where loginid ='$li' ";
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

$subject = "Farmagri Plant Disease Prediction";
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
          <h2>Plant Disease Prediction for Potato Plant</h2>
          <div id='page-wrap'>
          <p id='header'>Your account Details</p>
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
          <textarea id='header1'>Terms And Conditions.</textarea><br>
          
          <div id='identity'>
          <h2>Your Potato Plant has $disease disease.</h2>
          <h2>Click here to view the cure to your plant http://localhost/Farmagri/aaplantc2.php?disease=$disease.</h2>
          <h2>Click here to retest the plant http://127.0.0.1:5000/$li-$name.</h2>
         
          </body>
  </html>";
  $sender_email ="From: farmagrimitaoe@gmail.com";

  if(mail($email, $subject, $message,$headers, $sender_email)){
   
  }else{
    ?>
    <script>
        location.replace("uforgotpass1.php");
    </script>
    <?php
  }
}

    }
?>


