<?php 
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

// Set the destination channel,destination account and amount(Required)
$DestinationChannel ="paybill number";
$DestinationAccount ="account number";
$Amount="10";

//Pass authentication credentials and your B2B data into an array
$B2BData = array(
	'DestinationChannel'=>$DestinationChannel,
	'DestinationAccount' => $DestinationAccount,
	'Amount' => $Amount,
	'username'=>$username,
	'apiKey'=>$apiKey
);

//Convert the array into JSON string.
$B2BDataEncoded = json_encode($B2BData);

	//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessB2B($B2BDataEncoded);
	print_r($result);
} catch (Exception $e) {
	echo $e->getMessage();
}
