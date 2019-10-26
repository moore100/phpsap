<?php
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

//Set MPESATransacrionID below(Required)
$MPESATransactionID="xxxxxxxxxx";

//Set any metadata you want to attach to the request below(optional);
$C2BValidationmetadata = [
		"MetaData"   => "0987654321",
	];

//Pass authentication credentials and your C2BValidtion data into an array
$C2BValidtionData = array(
	'MPESATransactionID' => $MPESATransactionID,
	'username'=>$username,
	'apiKey'=>$apiKey,
	'C2BValidationmetadata'=>$C2BValidationmetadata
);

//Convert the array into JSON string.
$C2BValidtionDataEncoded = json_encode($C2BValidtionData);

	//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessC2BValidation($C2BValidtionDataEncoded);
	print_r($result);
} catch (Exception $e) {
	echo $e->getMessage();
}
