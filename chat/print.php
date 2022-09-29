<?php
  session_start();
  include "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }


$pages = "";
$total = "";
$doc_link = "";
$doc_type = "";
$delivery_method = "";
$handle_doc = "";
$phone_number = "";
$errors = array();
$success = array();

if(isset($_POST['payment'])){
$pages = $_POST['pages'];
$total = $_POST['total'];

$doc_link = mysqli_real_escape_string($conn,$_POST['doc_link']);
$doc_type= mysqli_real_escape_string($conn,$_POST['doc_type']);
$delivery_method= mysqli_real_escape_string($conn,$_POST['delivery_method']);
$handle_doc  = mysqli_real_escape_string($conn,$_POST['handle_doc']);
$phone_number = mysqli_real_escape_string($conn,$_POST['Phone']);

// checking for errors
        if(empty($pages) or $pages < 0){
                array_push($errors,"enter valid number");}

        if(empty($total)){
                array_push($errors,"enter number of pages");}
        if(empty($doc_link)){
                array_push($errors,"upload file and get link then proceed");}
        if(empty($doc_type)){
                array_push($errors,"please select document print type");}

        if(empty($delivery_method )){
                array_push($errors,"please select delivery_method" );}
        if(empty($handle_doc )){
                array_push($errors,"please describe how to print your documents" );}

                if(empty($phone_number) OR preg_match('/^[0-9]{10}+$/', $phone_number)){
                        array_push($errors,"INVAID PHONE FORMAT" );}

  if (count($errors) == 0) {
    /* decodeing the url from user to send it into
     database late we will decode it displayed by the admin */
//$encode_url = base64_decode($doc_link);
//echo $encode_url;
$querry = "INSERT INTO user_docs (pages,total,doc_link,doc_type,delivery_method,handle_doc,phone_number)
VALUES ('$pages','$total','$doc_link','$doc_type','$delivery_method','$handle_doc','$phone_number')";
$result = mysqli_query($conn,$querry);
if($result){

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
    if(mysqli_num_rows($sql) > 0){
      $row = mysqli_fetch_assoc($sql);
      // rave payment integration


    }
    //* Prepare our rave request
$request = [
    'tx_ref' => base64_encode(time()),
    'amount' => $total,
    'currency' => 'UGX',
    'payment_options' => 'Mobile Money',
    'redirect_url' => 'http://localhost/printapp/chat/processing.php',
    'customer' => [
        'email' => $row['email'],
        'name' => $row['fname']. " " . $row['lname']
    ],
    'meta' => [
        'price' => $totalS
    ],
    'customizations' => [
        'title' => 'uprint paments',
        'description' => 'PAYMENT FOR SERVICE OFFERED'
    ]
];

//* Ca;; f;iterwave emdpoint
$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS => json_encode($request),
CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer FLWSECK_TEST-78a57f48a24ee3582c323d5f9aec3538-X',
    'Content-Type: application/json'
),
));

$response = curl_exec($curl);

curl_close($curl);

$res = json_decode($response);
if($res->status == 'success')
{
    $link = $res->data->link;
    header('Location: '.$link);
}
else
{
    echo 'We can not process your payment';
}

      //  array_push($success,"document and payment succesful");
        //  header('location:print.php');
      }
          else
          {die(mysqli_error($conn));  }

          }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>uprint::all dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <link rel="stylesheet" href="../css/styling2.css">

  </head>
  <body>
    <!-- header section-->
  <?php include('profile_details.php');?>

<!-- hero section-->
<div class="head-h1">
<span> UPRINT</span>
</div>
<div class="images">

<img src="../images/print3.gif" alt="">

</div>
<!-- end of hero section-->
<section>
<?php include 'alerts.php'; ?>
  <form action="" method="POST" >

  <div class="conatiner3">
            <div class="cols2">
          <div class="">
            <a href="upload.php">upload and get link</a>
          </div>

            </div>
        <div class="costs">
                <fieldset>
                  <legend>fill in this</legend>
                      <div class="cols2">
                    <span>@PAGE COSTS ::200 shs.</span>
                      </div>
                      <div class="cols2">
                    <span>PRINT</span>
                    <input type="number" name="pages" onkeyup="mult(this.value)" value="<?php echo  $pages; ?>">
                    <span>Pages</span>
                      </div>
                      <div class="cols2">
              <span>TOTAL</span><input type="number" name="total"  id="total_costs" value="<?php echo $total; ?>"   readonly>
                      </div>
                      <div class="cols2">
              <span>PASTE DOC LINK HERE..</span><input type="text" name="doc_link"  value="<?php echo $doc_link; ?>">
                      </div>
                      <div class="cols2">
              <span>PHONE NUMBER</span><input type="text" name="Phone"  value="<?php echo $phone_number; ?>">
                      </div>
                  </fieldset>
        </div>
  </div>
</section>
<section>
  <div class="conatiner4">
    <div class="">
      <span>PRINT IN:</span>
<input type="text" name="doc_type" placeholder="BLACK & WHITE OR COLOURED" value="<?php echo $doc_type; ?>">
    </div>

  </div>
</section>
<section>
  <div class="col-head">
    <span> DELIVERY METHODS</span>
  </div>
  <div class="container5">

     <div class="cols3">
          <span>METHODS:</span>
<input type="text" name="delivery_method" value="<?php echo $delivery_method; ?>" placeholder="SELF-PICK OR DELIVERY">
     </div>

  </div>
</section>

<section>
  <div class="instructions">
    <fieldset>
      <legend>handle my document like...</legend>
  <input type="text" name="handle_doc" value="<?php echo $handle_doc; ?>">
    </fieldset>

  </div>
</section>
<section>
  <div class="container6">
  <input type="submit" name="payment" value="MAKE PAYMENT" class="btn">

  </div>
</section>
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
