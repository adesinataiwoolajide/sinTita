<?php
	class Type{
        private $type_name;
        private $type_id ; 

        public function getProductType($type_name)
		{
			return $this->type_name = $type_name;
        }

        public function getProductTId($type_id)
		{
			return $this->type_id = $type_id;
        }
        
        public function checkIfAlreadyAdded($user_name)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM admin_login WHERE user_name=:user_name");
            $query->bindValue(':user_name', $user_name);
            $query->execute($att);
            return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function createProductType($type_name)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("INSERT INTO product_type (type_name) VALUES (:type_name)");
			$query->bindValue(":type_name", $type_name);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }
        
        public function updateProductType($type_id, $type_name)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE product_type SET type_name=:type_name WHERE type_id=:type_id ");
            $query->bindValue(":type_name", $type_name);
            $query->bindValue(":type_id", $type_id);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }
        
        public function deleteProductType($type_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("DELETE FROM product_type WHERE type_id=:type_id");
			$query->bindValue(":type_id", $type_id);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }

        public function getAllProductType()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM product_type ORDER BY type_name ASC");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		
		

		
    }

?>