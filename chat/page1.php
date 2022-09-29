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
    <title>uprint::all dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" >
  <link rel="stylesheet" href="../css/styling2.css">
  </head>
  <body>
    <!-- header section-->
  <?php include('profile_details.php'); ?>


<!-- hero section-->
<div class="head-h1">
<span> UPRINT</span>
</div>
<div class="images">
<img src="../images/print.gif" alt="">


</div>
<!-- end of hero section-->
    <!--  end of header section-->

    <!-- section 1-->
    <main>
      <div class="container1">
        <button class="cols">
          <span>  <a href="print.php">PRINT </a></span>
        </button >
        <button  class="cols">
<span><a href="scanning.php">SCANNING</a></span>
        </button >
        <button class="cols">
<span><a href="hire.php">HIRE DESIGNER</a></span>
        </button >
        <button class="cols" >
<span> <a href="../web/index.php">ABOUT US </a></span>
        </button >

      </div>



    </main>
<!-- SECTION 2 -- >

  </body>
</html>
