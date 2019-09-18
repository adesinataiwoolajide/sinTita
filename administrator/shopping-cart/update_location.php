<?php 
session_start();
require_once("../../dev/autoload.php");
require_once("../../dev/general/all_purpose_class.php");
require_once('../../connection/connection.php');
$all_purpose = new all_purpose($db);
$location = new LocationCharge;
$return = $_SERVER['HTTP_REFERER'];
try{
    if(isset($_POST['add-location'])){
        $email = $_SESSION['user_name'];
        $loca = $all_purpose->sanitizeInput($_POST['location']);
        $charge = $all_purpose->sanitizeInput($_POST['charge']);
        $location_id = $_POST['location_id'];
        $prev_name = $_POST['prev_name'];

        
        if($location->updateLocation($loca, $charge, $location_id)){
            $action ="Change The Location Name from $prev_name to $loca";
            $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
            $_SESSION['success'] = "You Have Change The Location Name from $prev_name to $loca Successfully";
            $all_purpose->redirect('shipping-location.php');
        }else{
            $_SESSION['error'] = "Network Failure, Please Try Again Later";
            $all_purpose->redirect($return);
        }
        
        
    }else{
        $_SESSION['error'] = "Please Fill The Form Below To Update The Shipping Location";
        $all_purpose->redirect($return);
    }
}catch(PDOException $e){
    $_SESSION['error'] =  $e->getMessage();
    $all_purpose->redirect($return);
}
?>