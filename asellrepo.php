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


 <div class="row">
        <div class="col-sm-12">
          <div class="well" style="height: 565px;">
          <p style="font-family:Serif;color:black;text-align:center;font-size:22px">Genrate Sell Report :</p>
          <p class = "divider-text"></p>

<br><br><br><br>
          <form action ="asellrepo1.php" method ="POST" enctype ="multipart/form-data">
<div class="row">
<div class="col-sm-2">
  </div>
  <div class="form-group col-md-3">
        <label for="inputState">Select the Report :</label>
        <select name="report" id="inputState" class="form-control">
          <option >Select report</option>
          <option value="Farmagri">Farmagri</option>
          <option value="Fertilizer">Fertilizer</option>
        </select>
      </div>
    <div class="form-group col-sm-2">
      <label for="inputEmail4">From Date :</label>
      <input type="date" class="form-control" id="inputEmail4" name="date" placeholder="Categoreis" required>
    </div>
    <div class="form-group col-sm-2">
      <label for="inputEmail4">To Date :</label>
      <input type="date" class="form-control" id="inputEmail4" name="date1" placeholder="Categoreis" required>
    </div>
  </div>
 <br><br>
  
  <div class="row">
    <div class="col-sm-5">
  </div>
  <div class="col-sm-2">
  <button type="submit" name="submit" class="btn btn-primary" style="padding: 10px 60px;">Submit</button>
  </div>
  </div>
</form>
</div>
