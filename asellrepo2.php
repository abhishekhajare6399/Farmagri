<?php
  include'database/dbcon.php';
if(isset($_GET['date']) && isset($_GET['date1']) && isset($_GET['report'])){
    $date = $_GET['date'];
    $date1 = $_GET['date1'];
    $report = $_GET['report'];
   ?>
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
        max-width: 70%;
        margin:auto;
        padding: 10px;
        border: 5px solid rgb(12, 11, 11);
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
            table td, table th { border: 1px solid black; padding: 10px; }
        #meta { margin-top: 1px; width: 300px; float: right; }
#meta td { text-align: right;  }
#meta td.meta-head { text-align: left; background: lightgray; }
#meta td textarea { width: 100%; height: 10px; text-align: center; }

#items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
#items th { background: gray; }
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
        &nbsp;&nbsp;&nbsp;<a href="asellrepo.php"><button class="btn btn-outline-success"  style="float: left;padding:10px;">Back</button></a>  

        <?php if($report=='Farmagri'){
              ?>


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

    <div class="row" style="padding:10px;">
    <h1>Vegetable Sell Report From Date <?php echo $date?> To <?php echo $date1 ?>.</h1>
        <div class="col-sm-7" style="padding:10px;">
            </div>
            <div class="col-sm-2" style="padding:10px;"> </div>
        <div class="col-sm-3" style="padding:10px;">
                    <table id="meta">
                    <tr>
                        <td class="meta-head py-3 text-black" >From Date :</td>
                        <td><div class="due py-3 text-black" ><?php echo $date;?></div></td>
                    </tr>
                    <tr>
                        <td class="meta-head py-3 text-black" >To Date :</td>
                        <td><div class="due py-3 text-black" ><?php echo $date1;?></div></td>
                    </tr>
                    </table>
        </div>
    </div>
    <div class="row" style="padding:px;">
        <div class="col-sm-12" style="padding:10px;">
        <table id="items">
                
                <tr>
                    <th class="py-3 text-black">Good Name</th>
                    <th class="py-3 text-black">Price</th>
                    <th class="py-3 text-black">Quantity</th>
                    <th class="py-3 text-black">Total</th>
                </tr>

                <?php
             include'database/dbcon.php';
      $selectquery2 = "SELECT * FROM sell WHERE date BETWEEN '$date' AND '$date1'  GROUP by goodid order by id";
      $query2 = mysqli_query($con,$selectquery2);
      while($result2 =mysqli_fetch_array($query2))
        {
           $id=$result2['goodid'];
           $selectquery = " SELECT sum(quantity) as quanity , sum(total) as toal from sell where date BETWEEN '$date' AND '$date1' ";
           $query= mysqli_query($con,$selectquery);
           $result =mysqli_fetch_array($query);
        ?>
        <tr class="item-row">
            
        <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['product'];;?>.</div></td>
        <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['epu'];;?> Rs.</div></td>
                <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['quantity'];;?> Qunital.</div></td>
                <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['total'];?> Rs.</div></td>
        </tr>  
        <?php
    }
        ?>
                <tr>
                    <td colspan="2" class="total-line py-3 text-black">Total Quantity :</td>
                    <td class="total-value py-3 text-black"><div id="subtotal"></div></td>
                    <td colspan="1" class="total-value py-3 text-black"><div id="subtotal"><?php echo  $result['quanity']; ?> Qunital. </td>

                </tr>
                <tr>
                    <td colspan="2" class="total-line py-3 text-black">Total Price :</td>
                    <td class="total-value py-3 text-black"><div id="subtotal"></div></td>
                    <td colspan="1" class="total-value py-3 text-black"><div id="subtotal"><?php echo $result['toal'];?> Rs. </td>

                </tr>
                
    
                </table>
        </div>   
    </div> 
            </div>
    
    <?php
        }else{
        ?>

<div class="content">
        <div class="row" style="padding:px;">
        <div class="col-sm-8" style="padding:5px;">
    <p style="font-family:Serif;color:black;text-align:left;font-size:20px;padding:10px;">Farmagri Agro </p>
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

    <div class="row" style="padding:10px;">
    <h1>Fertilizer Sell Report From Date <?php echo $date?> To <?php echo $date1 ?>.</h1>
        <div class="col-sm-7" style="padding:10px;">
            </div>
            <div class="col-sm-2" style="padding:10px;"> </div>
        <div class="col-sm-3" style="padding:10px;">
                    <table id="meta">
                    <tr>
                        <td class="meta-head py-3 text-black" >From Date :</td>
                        <td><div class="due py-3 text-black" ><?php echo $date;?></div></td>
                    </tr>
                    <tr>
                        <td class="meta-head py-3 text-black" >To Date :</td>
                        <td><div class="due py-3 text-black" ><?php echo $date1;?></div></td>
                    </tr>
                    </table>
        </div>
    </div>
    <div class="row" style="padding:px;">
        <div class="col-sm-12" style="padding:10px;">
        <table id="items">
            
            <tr>
                <th class="py-3 text-black">Date : </th>
                <th class="py-3 text-black">Fertilizer Name : </th>
                <th class="py-3 text-black">Price : </th>
                <th class="py-3 text-black">Quantity : </th>
                <th class="py-3 text-black">Total : </th>
            </tr>

            <?php
             include'database/dbcon.php';
      $selectquery2 = "SELECT * FROM order1 WHERE date BETWEEN '$date' AND '$date1'  order by cid";
      $query2 = mysqli_query($con,$selectquery2);
      while($result2 =mysqli_fetch_array($query2))
        {
           $id=$result2['orderid'];
           $selectquery = " SELECT sum(quantity) as quanity , sum(total) as toal from order1 where date BETWEEN '$date' AND '$date1' ";
           $query= mysqli_query($con,$selectquery);
           $result =mysqli_fetch_array($query);
           $selectquery1 = " SELECT sum(discount) as discount from order1 where date BETWEEN '$date' AND '$date1'   ";
           $query1= mysqli_query($con,$selectquery1);
           $result3 =mysqli_fetch_array($query1);
           $tot = $result['toal'] - $result3['discount'];
        ?>
    <tr class="item-row">
    <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['date'];?>.</div></td>
    <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['fname'];?>.</div></td>
            <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['price'];?> Rs.</div></td>
            <td class="total-value py-3 text-black"><div id="subtotal"><?php echo  $result2['quantity']?>.</div></td>
            <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['total'];?> Rs.</div></td>
    </tr>


<?php } 
           ?>
<tr>
                    <td colspan="3" class="total-line py-4 text-black">Total Product :</td>
                    <td class="total-value py-3 text-black"><div id="subtotal"></div></td>
                    <td colspan="1" class="total-value py-3 text-black"><div id="subtotal"><?php echo  $result['quanity'];?>. </td>

                </tr>
                <tr>
                    <td colspan="3" class="total-line py-4 text-black">Total Price :</td>
                    <td class="total-value py-3 text-black"><div id="subtotal"></div></td>
                    <td colspan="1" class="total-value py-3 text-black"><div id="subtotal"><?php echo  $result['toal'];?> Rs. </td>

                </tr>
                <tr>
                    <td colspan="3" class="total-line py-4 text-black">Total Price After Discount :</td>
                    <td class="total-value py-3 text-black"><div id="subtotal"></div></td>
                    <td colspan="1" class="total-value py-3 text-black"><div id="subtotal"><?php echo $tot;?> Rs. </td>

                </tr>
        </table><br>
        </div>   
    </div> 
            </div>






<?php
        }
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

