<?php include('includes/header.php') ?>
<?php


$mode = "TEST";
$appId = "177459375a2dc129084f2d1df54771";
$secretKey = "ab482bedc37effcee63448e1bd6e63afde84667d";

$orderId = time();
$orderAmount = 100;
$customerName = "John Doe";
$customerPhone = "9900012345";
$customerEmail = "jdoe@gmail.com";
$notifyUrl = "";
$returnUrl = "";
//$returnUrl = "http://localhost/gymlife/pay.php";
$orderNote = "Extra Info";
$orderCurrency = "INR";
$paymentModes = "";
$pc = "";

 // get secret key from your config
//$tokenData = "appId=".$appId."&orderId=".$orderId."&orderAmount=".$orderAmount."&customerEmail=".$customerEmail."&customerPhone=".$customerPhone."&orderCurrency=".$orderCurrency;
//$token = hash_hmac('sha256', $tokenData, $secretKey, true);
//$paymentToken = base64_encode($token);

$secretKey = $secretKey;
  $postData = array(
  "appId" => $appId,
  "orderId" => $orderId,
  "orderAmount" => $orderAmount,
  "orderCurrency" => $orderCurrency,
  "orderNote" => $orderNote,
  "customerName" => $customerName,
  "customerPhone" => $customerPhone,
  "customerEmail" => $customerEmail,
  "returnUrl" => $returnUrl,
  "notifyUrl" => $notifyUrl,
);
 // get secret key from your config
 ksort($postData);
 $signatureData = "";
 foreach ($postData as $key => $value){
      $signatureData .= $key.$value;
 }
 $signature = hash_hmac('sha256', $signatureData, $secretKey,true);
 $signature = base64_encode($signature);

?>

    <form id="redirectForm" method="post" action="https://test.cashfree.com/billpay/checkout/post/submit">
      <input type="hidden" name="appId" value="<?= $appId ?>"/>
      <input type="hidden" name="orderId" value="order00001"/>
      <input type="hidden" name="orderAmount" value="100"/>
      <input type="hidden" name="orderCurrency" value="INR"/>
      <input type="hidden" name="orderNote" value="test"/>
      <input type="hidden" name="customerName" value="John Doe"/>
      <input type="hidden" name="customerEmail" value="Johndoe@test.com"/>
      <input type="hidden" name="customerPhone" value="9999999999"/>
      <input type="hidden" name="returnUrl" value="<?= $returnUrl ?>"/>
      <input type="hidden" name="notifyUrl" value="<?= $notifyUrl ?>"/>
      <input type="hidden" name="signature" value="<?= $signature ?>"/>
    </form>
      

    <br><br><br>
 <?php include('includes/footer.php') ?>