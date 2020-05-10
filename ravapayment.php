<?php session_start();
include_once('test.php');
    if (isset($_GET['txref'])) {
        $ref = $_GET['txref'];
        $amount =$_SESSION['amount']; //Correct Amount from Server
        $currency ="NGN"; //Correct Currency from Server

        $query = array(
            "SECKEY" => "FLWSECK_TEST-1d69ec76b9131fcab2359070f8e90c8d-X",
            "txref" => $ref
        );

        $data_string = json_encode($query);
                
        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);

        $paymentStatus = $resp['data']['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency'];

        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
            $_SESSION['ravaalart']="Your Medical Payment was successfully made thanks for partronage";
            header("Location: dashboard.php");
        } else {
            $_SESSION['ravealart']="Your Medical payment failed! Please try again";
            header("Location: failed.php");
        }
    }
        else {
      die('No reference supplied');
    }

?>