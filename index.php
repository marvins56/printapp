<?php
  session_start();
  if(isset($_SESSION['unique_id'])){
  header("location: chat/page1.php");
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>uprint:: App</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="Scripts/jquery.SplashScreen.js"></script>
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
   <link rel="stylesheet" href="css/styling1.css">
  </head>
  <script>(function(d){var s = d.createElement("script");s.setAttribute("data-account", "ohASbIuXm1");s.setAttribute("src", "https://cdn.userway.org/widget.js");(d.body || d.head).appendChild(s);})(document)</script><noscript>Please ensure Javascript is enabled for purposes of <a href="https://userway.org">website accessibility</a></noscript>
  <body>
    <!-- Loader 1 -->
   <div class="loader">
     <div class="circle"></div>
     <div class="circle"></div>

   </div>

   <section class="main">
     <img src="images/logo.jpg" alt="">
     <h5>Uprint..</h5>
     <p>
       <em>
          We deliver tomorrow today.<br>
                <br>
  </em>
     </p>
     <a href="web/index.php" class="btn">GET STARTED</a>

   </section>

   <script type="text/javascript">
   const loader = document.querySelector('.loader');
const main = document.querySelector('.main');
function init() {
setTimeout(() => {
  loader.style.opacity = 0;
  loader.style.display = 'none';

  main.style.display = 'block';
  setTimeout(() => (main.style.opacity = 1), 50);
}, 4000);
}

init();

   </script>
  </body>
</html>
