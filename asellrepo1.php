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
      /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
      .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: whitesmoke;
      height: 735px;
    }
    h4 {text-align: center;
        font-size: 20px;}
        h5 {
        font-size: 20px;}

    p{text-align: center;
        font-size: 15px;}
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
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
border-bottom: 5px solid rgb(11, 10, 10);
top: 10%;
left: 0;
z-index: 1;
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
#meta td.meta-head { text-align: left; background: gray; }
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
<div class="content" style=" padding: 4px 4px;margin :10px;">

      <div class="row">
        <div class="col-sm-12">
          <div class="well" style="height:567px;">
         
        <?php
    include'database/dbcon.php';
    if(isset($_POST['submit']))
{
date_default_timezone_set("Asia/Calcutta");
$date = mysqli_real_escape_string($con, $_POST['date']);
$date1 = mysqli_real_escape_string($con, $_POST['date1']);
$report = mysqli_real_escape_string($con, $_POST['report']);
        ?>
                <h1>Sell Report From Date <?php echo $date?> To <?php echo $date1 ?>.</h1>
                <p class = "divider-text"></p>
<br>
          <table id="meta">
                <tr>
                        <td class="meta-head py-3 text-black" >From Date :</td>
                        <td><div class="due py-3 text-black" ><?php echo $date;?></div></td>
                    </tr>
                    <tr>
                        <td class="meta-head py-3 text-black" >To Date :</td>
                        <td><div class="due py-3 text-black" ><?php echo $date1;?></div></td>
                    </tr>
                </table><br><br><br>




             <?php if($report=='Farmagri'){
              ?>
              
    <table id="items">
            
            <tr>
                <th class="py-3 text-black">Good Name : </th>
                <th class="py-3 text-black">Price : </th>
                <th class="py-3 text-black">Quantity : </th>
                <th class="py-3 text-black">Total : </th>
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
        
    <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['product'];?>.</div></td>
            <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['epu'];?> Rs.</div></td>
            <td class="total-value py-3 text-black"><div id="subtotal"><?php echo  $result2['quantity']?> Quintal.</div></td>
            <td class="total-value py-3 text-black"><div id="subtotal"><?php echo $result2['total'];?> Rs.</div></td>
    </tr>


<?php } 
           ?>
<tr>
                <th class="py-3 text-black"></th>
                <th class="py-3 text-black"></th>
                <th class="py-3 text-black">Total Quantity : <?php echo  $result['quanity'];?> Quintal.</th>
                <th class="py-3 text-black">
                Total Cost : <?php echo  $result['toal'];?> Rs.</th>
            </tr>
        </table><br>


        <?php }else{ ?>

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
                <th class="py-3 text-black"></th>
                <th class="py-3 text-black"></th>
                <th class="py-3 text-black">Total Cost : <?php echo  $result['toal'];?> Rs.</th>
                <th class="py-3 text-black">Total Product Quantity : <?php echo  $result['quanity'];?>.</th>
                <th class="py-3 text-black">
                Total Cost after Discount : <?php echo $tot;?> Rs.</th>
            </tr>
        </table><br>


<?php } ?>

        
<?php }
?>





            <div class="row">
    <div class="col-sm-5">
  </div>
  <div class="col-sm-2">
  <a href="asellrepo2.php?date=<?php echo $date?>&&date1=<?php echo $date1?>&&report=<?php echo $report?>"><button class="btn btn-warning" style="padding: 10px 30px;">Print</button></a>
  </div>
  </div>

           
        
      </div>
   
    </div>
  </div>
</div>

        </div>




    