<?php
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

// Set the Amount(Required)
$Amount="10";

//Pass authentication credentials and your amount data into an array
$WalletTopupData = array(
	'Amount' => $Amount,
	'username'=>$username,
	'apiKey'=>$apiKey
);

//Convert the array into JSON string.
$WalletTopupDataEncoded = json_encode($WalletTopupData);

//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessWalletTopup($WalletTopupDataEncoded);
	print_r($result);
} catch (Exception $e) {
	echo $e->getMessage();
}