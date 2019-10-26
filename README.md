# PHP SAP - SMS, AIRTIME, PAYMENTS
run $ npm install @wahome100/phpsap@2.0.0

PHP SAP is an API gateway class that enables php developers to easily integrate SMS,Airtime and Mobile payments using MPESA into their dynamic web applications.It is very easy to get started by creating an account and grabbing an API Key.Upon creation of an account a SAP wallet is automatically created for you,you will have to top it up with cash to start using our API to send SMS and distribute airtime.For mobile payments using MPESA a payments wallet is also automatically created for you, this is where all payments made to your application will be collected and managed.
Simply hit this link to get started https://renthero.co.ke/phpsap

> ### Join our Developers Forum here https://php-sap.mn.co

# Getting started
1. [DOWNLOAD](https://github.com/ronniengoda/phpsap/blob/master/PHPSAPGateway.php) our fantastic gateway class and place it in your project directoy
## Sending SMS
> You can send SMSs from your application by making a HTTP POST request to the SMS API. For each request sent from your application, we respond with a notification back indicating whether the SMS transaction was successful or failed.

```php
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
```
## Sending Airtime
> Your application sends Airtime by making a HTTP POST request to the airtime API. For each request sent from your application, we respond with a notification back indicating whether the airtime transaction was successful or failed.

```php
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
```
## Checking Your SAP Wallet Balance
> You can send a request to out APIs to get your SAP Wallet Balance. Make sure you provide the required parameters.

```php
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

//Pass authentication into an array
$SAPWalletBalanceData = array(
	'username'=>$username,
	'apiKey'=>$apiKey
);

//Convert the array to JSON String.
$SAPWalletBalanceDataEncoded = json_encode($SAPWalletBalanceData);

//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessSAPWalletBalance($SAPWalletBalanceDataEncoded);
	print_r($result);
} catch (Exception $e) {
	echo $e->getMessage();
}
```
# Mobile Payments
> We currently support Mobile checkout/STK-PUSH, Mobile B2C, Mobile B2B and Payments Wallet Balance.Ensure you set your callback urls in the developer portal so as to get notifications from our API.Also note that all payment transaction costs will be deducted from your SAP wallet and not your Payments wallet.
## Initiating Mobile Checkout-STK PUSH
> Mobile Checkout API allows you to initiate Customer to Business (C2B) payments on a mobile subscriber’s device. This allows for a seamless checkout experience, since the client will no longer need to remember the amount or an account number to complete the transaction.

```php
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

//Set PhoneNumber and Amount below(Required)
$PhoneNumber="+254708344101";
$Amount="10";

//Set any metadata you want to attach to the request below(optional);
$LNMOmetadata = [
		"MetaData"   => "0987654321"
	];

//Pass authentication credentials and your LNMO data into an array
$LNMOData = array(
	'PhoneNumber' => $PhoneNumber,
	'Amount' => $Amount,
	'username'=>$username,
	'apiKey'=>$apiKey,
	'LNMOmetadata'=>$LNMOmetadata
);

//Convert the array into JSON string.
$LNMODataEncoded = json_encode($LNMOData);

	//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessLNMO($LNMODataEncoded);
	print_r($result);
} catch (Exception $e) {
	echo $e->getMessage();
}
```
## Initiating Mobile B2C
> Mobile Business To Consumer (B2C) APIs allow you to send payments to mobile subscribers from your Payment Wallet.
```php
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
```
## Initiating Mobile B2B
> Mobile Business To Business (B2B) API allow you to send payments to businesses e.g banks from your Payment Wallet.

```php
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
```
## Mobile C2B
>Mobile Consumer To Business (C2B) functionality allows your application to receive payments that are initiated by a mobile subscriber. This is typically achieved by distributing a BuyGoods number that clients can use to make payments from their mobile devices.In PHP SAP Use <b>Till Number: 741978</b> for Mobile Payments. After Clients pay you will use our C2B Validation API to validate the payment.You should impliment it in your application such that your clients provide the MPESA Transaction ID. Our API will validate the transaction and credit your Payments wallet if transaction was sucessful and respond back to your callback url.To initiate a C2B Validation use the following.

```php
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
```
### API Response Contents
| Parameter     | Description|
| ------------- |:-------------:|
| Category      | Category of the paymet | 
| Provider      | Payment Provider in this case MPESA|
| providerRefId | The unique ID generated by the payment provider for this transaction|
|sourceType	|The type of party that is providing the funds for this transaction|
|source		|Unique identifier of the party that is providing the funds for this transaction.|
|destinationType|Unique identifier of the party that is receiving funds in this transaction (the Credit Party).|
|destination	|Unique identifier of the party that is receiving the funds for this transaction.|
|value		|The value being exchanged in this transaction.|
|status		|The final status of this transaction. Possible values are: Success or Failed|
|description	|A detailed description of this transaction, including a more detailed failure reason in the case of failures.|
|requestMetadata|Any metadata that was sent by your application when it initiated this transaction|
|transactionDate|The date and time (according to the payment provider) when a successful transaction was completed.|

## Checking Your Payments Wallet Balance
> You can send a request to out APIs to get your Payments Wallet Balance. Make sure you provide the required parameters.

```php
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
```
## Initiating Wallet Transfer
> Wallet transfer API allows you to transfer money from one Payments Wallet to another Payments Wallet on our system.Initiate a wallet transfer request by making a HTTP POST request to our API.

```php
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
```
## Top UP SAP Wallet From Payments Wallet
>Topup SAP Wallet API allows you to move money from your Payments Wallet to your SAP Wallet. SAP Wallet is the wallet that funds your service usage expences.

```php
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
```
# Creating And Scheduling Tasks In PHP SAP
> Handling the scheduled tasks is always a headache. There are problems in calculating months, years, minutes, etc. and on the other hand, the web is not made to handle scheduled tasks. Using programming hacks is not the appropriate method to do scheduled tasks. MySql Cron, Windows Scheduled Tasks and .VB files, uptime checkers, on expired events on caching objects, and thousands of other methods are all hacks. They are not made to do this job, they are very, very limited, unreliable and not easy to implement.So we made this tool in the best way possible, with easiest method you can imagine, and really powerful and flexible.

## Creating/Scheduling your first task
Below is an elaboration of the parameters you will need to provide.

```xml
[Required]:timeSlice: Xminute, Xhour, Xday, Xmonth, Xyear
[Required]: url: The target url that SAP will call  at the defined TimeSlice. The library will automatically encode this url. Don't use Server.URLEncode()
[Required]: tags: You need tag your tasks for future identification and to control them using API in the future.
[Optional]: retries: How many times should try if your server failed(or it was down)? default value: 3
[Optional]: count: How many cycles should be repeated? read more at count parameter.
[Optional]: postData: The array for the content you want to HTTP POST to your URL when your task has been triggered.
```
### To create your first task, make a HTTP POST request to our scheduler endpoint using the following.
```php
<?php 
require_once 'PHPSAPGateway.php';
$gateway= new PhpSapGateway;

//Set your authentication credentials below(Required)
$username="username";
$apiKey="api key";

//Set your task details below

//You need tag your tasks for future identification and to control them using API in the future.(Required)
$tags = array();
$tags['type']='mytaskname';

 //The array for the content you want to HTTP POST to your URL when your task has been triggered(Optional)
$postData = array();
$postData['type']='mypostdata';


$TimeSlice="2";//integer begins from 1 
$Time="minute";//choose minute or hour or day or month or year
$Retries="3";// How many times should re try if your server failed(or it was down)? default value: 3
$Count="1";//How many cycles should be repeated? should be an integer or -1 for infinite times
$url="http://domain.com";//The target url that SAP will call at defined TimeSlice

//Pass authentication credentials and your task creation data to array
$TaskCreateData=array(
	'tags' => $tags,
	'postData' => $postData,
	'TimeSlice'=>$TimeSlice,
	'Time'=>$Time,
	'Retries'=>$Retries,
	'Count'=>$Count,
	'url'=>$url,
	'username'=>$username,
	'apiKey'=>$apiKey
);

//convert our array to json string.
$TaskCreateDataEncoded=json_encode($TaskCreateData);

//Thats it,from here we will take care of the rest.
try {
	$result=$gateway->ProcessTaskCreate($TaskCreateDataEncoded);
	print_r($result);
} catch (Exception $e) {
	echo $e->getMessage();
}
```
