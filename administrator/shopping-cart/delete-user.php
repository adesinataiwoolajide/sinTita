<?php 
    session_start();
    include('../../connection/connection.php');
    require_once('../../dev/registration/class_registration.php');
    include("../../dev/general/all_purpose_class.php");
    $register = new staffRegistration($db);
    $all_purpose = new all_purpose($db);
    try{
        if(isset($_GET['user_name'])){
            $user_name = $_GET['user_name'];
            
            if($register->deleteAdminDetails($user_name)){
                $action ="Deleted $user_name Details From the User List";
                $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                $_SESSION['success'] = "You Have Deleted $user_name Details From the User List Successfully";
                $all_purpose->redirect("user.php");
            }else{
                $_SESSION['error']="Network Failure, Please Try Again Later";
                $all_purpose->redirect("user.php");
            }
    
        }else{
            $_SESSION['error']="Please Click The Red Icon To Delete The User Details";
            $all_purpose->redirect("user.php");
        }
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect("user.php");
    }


?>