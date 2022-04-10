<!DOCTYPE html>
<html>
<head>
  <title>DGM Payment | Online GYM</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body >

	<form action="<?php echo $url; ?>" name="frm1" method="post">
		<center>
      	<div style="width: auto; height: auto; background-color: #3B8894; margin-top: 15%">
	      	<br>
	    	<p style="text-align: center; color: white;font-size: 35px">Please wait. Do no refress the window.......</p>
	    	<p style="text-align: center; color: white;font-size: 35px">Your transaction is under process.......</p>
	    	<br>
	    </div>
      </center>
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