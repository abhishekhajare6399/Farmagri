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
    if(isset($_GET['pid'])){
    $pid = $_GET['pid'];
    if(isset($_POST['submit1']))
    {
        $updatequery = "update contact set  status='Cancel' where pid='$pid' ";    
        $res = mysqli_query($con,$updatequery);
        if($res){
                 ?>
                    <script>
                    location.replace("acontact.php")
                    alert("Response has send");
                    </script>
                    <?php
                    }else{ }
    }

    if(isset($_POST['submit']))
    {
    date_default_timezone_set("Asia/Calcutta");
    $info=mysqli_real_escape_string($con, $_POST[$pid]);

    $emailquery =" select * from (signup inner join contact on contact.loginid=signup.loginid)  where pid ='$pid'";
    $query3 = mysqli_query($con, $emailquery);
    if($query3)
    {
    $userdata = mysqli_fetch_assoc($query3);
    $mobile3 = $userdata['mobile'];
    $username3 = $userdata['name'];
    $email = $userdata['email'];
    $Lid=$userdata['loginid'];
    $address3=$userdata['address'];
    $prob=$userdata['problem'];

    $subject = "Farmagri Problem Solution";
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
            <h2>Problem Solution</h2>
            <div id='page-wrap'>
            <p id='header'>Problem ID : $pid</p>
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
            <h2 class='py-3 text-black'>Problem</h2><br>
            <p2 class='py-3 text-black'>$prob</p2><br>
            <h2 class='py-3 text-black'>Solution</h2><br>
            <p2 class='py-3 text-black'>$info</p2><br>
            </div>
            </div>
        </body>
        </html>";
        $sender_email ="From: farmagrimitaoe@gmail.com";
      
        if(mail($email, $subject, $message,$headers, $sender_email)){
        $updatequery = "update contact set  solution='$info' , status='Completed'  where pid='$pid' ";    
        $res = mysqli_query($con,$updatequery);
        if($res){
                 ?>
                    <script>
                    location.replace("acontact.php")
                    alert("Response has send");
                    </script>
                    <?php
                    }else{ }
    }else{
      echo "Email not send";
    }}
       
    }
    }
    ?>
</div>