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
    </style>
<div class="content" style=" padding: 4px 4px;margin :10px;">

<div class="header">
<div class="row">
        <div class="col-sm-2">
          <div class="form-container3">
          <h3 style="font-family:Serif;color:black;text-align:center;font-size:20px">User</h3>
            <?php 
                        $sql = "SELECT * FROM signup where status='Active'  ";
                        $res = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($res);
                    ?>
                    <h3 style="font-family:Serif;color:black;text-align:center;font-size:20px"><?php echo $count; ?></h3> 
            
          </div>
        </div>
         <div class="col-sm-2">
         <div class="form-container3">
          <h3 style="font-family:Serif;color:black;text-align:center;font-size:20px">Farmer</h3> 
            <?php 
                        $sql = "SELECT SUBSTRING(loginid, 1, 2) AS loginid FROM signup WHERE SUBSTRING(loginid, 1, 2) ='FM' and status='Active'";
                        $res = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($res);
                    ?>
                    <h3 style="font-family:Serif;color:black;text-align:center;font-size:20px"><?php echo $count; ?></h3> 
          </div>
        </div>
        <div class="col-sm-2">
        <div class="form-container3">
          <h3 style="font-family:Serif;color:black;text-align:center;font-size:20px">Industrialist</h3> 
            <?php 
            $sql = "SELECT SUBSTRING(loginid, 1, 2) AS loginid FROM signup WHERE SUBSTRING(loginid, 1, 2) ='IN' and status='Active'";
                        $res = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($res);
                    ?>
                    <h3 style="font-family:Serif;color:black;text-align:center;font-size:20px"><?php echo $count; ?></h3> 
          </div>
        </div>
        <div class="col-sm-2">
        <div class="form-container3">
          <h3 style="font-family:Serif;color:black;text-align:center;font-size:20px">Current Sell order</h3> 
            <?php 
                        $sql = "SELECT * FROM sell where sellstatus='Pending'";
                        $res = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($res);
                    ?>
                    <h3 style="font-family:Serif;color:black;text-align:center;font-size:20px"><?php echo $count; ?></h3> 
          </div>
        </div>
        <div class="col-sm-2">
        <div class="form-container3">
          <h3 style="font-family:Serif;color:black;text-align:center;font-size:20px">Buyer Order</h3> 
            <?php 
                        $sql = "SELECT * FROM buyer";
                        $res = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($res);
                    ?>
                    <h3 style="font-family:Serif;color:black;text-align:center;font-size:20px"><?php echo $count; ?></h3> 
          </div>
        </div>
        <div class="col-sm-2">
        <div class="form-container3">
        <h3 style="font-family:Serif;color:black;text-align:center;font-size:20px">Total sell Order</h3> 
            <?php 
                        $sql = "SELECT * FROM sell ";
                        $res = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($res);
                    ?>

<h3 style="font-family:Serif;color:black;text-align:center;font-size:20px"><?php echo $count; ?></h3> 
          </div>
        </div>
      </div>
      </div>

      <div class="row" style="padding:10px;">
        <div class="col-sm-4" style="padding:10px;">
          <div class="form-container3">
          <h3 style="font-family:Serif;color:black;text-align:left;font-size:25px">Total User :</h3> 
          <?php include'database/dbcon.php'?>
          <?php 
                        $sql = "SELECT SUBSTRING(loginid, 1, 2) AS loginid FROM signup WHERE SUBSTRING(loginid, 1, 2) ='IN' and status='Active'";
                        $res = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($res);
                        $sql = "SELECT SUBSTRING(loginid, 1, 2) AS loginid FROM signup WHERE SUBSTRING(loginid, 1, 2) ='FM' and status='Active'";
                        $res = mysqli_query($con, $sql);
                        $count2 = mysqli_num_rows($res);
                        $sql = "SELECT loginid FROM signup where loginid <> 'Null' and status = 'Active'";
                        $res = mysqli_query($con, $sql);
                        $count1 = mysqli_num_rows($res);
                    ?>
<div id="piechart"></div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['User', 'Count User'],
  ['Farmer',  <?php echo $count2; ?>],
  ['Industrialist', <?php echo $count; ?>]
 
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Total Farmer And Industrialist', 'width':375, 'height':390};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>



          </div>
      </div>
    
        <div class="col-sm-8" style="padding:10px;">
          <div class="form-container3">
          <h3 style="font-family:Serif;color:black;text-align:left;font-size:25px">Monthly Sell :</h3> 

