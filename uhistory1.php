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
    border-bottom: 3px solid rgb(11, 10, 10);
    top: 80%;
    left: 0;
    z-index: 1;
  }
  body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button3 {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup3 {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container3 {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container3 input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container3 input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container3 .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container3 .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container3 .btn:hover, .open-button:hover {
  opacity: 1;
}
    </style>
<div class="content" style=" padding: 8px 8px;margin :10px;">
<div class="row" style="padding:5px;">

<?php
    include 'database/dbcon.php';
    if(isset($_GET['gid'])){
    $resid = $_GET['gid'];
    $li=$_SESSION['loginid'];
    $selectquery = "select signup.name,signup.city,sell.product,sell.epu,sell.quantity,sell.date,sell.goodid,sell.time,sell.description,sell.age,sell.image,sell.Lid from sell inner join signup on signup.loginid=sell.Lid where goodid ='$resid' and Lid='$li'";
    $query = mysqli_query($con,$selectquery);
    while($result =mysqli_fetch_array($query)){
    ?>

    <div class="col-sm-7" style="padding:15px;">
    <div class="row">

    <div class="col-sm-1" style="padding:5px;"><br>
    <a href="uhistory.php" class="btn btn-outline-success"><i class="fa fa-arrow-left" aria-hidden="true"></i></a><br><br>
    </div>
    <div class="col-sm-10" style="padding:5px;"><br>
    <p style="font-family:Monospace;color:gray;text-align:center;font-size:15px">Farmer : <?php echo $result['name'];?>.</p>
    <p style="font-family:Monospace ;color:gray;text-align:center;font-size:15px">Date : <?php echo $result['date'];?> & Time : <?php echo $result['time'];?>.</p>
    <h1 style="font-family:Serif;color:black;text-align:center;font-size:30px"><?php echo $result['product'];?>.</h1>
    <p style="font-family:Serif;color:blue;text-align:center;font-size:20px">Description.</p>
    </div></div>
    <p class = "divider-text"></p>
    <p style="font-family:Serif;color:gray;text-align:center;font-size:15px"><?php echo $result['description'];?>.</p>

    <div class="row" style="padding:5px;">
    <div class="col-sm-2" style="padding:15px;">
    </div>
    <div class="col-sm-2" style="padding:15px;">
    <p style="font-family:Serif;color:gray;text-align:left;font-size:15px">Age : </p>
    <p style="font-family:Serif;color:gray;text-align:left;font-size:15px">Location : </p>
    <p style="font-family:Serif;color:gray;text-align:left;font-size:15px">Quantity : </p>
    <p style="font-family:Serif;color:gray;text-align:left;font-size:18px">Price : </p>
    </div>
    <div class="col-sm-6" style="padding:15px;">
    <p style="font-family:Serif;color:black;text-align:right;font-size:15px"><?php echo $result['age'];?> Days</p>
    <p style="font-family:Serif;color:black;text-align:right;font-size:15px"><?php echo $result['city'];?></p>
    <p style="font-family:Serif;color:black;text-align:right;font-size:15px"><?php echo $result['quantity'];?> Quintal</p>
    <form action ="uaupdate.php?changeid=<?php echo $result['goodid'];?>" method ="POST">
    <input class="form-control me-2"  type="number" id="quantity" name="quantity" min="0" max="50" value="<?php echo $result['epu'];?>" aria-label="Search" required><br>
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
    if(isset($_POST['submit']))
    {
    date_default_timezone_set("Asia/Calcutta");
    $price=mysqli_real_escape_string($con, $_POST['price']);
    $date = date("Y-m-d");
    $time= date("h:i:sa");
    $goodid=$result['goodid'];
    $loginid=$_SESSION['loginid'];
    $farid=$result['Lid'];
    $insertquery = "insert into buyer(farmer,goodid,buyer,price,date,time,status,noti) values('$farid','$goodid','$loginid','$price','$date','$time','Pending','Not')";
    $res = mysqli_query($con,$insertquery);
    if($res){
            $emailquery =" select * from signup inner join sell on sell.Lid=signup.loginid where goodid ='$goodid' and Lid='$farid' and signup.status='Active' ";
                $mobilequery="select * from signup inner join buyer on buyer.buyer=signup.loginid where loginid='$loginid' and signup.status='Active'";
                $query = mysqli_query($con, $emailquery);
                $query1 = mysqli_query($con, $mobilequery);
                if($query1)
                {
                $userdata = mysqli_fetch_assoc($query);
                $email = $userdata['email'];
                $username = $userdata['name'];
                $mobile = $userdata['mobile'];
                $Lid = $userdata['Lid'];
                $address = $userdata['address'];
                $userdata = mysqli_fetch_assoc($query1);
                $mobile1 = $userdata['mobile'];
                $address1 = $userdata['city'];
                $username1 = $userdata['name'];
                $ail = $userdata['email'];

                $subject = "Farmagri Regarding Buyer Information";
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
                        <h2>Some Shown intrest in your Good</h2>
                        <div id='page-wrap'>
                        <p id='header'>Your Details Good Id : $goodid</p>
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
                        <h2 class='py-3 text-black'>Some one is Intersted in Good. His name is : $username1 from $address1  Contact Number : $mobile1 and </h2> <h2 class='py-3 text-black'> Email ID : $ail. He offers you $price Rs./per kg.</h2>
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
                $emailquery =" select * from signup inner join sell on sell.Lid=signup.loginid where goodid ='$goodid' and Lid='$farid' and signup.status='Active' ";
                $mobilequery="select * from signup inner join buyer on buyer.buyer=signup.loginid where loginid='$loginid' and signup.status='Active'";
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

                $subject = "Farmagri Regarding Buying Information";
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
                        <h2>You have shown interest in Famer Good of Good ID : $goodid</h2>
                        <div id='page-wrap'>
                        <p id='header'>Your Details</p>
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
                    <h2 class='py-3 text-black'>You Have Shown Intrest in goods of Farmer $username2 From $address4 Contact Number $mobile2 and</h2> <h2 class='py-3 text-black'> Email ID : $ail . You give offer For his Goods of price $price Rs./per kg.</h2>
                    <p2 class='py-3 text-black'></p2>
                    </div>
                    </body>
                    </html>";
                    $sender_email ="From: farmagrimitaoe@gmail.com";
                
                    if(mail($email, $subject, $message,$headers, $sender_email)){
                ?>
                <script>
                alert(" Information Stored ");
                </script>
                <?php
                }else{
                echo "Email not send";
                }
            }
            }


    }
    }}
?>


<?php
    include 'database/dbcon.php';
    if(isset($_GET['changesell'])){
    $resid = $_GET['changesell'];
    $li=$_SESSION['loginid'];
    $selectquery = "select * from buyer inner join sell on sell.goodid=buyer.goodid where buyer.goodid ='$resid' and buyer='$li'";
    $query = mysqli_query($con,$selectquery);
    while($result =mysqli_fetch_array($query)){
    ?>

    <div class="col-sm-7" style="padding:15px;">
    <div class="row">

    <div class="col-sm-1" style="padding:5px;"><br>
    <a href="uhistory.php" class="btn btn-outline-success"><i class="fa fa-arrow-left" aria-hidden="true"></i></a><br><br>
    </div>
    <div class="col-sm-10" style="padding:5px;"><br>
    <p style="font-family:Monospace ;color:gray;text-align:center;font-size:15px">Date : <?php echo $result['date'];?> & Time : <?php echo $result['time'];?>.</p>
    <h1 style="font-family:Serif;color:black;text-align:center;font-size:30px"><?php echo $result['product'];?>.</h1>
    <p style="font-family:Serif;color:blue;text-align:center;font-size:20px">Description.</p>
    </div></div>
    <p class = "divider-text"></p>
    <p style="font-family:Serif;color:gray;text-align:center;font-size:15px"><?php echo $result['description'];?>.</p>

    <div class="row" style="padding:5px;">
    <div class="col-sm-2" style="padding:15px;">
    </div>
    <div class="col-sm-3" style="padding:15px;">
    <p style="font-family:Serif;color:gray;text-align:left;font-size:15px">Age : </p>
    <p style="font-family:Serif;color:gray;text-align:left;font-size:15px">Quantity : </p>
    <p style="font-family:Serif;color:gray;text-align:left;font-size:15px">Price : </p>
    <p style="font-family:Serif;color:gray;text-align:left;font-size:18px">Offer Price : </p>
    </div>
    <div class="col-sm-6" style="padding:15px;">
    <p style="font-family:Serif;color:black;text-align:right;font-size:15px"><?php echo $result['age'];?> Days</p>
    <p style="font-family:Serif;color:black;text-align:right;font-size:15px"><?php echo $result['quantity'];?></p>
    <p style="font-family:Serif;color:black;text-align:right;font-size:15px"><?php echo $result['epu'];?> Quintal</p>
    <form action ="uaupdate.php?changeid=<?php echo $result['goodid'];?>" method ="POST">
    <input class="form-control me-2"  type="number" id="quantity" name="quantity" min="0" max="50" value="<?php echo $result['price'];?>" aria-label="Search" required><br>
    <button class="flex btn btn-outline-primary" type="submit" name="submit1">Change Price</button><br>
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
    <?php }} ?>

        
</div>
</div>

