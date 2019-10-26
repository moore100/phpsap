<?php 
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

//Pass authentication into an array
$PaymentsWalletBalanceData = array(
	'username'=>$username,
	'apiKey'=>$apiKey
);

//Convert the array to JSON String.
$PaymentsWalletBalanceDataEncoded = json_encode($PaymentsWalletBalanceData);

//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessBalance($PaymentsWalletBalanceDataEncoded);
	print_r($result);
} catch (Exception $e) {
	echo $e->getMessage();
}
