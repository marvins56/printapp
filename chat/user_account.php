
<?php
session_start();

  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }

?>
s
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user_profile.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css	">
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css.css">
    <title>user profile</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card p-0">
                    <div class="card-image">
                      <?php
                        include_once "php/config.php";
                        $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                        if(mysqli_num_rows($sql) > 0){
                          $row = mysqli_fetch_assoc($sql);
                        }
                      ?>
                      <img src="php/images/<?php echo $row['img']; ?>" alt="">
                     </div>
                    <div class="card-content d-flex flex-column align-items-center">
                        <h4 class="pt-2"><?php echo $row['fname']. " " . $row['lname'] ?></h4>
                        <h5><?php echo $row['email']. " " . $row['email'] ?></h5>
                        <ul class="social-icons d-flex justify-content-center">
                            <li style="--i:1"> <a href="#"> <span class="fab fa-facebook"></span> </a> </li>
                            <li style="--i:2"> <a href="#"> <span class="fab fa-twitter"></span> </a> </li>
                            <li style="--i:3"> <a href="#"> <span class="fab fa-instagram"></span> </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


  </body>
</html>
