
<?php session_start(); 
$curl = curl_init();

$customer_email = $_SESSION['email'];
$amount = $_SESSION['amount'];  
$currency = "NGN";
$token="";
              $code=['a','A','b','B','c','C','d','D','e','E','f','F','g','G',
              'h','H','i','I','j','J','k','K','l','L','m','M','n','N'];

              for($i = 0; $i < 25; $i++){
                $index = mt_rand(0,count($code)-1);
               $_SESSION['token'] = $token .= $code[$index];
              }

$txref = $_SESSION['token']; // ensure you generate unique references per transaction.
$PBFPubKey = "FLWPUBK_TEST-57cda786cc2576897b032529381e5453-X"; // get your public key from the dashboard.
$redirect_url = "http://localhost/php/ravapayment.php";
//$payment_plan = "pass the plan id"; // this is only required for recurring payments.


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'customer_email'=>$customer_email,
    'currency'=>$currency,
    'txref'=>$txref,
    'PBFPubKey'=>$PBFPubKey,
    'redirect_url'=>$redirect_url,
   // 'payment_plan'=>$payment_plan
  ]),
  CURLOPT_HTTPHEADER => [
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the rave API
  die('Curl returned error: ' . $err);
}

$transaction = json_decode($response);

if(!$transaction->data && !$transaction->data->link){
  // there was an error from the API
  print_r('API returned error: ' . $transaction->message);
}

// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $transaction->data->link);


?>
