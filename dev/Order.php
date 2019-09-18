<?php
	class Order extends Account{		
		private $orderId;
		private $amount;
		private $numItems;
		private $paidStatus;
		private $orderStatus;
		private $quantity;
		private $productId;
		private $shippingCharge;
		private $paymentMode;
		public $status;
		private $id;
		public $start;
		public $newOrderId;
		public $itemsPerPage;
		public $sizes;

		public function getId($id){
			$this->id = $id;
		}

		public function getProductId($productId){
			$this->productId = $productId;
		}

		public function getQuantity($quantity){
			$this->quantity = $quantity;
		}

		public function getOrderId($orderId){
			$this->orderId = $orderId;
		}

		public function getNumberOfGoods($numItems){
			$this->numItems = $numItems;
		}

		public function paidStatus($paidStatus){
			$this->paidStatus = $paidStatus;
		}

		public function getOrderStatus($orderStatus){
			$this->orderStatus = $orderStatus;
		}

		public function getAmount($amount){
			$this->amount = $amount;
		}		

		public function getShippingCharges($shippingCharge){
			$this->shippingCharge = $shippingCharge;
		}

		public function getPaymentMode($payMode){
			$this->paymentMode = $payMode;
		}

		public function getWeight($wght){
			$this->wght = $wght;
		}

		public function getSingleOrder()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order WHERE order_id = :order_id");
			$query->bindValue(":order_id", $this->orderId);			
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getCustomerOrder()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order WHERE customer_id = :customer_id ORDER BY id DESC");
			$query->bindValue(":customer_id", $this->customerId);			
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function ckeckExitenceOrder()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order WHERE customer_id = :customer_id ORDER BY id DESC");
			$query->bindValue(":customer_id", $this->customerId);			
			$query->execute();
			if($query->rowCount()==0){
				return true;
			}else{
				false;
			}
		}

		public function paginateCustomerOrder()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order WHERE customer_id = :customer_id ORDER BY id DESC LIMIT :start, :items_per_page");
			$query->bindValue(":customer_id", $this->customerId);
			$query->bindValue(":start", $this->start, PDO::PARAM_INT);
			$query->bindValue(":items_per_page", $this->itemsPerPage, PDO::PARAM_INT);
			$query->execute();
			$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
			return $fetch;		
		}		


		public function getCustomerOrderSummary()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order WHERE customer_id = :customer_id AND order_id = :order_id ORDER BY id DESC");
			$query->bindValue(":customer_id", $this->customerId);			
			$query->bindValue(":order_id", $this->orderId);			
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}		

		public function getCustomerOrderDetails($orderId)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order WHERE order_id = :orderId");
			$query->bindValue(":orderId", $orderId);			
			$query->execute();
			return $query->fetch();
		}

		public function getOrderTotalAmount()
		{
			$totalAmount = 0;
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT amount, quantity FROM customer_order_details WHERE order_id = :order_id");
			$query->bindValue(":order_id", $this->orderId);
			$query->execute();
			$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
			foreach($fetch as $price){
				$amount = $price['quantity'] * $price['amount'];
				$totalAmount += $amount;
			}
			return $totalAmount;
		}

		public function saveOrder($customer_id, $order_id, $paystack_reference, $paid_status, 
		$order_status, $subtotal, $shipping_charge, $amount, $weight_amount)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("INSERT INTO customer_order (customer_id, order_id, paystack_reference, paid_status, order_status, subtotal, 
			shipping_charge, amount, weight_amount) VALUES (:customer_id, :order_id, :paystack_reference, :paid_status, :order_status, 
			:subtotal, :shipping_charge, :amount, :weight_amount)");
			$query->bindValue(":customer_id", $customer_id);
			$query->bindValue(":order_id", $order_id);
			$query->bindValue(":paystack_reference", $paystack_reference);
			$query->bindValue(":paid_status", $paid_status);
			$query->bindValue(":order_status", $order_status);
			$query->bindValue(":subtotal", $subtotal);
			$query->bindValue(":shipping_charge", $shipping_charge);
			$query->bindValue(":amount", $amount);
			$query->bindValue(":weight_amount", $weight_amount);
			
			if($query->execute()){
				return true;
			}
			return false;
		}

		public function saveOrderDetails($orderId, $productId, $quantity, $amount, $weight_pro)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("INSERT INTO customer_order_details (order_id, product_id, quantity, amount, weight_pro) 
			VALUES (:order_id, :product_id, :quantity, :amount, :weight_pro)");
			$query->bindValue(":order_id", $orderId);
			$query->bindValue(":product_id", $productId);
			$query->bindValue(":quantity", $quantity);
			$query->bindValue(":amount", $amount);
			$query->bindValue(":weight_pro", $weight_pro);
			if($query->execute()){
				return true;
			}
			return false;			
		}

		public function deleteOrders($order_id){
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("DELETE FROM customer_order WHERE order_id = '$order_id'");
			$query->execute();
			$query = $db->prepare("DELETE FROM customer_order_details WHERE order_id = '$order_id'");
			$query->execute();
			return true;
		}

		public function updateOrderWithPaystackReference($order_id, $paystack)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE customer_order SET paystack_reference = '$paystack' WHERE order_id = '$order_id'");
			$query->bindValue(':order_id', $order_id);
			$query->bindValue(':paystack', $paystack);
			$query->execute();
			return true;
		}

		public function updateOrderPaymentStatus($customer_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE customer_order SET paid_status = 1 WHERE customer_id = '$customer_id'");
			$query->bindValue(':customer_id', $customer_id);
			$query->execute();
			return true;
		}

		public function updateOnlinePaymentStatus($customer_id, $reference)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE customer_order SET paid_status = 2 WHERE customer_id = :customer_id AND paystack_reference=:reference");
			$query->bindValue(':customer_id', $customer_id);
			$query->bindValue(':reference', $reference);
			if(!empty($query->execute())){
				return true;
			}else{
				return false;
			}
			
		}
		
		public function updateOrderStatus()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE customer_order SET order_status = :status WHERE order_id = :order_id");
			$query->bindValue(":status", $this->status);
			$query->bindValue(":order_id", $this->orderId);
			if($query->execute()){
				return true;
			}
			return false;
		}

		public function updatePaymentMode()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE customer_order SET payment_mode = :payment_mode WHERE order_id = :order_id");
			$query->bindValue(":payment_mode", $this->paymentMode);
			$query->bindValue(":order_id", $this->orderId);
			if($query->execute()){
				return true;
			}
			return false;
		}				

		public function getAllOrders()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->query("SELECT * FROM customer_order ORDER BY id DESC");
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}		

		public function paginateOrders()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order ORDER BY id DESC LIMIT :start, :items_per_page");
			$query->bindValue(":start", $this->start, PDO::PARAM_INT);
			$query->bindValue(":items_per_page", $this->itemsPerPage, PDO::PARAM_INT);
			$query->execute();
			$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
			return $fetch;		
		}
		
		public function getAllOrderPaidStatus()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order WHERE paid_status = :paid_status ORDER BY id DESC");
			$query->bindValue(":paid_status", $this->paidStatus);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}		

		public function paginateAllOrderPaidStatus()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order WHERE paid_status = :paid_status ORDER BY id DESC LIMIT :start, :items_per_page");
			$query->bindValue(":paid_status", $this->paidStatus, PDO::PARAM_INT);
			$query->bindValue(":start", $this->start, PDO::PARAM_INT);
			$query->bindValue(":items_per_page", $this->itemsPerPage, PDO::PARAM_INT);
			$query->execute();
			$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
			return $fetch;		
		}	

		public function getAllOrderShippedStatus()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order WHERE order_status = :order_status ORDER BY id DESC");
			$query->bindValue(":order_status", $this->orderStatus);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}		

		public function paginateAllShippedStatus()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order WHERE order_status = :order_status ORDER BY id DESC LIMIT :start, :items_per_page");
			$query->bindValue(":order_status", $this->orderStatus, PDO::PARAM_INT);
			$query->bindValue(":start", $this->start, PDO::PARAM_INT);
			$query->bindValue(":items_per_page", $this->itemsPerPage, PDO::PARAM_INT);
			$query->execute();
			$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
			return $fetch;		
		}	

		public function updateCustomerOrderId()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE customer_order SET order_id = :new_orderId WHERE order_id = :order_id");
			$query->bindValue(":new_orderId", $this->newOrderId);
			$query->bindValue(":order_id", $this->orderId);			
			if($query->execute()){
				return true;
			}
			return false;
		}

		public function updateCustomerOrderDetailsId()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE customer_order_details SET order_id = :new_orderId WHERE order_id = :order_id");
			$query->bindValue(":new_orderId", $this->newOrderId);
			$query->bindValue(":order_id", $this->orderId);			
			if($query->execute()){
				return true;
			}
			return false;
		}


		
		public function shipCustomerOrder()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order WHERE order_status=1 AND shipping =0 ORDER BY time_created ASC");		
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function unshippedCustomerOrder()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order WHERE order_status=1 AND shipping =1 ORDER BY time_created ASC");		
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function unDelivCustomerOrder()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order WHERE order_status=1 AND shipping =1 AND delivery=0 ORDER BY time_created ASC");		
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function confirmPaymentOrder()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order WHERE paid_status=0 ORDER BY time_created ASC");		
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function singleCustomerOrder($orderId)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order_details WHERE order_id=:orderId");	
			$query->bindValue(":orderId", $orderId);	
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function updateshipCustomerOrder($orderId, $customer_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE customer_order SET shipping=1 WHERE order_id=:orderId AND customer_id=:customer_id");	
			$query->bindValue(":orderId", $orderId);
			$query->bindValue(":customer_id", $customer_id);	
			if($query->execute()){
				return true;
			}
			return false;
		}

		public function updatDeliverCustomerOrder($orderId, $customer_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE customer_order SET delivery=1 WHERE order_id=:orderId AND customer_id=:customer_id");	
			$query->bindValue(":orderId", $orderId);
			$query->bindValue(":customer_id", $customer_id);	
			if($query->execute()){
				return true;
			}
			return false;
		}

		public function unshipCustomerOrder($orderId, $customer_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE customer_order SET shipping=0 WHERE order_id=:orderId AND customer_id=:customer_id");	
			$query->bindValue(":orderId", $orderId);
			$query->bindValue(":customer_id", $customer_id);	
			if($query->execute()){
				return true;
			}
			return false;
		}

		public function unDeliCustomerOrder($orderId, $customer_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE customer_order SET delivery=0 WHERE order_id=:orderId AND customer_id=:customer_id");	
			$query->bindValue(":orderId", $orderId);
			$query->bindValue(":customer_id", $customer_id);	
			if($query->execute()){
				return true;
			}
			return false;
		}

		public function deliverCustomerOrder()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order WHERE delivery =0 AND shipping=1 ORDER BY time_created ASC");		
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function updateDeliveryCustomerOrder($order_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE customer_order SET delivery=1 WHERE order_id=:order_id");	
			$query->bindValue(":order_id", $this->order_id);	
			if($query->execute()){
				return true;
			}
			return false;
		}

		public function confirmPayment()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order WHERE paid_status =1 AND order_status=1 ORDER BY time_created ASC");		
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function unconfirmPayment()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order WHERE paid_status =0 AND order_status=1 ORDER BY time_created ASC");		
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function updatePaymentCustomerOrder($order_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE customer_order SET paid_status=1 WHERE order_id=:order_id");	
			$query->bindValue(":order_id", $order_id);	
			if($query->execute()){
				return true;
			}
			return false;
		}

		public function cancelPaymentCustomerOrder($order_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE customer_order SET paid_status=0 WHERE order_id=:order_id");	
			$query->bindValue(":order_id", $order_id);	
			if($query->execute()){
				return true;
			}
			return false;
		}

		public function singleOrder($customer_id, $orderId)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM customer_order WHERE customer_id=:customer_id AND order_id=:orderId");	
			$query->bindValue(":customer_id", $customer_id);
			$query->bindValue(":orderId", $orderId);	
			$query->execute();
			return $query->fetch();
		}

		public function sumSingleOrder($orderId)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT sum(weight_pro) as weight_cost FROM customer_order_details WHERE order_id=:orderId");	
			$query->bindValue(":orderId", $orderId);	
			$query->execute();
			$lol=  $query->fetch();
			return $now= $lol['weight_cost'];
		}


															
	}
?>
