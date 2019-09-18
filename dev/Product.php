<?php
	class Product{

		public function generateProductNumber($length = 4) {
			$lel = date("Y");
		    $characters = $lel;
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}

		public static function generateSlug($text){
			// replace non letter or digits by -
			$text = preg_replace('~[^\pL\d]+~u', '-', $text);
			// transliterate
			$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
			// remove unwanted characters
			$text = preg_replace('~[^-\w]+~', '', $text);
			// trim
			$text = trim($text, '-');
			// remove duplicate -
			$text = preg_replace('~-+~', '-', $text);
			// lowercase
			$text = strtolower($text);
			if (empty($text)) {
				return 'n-a';
			}
			return $text."-".rand(1111,9999);		
		}		

		public function checkIfAlreadyAdded($product_name, $genre_id, $category_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products WHERE product_name =:product_name AND genre_id=:genre_id AND category_id=:category_id");
			$query->bindValue(":product_name", $product_name);
			$query->bindValue(":genre_id", $genre_id);
			$query->bindValue(":category_id", $category_id);
			$query->execute();
			$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
			return $fetch;
		}

		public function createProduct($product_name, $slug, $image, $genre_id, $category_id, $amount, $quantity, 
		$description, $edition, $publisher_id, $weight_id, $author_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("INSERT INTO products (product_name, slug, image, genre_id, category_id, amount, quantity, description, edition, publisher_id, weight_id, author_id)
			 VALUES (:product_name, :slug, :image, :genre_id, :category_id, :amount, :quantity, :description, :edition, :publisher_id, :weight_id, :author_id)");
			$query->bindValue(":product_name", $product_name);
			$query->bindValue(":slug", $slug);
			$query->bindValue(":image", $image);
			$query->bindValue(":genre_id", $genre_id);
			$query->bindValue(":category_id", $category_id);
			$query->bindValue(":amount", $amount);
			$query->bindValue(":quantity", $quantity);
			$query->bindValue(":description", $description);
			$query->bindValue(":edition", $edition);
			$query->bindValue(":publisher_id", $publisher_id);
			$query->bindValue(":weight_id", $weight_id);
			$query->bindValue(":author_id", $author_id);
			
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }

		public function updateProductWithoutImage($product_name, $slug, $genre_id, $category_id, $amount, 
			$quantity, $description, $edition, $publisher_id, $author_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE products SET product_name=:product_name, genre_id=:genre_id, 
			category_id=:category_id, amount=:amount, quantity=:quantity, description=:description, edition=:edition, 
			publisher_id=:publisher_id, author_id=:author_id WHERE slug=:slug");
			$query->bindValue(":product_name", $product_name);
			$query->bindValue(":slug", $slug);
			$query->bindValue(":genre_id", $genre_id);
			$query->bindValue(":category_id", $category_id);
			$query->bindValue(":amount", $amount);
			$query->bindValue(":quantity", $quantity);
			$query->bindValue(":description", $description);
			$query->bindValue(":edition", $edition);
			$query->bindValue(":publisher_id", $publisher_id);
			$query->bindValue(":author_id", $author_id);
			
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
		}
		
		public function updateProductWithImage($product_name, $slug, $image, $genre_id, $category_id, $amount, 
			$quantity, $description, $edition, $publisher_id, $author_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE products SET product_name=:product_name, image=:image, genre_id=:genre_id, 
			category_id=:category_id, amount=:amount, quantity=:quantity, description=:description, edition=:edition, 
			publisher_id=:publisher_id, author_id=:author_id WHERE slug=:slug");
			$query->bindValue(":product_name", $product_name);
			$query->bindValue(":slug", $slug);
			$query->bindValue(":image", $image);
			$query->bindValue(":genre_id", $genre_id);
			$query->bindValue(":category_id", $category_id);
			$query->bindValue(":amount", $amount);
			$query->bindValue(":quantity", $quantity);
			$query->bindValue(":description", $description);
			$query->bindValue(":edition", $edition);
			$query->bindValue(":publisher_id", $publisher_id);
			$query->bindValue(":author_id", $author_id);
			
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }

        public function checkDuplicateProductStock($product_name, $category_id, $genre_id, $publisher_id, $edition){
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM product_stock WHERE product_name=:product_name AND category_id=:category_id 
			AND genre_id=:genre_id AND publisher_id=:publisher_id AND edition=:edition ORDER BY stock_id desc LIMIT 0,1");
			$query->bindValue(":product_name", $product_name);
			$query->bindValue(":category_id", $category_id);
			$query->bindValue(":genre_id", $genre_id);
			$query->bindValue(":publisher_id", $publisher_id);
			$query->bindValue(":edition", $edition);
			$query->execute();
			if($query->rowCount()>0){
				return true;
			}else{
				return false;
			}
		}

		public function addProductStock($product_name, $category_id, $genre_id, $quantity, $publisher_id, $edition){
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("INSERT INTO product_stock(product_name, category_id, genre_id, quantity, publisher_id, 
			edition) VALUES(:product_name, :category_id, :genre_id, :quantity, :publisher_id, :edition)");
			$query->bindValue(":product_name", $product_name);
			$query->bindValue(":category_id", $category_id);
			$query->bindValue(":genre_id", $genre_id);
			$query->bindValue(":quantity", $quantity);
			$query->bindValue(":publisher_id", $publisher_id);
			$query->bindValue(":edition", $edition);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
		}

		public function getsProductStock($product_name, $category_id, $genre_id, $publisher_id, $edition){
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM product_stock WHERE product_name=:product_name AND category_id=:category_id
			 AND genre_id=:genre_id AND publisher_id=:publisher_id AND edition=:edition ORDER BY stock_id DESC LIMIT 0,1");
			$query->bindValue(":product_name", $product_name);
			$query->bindValue(":category_id", $category_id);
			$query->bindValue(":genre_id", $genre_id);
			$query->bindValue(":publisher_id", $publisher_id);
			$query->bindValue(":edition", $edition);
			$query->execute();
			$fetch = $query->fetch();
			return $fetch;
		}

		public function updateProductStock($product_name, $total, $category_id, $genre_id, $publisher_id, $edition){
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("UPDATE product_stock SET quantity=:total WHERE product_name=:product_name AND category_id=:category_id AND genre_id=:genre_id AND publisher_id=:publisher_id AND edition=:edition");
			$query->bindValue(":product_name", $product_name);
			$query->bindValue(":category_id", $category_id);
			$query->bindValue(":genre_id", $genre_id);
			$query->bindValue(":total", $total);
			$query->bindValue(":publisher_id", $publisher_id);
			$query->bindValue(":edition", $edition);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
		}

		public function publishTheProducts($slug){
			$db = Database::getInstance()->getConnection();
			$query = $this->db->prepare("UPDATE products SET publish=1 WHERE slug=:slug");
			$query->bindValue(":slug", $slug);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
		}

		public function unPublishTheProduct($slug){
			$db = Database::getInstance()->getConnection();
			$query = $this->db->prepare("UPDATE products SET publish=0 WHERE slug=:slug");
			$query->bindValue(":slug", $slug);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
		}

		public function seeAllPubProduct()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products WHERE publish=1");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function seeAllUnPubProduct()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products WHERE publish=0");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function sumAllProduct()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT sum(amount*quantity) as new_amount FROM products");
			$query->execute();
			$lol= $query->fetch();
			return $now= $lol['new_amount'];
		}

        public function deleteProduct($slug)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("DELETE FROM products WHERE slug=:slug");
			$query->bindValue(":slug", $slug);
			if($query->execute()){
				return true;
			}else{
                return false;
            }
			
        }

		//useful

		public function getPaginateProductsPublish($start, $itemsPerPage)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products ORDER BY product_id desc LIMIT :start, :items_per_page");
			$query->bindValue(":start", $start, PDO::PARAM_INT);
			$query->bindValue(":items_per_page", $itemsPerPage, PDO::PARAM_INT);
			$query->execute();
			$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
			return $fetch;
		}

		public function getAllProductSideBar()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products ORDER BY product_id desc LIMIT 0,6");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getAllProductSideBarTwo()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products ORDER BY category_id desc LIMIT 0,6");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function getAllProductSideBarThree()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products ORDER BY author_id desc LIMIT 0,6");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
        public function getAllProduct()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products ORDER BY product_id desc");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getAllProductListing()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products ORDER BY product_id desc LIMIT 0,20");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getAllProductByGenreListing()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products ORDER BY genre_id desc LIMIT 0,20");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getAllProductManuListing()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products ORDER BY publisher_id asc LIMIT 0,20");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		//useful
        public function getAllProductByWeight()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products ORDER BY weight_id desc");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		//useful
		public function getAllProductByGenre()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products ORDER BY genre_id desc 0,20");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		

		//useful
		public function getAllProductManu()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products ORDER BY publisher_id asc 0,20");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		//useful
		public function getAllProductByQuantity()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products ORDER BY quantity desc ");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getAllProductByPub($publisher_id, $start, $itemsPerPage)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products WHERE publisher_id=:publisher_id ORDER BY product_id DESC LIMIT :start, :items_per_page");
			$query->bindValue(":publisher_id", $publisher_id);
			$query->bindValue(":start", $start, PDO::PARAM_INT);
			$query->bindValue(":items_per_page", $itemsPerPage, PDO::PARAM_INT);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		//useful
		public function getAllProductByPublis($publisher_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products WHERE publisher_id=:publisher_id ORDER BY product_id DESC LIMIT 0,3");
			$query->bindValue(":publisher_id", $publisher_id);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function listProductByPub($publisher_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products WHERE publisher_id=:publisher_id ORDER BY product_id ");
			$query->bindValue(":publisher_id", $publisher_id);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		
		public function getAllProductByCategory()
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products ORDER BY category_id desc LIMIT 0,6");
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function getSingleProduct($slug)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM products WHERE slug=:slug");
            $query->bindValue(":slug", $slug);
			$query->execute();
			return $query->fetch();
		}
        public function getSingleProductOne($slugO)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM products WHERE slug=:slugO");
            $query->bindValue(":slugO", $slugO);
			$query->execute();
			return $query->fetch();
		}
        public function getSingleProductTwo($slugTwo)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM products WHERE slug=:slugTwo");
            $query->bindValue(":slugTwo", $slugTwo);
			$query->execute();
			return $query->fetch();
		}
        public function getSingleProductThree($slugThree)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM products WHERE slug=:slugThree");
            $query->bindValue(":slugThree", $slugThree);
			$query->execute();
			return $query->fetch();
		}

		public function getSingleLoopProduct($slug)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM products WHERE slug=:slug");
            $query->bindValue(":slug", $slug);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		//using this for listing categories
		public function getSingleGenProduct($genre_id, $start, $itemsPerPage)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM products WHERE genre_id=:genre_id ORDER BY product_id DESC LIMIT :start, :items_per_page");
            $query->bindValue(":genre_id", $genre_id);
            $query->bindValue(":start", $start, PDO::PARAM_INT);
			$query->bindValue(":items_per_page", $itemsPerPage, PDO::PARAM_INT);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function allProductListing($start, $itemsPerPage)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM products ORDER BY product_id DESC LIMIT :start, :items_per_page");
            $query->bindValue(":start", $start, PDO::PARAM_INT);
			$query->bindValue(":items_per_page", $itemsPerPage, PDO::PARAM_INT);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getSingleCategoryProductss($category_id, $start, $itemsPerPage)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM products WHERE category_id=:category_id ORDER BY product_id DESC LIMIT :start, :items_per_page");
            $query->bindValue(":category_id", $category_id);
            $query->bindValue(":start", $start, PDO::PARAM_INT);
			$query->bindValue(":items_per_page", $itemsPerPage, PDO::PARAM_INT);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function getSingleCategoryProductType($genre_id, $start, $itemsPerPage)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM products WHERE genre_id=:genre_id ORDER BY product_id DESC LIMIT :start, :items_per_page");
            $query->bindValue(":genre_id", $genre_id);
            $query->bindValue(":start", $start, PDO::PARAM_INT);
			$query->bindValue(":items_per_page", $itemsPerPage, PDO::PARAM_INT);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}
 		//using this for listing categories
		public function listSingleGensProductS($genre_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM products WHERE genre_id=:genre_id ORDER BY product_id DESC ");
            $query->bindValue(":genre_id", $genre_id);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function listSingleGensProductListing($genre_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM products WHERE genre_id=:genre_id ORDER BY product_id DESC 0,20");
            $query->bindValue(":genre_id", $genre_id);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getSingleGensProductS($genre_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM products WHERE genre_id=:genre_id ORDER BY product_id DESC LIMIT 0,10");
            $query->bindValue(":genre_id", $genre_id);
			$query->execute();
			return $query->fetch();
		}

		//useful
		public function getSingleCategoryProduct($category_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM products WHERE category_id=:category_id");
            $query->bindValue(":category_id", $category_id);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getSingleGenreProduct($genre_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM products WHERE genre_id=:genre_id");
            $query->bindValue(":genre_id", $genre_id);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getSingleCategoryProductSide($category_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM products WHERE category_id=:category_id ORDER BY product_id DESC  LIMIT 0,10");
            $query->bindValue(":category_id", $category_id);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getProductSingleStock($product_name, $publisher_id, $category_id)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT DISTINCT product_name, quantity FROM product_stock WHERE  product_name=:product_name 
				AND category_id=:category_id AND publisher_id=:publisher_id  ORDER BY stock_id DESC LIMIT 0,1");
			$query->bindValue(":product_name", $product_name);
			$query->bindValue(":publisher_id", $publisher_id);
			$query->bindValue(":category_id", $category_id);
			$query->execute();
			return $query->fetch();
		}

		public function getCusWishProduct($customer_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM wishlist WHERE customer_id=:customer_id AND action='Wishlist'");
            $query->bindValue(":customer_id", $customer_id);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function getCusCompProduct($customer_id)
		{
			$db = Database::getInstance()->getConnection();
            $query = $db->prepare("SELECT * FROM wishlist WHERE customer_id=:customer_id AND action='Compare'");
            $query->bindValue(":customer_id", $customer_id);
			$query->execute();
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}

		public function searchProduuct($search){
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products WHERE product_name LIKE '%$search%'");
			$query->bindValue(":search", $search);
			$query->execute();
			$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
			return $fetch;
		}

		public function searchingProduuct($search, $starting, $paging){
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products WHERE product_name LIKE '%$search%' LIMIT :starting, :paging");
			$query->bindValue(":search", $search);
			$query->bindValue(":starting", $starting, PDO::PARAM_INT);
			$query->bindValue(":paging", $paging, PDO::PARAM_INT);
			$query->execute();
			$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
			return $fetch;
		}


		public function searchingTheProduuct($search, $starto, $pago){
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products WHERE product_name LIKE '%$search%' LIMIT :starto, :pago");
			$query->bindValue(":search", $search);
			$query->bindValue(":starto", $starto, PDO::PARAM_INT);
			$query->bindValue(":pago", $pago, PDO::PARAM_INT);
			$query->execute();
			$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
			return $fetch;
		}

		public function getAllProductsShop($start, $itemsPerPage)
		{
			$db = Database::getInstance()->getConnection();
			$query = $db->prepare("SELECT * FROM products ORDER BY product_id desc LIMIT :start, :items_per_page");
			
			$query->bindValue(":start", $start, PDO::PARAM_INT);
			$query->bindValue(":items_per_page", $itemsPerPage, PDO::PARAM_INT);
			$query->execute();
			$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
			return $fetch;
		}

	}