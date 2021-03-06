<?php

/* Example of Monero Payment  */
 require_once('src/jsonRPCClient.php');
require_once('src/Monero_RPC.php');

/* Edit it with your ip and your port of Monero RPC */
$monero_rpc = new Monero_RPC('127.0.0.1','18082');

?>
<html>
  <body>
    <h1>Example of Monero Library</h1>
	<p>Welcome to Monero PHP and JSON Library, developed by SerHack! Please report any issue <a href="https://github.com/monero-integrations/monerophp/issues">here</a></p>
	<h2>Informations</h2>
    <h3>Monero Address</h3>
    <?php $address = $monero_rpc->getaddress(); 
	$monero_rpc->_print($address); ?>
    <h3>Balance</h3>
    <?php $balance = $monero_rpc->getbalance();
	 $monero_rpc->_print($balance); ?>
	<h3>Height</h3>
	<?php $height = $monero_rpc->getheight();
		$monero_rpc->_print($height); ?>
	<h3>Incoming transfers</h3>
	<h4>All</h4>
	<?php $incoming_transfers = $monero_rpc->incoming_transfer('all'); 
		$monero_rpc->_print($incoming_transfers); ?>
	<h4>Available</h4>
	<?php $available = $monero_rpc->incoming_transfer('available');
		$monero_rpc->_print($available); ?>
	<h4>Unavailable</h4>
	<?php $unavailable = $monero_rpc->incoming_transfer('unavailable');
		$monero_rpc->_print($unavailable); ?>
	<h3>Get transfers</h3>
	<?php $get_transfers = $monero_rpc->get_transfers('pool', true);
		$monero_rpc->_print($get_transfers); ?>
	<h3>View key</h3>
	<?php $view_key = $monero_daemon->view_key();
		$monero_rpc->_print($view_key); ?>
<?php	
	/*
	 *	Available Function
	 * --------------------------------------------------------------------
	 *	make_integrated_address => make a integrated address
	 *	$monero_daemon->make_integrated_address('');
	 * --------------------------------------------------------------------
	 *	split_integrated_address => Retrieve integrated address
	 *	$integrated_address = integrated address
	 *	$monero_daemon->splt_integrated_Address($integrated_address);
	 * --------------------------------------------------------------------
	 *	make_uri => useful for generating uri like monero:9aksi1o2...
	 *	$address = wallet address string
	 *	$amount (optional) = amount (library will convert into atomic unit, then use 1 xmr)
	 * 	$recipient_name (optional) = string name of the payment recipient
	 *	tx_description (optional) = string describing the reason for the tx
	 *	$monero_rpc->make_uri($address, $address, $amount, $recipient_name, $description);
	 * --------------------------------------------------------------------
	 *	parse_uri => parse the uri
	 * 	$uri = the uri
	 *	$monero_rpc->parse_uri($uri);
	 * --------------------------------------------------------------------
	 *	get_payments => Get a list of incoming payments using a given payment id (useful for verifying payment with plugins)
	 * 	$payment_id = id of payment
	 *	$monero_rpc->get_payments($payment_id);
	 * --------------------------------------------------------------------
	 *	transfer => transfer function 
	 * 	$amount = amount
	 *	$address = wallet address (not your address)
	 *	$monero_rpc->transfer($amount, $address);
	 * --------------------------------------------------------------------
	 *	get_bulk_payments => Get a list of incoming payments using a given payment id or height
	 * 	$payment_id = array of payments id 
	 *	$min_block_height = The block height at which to start looking for payments.
	 *	$monero_rpc->get_bulk_payments($payments_id, $min_block_height);
	 *
	*/
	?>
  </body>
</html>
