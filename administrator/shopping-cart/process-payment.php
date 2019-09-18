<?php 
session_start();
require_once("../../dev/autoload.php");
require_once("../../dev/general/all_purpose_class.php");
require_once('../../connection/connection.php');
$all_purpose = new all_purpose($db);
$order = new Order;
$ship = new LocationCharge;
$customer = new Customer;
$return = $_SERVER['HTTP_REFERER'];
try{
    if(isset($_GET['order_number'])){
        $email = $_SESSION['user_name'];
        $orderId = $_GET['order_number'];
        $customer_id = $_GET['customer_number'];
        $action = $_GET['action'];
        $tot = $order->singleOrder($customer_id, $orderId);
        $level = $customer->getAllSingleCustomer($customer_id);
        $order_id= $orderId;
        if($action == 'Confirm'){
            $status =1;
            //update the order to shipping
            if(!empty($order->updatePaymentCustomerOrder($order_id))){
                
                $action = "Confirm Payment of ". " ". $tot['amount']. " ".  " For Order ". $orderId. " By Customer" .$level['user_name'];
                $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                $_SESSION['success'] = "You Have Confirm Payment of ". $tot['amount'].   " ". 
                "For Order ". $orderId. " For Customer " .$level['user_name']. " Successfully";
                $all_purpose->redirect("confirmed-payment.php");
            }else{
                $_SESSION['error'] = "Unable to COnfirm Payment at the Moment, Please Try again later";
                $all_purpose->redirect($return);
            }
        }else{
            
            if(!empty($order->cancelPaymentCustomerOrder($order_id))){
                $action = "Cancel Payment of ". " ". $tot['amount'].  " ". 
                "For Order ". $orderId. " For Customer" .$level['user_name'];
                $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                $_SESSION['success'] = "You Have Cancel Payment of ". $tot['amount']. " ".  
                "For Order ". $orderId. " By Customer " .$level['user_name']. " Successfully";
                $all_purpose->redirect("unconfirm-payment.php");
            }else{
                $_SESSION['error'] = "Unable to Cancel Payment at the Moment, Please Try again later";
                $all_purpose->redirect($return);
            }
        }
    }else{
        $_SESSION['error'] = "Please Try again later";
        $all_purpose->redirect($return);
    }
}catch(PDOException $e){
    $_SESSION['error'] =  $e->getMessage();
    $all_purpose->redirect($return);
}