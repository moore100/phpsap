<?php 
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

//Set PhoneNumber and Amount below(Required)
$PhoneNumber="+254708344101";
$Amount="10";

//Pass authentication credentials and your B2C data into an array
$B2CData = array(
	'PhoneNumber' => $PhoneNumber,
	'Amount' => $Amount,
	'username'=>$username,
	'apiKey'=>$apiKey
);

//Convert the array into JSON string.
$B2CDataEncoded = json_encode($B2CData);

	//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessB2C($B2CDataEncoded);
	print_r($result);
} catch (Exception $e) {
	echo $e->getMessage();
}
