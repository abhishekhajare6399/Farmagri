
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
    if($disease == 'Fusarium_Wilt'){
  ?> 

<div class="content" style=" padding: 8px 8px;margin :10px;">
<div class="row" style="padding:5px;">
<div class="col-sm-1" style="padding:15px;">
</div>
<div class="col-sm-10" style="padding:15px;">
<p style="font-family:Serif;color:black;text-align:center;font-size:30px"> The Plant has Fussarium vilt Disease. </p>
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
<br>Plant resistant varieties if available in your area.
<br>Adjust soil pH to 6.5-7.0 and use nitrate as nitrogen source.
<br>Monitor fields for signs of the disease.
<br>Handpick and remove affected plants.
<br>Keep your equipment clean, particularly when working between different fields.
<br>Avoid damage to the plants during field work.
<br>Apply a balanced fertilization with a special focus on the recommended potash.</h3>
</div></div>
<br>

<div class="row">
<div class="form-group col-sm-1">
</div>
<div class="form-group col-sm-3">
<a href="ufertilizer1.php?id=18891"><img src="fertilizer\500kgAmonio salietra_3D_foto.jpg" alt="" style="width:100%;height:250px;"></a>
</div>
<div class="form-group col-sm-3">
<a href="ufertilizer1.php?id=74587"><img src="fertilizer\nitrogen-fertilizer-500x500.webp" alt="" style="width:100%;height:250px;"></a>
</div>
<div class="form-group col-sm-3">
<a href="ufertilizer1.php?id=76028"><img src="fertilizer\organic-plant-nutrient-thyla-n--500x500.jpg" alt="" style="width:100%;height:250px;"></a>
</div>

</div>
</div>
 
<?php
    }
    else if($disease == 'Bacterial_blight'){
?>


<div class="content" style=" padding: 8px 8px;margin :10px;">
<div class="row" style="padding:5px;">
<div class="col-sm-1" style="padding:15px;">
</div>
<div class="col-sm-10" style="padding:15px;">
<p style="font-family:Serif;color:black;text-align:center;font-size:30px"> The Plant has Bacterial blight Disease. </p>
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
<br>Plant high-quality, disease-free seeds or seeds delinted through an acid treatment.
<br>Using blight-resistant varieties is the more efficient method to avoid the disease.
<br>Scout fields, identify infected plants and remove them as well as some neighboring plants.
<br>Keep the canopy as open as possible to reduce humidity and promote drying of the foliage.
<br>Do not cultivate or move equipment through fields when foliage is wet.
<br>Do not irrigate with overhead irrigation systems.</h3>
</div></div>
<br>

<div class="row">
<div class="form-group col-sm-1">
</div>
<div class="form-group col-sm-3">
<a href="ufertilizer1.php?id=54300"><img src="fertilizer\zyme-graneules-250x250.webp" alt="" style="width:100%;height:250px;"></a>
</div>
<div class="form-group col-sm-3">
<a href="ufertilizer1.php?id=76028"><img src="fertilizer\organic-plant-nutrient-thyla-n--500x500.jpg" alt="" style="width:100%;height:250px;"></a>
</div>
<div class="form-group col-sm-3">
<a href="ufertilizer1.php?id=18891"><img src="fertilizer\500kgAmonio salietra_3D_foto.jpg" alt="" style="width:100%;height:250px;"></a>
</div>

</div>
</div>



 
<?php
    }
    else if($disease == 'Curl_Virus'){
?>

<div class="content" style=" padding: 8px 8px;margin :10px;">
<div class="row" style="padding:5px;">
<div class="col-sm-1" style="padding:15px;">
</div>
<div class="col-sm-10" style="padding:15px;">
<p style="font-family:Serif;color:black;text-align:center;font-size:30px"> The Plant has Curl virus Disease. </p>
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
<a href="ufertilizer1.php?id=55135"><img src="fertilizer\Jeevamrutham-5ltr_700x.webp" alt="" style="width:100%;height:250px;"></a>
</div>
<div class="form-group col-sm-3">
<a href="ufertilizer1.php?id=74587"><img src="fertilizer\nitrogen-fertilizer-500x500.webp" alt="" style="width:100%;height:250px;"></a>
</div>
<div class="form-group col-sm-3">
<a href="ufertilizer1.php?id=50283"><img src="fertilizer\potash-nitrogen-fertilizer-250x250.webp" alt="" style="width:100%;height:250px;"></a>
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
          <h2>Plant Disease Prediction For Cotton Plant</h2>
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
          <h2>Your Cotton Plant has $disease disease.</h2>
          <h2>Click here to view the cure to your plant http://localhost/Farmagri/aaplantc1.php?disease=$disease.</h2>
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


