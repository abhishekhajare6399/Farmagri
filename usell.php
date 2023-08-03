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
<div class="content" style=" padding: 8px 8px;margin :10px;">

<p style="font-family:Serif;color:black;text-align:center;font-size:30px"> Good Information </p>
<p style="font-family:Serif;color:gray;text-align:center;font-size:15px"> Enter the correct Information of Goods and Expected price Should be match to market price. </p>
<p class = "divider-text"></p>

<form action ="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method ="POST" enctype ="multipart/form-data">
<div class="row" style="padding:5px;">
<div class="col-sm-2" style="padding:15px;">
</div>
<div class="col-sm-4" style="padding:15px;">
      <label for="inputEmail4">Vegetable Name :</label>
      <select name="good" id="country" class="form-control" required>
                  <option value=""> Select Good Name :</option>
                  <?php 
                     include('database/dbcon.php');
                     $query= "select * from categories order by goodid ASC";
                     $result= mysqli_query($con,$query);
                     while ($row= mysqli_fetch_array($result)) { ?>
                  <option value="<?php echo $row['goods']; ?>"><?php echo $row['goods'] ?></option>
                  <?php } ?>
               </select></div>
<div class="col-sm-4" style="padding:15px;">
      <label for="inputEmail4">Vegetable Age :</label>
      <input type="age" name="age" class="form-control" id="inputnumber" placeholder="Good Age" required>
</div>
<div class="col-sm-2" style="padding:15px;">
</div>

<div class="col-sm-2" style="padding:15px;">
</div>
<div class="col-sm-4" style="padding:15px;">
      <label for="inputEmail4">Quantity :</label>
      <input type="quantity" name="quantity" class="form-control" id="inputnumber" placeholder="Quantity per Kg" required>
</div>
<div class="col-sm-4" style="padding:15px;">
      <label for="inputEmail4">Excepted Price :</label>
      <input type="price" name="price" class="form-control" id="inputnumber" placeholder="Excepted Price per Kg" required>
</div>
<div class="col-sm-2" style="padding:15px;">
</div>

<div class="col-sm-2" style="padding:15px;">
</div>
<div class="col-sm-8" style="padding:15px;">
      <label for="inputEmail4">Vegetable Information :</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" placeholder="Good Information" required></textarea>
</div>
<div class="col-sm-2" style="padding:15px;">
</div>

<div class="col-sm-2" style="padding:5px;">
</div>
<div class="col-sm-8" style="padding:5px;">
<p style="font-family:Serif;color:gray;text-align:left;font-size:15px">Click on the "Choose File" button to upload a photo of the good :</p>
<input type="file" id="myFile" name="image" required>
</div>
<div class="col-sm-2" style="padding:5px;">
</div>

<div class="col-sm-6" style="padding:5px;">
</div>
<div class="col-sm-1" style="padding:5px;">
<button type="submit" name="submit" class="btn btn-outline-primary">Submit</button>
</div>
<div class="col-sm-5" style="padding:5px;">
</div>
</div>
</form>
</div>

<?php
include'database/dbcon.php';
if(isset($_POST['submit']))
{
date_default_timezone_set("Asia/Calcutta");
$good=mysqli_real_escape_string($con, $_POST['good']);
$age = mysqli_real_escape_string($con, $_POST['age']);
$quantity = mysqli_real_escape_string($con, $_POST['quantity']);
$epu = mysqli_real_escape_string($con, $_POST['price']);
$description = mysqli_real_escape_string($con, $_POST['description']);
$file=$_FILES['image'];
$rand = rand(1000000,9999999);
$loginid=$_SESSION['loginid'];
$date = date("Y-m-d");
$time= date("h:i:sa");
$total= $epu * ($quantity*100);
$filename = $file['name'];
      $filepath = $file['tmp_name'];
      $fileerror = $file['error'];
      if($fileerror == 0){
        $destfile = 'goods/'.$filename;
        move_uploaded_file($filepath, $destfile);
        $insertquery = "insert into sell(Lid,goodid,age,product,quantity,epu,image,description,total,date,time,sellstatus) values('$loginid','$rand','$age','$good','$quantity','$epu','$destfile','$description','$total','$date','$time','Pending')";
        $res = mysqli_query($con,$insertquery);

        $emailquery =" select * from signup where loginid ='$loginid' and status='Active' ";
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
              $subject = "Farmagri Sell conformation";
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
                      <h2>Thank you for selling Your Goods through our company</h2>
                      <div id='page-wrap'>
                      <p id='header'>Good ID : $rand</p>
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
                      </table>
                   </div><br>
                   <table id='items'>
                   <tr>
                       <th class='py-3 text-black'>Product</th>
                       <th class='py-3 text-black'>Quantity</th>
                       <th class='py-3 text-black'>Price</th>
                       <th class='py-3 text-black'>Total</th>
                   </tr>

                 <tr class='item-row'>
                 <td class='cost py-3 text-black'><p>$good</p></td>
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
                    <p class='py-3 text-black'>If you want to update or delete sell detalis Click Here
                    http://localhost/Farmagri/uhistory.php  </p>
                  </div>
                  </div>   
                  </div>
                  </body>
                  </html>";
                  $sender_email ="From: farmagrimitaoe@gmail.com";
                
                  if(mail($email, $subject, $message,$headers, $sender_email)){
                ?>
              <script>
                alert(" Information Stored ");
                header('location:sell.php');
              </script>
              <?php
              }else{
                echo "Email not send";
             }
                            
              $to_email = "supprot.farmagri@gmail.com";
              $subject = "Some one place sell order";
              $body = "User $username Registration ID $loginid And Good Id $rand has place sell order for his goods i.e $good of Quantity $quantity Quintal at price of $epu Rs/kg  ";
              $headers = "From: farmagrimitaoe@gmail.com";

              if (mail($to_email, $subject, $body, $headers)) {
                 
              } else {
                 
              }
            }
      }}

