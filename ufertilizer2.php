<?php
session_start();
if(!isset($_SESSION['loginid'])){
    echo "You are logged out";
    header('location:ulogin.php');
  }

include 'database/dbcon.php';
if(isset($_GET['fid']))
{
    date_default_timezone_set("Asia/Calcutta");
    $fid = $_GET['fid'];
    $loginid=$_SESSION['loginid'];
    $date = date("Y-m-d");
    $time= date("h:i:sa");
    if(isset($_POST['submit'])){
    $qty = mysqli_real_escape_string($con, $_POST['quantity']);
    $selectquery = "SELECT * FROM fertilizer where fetid='$fid'";
    $query1 = mysqli_query($con,$selectquery);
    $result1 =mysqli_fetch_array($query1);
    $p=$result1['price'];
    $t=$p * $qty;
    $insertquery ="insert into checkout(loginid,fetid,quantity,total,date,time) 
    values('$loginid','$fid','$qty','$t','$date','$time')";
    $iquery = mysqli_query($con, $insertquery);
    if($iquery)
    {
       ?>
       <script>
        alert("Add New Fertilizer Else Go to checkout");
       location.replace("ufertilizer1.php?id=<?php echo $fid?>");
       </script>
       <?php
   }
    }
}
if(isset($_GET['fid']) && isset($_GET['id']))
{
    date_default_timezone_set("Asia/Calcutta");
    $resid = $_GET['fid'];
    $foodid = $_GET['id'];
    if(isset($_POST['submit3'])){
        $selectquery = "SELECT * from checkout  where fetid='$resid' and loginid='$foodid'";
        $query1 = mysqli_query($con,$selectquery);
        $result1 =mysqli_fetch_array($query1);
        $qty = mysqli_real_escape_string($con, $_POST['quantity']);
        $price=$result1['total']/$result1['quantity']; 
        $total=$price*$qty;
    
        if($qty!=0){
        $updatequery = "update checkout set quantity='$qty', total='$total' where fetid='$resid' and loginid='$foodid' ";
        $query1 = mysqli_query($con, $updatequery);
        if($query1)
        {
           ?>
           <script>
           location.replace("ucheckout.php");
           </script>
           <?php
       }else{
           ?>
           <script>
             alert("Check Mail You have Recived Your Login ID")
           </script>
           <?php
       }}else{
       
        $updatequery = "delete from checkout where fetid='$resid' and loginid='$foodid' ";
        $query1 = mysqli_query($con, $updatequery);
        if($query1)
        {
           ?>
           <script>
           location.replace("ucheckout.php");
           </script>
           <?php
       }else{
           ?>
           <script>
             alert("Check Mail You have Recived Your Login ID")
           </script>
           <?php
       }
       }
    }
    if(isset($_POST['submit4'])){
        $selectquery = "SELECT * from checkout  where fetid='$resid' and loginid='$foodid'";
        $query1 = mysqli_query($con,$selectquery);
        $result1 =mysqli_fetch_array($query1);
        $price=$result1['total']/$result1['quantity']; 
        $qty = mysqli_real_escape_string($con, $_POST['quantity']);
        $total=$price*$qty;
    
        $emailquery =" select * from checkout where fetid='$resid' and loginid='$foodid' ";
        $query = mysqli_query($con, $emailquery);
        
        $emailcount = mysqli_num_rows($query);
        if($emailcount>0)
        {
            $updatequery = "update checkout set quantity='$qty', total='$total' where fetid='$resid' and loginid='$foodid' ";
            $query1 = mysqli_query($con, $updatequery);
        if($query1)
        {
           ?>
           <script>
           location.replace("ucheckout.php");
           </script>
           <?php
       }else{
           ?>
           <script>
             alert("Check Mail You have Recived Your Login ID")
           </script>
           <?php
       }}else{
        $insertquery ="insert into checkout(loginid,fetid,quantity,total,date,time) 
        values('$loginid','$fid','$qty','$t','$date','$time')";
     $iquery = mysqli_query($con, $insertquery);
     
     if($iquery)
     {
        ?>
        <script>
        location.replace("ucheckout.php");
        </script>
        <?php
    }else{
        ?>
        <script>
          alert("Check Mail You have Recived Your Login ID")
        </script>
        <?php
    }}
    }
}