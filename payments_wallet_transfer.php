<?php
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

// Set the DestinationAccountName and Amount(Required)
$DestinationAccountName ="accountname";
$Amount="10";

//Pass authentication credentials and your Transfer data into an array
$WalletTransferData = array(
	'DestinationAccountName' => $DestinationAccountName,
	'Amount' => $Amount,
	'username'=>$username,
	'apiKey'=>$apiKey
);

//Convert the array into JSON string.
$WalletTransferDataEncoded = json_encode($WalletTransferData);

//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessWalletTransfer($WalletTransferDataEncoded);
	print_r($result);
} catch (Exception $e) {
	echo $e->getMessage();
}
