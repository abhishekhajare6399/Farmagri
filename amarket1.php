<?php include 'anavbar.php' ?>
<?php include 'database/dbcon.php' ?>
  <style>
.form-container3 {
    padding: 15px;
    width: 100%;
    height:auto;
    background-color: lightgray;
    border-radius:10px;
  }
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
<div class="content" style=" padding: 4px 4px;margin :10px;">

<?php
    include 'database/dbcon.php';
    if(isset($_GET['gid'])){
    $gid = $_GET['gid'];
    $selectquery = "select * from sell where goodid='$gid'";
    $query = mysqli_query($con,$selectquery);
    while($result =mysqli_fetch_array($query)){
    ?>
    <div class="row">
    <div class="col-sm-7" style="padding:15px;">
    <div class="row">
    <div class="col-sm-1" style="padding:5px;"><br>
    <a href="amarket.php" class="btn btn-outline-success"><i class="fa fa-arrow-left" aria-hidden="true"></i></a><br><br>
    </div>
    <div class="col-sm-10" style="padding:5px;"><br>
    <h1 style="font-family:Serif;color:black;text-align:center;font-size:30px"><?php echo $result['product'];?>.</h1>
    <p style="font-family:Serif;color:blue;text-align:center;font-size:20px">Description.</p>
    </div></div>
    <p class = "divider-text"></p>
    <p style="font-family:Serif;color:gray;text-align:center;font-size:15px"><?php echo $result['description'];?>.</p>

    <div class="row" style="padding:5px;">
    <div class="col-sm-2" style="padding:15px;">
    </div>
    <div class="col-sm-2" style="padding:15px;">
    <p style="font-family:Serif;color:gray;text-align:left;font-size:20px">Age : </p>
    <p style="font-family:Serif;color:gray;text-align:left;font-size:20px">Quantity : </p>
    <p style="font-family:Serif;color:gray;text-align:left;font-size:20px">Price : </p>
    </div>
    <div class="col-sm-6" style="padding:15px;">
    <p style="font-family:Serif;color:black;text-align:center;font-size:20px"><?php echo $result['age'];?>.</p>
    <p style="font-family:Serif;color:black;text-align:center;font-size:20px"><?php echo $result['quantity'];?>.</p>

    <form action ="" method ="POST">
    <input class="form-control me-2"  type="number" id="quantity" name="quantity" min="0" max="1000" value="<?php echo $result['epu'];?>" aria-label="Search" required><br>
    <button class="flex btn btn-outline-primary" type="submit" name="submit">Change Price</button><br>
    </form></div>
    <div class="col-sm-2" style="padding:15px;">
    </div>
    </div>

    <p class = "divider-text"></p>
    </div>
    <div class="col-sm-5" style="padding:5px;">
    <img alt="ecommerce" src="<?php echo $result['image'];?>"  style="width:80%;height:100%;border-radius:12px;">

    </div>
    </div>

          <?php
    }
    if(isset($_POST['submit']))
    {
    date_default_timezone_set("Asia/Calcutta");
    $price1=mysqli_real_escape_string($con, $_POST['quantity']);
    $emailquery =" select * from (signup inner join sell on sell.Lid=signup.loginid)  where sell.goodid ='$gid'";
    $query3 = mysqli_query($con, $emailquery);
    if($query3)
    {
    $userdata = mysqli_fetch_assoc($query3);
    $mobile3 = $userdata['mobile'];
    $username3 = $userdata['name'];
    $email = $userdata['email'];
    $Lid=$userdata['loginid'];
    $address3=$userdata['address'];
    $quantity=$userdata['quantity'];
    $price=$userdata['epu'];

    
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
            <h2>Company Offical Change the Good Price as Per your Request</h2>
            <div id='page-wrap'>
            <p id='header'>Good ID : $gid</p>
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
            Address : $address3<br>
            Registration Id : $Lid<br></p>
        </div>
            </div>
            <div id='page-wrap'>
            <textarea id='header'>Terms & Conditions.</textarea>
            <div id='terms'>
            </div>
            </div>
         <div id='terms'>
          <h2 class='py-3 text-black'>Your Price is changed to Rs. $price to Rs. $price1</h2>
          <p2 class='py-3 text-black'></p2>
        </div>
        </body>
        </html>";
        $sender_email ="From: farmagrimitaoe@gmail.com";
      
        if(mail($email, $subject, $message,$headers, $sender_email)){
            $s=$price1 * $quantity *100;
            $updatequery = "update sell set  epu='$price1' , total='$s' where goodid='$gid' ";    
            $res = mysqli_query($con,$updatequery);
            if($res){
                     ?>
                        <script>
                        location.replace("amarket.php")
                        alert("Price is Updated");
                        </script>
                        <?php
                        }else{
                        }
    }else{
      echo "Email not send";
    }}
}
    }
