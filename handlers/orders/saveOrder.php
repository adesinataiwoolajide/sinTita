<?php
session_start();
require_once("../../dev/autoload.php");
require_once("../../connection/connection.php");
require_once("../../vendor/autoload.php");
require_once '../../dev/general/all_purpose_class.php';
$all_purpose = new all_purpose($db);
if(!isset($_SESSION['id'])){ ?>
    <script>
        window.location=('login.php');
    </script><?php 
    $_SESSION['error'] = "Please Register Or Login into Your Account"; 
}
    $order = new Order;
    $payment = new Payment;
    $product = new Product;

    $_SESSION['paystackReference'] = bin2hex(random_bytes(10));
    $order->deleteOrders($_SESSION['transactionId']); // delete instance of this order
    $saveOrder = $order->saveOrder($_SESSION['reg_number'], $_SESSION['transactionId'], $_SESSION['paystackReference'], 0, 1, 
    $_POST['subtotal'], $_POST['shipping_charge'], $_POST['total'], $_SESSION['slug'], $_POST['weight_amount']); //save order

    if($saveOrder){
        foreach($_SESSION['cart'] as $key){
            $order->getProductId($key['slug']);
            $order->getQuantity($key['quantity']);
            $order->getAmount($key['amount']);
            $order->saveOrderDetails($_SESSION['transactionId'], $key['slug'], $key['quantity'], $key['amount'], $_POST['weight_pro']);

            //deducting the quantity
            $details = $product->getSingleProduct($key['slug']);
            $product_name = strtoupper($details['product_name']);
            $category_id = $details['category_id'];
            $publisher_id = $details['publisher_id'];;
            $genre_id = $details['genre_id'];
            $edition = $details['edition'];
            $stock = $product->getsProductStock($product_name, $category_id, $genre_id, $publisher_id, $edition); 
            $old_stock = $stock['quantity'];
            $total = $old_stock - $key['quantity'];

            //updating the new quantity
            $update =$product->updateProductStock($product_name, $total, $category_id, $genre_id, $publisher_id, $edition);
            //REMOVE THE ORDER HERE
        }

        $_SESSION['orderAmount'] = $_POST['total'];

        $paystack = new Yabacon\Paystack('sk_test_3ab911f611cb52cd9ac47d872263f96536b6cb2b');
        try
        {
          $tranx = $paystack->transaction->initialize([
            'amount'=> $_POST['total'] * 100,       // in kobo
            'email'=> $_SESSION['user_name'],         // unique to customers
            'reference'=> $_SESSION['paystackReference'], // unique to transactions
          ]);
        } catch(\Yabacon\Paystack\Exception\ApiException $e){
            $_SESSION['error'] = "Unable to proceed with the transaction. Please try again";
            $all_purpose->redirect("../../check-out.php");        
        }

        if('success' === $tranx->data->status) {
            $customer_id = $_SESSION['reg_number'];
            $order->updateOrderWithPaystackReference($_SESSION['transactionId'], $tranx->data->reference);
            $order->updateOrderPaymentStatus($customer_id);
            $order->updateOrderWithPaystackReference($_SESSION['transactionId'], $tranx->data->reference);
            //send user receipt to email
            //Email::sendUserPaymentReceipt($_SESSION['email'], $_SESSION['name'], $_SESSION['transactionId'], number_format($_SESSION['orderAmount']));
            //notify admin of order
            //Email::sendAdminOrderNotificationEmail($_SESSION['transactionId'], $_SESSION['reg_number']);
        }

        header('Location: ' . $tranx->data->authorization_url);    
    }else{
        $_SESSION['error'] = "Unable to proceed with the transaction. Please try again";
        $all_purpose->redirect("../../check-out.php");            
    }
?>