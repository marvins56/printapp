<link rel="stylesheet" href="../css/profile.css">
<link rel="stylesheet" href="../css/fab.css">

<header>
    
      <div class="header_container">
            <div class="cont1">
              <?php
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql) > 0){
                  $row = mysqli_fetch_assoc($sql);
                }
              ?>
            <a href="user_account.php">  <img src="php/images/<?php echo $row['img']; ?>" alt=""></a>
              <br>
                <span class="profile"><?php echo $row['fname']. " " . $row['lname'] ?></span>
                  <span class="profile"><?php echo $row['status']; ?></span>
                                </div>

            </div>
            <div class="wrapper">
                    <div class="button">
                      <div class="icon"> <a href="#" target="_blank"><i class="fas fa-bells"></i></a></div>
                      <span>notfns</span>
                    </div>

                    <div class="button">
                      <div class="icon"> <a href="index.php" target="_blank"><i class="far fa-comments-alt"></i> </a></div>
                      <span>CHAT</span>
                    </div>

              </div>

</header>

<div >
  <menu class="open">

    <a href="index.php"class="action" title="chat with us and others"><i class="far fa-comments-alt"></i></a>
    <a href="page1.php" class="action"><i class="fas fa-home"></i></a>
      <a href="#" class="action"><i class="fab fa-facebook-square"></i></a>
    <a href="#" class="action" title="chat on whatsap"><i class="fab fa-whatsapp-square"></i></a>
    <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="action" title="logout"> <i class="fas fa-sign-out-alt"></i></a>
    <a href="#" class="trigger"><i class="fas fa-plus " ></i></a>
  </menu>
</div>
<script type="text/javascript">
  const trigger = document.querySelector("menu > .trigger");
    trigger.addEventListener('click', (e) => {
        e.currentTarget.parentElement.classList.toggle("open");
});
  </script>
