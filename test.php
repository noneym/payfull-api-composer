<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set("display_errors", 1);

require_once('/home/aloparca.com/public_html/admin/Payfull/src/Payfull/loader.php'); 


$tekcekim_gateid = "10001";
$taksitli = "250";
$carno = "4824898959857023";





$config = new Payfull\Config();
$config->setApiKey("aloparca.com");
$config->setApiSecret("Waswere123@");
$config->setApiUrl("https://aloparca.payfull.com/integration/api/v1");

//echo "520988";
//
////BIN BİLGİSİ
//$request = new Payfull\Requests\GetIssuer($config);
//$request->setBin('671121');
//$response = $request->execute();
//
//echo "<pre>";
//print_r($response);
//echo "</pre>";
////die;
//


//TAKSİT DETAYI

$request = new Payfull\Requests\Installments($config);

$response = $request->execute();

echo "<pre>";
print_r($response);
echo "</pre>";
die;


$request = new Payfull\Requests\Sale3D($config);
$request->setPaymentTitle('Aloparca.com');
$request->setPassiveData('Yedek Parça');
$request->setCurrency('TRY');
$request->setTotal('5');
$request->setInstallment('1');
$request->setBankId('Moka');
$request->setGateway('250');
$request->setReturnUrl('https://www.aloparca.com/admin/Payfull/return.php');




$paymentCard = new Payfull\Models\Card();
$paymentCard->setCardHolderName('BERK CAN SAY');
$paymentCard->setCardNumber('5209884403883015');
$paymentCard->setExpireMonth('06');
$paymentCard->setExpireYear('2020');
$paymentCard->setCvc('769');
$request->setPaymentCard($paymentCard);

$customer = new Payfull\Models\Customer();
$customer->setName('Ebru');
$customer->setSurname('Özülkü');
$customer->setEmail('berksay@me.com');
$customer->setPhoneNumber('05054752013');
$customer->setTcNumber('14419824676'); // Opsiyonel
$request->setCustomerInfo($customer);


$response = $request->execute();

echo "<pre>";
print_r($response);
echo "</pre>";