<?php 
      include'database/dbcon.php';
      date_default_timezone_set("Asia/Calcutta");
      $date = date("Y");

                        $sql = "SELECT date FROM sell where sellstatus<>'Cancel' and date between '$date-01-01' and '$date-01-31' group by goodid";
                        $res = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($res);

                        $sql1 = "SELECT date FROM sell where sellstatus<>'Cancel' and date between '$date-02-01' and '$date-02-31' group by goodid";
                        $res1 = mysqli_query($con, $sql1);
                        $count1 = mysqli_num_rows($res1);

                        $sql2 = "SELECT date FROM sell where sellstatus<>'Cancel' and date between '$date-03-01' and '$date-03-31' group by goodid";
                        $res2= mysqli_query($con, $sql2);
                        $count2 = mysqli_num_rows($res2);

                        $sql3 = "SELECT date FROM sell where sellstatus<>'Cancel' and date between '$date-04-01' and '$date-04-31' group by goodid";
                        $res3 = mysqli_query($con, $sql3);
                        $count3 = mysqli_num_rows($res3);

                        $sql4 = "SELECT date FROM sell where sellstatus<>'Cancel' and date between '$date-05-01' and '$date-05-31' group by goodid";
                        $res4 = mysqli_query($con, $sql4);
                        $count4 = mysqli_num_rows($res4);

                        $sql5 = "SELECT date FROM sell where sellstatus<>'Cancel' and date between '$date-06-01' and '$date-06-31' group by goodid";
                        $res5 = mysqli_query($con, $sql5);
                        $count5 = mysqli_num_rows($res5);

                        $sql6 = "SELECT date FROM sell where sellstatus<>'Cancel' and date between '$date-07-01' and '$date-07-31' group by goodid";
                        $res6 = mysqli_query($con, $sql6);
                        $count6 = mysqli_num_rows($res6);

                        $sql7 = "SELECT date FROM sell where sellstatus<>'Cancel' and date between '$date-08-01' and '$date-08-31' group by goodid";
                        $res7 = mysqli_query($con, $sql7);
                        $count7 = mysqli_num_rows($res7);

                        $sql8 = "SELECT date FROM sell where sellstatus<>'Cancel' and date between '$date-09-01' and '$date-09-31' group by goodid";
                        $res8 = mysqli_query($con, $sql8);
                        $count8 = mysqli_num_rows($res8);

                        $sql9 = "SELECT date FROM sell where sellstatus<>'Cancel' and date between '$date-10-01' and '$date-10-31' group by goodid";
                        $res9 = mysqli_query($con, $sql9);
                        $count9 = mysqli_num_rows($res9);

                        $sql10 = "SELECT date FROM sell where sellstatus<>'Cancel' and date between '$date-11-01' and '$date-11-31' group by goodid";
                        $res10 = mysqli_query($con, $sql10);
                        $count10 = mysqli_num_rows($res10);

                        $sql11 = "SELECT date FROM sell where sellstatus<>'Cancel' and date between '$date-12-01' and '$date-12-31' group by goodid";
                        $res11 = mysqli_query($con, $sql11);
                        $count11 = mysqli_num_rows($res11);
                    ?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <div id="chart_div">
  <script type="text/javascript">

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawStacked);

function drawStacked() {
    var data = google.visualization.arrayToDataTable([
         ['Element', 'Total Order', { role: 'style' }],
         ['January', <?php echo $count?>, 'Red'],            // RGB value
         ['February', <?php echo $count1?>, 'dark yellow'],            // English color name
         ['March', <?php echo $count2?>, 'green'],

       ['April', <?php echo $count3?>, 'dark red' ],
         ['May',<?php echo $count4?>, 'silver'],            // English color name
         ['June', <?php echo $count5?>, 'purple'],

       ['July', <?php echo $count6?>, 'Russet' ],
       ['August', <?php echo $count7?>, 'Orange'],            // RGB value
         ['September', <?php echo $count8?>, 'Dark blue'],            // English color name
         ['October', <?php echo $count9?>, 'Pink'],

       ['November', <?php echo $count10?>, 'Yellow' ],
       ['December', <?php echo $count11?>, 'Blue' ], // CSS-style declaration
      ]);

     
      var options = {'title':'Monthly Sell Order Of year <?php echo $date?>', 'width':800, 'height':390};
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
    
    </script>

          </div>


          </div>
      </div>
      </div>




    </div>
</div>
</div>

</body>
</html>