<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta charset="utf-8">
 <!-- <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->

	<!--js-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<!--css-->
	<link rel="stylesheet" type="text/css" href="bootstrap\css\bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap\css\bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap\css\bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="bootstrap\css\bootstrap-responsive.min.css">


</head>
<body>
	<form action="pay-detail-process.php" method="POST">
		<div class="container">
			<div class="row">
				<div class="span6">
					<br>
					<input type="radio"name="price-icon" id="price" value="100" style="size:2em; background-size:;">
					<span class="text-primary" style="font-size:2em;">$100</span>
					<br>
					<br>
					<a name='button' class="btn-primary btn-large" data-toggle="modal" data-target="#pay-mod">pay</a>
				</div>
			</div>
		</div>

		<!--Pay modal gateways-->
		<div class="modal fade bg-gold" id="pay-mod" style="height:40em;">
			<div class="modal-header">
				<a class="btn btn-inverse" data-dismiss="modal">&times;</a>
				<h2 class="text-center">Pay</h2>
			</div>
			<div class="modal-body" style="overflow-y:auto; height:90%;">

				<!--flutterwave payment gateway-->
				<button name="submit-pay" class="btn btn-large btn-inverse">Mastercard/Visa Payment</button>
				<br>
				<br>
				<br>


				<!--paypal payment gateway-->
			   <!-- Set up a container element for the button -->
			    <div id="paypal-button-container"></div>

			    <!-- Include the PayPal JavaScript SDK -->
			    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

			    <script>
			        // Render the PayPal button into #paypal-button-container
			        paypal.Buttons({

			            // Set up the transaction
			            createOrder: function(data, actions) {
			                return actions.order.create({
			                    purchase_units: [{
			                        amount: {
			                            value: document.getElementById('price').value
			                        }
			                    }]
			                });
			            },

			            // Finalize the transaction
			            onApprove: function(data, actions) {
			                return actions.order.capture().then(function(details) {
			                    // Show a success message to the buyer
			                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
			                });
			            }


			        }).render('#paypal-button-container');
			    </script>

				

				<!--btc payment gateway-->
				<form action="https://bitpay.com/checkout" method="post">
				  <input type="hidden" name="action" value="checkout" />
				  <input type="hidden" name="posData" value="" />
				  <input type="hidden" name="data" value="Yaid79ynJgu5EtNA5ubHAzBDfliUFEN8i7xL3Y6keshb/nGVWHfwq3kk0Zag5bjf+CzrLq41RzMxiT3P4m4luI0AM36+XVma3+dL+K+BCoXndh25W3V7pKQ7+Y/unS3vpKXdDuaHLrpZ+wHTq7qqMXNuythLpY1+XYb8o40jPCg=" />
				  <input type="image" src="https://bitpay.com/cdn/en_US/bp-btn-pay-currencies.svg" name="submit" style="width: 210px" alt="BitPay, the easy way to pay with bitcoins.">
				</form>
				<!--
				<script src="https://gateway.gear.mycelium.com/gear-widget-host.js"></script><iframe id='gear-widget' scrolling='no' src="https://gateway.gear.mycelium.com/w/0ec443ddf7d40c4f33f842e87e0a8674a4800036f54ba551e76edd0057ba3c3e" style="border: none; display: inline-block; height: 130px; width: 350px;"></iframe><script type="text/javascript">
					document.getElementById('variable_price').placeholder = document.getElementById('price').value
					document.getElementById('variable_price').value = document.getElementById('price').value
				</script>-->

			</div>
		</div>
	</form>

</body>
</html>