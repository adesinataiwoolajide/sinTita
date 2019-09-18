<?php 
session_start();
require_once("../../dev/autoload.php");
require_once("../../dev/general/all_purpose_class.php");
require_once('../../connection/connection.php');
$all_purpose = new all_purpose($db);
$author = new Author;
$type = new Type;
$genre = new Genre;
$publisher = new Publisher;
$category = new Category;
$product = new Product;
$weight = new Weight;

$return = $_SERVER['HTTP_REFERER'];
try{
    
    if(isset($_GET['slug'])){
        $email = $_SESSION['user_name'];
        $slug = $_GET['slug'];
        $details = $product->getSingleProduct($slug);
        $product_name = $details['product_name'];
        $category_id = $details['category_id'];
        $publisher_id = $details['publisher_id'];;
        $genre_id = $details['genre_id'];
        $edition = $details['edition'];
        $prev_qua = $details['quantity'];
        $stock = $product->getsProductStock($product_name, $category_id, $genre_id, $publisher_id, $edition); 
        $add = $stock['quantity'];
        $total = $add - $prev_qua;
        if($product->deleteProduct($slug) AND ($product->updateProductStock($product_name, $total, $category_id, $genre_id, 
            $publisher_id, $edition))){
            $action = "Deleted $product_name From The Product List";
            $his = $all_purpose->getUserDetailsandAddActivity($email, $action);
            $_SESSION['success'] = "You Have Deleted $product_name From The Product List Successfully";
            $all_purpose->redirect($return);
                
        }else{
            $_SESSION['error'] = "Network Failure, Please Try Again Later";
            $all_purpose->redirect($return);
        }
            
            
    }else{
        $_SESSION['error'] = "Please Click on the Trash Icon To Delete The Product Details";
        $all_purpose->redirect($return);
    }
    
}catch(PDOException $e){
    $_SESSION['error'] =  $e->getMessage();
    $all_purpose->redirect($return);
}
?>