<?php 
    $pagetitle = "Shopping Cart";
    require_once('header.php');
	if(!isset($_SESSION['id'])){ ?>
         <script type="text/javascript"> window.location=('login.php');</script><?php 
        $_SESSION['error'] = "Please Register Or Login into Your Account"; 
    }

    if(!isset($_SESSION['cart'])){ 
        $_SESSION['error'] = "Your Shopping Cart is Empty"; ?>
    	<script type="text/javascript"> window.location=('shop.php');</script><?php

    } 
    $reg_number = $_SESSION['reg_number'];
    $shippingDetails = $register->gettingShippinCustomerAddress($reg_number);
    $counting = count($shippingDetails);
?>

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="./">Home</a></li>
				<li class='active'> Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs" style="margin-bottom:40px;">
	<div class="container">
		<div class="row "><?php 
            if(!empty($_SESSION['cart'])){ ?>
                <div class="col-main col-sm-9 col-xs-12">
                    <div class="page-content page-order">
                        <div class="page-title">
                            <h2>Shopping Cart</h2>
                        </div><?php

                        
                        $cart = $_SESSION['cart'];
                        $count = count($cart);
                        $reg_number = $_SESSION['reg_number'];
                        $shipLocation = $register->getShippinCusgAddress($reg_number); 
                        $state = $shipLocation['state']; 
                        $shipAmount = $register->getShippinLocationMoney($state); 
                        $shippingFee = $shipAmount['charge']; 
                        $total = array();
                        $wey = array(); ?>
        
                        <div class="shopping-cart">
                            <div class="cart-table-container">
                                <table class="table table-cart">
                                    <thead>
                                        <tr>
                                        <th class="cart_product"> Image</th>
                                            <th th-lg>Product Name</th>
                                            <th th-lg>Quantity</th>
                                            <th th-lg>Product Amount</th>
                                            <th th-lg>Weight Amount</th>
                                            <th th-lg>Total Price</th>
                                            <th  class="action">Action <i class="fa fa-trash-o"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $num =1;
                                        foreach($_SESSION['cart'] as $item){
                                            $slug = $item['slug'];
                                            $details = $product->getSingleProduct($slug); 
                                            $weight_id = $details['weight_id'];
                                            
                                            $deed = $weight->getSingleBookWeight($weight_id);
                                            $weight_amount = $deed['amount'];
                                            $cal = $item['amount'] * $item['quantity'] + $deed['amount'];
                                            $foo = $item['quantity'] * $deed['amount'];
                                            array_push($wey, $foo);
                                            array_push($total, $cal);  ?>
                                            <tr>
                                                <td class="cart_product"><a href="#">
                                                <img src="<?php echo "assets/images/product/".$details['image'] ?>" alt="" style="width: 50px; height: 50px" 
                                                alt="Product"></a></td>
                                                
                                                <td class="cart_description"><p class="product-name"><a href="">
                                                <?php echo ucwords($item['name']);?> </a></p>
                                                    
                                                </td>
                                                <td class="qty"><?php echo $quantity = $item['quantity']; ?>
                                                </td>
                                                
                                                <td class="price"><span>&#8358;<?php echo number_format($item['amount']);?></span></td>
                                                <td class="price"><span>&#8358;<?php echo number_format($weight_amount * $quantity);?></span></td>
                                                <td class="price"><span><?php  echo "&#8358;".number_format($item['amount'] * $quantity + $weight_amount);?></span></td>
                                                
                                                <td class="action"><a href="handlers/cart/removeFromCart.php?slug=<?php echo $item['slug'];?>"><i class="fa fa-close"></i></a></td>
                                            </tr>
                                            <?php 
                                            
                                        } ?>

                                    </tbody>
                                    
                                </table>
                            </div>
                            <div class="cart_navigation"> 
                                <a class="continue-btn" href="shop.php"><i class="fa fa-arrow-left"> </i>&nbsp; 
                                Continue shopping</a> <?php 
                                if($counting ==0){ ?>
                                    <a class="checkout-btn" href="shipping-address.php"><i class="fa fa-map-marker"></i>
                                    Add Shipping Address</a> <?php 
                                }else{ ?>
                                    <a class="checkout-btn" href="check-out.php"><i class="fa fa-check"></i>
                                    Proceed to checkout</a> <?php 
                                } ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            
                <aside class="right sidebar col-sm-3 col-xs-12">
                    <div class="sidebar-checkout block">
                        <div class="sidebar-bar-title">
                            <h3>Your Checkout</h3>
                        </div>
                        <div class="block-content">
                            <dl>
                                <dt class="complete"> Order Details <span class="separator">|</span> 
                                <!-- <a href="shopping-cart.php">Change</a>  -->
                                </dt>
                                <dd class="complete">
                                    <address>
                                    Transaction ID: <?php echo $_SESSION['transactionId'];?><br>
                                    
                                    Weight Charges: &#8358;<?php $jop =$weight_amount * $quantity; 
                                    $a = array_sum($wey); echo $a; ?><br>
                                    Sub Total: &#8358;<?php echo number_format(array_sum($total)+0) ?> <br>
                                    Total: <?php $row = (array_sum($total)+ 0);  ?>&#8358;<?php
                                        echo $a + $row;?><br>
                                    
                                    </address>
                                    </dd>
                                    <dt class="complete"> Shipping Address <span class="separator">|</span> <a href="shipping-address.php">Change</a> </dt>
                                    <dd class="complete">
                                        <address>
                                            <?php echo $_SESSION['name'] ?><br>
                                            <?php echo $_SESSION['user_name'] ?><br>
                                            <?php if($counting ==0){ ?>
                                                <a class="checkout-btn" href="shipping-address.php"><i class="fa fa-map-marker"></i> Add Your Shipping Address</a> <?php
                                            }else{ ?>
                                                <?php echo $shipLocation['state'] ?><br>
                                                <?php echo $shipLocation['phone'] ?> <br>
                                                <?php echo $shipLocation['landmark'] ?><br>
                                                <?php echo $shipLocation['address'] ?><br><?php
                                            } ?>
                                        </address>
                                    </dd>
                                    
                                    <dt> Payment Method </dt>
                                    <address>
                                        Online Payment<br>
                                        Payment of Delivery <br>
                                    </address>
                                </dl>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <?php 
            }else{ ?>
                <div class="page-title" align="center">
                    <h2 style="color: red">Your Shopping Cart is Empty</h2>
                </div>  <?php 
                            
            } ?>
		</div> <!-- /.row -->
	</div>
</div>

<?php 
    require_once('footer.php');
?>