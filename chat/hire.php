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
    <title></title>
  </head>
  <body>
      <?php include('profile_details.php'); ?>
    <div class="unavailable">
      <h1>service unavailable <br> page still under development</h1>
    </div>
  </body>
</html>
