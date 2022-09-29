
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    .cols2-eror-success{
      width: 80%;
      margin: auto;
      margin-top: 3px;
    }
   .cols2-eror-success> span{
        align-content: center;
        justify-content: center;
    }

    </style>
  </head>
  <body>
    <div class="alert alert-danger  cols2 cols2-eror-success" role="alert">
  <span>    <?php include 'errors.php';
    ?></span>
    </div>

    <div class="alert alert-success  cols2 cols2-eror-success" role="alert">
    <span><?php
    include 'successes.php';?></span>
    </div>
    <script type="text/javascript">
    $(document).ready(function () {

    window.setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
            $(this).remove();
            
        });
    }, 5000);

    });

    </script>

  </body>
</html>
