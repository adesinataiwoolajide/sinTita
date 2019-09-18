<?php
	class Email
	{
		public static function sendUserPaymentReceipt($receiver, $customerName, $orderNumber, $amount)
		{
			$message = "************************************************<br />
			THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY <br />
			************************************************<br /><br />
			Dear $customerName, <br>
			Thanks for your placing your order with us. Your transaction was successful. <br>
			Here are the details of the products you paid for: <br>
			<p>
				ORDER NUMBER : $orderNumber <br />
				AMOUNT PAID : NGN $amount<br />
			<p/>
			<p>
			We'll send another email to inform you when the goods are dispatched.
			</p>
			<p>
				Thank you for your patronage.
			</p>
			<br />
			For inquiries and support please use our contact form. <br />
			Thank you. <br />";
			$headers  = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= "From: ABVES Books and Stationaries <info@abvesbooks.com>\r\n";
			$headers .= "Return-Path: info@abvesbooks.com\r\n";
			if(mail($receiver, "Abves Books Payment Receipt", $message, $headers)){
				return true;
			}
			return false;
		}

		public static function sendUserRegistrationLink($full_name, $reg_number, $user_name)
		{
			$message = "************************************************<br />
			THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY <br />
			************************************************<br /><br />
			Dear $full_name, <br>
			Thanks for Registering an account on our website. Your Registration was successful. <br>
			Your Registration number is <br>
			<p>
				Registration number : $reg_number <br />
				
			<p/>
			<p>
			Please Click on The link below to confirm your account
			</p>
			<a href = localhost/abvesbooks.com/activate-account.php?registration_number=$reg_number target=_blank>Click here to activate your account.</a><br /> 
			<p>
				Thank you for your patronage.
			</p>
			<br />
			For inquiries and support please use our contact form. <br />
			Thank you. <br />";
			$headers  = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= "From: ABVES Books and Stationaries <info@abvesbooks.com>\r\n";
			$headers .= "Return-Path: info@abvesbooks.com\r\n";
			if(mail($user_name, "Abves Books Customer Registration", $message, $headers)){
				return true;
			}
			return false;
		}


		public function sendBankVerificatioMessage($customerName, $orderNumber, $amount, $tellerNumber)
		{
			$this->getMessage("************************************************<br />
			THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY <br />
			************************************************<br /><br />
			Dear $customerName, <br>
			Your uploaded bank details have been verified. Your order will be processed soon. <br><br>

			TELLER DETAILS <br />
			************************************************
			<p>
				ORDER NUMBER : $orderNumber <br>
				TELLER NUMBER: $tellerNumber <br>
				AMOUNT PAID : NGN $amount<br>
			<p/>
			<p>
			We'll send another email to inform you when the goods are dispatched.
			</p>
			<p>
				Thank you for your patronage.
			</p>
			<br />
			For inquiries and support please use our contact form. <br />
			Thank you. <br />");
			$headers  = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= "From: Lamariposa <info@lamariposa.com.ng>\r\n";
			$headers .= "Return-Path: info@lamariposa.com.ng\r\n";
			if(mail($this->receiver, $this->subject, $this->message, $headers)){
				return true;
			}
			return false;
		}


		public function resetPasswordLink($email, $baseUrl)
		{
			$this->getMessage("************************************************<br />
			THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY <br />
			************************************************<br /><br />
			Dear Member, <br>
			You requested for a new password. Click on the link below below to reset your password.<br /><br />
			============================================ <br />
			<a href = $baseUrl/reset.php?code=$email target=_blank>Click here to reset your password.</a><br /> 
			============================================<br />
			Reminder: You must click on the link above to reset your password. <br />
			<br />
			For inquiries and support please use our contact form. <br />
			Thank you. <br />");

			$headers  = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= "From: Lamariposa <info@lamariposa.com.ng>\r\n";
			$headers .= "Return-Path: info@lamariposa.com.ng\r\n";
			if(mail($this->receiver, $this->subject, $this->message, $headers)){
				return true;
			}
			return false;
		}

		public static function sendAdminOrderNotificationEmail($orderNo, $customerId){
			$message = "************************************************<br />
			THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY <br />
			************************************************<br /><br />
			Dear Store Manager, <br>
			A new order has been placed on the website. <br>
			Click on the link below to view the order details. <br />
			============================================ <br />
			<a href =./administrator/customer_order_details.php?customer_number=<?php echo $customer_id ?> target=_blank> View Order Details </a><br /> 
			============================================<br />
			 <br />";

			$headers  = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= "From: ABVES Books and Stationaries info@abvesbooks.com\r\n";
			$headers .= "Return-Path: info@abvesbooks.com\r\n";
			if(mail("abvesbooksstationaries@gmail.com", "New product order e-commerce site", $message, $headers)){
				return true;
			}
			return false;
		}		
	}
?>