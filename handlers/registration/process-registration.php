<?php
	session_start();
	require_once '../../connection/connection.php';
	require_once '../../dev_class/register/customer_registration_class.php';
	require_once '../../dev/general/all_purpose_class.php';
	require_once '../../dev/autoload.php';
	$all_purpose = new all_purpose($db);
	$register = new newCustomerRegistration($db);
// 	require '../../mailer/PHPMailerAutoload.php'; // Phpmail package already on server
	$mail = new PHPMailer();

	try {
		
		if(isset($_POST['register'])){
			$full_name = $all_purpose->sanitizeInput($_POST['full_name']);
			$user_name = $all_purpose->sanitizeInput($_POST['user_name']);
			$password = $all_purpose->sanitizeInput(sha1($_POST['password']));
			$repeat = $all_purpose->sanitizeInput(sha1($_POST['repeat']));
			function generateRandomHash($length)
			{
				return strtoupper(substr(md5(uniqid(rand())), 0, (-32 + $length)));
			}	
			$reg_number = strtoupper(generateRandomHash(10));
			//$number = strtoupper(generateRandomHash(15));
			if($password != $repeat){
				$_SESSION['error'] = "Ooops! Password Does Not Match";
				$all_purpose->redirect("../../login.php");
			}elseif($register->checkingNewUserExistence($user_name)){
				$_SESSION['error'] = "Ooops! $user_name is Already in use by another User";
				$all_purpose->redirect("../../login.php");
			}else{
				$email = $user_name;
				if(!empty($register->newUserRegistration($full_name, $user_name, $password, $reg_number))){
					$action= "$user_name Successfully Registered Account on the website";
					$his= $all_purpose->operationHistory($action, $email);

					

					// $mail->IsSMTP(); // telling the class to use SMTP
					// $mail->SMTPAuth = true; // enable SMTP authentication
					// $mail->Host = "localhost"; // sets the SMTP server
					// $mail->Port = 25; // set the SMTP port for the GMAIL server
					// $mail->Username = "tosin@trenchcoregroup.com"; // SMTP account username
					// $mail->Password = "testing1234!EMAIL"; // SMTP account password

					// $mail->SetFrom('info@abvesbooks.com', 'Account Confirmation');
					// $mail->AddReplyTo("info@abvesbooks.com","Account Confirmation");
					// $mail->Subject = "Account Activation Link";
					// $mail->MsgHTML("************************************************<br />
					// 	THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY <br />
					// 	************************************************<br /><br />
					// 	Dear $full_name, <br>
					// 	Thanks for Registering an account on our website. Your Registration was successful. <br>
					// 	Your Registration number is <br>
					// 	<p>
					// 		Registration number : $reg_number <br />
							
					// 	<p/>
					// 	<p>
					// 	Please Click on The link below to confirm your account
					// 	</p>
					// 	<a href = localhost/abvesbooks.com/activate-account.php?registration_number=$reg_number target=_blank>Click here to activate your account.</a><br /> 
					// 	<p>
					// 		Thank you for your patronage.
					// 	</p>
					// 	<br />
					// 	For inquiries and support please use our contact form. <br />
					// 	Thank you. <br />");
					// $mail->AddAddress($user_name);
					//$mail->AddAttachment(""); // attachment

					// if(!$mail->Send()) {
					// echo "Mailer Error: " . $mail->ErrorInfo;
					// } else {
					// echo "Message sent!";
					// // header("Location: http://www.example.com/");
					// }
				
					// if(!empty(Email::sendUserRegistrationLink($full_name, $reg_number, $user_name))){
					// 	$_SESSION['success'] = "$full_name You Have Completed Your Registration Successfully, Please Check Your $user_name for a link to Activate Your Account";
					// 	$all_purpose->redirect("../../login.php");
					// } else{
					// 	echo "Ejndb hvdbh";
					// }
					
				}else{
					$_SESSION['error'] = "Unable to Complete Your Registration at the moment, Please Try Again Later";
					$all_purpose->redirect("../../login.php");
				}
			}

		}else{
			$_SESSION['error'] = "Please Fill The Below Form To Register Your Account";
			$all_purpose->redirect("../../login.php");
		}
	} catch (PDOException $e) {
		$_SESSION['error'] = $e->getMessage();
		$all_purpose->redirect("../../login.php");
	}

?>