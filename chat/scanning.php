<?php
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");

  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uprint::all dashboard</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <link rel="stylesheet" href="../css/styling2.css">
    <title>Uprint:: scaning documents</title>
  </head>
  <body>
    <?php
    include('profile_details.php'); ?>
    <div class="head-h1">
    <span> UPRINT</span>
    </div>
    <div class="images">
    <img src="../images/print2.jpg" alt="">
    </div>

</div>
<!-- alert mesages-->

<form class="" method="post">
<div class="conatiner3">


          <div class="cols2">

          <div class="cols2">
<label for="pick_person"> NAME OF PEROSN PICKING DOCUMENT</label><br><br>
<input type="text" name="pick_person" value="KAUTA-MARVIN" readonly><br>
<br>
<label for="pick_person"> THEIR TEL:</label><br><br>
<input type="number" name="pick_person-number" value="0773603206" readonly><br>
          </div>
          <div class="cols2">
                <label for="picked_doc"> DESCRIBE UR DOCUMENTS FOR CLARITY</label><br><br>
                <textarea name="picked_doc" rows="3" cols="25"></textarea>
          </div>
          <div class="cols2"><br>
              <span> <em>Please make call the above number for pickups</em> </span>
          </div>
          </div>

      <div class="costs">
              <fieldset>
                <legend>fill in this</legend>
                    <div class="cols2">
                  <span>@PAGE COSTS ::200 shs.</span>
                    </div>
                    <div class="cols2">
                  <span>NUMBER OF COPIES TO PRODUCE:</span><input type="number" name="pages" onkeyup="mult(this.value)"> <span>Pages</span>
                    </div>
                    <div class="cols2">
            <span>TOTAL COST</span><input type="number" name="total"  id="total_costs"  readonly>
                    </div>
                    <div class="cols2">
                        <button type="button" name="submit">SUBMIT </button>
                    </div>
                </fieldset>
      </div>c

</div>
  </form>

  <script type="text/javascript">
  function mult(value) {
      var page_cost;
    page_cost = 200 * value;
    document.getElementById('total_costs').value = page_cost;
  }
</script>

  </body>
</html>
