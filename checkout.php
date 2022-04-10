<?php  

include('includes/database.php');
session_start();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];
$user_mobile = $_SESSION['user_mobile'];

if (isset($_POST['submit'])) {
  $orderId = $_POST['orderId'];
  $orderAmount = $_POST['orderAmount'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>DGM Payment | Online GYM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body onload="document.frm1.submit()">


<?php 
$mode = "TEST"; //<------------ Change to TEST for test server, PROD for production

extract($_POST);
  $secretKey = "ab482bedc37effcee63448e1bd6e63afde84667d"; // Test : ab482bedc37effcee63448e1bd6e63afde84667d  PROD : d9bb74aad0f76165f5493e9edf3a69d4f9f23384
  $postData = array( 
  "appId" => $appId, 
  "orderId" => $orderId, 
  "orderAmount" => $orderAmount, 
  "orderCurrency" => $orderCurrency, 
  "customerName" => $customerName, 
  "customerPhone" => $customerPhone, 
  "customerEmail" => $customerEmail,
  "orderNote" => $orderNote, 
  "returnUrl" => $returnUrl, 
);
ksort($postData);
$signatureData = "";
foreach ($postData as $key => $value){
    $signatureData .= $key.$value;
}
$signature = hash_hmac('sha256', $signatureData, $secretKey,true);
$signature = base64_encode($signature);

if ($mode == "PROD") {
  $url = "https://www.cashfree.com/checkout/post/submit";
} else {
  $url = "https://test.cashfree.com/billpay/checkout/post/submit";
}

?>
  <form action="<?php echo $url; ?>" name="frm1" method="post">
      <p style="margin-left: 20%; margin-top: 20%; margin-right: 20%; padding: 10px; background-color: blue; color: white;">Please wait.......</p>
      <input type="hidden" name="signature" value='<?php echo $signature; ?>'/>
      <input type="hidden" name="orderCurrency" value='<?php echo $orderCurrency; ?>'/>
      <input type="hidden" name="customerName" value='<?php echo $customerName; ?>'/>
      <input type="hidden" name="customerEmail" value='<?php echo $customerEmail; ?>'/>
      <input type="hidden" name="customerPhone" value='<?php echo $customerPhone; ?>'/>
      <input type="hidden" name="orderAmount" value='<?php echo $orderAmount; ?>'/>
      <input type ="hidden" name="returnUrl" value='<?php echo $returnUrl; ?>'/>
      <input type="hidden" name="appId" value='<?php echo $appId; ?>'/>
      <input type="hidden" name="orderId" value='<?php echo $orderId; ?>'/>
      <input type="hidden" name="orderNote" value='<?php echo $orderNote; ?>'/>
  </form>
</body>
</html>
