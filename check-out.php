<?php 
    $body = 'shopping_cart_page';
    require_once('header.php');
	if(!isset($_SESSION['id'])){ ?>
         <script type="text/javascript"> window.location=('login.php');</script><?php 
        $_SESSION['error'] = "Please Register Or Login into Your Account"; 
    }

    if(!isset($_SESSION['cart'])){ ?>
    	<script type="text/javascript"> window.location=('shop.php');</script><?php
        $_SESSION['error'] = "Your Shopping Cart is Empty"; 

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
				<li class='active'><a href="checkout.php">Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div>
<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
						<div class="panel panel-default checkout-step-01">

							<!-- panel-heading -->
								<div class="panel-heading">
						    	<h4 class="unicase-checkout-title">
							        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
							          <span>1</span>Terms and Condition
							        </a>
							     </h4>
						    </div>
						    <!-- panel-heading -->

							<div id="collapseOne" class="panel-collapse collapse in">

								<!-- panel-body  -->
							    <div class="panel-body">
									<div class="row">		
										<!-- guest-login -->			
										<div class="col-md-12 col-sm-12 guest-login">
											<h4 class="checkout-subtitle">100% Free Shipping On Orders Greater Than 1000000</h4>
											<p class="text title-tag-line">Refund Condition</p>
										</div>
											

									</div>			
								</div>
								<!-- panel-body  -->

							</div><!-- row -->
						</div>
						<!-- checkout-step-01  -->
					    <!-- checkout-step-02  -->
					  	<div class="panel panel-default checkout-step-02">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
						          <span>2</span>Refunding Order
						        </a>
						      </h4>
						    </div>
						    <div id="collapseTwo" class="panel-collapse collapse">
						      	<div class="panel-body">
						     		100% Money Refund In Case of Failed Order
						      	</div>
						    </div>
					  	</div>
					  	<!-- checkout-step-02  -->

						<!-- checkout-step-03  -->
					  	<div class="panel panel-default checkout-step-03">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseThree">
						       		<span>3</span>Shipping Information
						        </a>
						      </h4>
						    </div>
						    <div id="collapseThree" class="panel-collapse collapse">
						      	<div class="panel-body"><?php 
						     		$reg_number = $_SESSION['reg_number'];
								    $shippingDetails = $register->gettingShippinCustomerAddress($reg_number);
								    $counting = count($shippingDetails); 
			                        if($counting > 0){
			                            foreach ($shippingDetails as$getAddress ){ ?>
			                                <form action="handlers/shipping/update-shipping-address.php" method="POST">
			                                    <div class="form-group required-field" >
			                                        <label>Phone Number </label>
			                                        <input type="number" name="phone" value="<?php echo $getAddress['phone'] ?>" readonly class="form-control" required>
			                                        <span style="color: red">** This Field is Required ** </span>
			                                    </div><!-- End .form-group -->

			                                    <div class="form-group required-field">
			                                        <label>Opposite, Next to or Near by </label>
			                                        <input type="text" name="landmark" value="<?php echo $getAddress['landmark'] ?>" readonly class="form-control" required>
			                                        <span style="color: red">** This Field is Required ** </span>
			                                    </div><!-- End .form-group -->

			                                    <div class="form-group">
			                                        <label>State </label>
			                                        <select class="form-control" name="state" required readonly>
			                                            <option value="<?php echo $getAddress['state'] ?>" selected><?php echo $getAddress['state'] ?> </option>
			                                            <option value=""></option><?php 
			                                            $zone = $db->prepare("SELECT * FROM shipping_location_charge ORDER BY location ASC");
			                                            $zone->execute(); 
			                                            while($see_state = $zone->fetch()){ ?>
			                                                <option value="<?php echo $see_state['location']; ?>"><?php echo $see_state['location']. " State"; ?></option><?php  
			                                            } ?>
			                                        </select>
			                                        <span style="color: red">** This Field is Required ** </span>
			                                    </div><!-- End .form-group -->
			                                     
			                                    <div class="form-group required-field">
			                                        <label>Street Address </label>
			                                        <textarea type="text" class="form-control" name="address" required readonly><?php echo $getAddress['address'] ?> </textarea>
			                                        <span style="color: red">** This Field is Required ** </span>
			                                    </div><!-- End .form-group -->
			                                    <input type="hidden" name="customer_id" value="<?php echo $getAddress['customer_id'] ?>">
			                                   
			                                    <div class="form-group required-field" align="center">
			                                        <a href="shipping-address.php" class="btn btn-danger" name="update-address">CHANGE SHIPPING ADDRESS</a>
			                                        
			                                    </div><!-- End .form-group -->
			                                   
			                                </form><?php 
			                            }
			                        }else{ ?>
			                        	<div class="col-lg-12">
											<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
							                    <div class="more-info-tab clearfix ">
						                            <div class="form-group required-field" align="center">
				                                        <a href="shipping-address.php" class="btn btn-danger" name="update-address">ADD SHIPPING ADDRESS</a>
				                                        
				                                    </div>
				                                </div>
				                            </div>
				                         </div><?php
			                        } ?>		
						      	</div>
						    </div>
					  	</div>
					  
					  	
					  	
					</div><!-- /.checkout-steps -->
				</div>
				<?php
		        if(isset($_SESSION['cart'])){ 
		        	$cart = $_SESSION['cart'];
                    $count = count($cart);
                    $reg_number = $_SESSION['reg_number'];
                    $shipLocation = $register->getShippinCusgAddress($reg_number); 
                    $state = $shipLocation['state']; 
                    $shipAmount = $register->getShippinLocationMoney($state); 
                    $shippingFee = $shipAmount['charge']; 
                    $wey = array();
                    if($count>0){ 
                        foreach($cart as $item){ 
                            $slug = $item['slug'];
                            $details = $product->getSingleProduct($slug); 
                            $weight_id = $details['weight_id'];
                            $quantity = $item['quantity'];
                            $deed = $weight->getSingleBookWeight($weight_id);
                            $weight_amount = $deed['amount'];
                            $cal = $item['amount'] * $item['quantity'] + $deed['amount'];
                            $foo = $item['quantity'] * $weight_amount;
                            array_push($wey, $foo);
                            //rray_push($total, $cal);
                            $a = array_sum($wey); 
                            
                        }  ?>
		                
						<div class="col-md-4">
							<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
			                    <div class="more-info-tab clearfix ">
			                    	<div class="">
										<ul class="nav nav-checkout-progress list-unstyled">
					                        <h3 align="center" style="color: green"><strong>Your Transaction Summary </strong></h3>
					                        <p>Transaction Number: <strong><?php echo $_SESSION['transactionId'];?></strong></p>
					                        <p>Shipping Fee: <strong>&#8358;<?php echo number_format($shippingFee) ?> </strong></p>
					                        <p>Product Amount: <strong>&#8358;<?php echo number_format(array_sum($total)+0);?> </strong></p>
					                        <p>Order Total: <strong>&#8358;<?php echo number_format(array_sum($total)+$shippingFee);?></strong></p>
					                    </ul>
					                </div>


			                    </div>
			                </div>
			            </div> <?php 
			        }
		        } ?>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
					<div class="checkout-progress-sidebar ">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
							    	<h3 align="center" style="color: green">Payment Methods</h3>
							    </div>
                                <form action="handlers/orders/saveOrder.php" method="post" id="self">
                                    <script src='https://js.paystack.co/v1/inline.js'></script>
                                    <input type="hidden" name="total" value="<?php echo $over = array_sum($total) + $a; ?>"  >
                                    <input type="hidden" name="subtotal" value="<?php echo array_sum($total)+0 ?>"  >
                                    <input type="hidden" name="shipping_charge" id="shipping" value="<?php echo $shippingFee; ?>">
                                    <input type="hidden" name="weight_amount" id="shipping" value="<?php echo array_sum($wey); ?>">
                                    <input type="hidden" name="email" id="email" value="<?php echo $_SESSION['user_name']; ?>">
                                    <input type="hidden" name="weight_pro" id="shipping" value="<?php echo $weight_amount * $quantity?>">
                                    
                                    <div class="cart_navigation"> 
                                        <a class="continue-btn" href="shopping-cart.php">
                                            <i class="fa fa-arrow-left"> </i>&nbsp; Back to Shopping Cart
                                        </a> 
                                        
                                        <?php 
                                        if($counting ==0){ ?>
                                            <a class="checkout-btn" href="shipping-address.php">
                                            <i class="fa fa-map-marker"></i>
                                            Add Shipping Address</a> <?php 
                                        }else{ ?>
                                            <button class="btn btn-success" type="submit" name="submit"><i class="fa fa-money"></i>
                                            Proceed to Payment</button> <?php 
                                        } ?>
                                    
                                    </div>
                                </form>
	                            <!-- End .shipping-address-box -->	
							</div>
						</div>
					</div> 
				</div>
			</div>


<?php 
    require_once('footer.php');
?>