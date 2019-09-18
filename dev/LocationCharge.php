<?php
	class LocationCharge{

        public function checkIfAlreadyLocation($loca)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM shipping_location_charge WHERE location =:loca");
			$query->bindValue(":loca", $loca);
			$query->execute();
			if($query->rowCount()>0){
				return true;
			}else{
				return false;
			}
		}

		public function createLocation($loca, $charge)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("INSERT INTO shipping_location_charge (location, charge) VALUES (:loca, :charge)");
            $query->bindValue(":loca", $loca);
            $query->bindValue(":charge", $charge);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }

        public function updateLocation($loca, $charge, $location_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE shipping_location_charge SET location=:loca, charge=:charge WHERE id=:location_id");
            $query->bindValue(":loca", $loca);
            $query->bindValue(":charge", $charge);
            $query->bindValue(":location_id", $location_id);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
        }

        public function deleteLocation($loca)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("DELETE FROM shipping_location_charge WHERE location=:loca");
			$query->bindValue(":loca", $loca);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }

        public function getAllLocation()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM shipping_location_charge ORDER BY location ASC");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function getSingleLocation($location_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM shipping_location_charge WHERE id=:location_id");
            $query->bindValue(":location_id", $location_id);
			$query->execute();
			return $query->fetch();
		}
		
		public function getSingleLocationTown($location_state)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM shipping_location_charge WHERE location=:location_state");
            $query->bindValue(":location_state", $location_state);
			$query->execute();
			return $query->fetch();
        }
        
        public function getSingleLocationList($location_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM shipping_location_charge WHERE id=:location_id");
            $query->bindValue(":location_id", $location_id);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function insertTheShipping($orderId, $customer_id, $status)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("INSERT INTO shipped_product(customer_id, order_number, status) VALUES (:customer_id, :orderId, :status)");
            $query->bindValue(":orderId", $orderId);
			$query->bindValue(":customer_id", $customer_id);
			$query->bindValue(":status", $status);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
		}

		public function insertThDelivery($orderId, $customer_id, $status)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("INSERT INTO delivered_product(customer_id, order_number, status) VALUES (:customer_id, :orderId, :status)");
            $query->bindValue(":orderId", $orderId);
			$query->bindValue(":customer_id", $customer_id);
			$query->bindValue(":status", $status);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
		}
		
		public function unshipTheOrder($orderId, $customer_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE shipped_product SET status=0 WHERE order_number=:orderId AND customer_id=:customer_id");
            $query->bindValue(":orderId", $orderId);
			$query->bindValue(":customer_id", $customer_id);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
		}

		public function undeliverTheOrder($orderId, $customer_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE delivered_product SET status=0 WHERE order_number=:orderId AND customer_id=:customer_id");
            $query->bindValue(":orderId", $orderId);
			$query->bindValue(":customer_id", $customer_id);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
		}

		public function confirmThePayment($orderId)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE customer_order SET paid_status=1 WHERE order_number=:orderId");
            $query->bindValue(":orderId", $orderId);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
		}
		
		public function getAllShipping()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM shipped_product WHERE status=1 ORDER BY time_shipped DESC");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		
		public function getAllDelivery()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM delivered_product WHERE status=1 ORDER BY time_added DESC");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        

    }