<?php 
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

//Set airtime Receiver and Amount below(Required)
$Receiver="+254708344101";
$Amount="10";

//Pass authentication credentials and your airtime data into an array
$AirtimeData = array(
	'Receiver' => $Receiver,
	'Amount' => $Amount,
	'username'=>$username,
	'apiKey'=>$apiKey
);

	//Convert the array into JSON string.
$AirtimeDataEncoded = json_encode($AirtimeData);

	//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessAirtime($AirtimeDataEncoded);
	print_r($result);
} catch (Exception $e) {
	echo $e->getMessage();
}
