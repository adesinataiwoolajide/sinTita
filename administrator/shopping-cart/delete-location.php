<?php 
session_start();
require_once("../../dev/autoload.php");
require_once("../../dev/general/all_purpose_class.php");
require_once('../../connection/connection.php');
$all_purpose = new all_purpose($db);
$location = new LocationCharge;
$return = $_SERVER['HTTP_REFERER'];
try{
    if(isset($_GET['location'])){
        $email = $_SESSION['user_name'];
        $loca = $_GET['location'];
        
        if($location->deleteLocation($loca)){
            $action ="Deleted $loca From to the Location List";
            $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
            $_SESSION['success'] = "You Have Deleted $loca From The Location Successfully";
            $all_purpose->redirect($return);
        }else{
            $_SESSION['error'] = "Network Failure, Please Try Again Later";
            $all_purpose->redirect($return);
        }
         
    }else{
        $_SESSION['error'] = "Please Click On The Trash Icon To Delete TheLocation Details";
        $all_purpose->redirect($return);
    }
}catch(PDOException $e){
    $_SESSION['error'] =  $e->getMessage();
    $all_purpose->redirect($return);
}
?>