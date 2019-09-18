<?php 
	session_start();
	include_once("connection/connection.php");
	require_once("dev/autoload.php");
	require_once("dev/general/all_purpose_class.php");
	require 'dev_class/register/customer_registration_class.php';
	$register = new newCustomerRegistration($db);
	$all_purpose = new all_purpose($db);
	
	$category = new Category;
	$type = new Type;
	$genre = new Genre;
	$author = new Author;
	$publisher = new Publisher;
	$product = new Product;
    $customer = new Customer;
    $ship = new Shipping;
    $location = new LocationCharge;
    $weight = new Weight;
    $order = new Order;

	if(!isset($_SESSION['transactionId'])){
        $_SESSION['transactionId'] = $all_purpose->generateRandomHash(16);   
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Basic page needs -->
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>ABVES Books & Stationaries</title>
<meta name="Details about website here.">
<meta name="Details about website here"/>

<!-- Mobile specific metas  -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="assets/images/abv.png">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" type="text/css" href="administrator/assets/Toast/css/Toast.min.css">
</head>

<body class="<?php echo $body ?>">

    <div id="mobile-menu">
        <ul>
            <li><a href="./" class="home1">Home Page</a></li>
            <?php
            foreach($type->getAllProductType() as $seeType){  
                $type_id = $seeType['type_id']; ?> 
                <li><a href=""><?php echo $seeType['type_name']; ?></a>
                    <ul class=""><?php
                        if($type->getTypeGenreNew($type_id)){ ?>
                            <li><a href=""><span style="color: black"><b>No Product</b></span></a></li><?php 
                        }else{ 
                            foreach($type->getTypeGenre($type_id) as $see){ 
                                $test = $see['genre_name']; ?>
                                <li><a href="products.php?product_name=<?php echo $test ?>">
                                <span><b><?php echo $test ?></b></span></a></li><?php
                            }  
                        } ?>
                    </ul>   
                </li><?php 
            } ?>
            <li class=""><a href="shop.php">Shop</a></li>
            
        </ul>
    </div>
    <!-- end mobile menu -->
    <div id="page"> 
  
        <header>
            <div class="header-container">
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4 col-md-4 col-xs-12"> 
                                <!-- Default Welcome Message -->
                                <div class="welcome-msg hidden-xs hidden-sm"><?php
                                    if(!isset($_SESSION['id'])){ ?>
                                        Welcome to Abves Books! <?php
                                    }else{
                                        echo $_SESSION['name']. ' Welcome To Abves Books';
                                    } ?>
                                </div>
                                
                            </div>
                        
                            <!-- top links -->
                            <div class="headerlinkmenu col-md-8 col-sm-8 col-xs-12"> <span class="phone  hidden-xs hidden-sm">Call Us: +123.456.789</span>
                                <ul class="links"><?php 
								    if(!isset($_SESSION['id'])){ ?>
                                        <li><a href="shop.php">Shop</a></li>
                                        <li><a href="">About us</a></li>
                                        <li class="hidden-xs"><a title="Help Center" href=""><span>Help Center</span></a></li>
                                        <li><a title="Store Locator" href=""><span>Store Locator</span></a></li>
                                        <li><a title="login" href="login.php"><span>Login</span></a></li>
                                        <li><a title="login" href="login.php"><span>Register</span></a></li><?php 
                                    }else{ ?>
                                        <li><a href="contactus.php">Contact us</a></li>
                                         <li><a href="dashboard.php?registration_number=<?php echo $_SESSION['reg_number'] ?>">Dashboard</a></li>
                                        <li><a href="my_orders.php?registration_number=<?php echo $_SESSION['reg_number'] ?>">Order Tracking</a></li>
                                        <li><a title="Checkout" href="check-out.php"><span>Checkout</span></a></li>
                                        <li><a title="Log Out" href="logout.php"><span>Logout</span></a></li><?php
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3 col-xs-12 jtv-logo-block"> 
                                <div class="logo"><a title="<?php echo "ABVES Books and Stationaries"; ?>" href="./">
                                    <img alt="Shopping" title="Shopping" src="assets/images/abv.png" 
                                    style="width:80px ; height: 60px; margin-top:10px"></a> 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-5 jtv-top-search" style="margin-left: ">  
                                <div class="top-search">
                                    <div id="search">
                                        <form action="search_product.php" method="POST">
                                            <div class="input-group">
                                                <select class="cate-dropdown hidden-xs hidden-sm" name="category_name">
                                                    <option>All Categories</option>
                                                    <?php 
                                                    foreach($category->getAllCategory() as $listCate){ ?>
                                                        <option value="<?php echo $listCate['category_name'] ?>">
                                                            <?php echo $listCate['category_name'] ?> 
                                                            </option><?php
                                                    } ?>
                                                    
                                                </select>
                                                <input type="text" class="form-control"name="name" placeholder="Enter your search..." name="search">
                                                <button class="btn-search" type="submit" name="search_product"><i class="fa fa-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5 col-md-4 top-cart"><?php 
                                if(isset($_SESSION['reg_number'])){ 
                                    $reg_number = $_SESSION['reg_number'];
                                    $comp =  count($register->gettingCompared($reg_number));
                                    $seeWish = $register->gettingWishListlLimit($reg_number);
                                    $wish =  count($register->gettingWishListNoPag($reg_number));
                                    $seeComp = $register->gettingComparedLimit($reg_number); ?>
                                
                                    <div class="link-wishlist" style="margin-left: 0px"> 
                                        <a href="wishlist.php?reg_number=<?php echo $reg_number ?>&&action=<?php echo 'Wishlist' ?>">
                                            <i class="icon-heart icons"><sup style="color: red">
                                            <?php if($wish >0){ echo $wish; } else{ echo 0; } ?></sup></i><span> Wishlist </span>
                                        </a> 
                                    </div>
                                    <div class="link-wishlist" style="margin-left: 5px"> 
                                    <a href="compare.php?reg_number=<?php echo $reg_number ?>&&action=<?php echo 'Compare' ?>">
                                        <i class="fa fa-area-chart"><sup style="color: red">
                                        <?php if($comp >0){ echo $comp; } else{ echo 0; } ?></sup></i><span> Compare</span></a> 
                                    </div>
                                    <div class="top-cart-contain"><?php 
                                        if(isset($_SESSION['cart'])){
                                            $cart = $_SESSION['cart'];
                                            $count = count($cart);
                                            $reg_number = $_SESSION['reg_number'];
                                            $shipLocation = $register->getShippinCusgAddress($reg_number); 
                                            $state = $shipLocation['state']; 
                                            $shipAmount = $register->getShippinLocationMoney($state); 
                                            $shippingFee = $shipAmount['charge']; 
                                            $total = array();
                                            $wey = array();
                                            ?>
                                            <div class="mini-cart">
                                                <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> 
                                                    <a href="shopping-cart.php">
                                                        <div class="cart-icon"><i class="icon-basket-loaded icons"></i>
                                                        <span class="cart-total">
                                                        <?php echo count($_SESSION['cart']); ?></span></div>
                                                        <div class="shoppingcart-inner hidden-xs"><span class="cart-title">Cart</span> </div>
                                                    </a>
                                                </div>
                                            <div>
                                            <div class="top-cart-content">
                                                <div class="block-subtitle hidden">Recently added items</div>
                                                    <ul id="cart-sidebar" class="mini-products-list"><?php
                                                        foreach($_SESSION['cart'] as $item){
                                                            $slug = $item['slug'];
                                                            $details = $product->getSingleProduct($slug); 
                                                            $weight_id = $details['weight_id'];
                                                            
                                                            $deed = $weight->getSingleBookWeight($weight_id);
                                                            $weight_amount = $deed['amount'];
                                                            $cal = $item['amount'] * $item['quantity'] + $deed['amount'];
                                                            $foo = $item['quantity'] * $deed['amount'];
                                                            array_push($wey, $foo);
                                                            array_push($total, $cal);
                                                        } ?>
                                                        <li class="item"> <a href="shopping-cart.php" title="Product title here" 
                                                            class="product-image"><img src="<?php echo "assets/images/product/".$details['image'] ?>"
                                                             alt="html Template" width="65">
                                                            </a>
                                                            <div class="product-details"> <a href="handlers/cart/removeFromCart.php?slug=<?php echo $item['slug'];?>" 
                                                                title="Remove This Item" class="remove-cart"><i class="pe-7s-trash"></i></a>
                                                                <p class="product-name"><a href="shopping-cart.php"><?php echo ucwords($item['name']);?></a> </p>
                                                                <strong><?php echo $quantity = $item['quantity']; ?></strong> x <span class="price">
                                                                <?php  echo "&#8358;".number_format($item['amount'] * $quantity + $weight_amount);?></span> 
                                                            </div>
                                                        </li>
                                                        
                                                    </ul>
                                                    <div class="top-subtotal">Subtotal: <span class="price">&#8358;<?php echo number_format(array_sum($total)+0) ?></span></div>
                                                        <div class="actions">
                                                            <button class="btn-checkout" type="button" onClick="location.href='check-out.php'">
                                                            <i class="fa fa-check"></i><span>Checkout</span></button>
                                                            <button class="view-cart" type="button" onClick="location.href='shopping-cart.php'">
                                                            <i class="fa fa-shopping-cart"></i><span>View Cart</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><?php 
                                        }else{ ?>
                                            <div class="mini-cart">
                                                <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> 
                                                    <a href="">
                                                        <div class="cart-icon"><i class="icon-basket-loaded icons"></i><span class="cart-total">
                                                        <?php echo 0 ?></span></div>
                                                        <div class="shoppingcart-inner hidden-xs"><span class="cart-title"></span> </div>
                                                    </a>
                                                </div>
                                            <div><?php
                                        } ?>
                                    </div><?php 
                                }else{ ?>
                                    <div class="link-wishlist" style="margin-left: 0px"> <a href="wishlist.php">
                                        <i class="icon-heart icons"><sup style="color: red">
                                        0</sup></i><span> Wishlist </span>
                                        </a> 
                                    </div>
                                    <div class="link-wishlist" style="margin-left: 5px"> <a href="compare.php">
                                        <i class="fa fa-area-chart"><sup style="color: red">
                                        0</sup></i><span> Compare</span></a> 
                                    </div>
                                    <div class="top-cart-contain"><?php 
                                        if(isset($_SESSION['cart'])){ 
                                            ?>
                                            <div class="mini-cart">
                                                <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle" onclick="location.href='shopping-cart.php'"> 
                                                    <a href="shopping-cart.php">
                                                        <div class="cart-icon"><i class="icon-basket-loaded icons"></i>
                                                        <span class="cart-total">
                                                        <?php echo count($_SESSION['cart']); ?></span></div>
                                                        <div class="shoppingcart-inner hidden-xs"><span class="cart-title">
                                                        Cart</span> </div>
                                                    </a>
                                                </div>
                                            <div><?php 
                                        }else{ ?>
                                            <div class="mini-cart">
                                                <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle" onclick="location.href='shopping-cart.php'"> 
                                                    <a href="shopping-cart.php">
                                                        <div class="cart-icon"><i class="icon-basket-loaded icons"></i>
                                                        <span class="cart-total">
                                                        0</span></div>
                                                        <div class="shoppingcart-inner hidden-xs"><span class="cart-title">Cart</span> </div>
                                                    </a>
                                                </div>
                                            <div><?php
                                        } ?>
                                    </div><?php
                                    
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <nav>
            <div class="container">
                <div class="row">
                    <div class="mm-toggle-wrap">
                        <div class="mm-toggle"><i class="fa fa-align-justify"></i> </div>
                        <span class="mm-label">NAVIGATIONS</span> 
                    </div>
                    <div class="col-md-3 col-sm-3 mega-container hidden-xs">
                        <div class="navleft-container">
                            <div class="mega-menu-title">
                                <h3><span>NAVIGATIONS</span></h3>
                            </div>
                            <div class="mega-menu-category">
                                <ul class="nav">
                                    <li class="nosub"><a href="./">Home</a></li><?php
                                    foreach($type->getAllProductType() as $seeType){  
                                        $type_id = $seeType['type_id'];
                                        $type_name= $seeType['type_name']; ?> 
                                        <li><a href="product_types.php?type_name=<?php echo $type_name ?>"><?php echo $seeType['type_name']; ?></a>
                                            <div class="wrap-popup column1">
                                                <div class="popup">
                                                    <ul class="nav"><?php
                                                        if($type->getTypeGenreNew($type_id)){ ?>
                                                            <li><span style="color: red">No Product</span></li><?php 
                                                        }else{ 
                                                            foreach($type->getTypeGenre($type_id) as $see){ 
                                                                $test = $see['genre_name']; ?>
                                                                <li><a href="products.php?product_name=<?php echo $test ?>">
                                                                <span><?php echo $test ?></span></a></li><?php
                                                            } 
                                                            
                                                        } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li><?php 
                                    } ?>
                                    <li class="nosub"><a href="shop.php">Shop</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 jtv-megamenu">
                        <div class="mtmegamenu">
                            <ul class="hidden-xs">
                                <?php  
								foreach($type->getAllProductTypeForMenu() as $seeType){  
                                    $type_id = $seeType['type_id']; ?> 
                                    <li class="mt-root demo_custom_link_cms">
                                        <div class="mt-root-item">
                                            <a href="./">
                                                <div class="title title_font"><span class="title-text"><?php echo $seeType['type_name']; ?></span>
                                                </div>
                                            </a>
                                        </div>
                                        <ul class="menu-items col-md-3 col-sm-4 col-xs-12">
                                            <?php
                                            if($type->getTypeGenreNew($type_id)){?>
                                                <li class="menu-item depth-1">
                                                    <div class="title"> 
                                                        <span><p style="color: red">No Product</p>
                                                        </span>
                                                    </div>
                                                </li><?php
                                            } else { 
                                                foreach($type->getTypeGenre($type_id) as $see){  ?>
                                                    <li class="menu-item depth-1">
                                                        <div class="title"> 
                                                            <span><a href="products.php?product_name=<?php echo $see['genre_name'] ?>"><?php
                                                                echo$test = $see['genre_name'];   ?>
                                                            
                                                            </span></a>
                                                        </div>
                                                    </li><?php 
                                                }
                                                
                                            }?>
                                            
                                        </ul>
                                    </li><?php
                                } ?>
                                <li class="mt-root">
                                    <div class="mt-root-item"><a href="shop.php">
                                        <div class="title title_font"><span class="title-text">Shop</span> </div>
                                    </a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
  