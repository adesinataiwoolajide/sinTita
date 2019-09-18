<?php 
session_start();
require_once("../../dev/autoload.php");
require_once("../../dev/general/all_purpose_class.php");
require_once('../../connection/connection.php');
$all_purpose = new all_purpose($db);
$order = new Order;
$ship = new LocationCharge;
$return = $_SERVER['HTTP_REFERER'];
try{
    if(isset($_GET['order_number'])){
        $email = $_SESSION['user_name'];
        $orderId = $_GET['order_number'];
        $customer_id = $_GET['customer_number'];
        $action = $_GET['action'];
        if($action == 'deliverOrder'){
            $status =1;
            //update the order to shipping
            if(!empty($ship->insertThDelivery($orderId, $customer_id, $status)) 
            AND ($order->updatDeliverCustomerOrder($orderId, $customer_id))){
                
                $action = "Deivered Order Number $orderId for $customer_id";
                $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                $_SESSION['success'] = "You Have Deivered Order Number $orderId for $customer_id  Successfully";
                $all_purpose->redirect("delivered-order.php");
            }else{
                $_SESSION['error'] = "Unable to Deiver Order at the Moment, Please Try again later";
                $all_purpose->redirect($return);
            }
        }else{
            
            if(!empty($ship->undeliverTheOrder($orderId, $customer_id)) AND($order->unDeliCustomerOrder($orderId, $customer_id))){
                $action = "UnShipped Order Number $orderId for $customer_id";
                $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                $_SESSION['success'] = "You Have UnDeivered Order Number $orderId for $customer_id  Successfully";
                $all_purpose->redirect("deliver-order.php");
            }else{
                $_SESSION['error'] = "Unable to UnDeiver Order at the Moment, Please Try again later";
                $all_purpose->redirect($return);
            }
        }
    }
}catch(PDOException $e){
    $_SESSION['error'] =  $e->getMessage();
    $all_purpose->redirect($return);
}