<?php
session_start();
if(!isset($_SESSION['loginid'])){
    echo "You are logged out";
    header('location:ulogin.php');
  }
  ?>

<html>
<head>
<title>Farmagri</title>   
    <link rel="icon" href="image/Agriculture _crop.png" />
    </head>
        <?php include 'link/link.php'?>
            <style>	
            .divider-text1{
    position: relative;
    text-align: center;
    margin-top: 5px;
    margin-bottom: 5px;
    padding : 5px;

    }
    .divider-text1::after{
    content: "";
    position: absolute;
    width: 100%;
    border-bottom: 2px solid rgb(11, 10, 10);
    top: 55%;
    left: 0;
    z-index: 1;
    }
    .divider-text{
    position: relative;
    text-align: center;
    margin-top: 5px;
    margin-bottom: 5px;
    padding : 0px;

    }
    .divider-text::after{
    content: "";
    position: absolute;
    width: 100%;
    align-items: center;
    border-bottom: 3px solid rgb(11, 10, 10);
    top: 10%;
    left: 0;
    z-index: 1;
    }
    .content {
        max-width: 80%;
        margin:auto;
        padding: 10px;
        border: 3px solid rgb(12, 11, 11);
        }
        .content1 {
        max-width: 70%;
        padding: 20px;
        border: 5px solid rgb(12, 11, 11);
        }
        h1{
            text-align: center;
            font-size: 20px;
            color:rgb(10, 6, 10);
            }
            p{
            text-align: center;
            font-size: 15px;
            color:rgb(10, 6, 10);
            }
            .p1{
            text-align: left;
            font-size: 18px;
            color:rgb(10, 6, 10);
            }
            .table {
                width: 100%;
                margin-bottom: 20px;
            }	
            table td, table th { border: 1px solid black; padding: 5px; }
            #meta { margin-top: 1px; width: 300px; float: right; }
    #meta td { text-align: right;  }
    #meta td.meta-head { text-align: left; background: #eee; }
    #meta td textarea { width: 100%; height: 10px; text-align: center; }

    #items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
    #items th { background: #eee; }
    #items textarea { width: 80px; height: 10px; }
    #items tr.item-row td { border: 1px solid black; vertical-align: top; }
    #items td.description { width: 300px; }
    #items td.item-name { width: 175px; }
    #items td.description textarea, #items td.item-name textarea { width: 100%; }
    #items td.total-line { border-right: 0; text-align: right; }
    #items td.total-value { border-left: 0; padding: 10px; }
    #items td.total-value textarea { height: 10px; background: none; }
    #items td.balance { background: #eee; }
    #items td.blank { border: 0; }

            @media print{
                #print {
                    display:none;
                }
            }
            @media print {
                #PrintButton {
                    display: none;
                }
            }
            
            @page {
                size: auto;   /* auto is the initial value */
                margin: 0;  /* this affects the margin in the printer settings */
            }
        </style>
        </head>
    <body style="display: flex;">
        <br> <br>
        &nbsp;&nbsp;&nbsp;<a href="uhistory.php"><button class="btn btn-outline-success"  style="float: left;padding:10px;">Back</button></a>  

        <div class="content">
        <div class="row" style="padding:px;">
        <div class="col-sm-8" style="padding:5px;">
    <p style="font-family:Serif;color:black;text-align:left;font-size:20px;padding:10px;">Farmagri </p>
    <p1  style="padding:10px;">Mit Academy of Engineering Alandi.</p1><br>
    <p1  style="padding:10px;">410120 Pune Maharashtra.</p1><br>
    <p1  style="padding:10px;">Mobile : 9421017990.</p1><br>
    <p1  style="padding:10px;">Email : farmagrimitaoe@gmail.com.</a></p1>
            </div>
        <div class="col-sm-4" style="padding:8px;">
        <img id="image" src="image/Agriculture _crop.png" alt="logo" style="width: 150px; height: 100% ;padding:10px" />
        </div>
    </div>
    <p class = "divider-text"></p>

            <?php
        include'database/dbcon.php';
        if(isset($_GET['gid'])){
            include'database/dbcon.php';
            $rep = $_GET['gid'];
            $loginid=$_SESSION['loginid'];
        
            ?>


    <?php
        
        $selectquery1 = "SELECT * FROM  signup WHERE loginid='$loginid' ";
        $query= mysqli_query($con,$selectquery1);
        $emailcount = mysqli_num_rows($query);
            $userdata = mysqli_fetch_assoc($query);
            $name = $userdata['name'];
            $address1 = $userdata['address'];
            $mobile1 = $userdata['mobile'];
            $state1 = $userdata['state'];
            $zip1 = $userdata['pincode'];
            $email1 = $userdata['email'];
            $city1 = $userdata['city'];
            ?>

    <div class="row" style="padding:px;">
        <div class="col-sm-7" style="padding:10px;">
    <p1  style="padding:10px;">Farmer Name : <?php echo $name;?>.</p1><br>
    <p1  style="padding:10px;">Address : <?php echo $address1;?>.</p1><br>
    <p1  style="padding:10px;"><?php echo $zip1;?> <?php echo $city1;?> <?php echo $state1;?>.</p1><br>
    <p1  style="padding:10px;">Mobile : <?php echo $mobile1;?>.</p1><br>
    <p1  style="padding:10px;">Email : <a href=""> <?php echo $email1;?>.</a></p1>
            </div>
            <div class="col-sm-2" style="padding:10px;"> </div>
        <div class="col-sm-3" style="padding:10px;">

        <?php
        $selectquery1 = "SELECT * FROM  sell WHERE goodid='$rep' and Lid='$loginid' group by goodid ";
        $query= mysqli_query($con,$selectquery1);
        $emailcount = mysqli_num_rows($query);
            $userdata = mysqli_fetch_assoc($query);
            $date = $userdata['date'];
            $time = $userdata['time'];
            ?>
                    <table id="meta">
                    <tr>
                            <td class="meta-head py-2 text-black" >Sell Date :</td>
                            <td><div class="due py-2 text-black" ><?php echo $date;?></div></td>
                        </tr>
                        <tr>
                            <td class="meta-head py-2 text-black" >Sell Time :</td>
                            <td><div class="due py-2 text-black" ><?php echo $time;?></div></td>
                        </tr>
                    </table>
        </div>
    </div>
    <div class="row" style="padding:px;">
        <div class="col-sm-12" style="padding:10px;">
        <table id="items">
                
                <tr>
                    <th class="py-3 text-black">Good Name</th>
                    <th class="py-3 text-black">Quantity</th>
                    <th class="py-3 text-black">Price</th>
                    <th class="py-3 text-black">Total</th>
                </tr>

                <?php
        $selectquery2 = "SELECT * FROM sell  where Lid='$loginid' and goodid='$rep'";
        $query2 = mysqli_query($con,$selectquery2);
        while($result2 =mysqli_fetch_array($query2))
            {
            ?>
        <tr class="item-row">
            
        <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['product'];;?>.</div></td>
        <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['quantity'];;?> Qunital.</div></td>
                <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['epu'];;?> Rs/Kg.</div></td>
                <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['total'];;?> Rs.</div></td>
        </tr>
        
                <tr>
                    <td colspan="2" class="total-line py-3 text-black">Sub Total :</td>
                    <td class="total-value py-3 text-black"><div id="subtotal"></div></td>
                    <td colspan="1" class="total-value py-3 text-black"><div id="subtotal"><?php echo  $result2['total']; ?> Rs. </td>

                </tr>
                <tr>
                    <td colspan="2" class="total-line py-3 text-black">Total :</td>
                    <td class="total-value py-3 text-black"><div id="subtotal"></div></td>
                    <td colspan="1" class="total-value py-3 text-black"><div id="subtotal"><?php echo  $result2['total'];?> Rs. </td>

                </tr>
                
                
        <?php
        
    }
        ?>
                </table>
        </div>   
    </div> 
            </div>
    
    <?php
        }

        if(isset($_GET['fetid'])){
            include'database/dbcon.php';
            $rep = $_GET['fetid'];
            $loginid=$_SESSION['loginid'];
        
            ?>


    <?php
        
        $selectquery1 = "SELECT * FROM  signup WHERE loginid='$loginid' ";
        $query= mysqli_query($con,$selectquery1);
        $emailcount = mysqli_num_rows($query);
            $userdata = mysqli_fetch_assoc($query);
            $name = $userdata['name'];
            $address1 = $userdata['address'];
            $mobile1 = $userdata['mobile'];
            $state1 = $userdata['state'];
            $zip1 = $userdata['pincode'];
            $email1 = $userdata['email'];
            $city1 = $userdata['city'];
            ?>

    <div class="row" style="padding:px;">
        <div class="col-sm-7" style="padding:10px;">
    <p1  style="padding:10px;">Customer Name : <?php echo $name;?>.</p1><br>
    <p1  style="padding:10px;">Address : <?php echo $address1;?>.</p1><br>
    <p1  style="padding:10px;"><?php echo $zip1;?> <?php echo $city1;?> <?php echo $state1;?>.</p1><br>
    <p1  style="padding:10px;">Mobile : <?php echo $mobile1;?>.</p1><br>
    <p1  style="padding:10px;">Email : <?php echo $email1;?>.</p1><br>
    <p1 style="padding:10px;">Order ID : <?php echo $rep;?>.</p1>
            </div>
            <div class="col-sm-2" style="padding:10px;"> </div>
        <div class="col-sm-3" style="padding:10px;">

        <?php
        $selectquery1 = "SELECT * FROM  order1 WHERE orderid='$rep' group by orderid ";
        $query= mysqli_query($con,$selectquery1);
        $emailcount = mysqli_num_rows($query);
            $userdata = mysqli_fetch_assoc($query);
            $date = $userdata['date'];
            $time = $userdata['time'];
            ?>
                    <table id="meta">
                    <tr>
                            <td class="meta-head py-2 text-black" >Date :</td>
                            <td><div class="due py-2 text-black" ><?php echo $date;?></div></td>
                        </tr>
                        <tr>
                            <td class="meta-head py-2 text-black" >Time :</td>
                            <td><div class="due py-2 text-black" ><?php echo $time;?></div></td>
                        </tr>
                    </table>
        </div>
    </div>
    <div class="row" style="padding:px;">
        <div class="col-sm-12" style="padding:10px;">
        <table id="items">
                
                <tr>
                    <th class="py-3 text-black">Fetilizer Name</th>
                    <th class="py-3 text-black">Quantity</th>
                    <th class="py-3 text-black">Price</th>
                    <th class="py-3 text-black">Total</th>
                </tr>

                <?php
                $sum = "SELECT SUM(total) as total,discount FROM order1 where orderid='$rep' and loginid='$loginid'";
                $sum1 = mysqli_query($con,$sum);
                $resul =mysqli_fetch_array($sum1);
                $total=$resul['total'];
                $d= $resul['discount'];
                $dis=$total - $resul['discount'];
                $dt=$d*100/$total;

        $selectquery2 = "SELECT * FROM order1  where loginid='$loginid' and orderid='$rep'";
        $query2 = mysqli_query($con,$selectquery2);
        while($result2 =mysqli_fetch_array($query2))
            {
            ?>
        <tr class="item-row">
            
        <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['fname'];;?>.</div></td>
        <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['quantity'];;?>.</div></td>
                <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['price'];;?> Rs.</div></td>
                <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['total'];;?> Rs.</div></td>
        </tr> 
        <?php
    }?>
    <tr>
                    <td colspan="2" class="total-line py-3 text-black">Sub Total :</td>
                    <td class="total-value py-3 text-black"><div id="subtotal"></div></td>
                    <td colspan="1" class="total-value py-3 text-black"><div id="subtotal"><?php echo  $total; ?> Rs. </td>

                </tr>
                <tr>
                    <td colspan="2" class="total-line py-3 text-black">Discount <?php echo  $dt; ?>% :</td>
                    <td class="total-value py-3 text-black"><div id="subtotal"></div></td>
                    <td colspan="1" class="total-value py-3 text-black"><div id="subtotal"><?php echo  $d; ?> Rs. </td>

                </tr>
                <tr>
                    <td colspan="2" class="total-line py-3 text-black">Total :</td>
                    <td class="total-value py-3 text-black"><div id="subtotal"></div></td>
                    <td colspan="1" class="total-value py-3 text-black"><div id="subtotal"><?php echo  $dis;?> Rs. </td>

                </tr>

                </table>
        </div>   
    </div> 
            </div>
    
    <?php
        }

        if(isset($_GET['goid'])){
            include'database/dbcon.php';
            $rep = $_GET['goid'];
            $loginid=$_SESSION['loginid'];
        
            ?>


    <?php
        
        $selectquery1 = "SELECT * FROM  signup WHERE loginid='$loginid' ";
        $query= mysqli_query($con,$selectquery1);
        $emailcount = mysqli_num_rows($query);
            $userdata = mysqli_fetch_assoc($query);
            $name = $userdata['name'];
            $address1 = $userdata['address'];
            $mobile1 = $userdata['mobile'];
            $state1 = $userdata['state'];
            $zip1 = $userdata['pincode'];
            $email1 = $userdata['email'];
            $city1 = $userdata['city'];
            ?>

    <div class="row" style="padding:px;">
        <div class="col-sm-7" style="padding:10px;">
    <p1  style="padding:10px;">Name : <?php echo $name;?>.</p1><br>
    <p1  style="padding:10px;">Address : <?php echo $address1;?>.</p1><br>
    <p1  style="padding:10px;"><?php echo $zip1;?> <?php echo $city1;?> <?php echo $state1;?>.</p1><br>
    <p1  style="padding:10px;">Mobile : <?php echo $mobile1;?>.</p1><br>
    <p1  style="padding:10px;">Email : <?php echo $email1;?>.</p1>
            </div>
            <div class="col-sm-2" style="padding:10px;"> </div>
        <div class="col-sm-3" style="padding:10px;">

        <?php
        $selectquery1 = "SELECT * FROM  sold WHERE goodid='$rep' and buyer ='$loginid'group by goodid ";
        $query= mysqli_query($con,$selectquery1);
        $emailcount = mysqli_num_rows($query);
            $userdata = mysqli_fetch_assoc($query);
            $date = $userdata['date'];
            $time = $userdata['time'];
            ?>
                    <table id="meta">
                    <tr>
                            <td class="meta-head py-2 text-black" >Date :</td>
                            <td><div class="due py-2 text-black" ><?php echo $date;?></div></td>
                        </tr>
                        <tr>
                            <td class="meta-head py-2 text-black" >Time :</td>
                            <td><div class="due py-2 text-black" ><?php echo $time;?></div></td>
                        </tr>
                    </table>
        </div>
    </div>
    <div class="row" style="padding:px;">
        <div class="col-sm-12" style="padding:10px;">
        <table id="items">
                
                <tr>
                    <th class="py-3 text-black">Good Name</th>
                    <th class="py-3 text-black">Quantity</th>
                    <th class="py-3 text-black">Offer Price</th>
                    <th class="py-3 text-black">Total</th>
                </tr>

                <?php
        $selectquery2 = "SELECT * FROM sell inner join buyer on buyer.goodid=sell.goodid  where buyer='$loginid' and buyer.goodid='$rep' and sellstatus='Sold' " ;
        $query2 = mysqli_query($con,$selectquery2);
        while($result2 =mysqli_fetch_array($query2))
            {
                $total= $result2['quantity'] *100 * $result2['price'];
            ?>
        <tr class="item-row">
            
        <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['product'];;?>.</div></td>
        <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['quantity'];;?> Qunital.</div></td>
                <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['price'];;?> Rs/Kg.</div></td>
                <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $total;?> Rs.</div></td>
        </tr>
        
                <tr>
                    <td colspan="2" class="total-line py-3 text-black">Farmer Price :</td>
                    <td class="total-value py-3 text-black"><div id="subtotal"></div></td>
                    <td colspan="1" class="total-value py-3 text-black"><div id="subtotal"><?php echo  $result2['total']; ?> Rs. </td>

                </tr>
                <tr>
                    <td colspan="2" class="total-line py-3 text-black">Your Price :</td>
                    <td class="total-value py-3 text-black"><div id="subtotal"></div></td>
                    <td colspan="1" class="total-value py-3 text-black"><div id="subtotal"><?php echo  $total;?> Rs. </td>

                </tr>
                
                
        <?php
        
    }
        ?>
                </table>
        </div>   
    </div> 
            </div>
    
    <?php
        }

        ?>

    </body>

    <script type="text/javascript">
            function PrintPage() {
                window.print();
            }
            document.loaded = function(){
                
            }
            window.addEventListener('DOMContentLoaded', (event) => {
                PrintPage()
                setTimeout(function(){ window.close() },750)
            });
        </script>
        <script type="text/javascript">
            document.getElementById("back").onclick = function () {
                location.href = "uhistroy.php";
            };
            </script>

</html>