?>

<?php
    include 'database/dbcon.php';
    if(isset($_GET['cgid'])){
    $gid = $_GET['cgid'];
    $emailquery =" select * from (signup inner join sell on sell.Lid=signup.loginid)  where sell.goodid ='$gid'";
    $query3 = mysqli_query($con, $emailquery);
    if($query3)
    {
    $userdata = mysqli_fetch_assoc($query3);
    $mobile3 = $userdata['mobile'];
    $username3 = $userdata['name'];
    $email = $userdata['email'];
    $Lid=$userdata['loginid'];
    $address3=$userdata['address'];
    $quantity=$userdata['quantity'];
    $price=$userdata['epu'];

    
    $subject = "Farmagri Cancel the Sell order";
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
            <h2>Company Offical Cancel your sell order as Per your Request</h2>
            <div id='page-wrap'>
            <p id='header'>Good ID : $gid</p>
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
            Address : $address3<br>
            Registration Id : $Lid<br></p>
        </div>
            </div>
            <div id='page-wrap'>
            <textarea id='header'>Terms & Conditions.</textarea>
            <div id='terms'>
            </div>
            </div>
         <div id='terms'>
          <h2 class='py-3 text-black'>As per your request your sell order is cancel.</h2>
          <p2 class='py-3 text-black'></p2>
        </div>
        </body>
        </html>";
        $sender_email ="From: farmagrimitaoe@gmail.com";
      
        if(mail($email, $subject, $message,$headers, $sender_email)){
            $s=$price * $quantity;
            $updatequery = "update sell set sellstatus='Cancel' where goodid='$gid' ";    
            $res = mysqli_query($con,$updatequery);
            if($res){
                     ?>
                        <script>
                        location.replace("amarket.php")
                        alert("Cancel the sell order");
                        </script>
                        <?php
                        }else{
                        }
    }else{
      echo "Email not send";
    }}    }
    ?>

</div>


<?php
    include 'database/dbcon.php';
    if(isset($_GET['av'])){
    $gid = $_GET['av'];
    $updatequery = "update fertilizer set status='Avaliable' where fetid='$gid' ";    
    $res = mysqli_query($con,$updatequery);
    if($res){
             ?>
                <script>
                location.replace("afertilizer.php")
                alert("Fertilizer status is changed to Avaliable");
                </script>
                <?php
                }else{
                }
    }
    if(isset($_GET['un'])){
        $gid = $_GET['un'];
        $updatequery = "update fertilizer set status='Unavaliable' where fetid='$gid' ";    
        $res = mysqli_query($con,$updatequery);
        if($res){
                 ?>
                    <script>
                    location.replace("afertilizer.php")
                    alert("Fertilizer status is changed to Unavaliable");
                    </script>
                    <?php
                    }else{
                    }
        }
        if(isset($_GET['news'])){
            $gid = $_GET['news'];
            $updatequery = "delete from news where id='$gid' ";    
            $res = mysqli_query($con,$updatequery);
            if($res){
                     ?>
                        <script>
                        location.replace("anews.php")
                        alert("News has deleted");
                        </script>
                        <?php
                        }else{
                        }
            }
    ?>