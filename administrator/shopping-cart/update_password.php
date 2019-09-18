<?php 
    session_start();
    include('../../connection/connection.php');
    require_once('../../dev/registration/class_registration.php');
    include("../../dev/general/all_purpose_class.php");
    $register = new staffRegistration($db);
    $all_purpose = new all_purpose($db);
    $return = $_SERVER['HTTP_REFERER'];
    try{
        if(isset($_POST['update_password'])){
            $email = $_SESSION['user_name'];
            $password = $all_purpose->sanitizeInput(sha1($_POST['password']));
            $repeat = $all_purpose->sanitizeInput(sha1($_POST['repeat']));
        
            if($password != $repeat){
                $_SESSION['error'] = "Whoops! Password Does Not Match";
                $all_purpose->redirect($return);
            }
            
            if($register->updatePassword($email, $password)){
                $action ="$email Changed Password";
                $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                $_SESSION['success'] = "You Have Changed Your Password Successfully";
                $all_purpose->redirect("../log-out.php");
            }else{
                $_SESSION['error']="Network Failure, Please Try Again Later";
                $all_purpose->redirect($return);
            }
            
        }else{
            $_SESSION['error']="Please FIll The Below Form To Change Your Password";
            $all_purpose->redirect($return);
        }
    }catch(PDOException $e){
    	$_SESSION['error'] = $e->getMessage();
    	$all_purpose->redirect($return);
    }


?>