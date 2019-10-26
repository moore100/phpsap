<?php 
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

//Set SMS Receiver(in international format for this case +254) and Message below(Required)
$Receiver="+254708344101";
$Message="i love nerds";

//Pass authentication credentials and your SMS data into an array
$SMSData = array(
	'Receiver' => $Receiver,
	'Message' => $Message,
	'username'=>$username,
	'apiKey'=>$apiKey
);

	//Convert the array to JSON String.
$SMSDataEncoded = json_encode($SMSData);

	//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessSMS($SMSDataEncoded);
	print_r($result);
} catch (Exception $e) {
	echo $e->getMessage();
}
