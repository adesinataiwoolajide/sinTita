<?php 
session_start();
require_once("../../dev/autoload.php");
require_once("../../dev/general/all_purpose_class.php");
require_once('../../connection/connection.php');
$all_purpose = new all_purpose($db);
$product = new Product;
$return = $_SERVER['HTTP_REFERER'];
try{
    $dir = "../../assets/images/product/";
    if(isset($_POST['add-product'])){
        $check =0;      
        $filename=$_FILES["file"]["tmp_name"];
        $email = $_SESSION['user_name'];
        
        if($_FILES["file"]["size"] > 0)
        {
            $file = fopen($filename, "r");
            
            while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE){
                $new = $emapData;
                $image = $emapData[0];
                $productname = $emapData[1];
                $genre_name = $emapData[2];
                $category_name = $emapData[3];
                $amount =$emapData[4];
                $quantity = $emapData[5];
                $description = $emapData[6];
                $edtion = $emapData[7];
                $publisher_name = $emapData[8];
                $weight_name = $emapData[9];
                $author_name = $emapData[10];
                $slu = Product::generateSlug($productname);
                $slug = $slu.$product->generateProductNumber();
                $product_name = strtoupper($productname);

                $db = Database::getInstance()->getConnection();
                $query1 = $db->prepare("SELECT * FROM authors WHERE author_name=:author_name");
                $query1->bindValue(":author_name", $author_name);
                $query1->execute();
                $see_author = $query1->fetch();
                $author_id = $see_author['author_id'];

                $query2 = $db->prepare("SELECT * FROM genre WHERE genre_name=:genre_name");
                $query2->bindValue(":genre_name", $genre_name);
                $query2->execute();
                $see_genre = $query2->fetch();
                $genreid = $see_genre['genre_id'];

                $weightname = explode(" ", $weight_name); 
                if(empty($genreid)){
                    $genre_id = 74;
                }else{
                    $genre_id = $genreid;
                }

                if(empty($description)){
                    $description = "Null";
                }else{
                    $description = $description;
                }

                if(empty($amount)){ $amount =0; 
                }else{ 
                    $amount = $amount;
                }

                if(empty($quantity)){ $quantity =0; 
                }else{ 
                    $quantity = $quantity;
                }

                $query3 = $db->prepare("SELECT * FROM products_category WHERE category_name=:category_name");
                $query3->bindValue(":category_name", $category_name);
                $query3->execute();
                $see_genre = $query3->fetch();
                $categoryid = $see_genre['category_id'];
                if(empty($categoryid)){
                    $category_id = 3;
                }else{
                    $category_id = $categoryid;
                }

                $query4 = $db->prepare("SELECT * FROM publishers WHERE publisher_name=:publisher_name");
                $query4->bindValue(":publisher_name", $publisher_name);
                $query4->execute();
                $see_genre = $query4->fetch();
                $publisherid = $see_genre['publisher_id'];
                if(empty($publisherid)){
                    $publisher_id = 6;
                }else{
                    $publisher_id = $publisherid;
                }

                $query5 = $db->prepare("SELECT * FROM product_weight WHERE weight_name=:weight_name");
                $query5->bindValue(":weight_name", $weight_name);
                $query5->execute();
                $see_genre = $query5->fetch();
                $weightid = $see_genre['weight_id'];

                if(empty($edtion)){
                    $edition = "Null";
                }else{
                    $edition = $edtion;
                }

                if(($weight_name == "Null") OR (empty($weight_name))){
                    $weight_id = 1;
                }else{
                    $weight_id = $weightid;
                }
                
                if($product->createProduct($product_name, $slug, $image, $genre_id, $category_id, $amount, $quantity, $description, 
                    $edition, $publisher_id, $weight_id, $author_id)){

                    if($product->checkDuplicateProductStock($product_name, $category_id, $genre_id, $publisher_id, $edition)){
                        $come = $product->getsProductStock($product_name, $category_id, $genre_id, $publisher_id, $edition);
                        $before = $come['quantity'];
                        $new = $quantity;
                        $total = $before+$new;
                        $update =$product->updateProductStock($product_name, $total, $category_id, $genre_id, $publisher_id, $edition);

                        $action = "Updated $product_name stock with $quantity quantity";
                        $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                        $_SESSION['success'] = "You Have Uploaded The Products Successfully";
                        
                    }else{
                        $add_stock = $product->addProductStock($product_name, $category_id, $genre_id, $quantity, $publisher_id, $edition);
                        $action = "Added $product_name with $slug to the stock list";
                        $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
                        $_SESSION['success'] = "You Have Uploaded The Products Successfully";
                           
                    }
                    
                }else{
                    $_SESSION['error'] = "Network Failure, Please Try Again Later";
                    $all_purpose->redirect($return);
                }

            }
            $all_purpose->redirect("view-products.php");

        }

    }else{
        $_SESSION['error'] = "Please Select An Excel File To Add The Product Details";
        $all_purpose->redirect($return);
    }
        
}catch(PDOException $e){
    echo  $e->getMessage();
   // $all_purpose->redirect($return);
}
    ?>