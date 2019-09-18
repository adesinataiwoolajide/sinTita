<?php
session_start();
require_once("../../dev/autoload.php");
require_once("../../connection/connection.php");
require_once("../../vendor/autoload.php");
require_once '../../dev/general/all_purpose_class.php';
$order = new Order;
$payment = new Payment;
$product = new Product;
$all_purpose = new all_purpose($db);

$reference = isset($_GET['reference']) ? $_GET['reference'] : '';
if(!$reference){
    die('No reference supplied');
}

$reg_number = $_SESSION['reg_number'];
$customer_id = $reg_number;

// initiate the Library's Paystack Object
$paystack = new Yabacon\Paystack('sk_test_3ab911f611cb52cd9ac47d872263f96536b6cb2b');
try{
    $tranx = $paystack->transaction->verify([
        'reference'=> $reference, // unique to transactions
    ]);
} catch(\Yabacon\Paystack\Exception\ApiException $e){
    print_r($e->getResponseObject());
    die($e->getMessage());
}

if('success' === $tranx->data->status) {


    $order->updateOnlinePaymentStatus($customer_id, $reference);
    $_SESSION['success'] = "Transaction successful.";
    $payment->saveFinalPayment();

    unset($_SESSION['cart']);
    unset($_SESSION['transactionId']);
    unset($_SESSION['paystackReference']);
    $all_purpose->redirect("../../my_orders.php?registration_number=$reg_number");

}else{
    $_SESSION['error'] = "Unable to verify your transaction";
    $all_purpose->redirect("../../checkout.php");
}

?>