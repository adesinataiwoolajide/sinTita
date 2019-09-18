<?php 
    $body = 'myaccount_page';
    require_once('header.php');
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
        $count = count($cart);
    }else{
        $count = 0;
    }
    if(!isset($_SESSION['id'])){ ?>
       
       <script type="text/javascript"> window.location=('login.php');</script><?php 
        $_SESSION['error'] = "Please Register Or Login into Your Account"; 
    }

    $reg_number = $_SESSION['reg_number'];
    $shippingDetails = $register->gettingShippinCustomerAddress($reg_number);
    $counting = count($shippingDetails);
?>
?>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home"> <a title="Go to Home Page" href="./">Home</a><span>&raquo;</span></li>
                        <li class=""> <a title="Go to shipping-address.php Page" 
                            href="shipping-address.php">
                            Shop Products </a><span>&raquo;

                            </span>
                        </li>
                        <li><strong>User Login page</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container col1-layout">
        <div class="container">
            <div class="row">
                <div class="col-main col-sm-12 col-xs-12">
                    
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                        <div class="single-input p-bottom50 clearfix">
                            <?php 
                            if($counting > 0){
                                foreach ($shippingDetails as$getAddress ){ ?>
                                    <form action="handlers/shipping/update-shipping-address.php" method="POST">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="check-title">
                                                    <h4>Customer Shipping Address</h4>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <label>First Name:</label>
                                                <div class="input-text">
                                                    <input type="text" name="full_name" value="<?php echo $_SESSION['name'] ?>" class="form-control" placeholder="Enter your Full Name" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <label>E-Mail:</label>
                                                <div class="input-text">
                                                    <input type="text" name="email"  value="<?php echo $_SESSION['user_name']; ?>" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <label>Phone Number</label>
                                                <div class="input-text">
                                                    <input type="text" name="phone" class="form-control" value="<?php echo $getAddress['phone'] ?>"  placeholder="Enter your Phone number" required>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12">
                                                <label>Opposite</label>
                                                <div class="input-text">
                                                    <input type="text" name="landmark" class="form-control" required value="<?php echo $getAddress['landmark'] ?>" placeholder="Enter your Landmark" minlenght="">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <label>State</label>
                                                <div class="input-text">
                                                    <select  class="form-control" name="state" required>
                                                        <option value="<?php echo $getAddress['state'] ?>"><?php echo $getAddress['state'] ?> </option>
                                                        <option value=""></option><?php 
                                                        $zone = $db->prepare("SELECT * FROM shipping_location_charge ORDER BY location ASC");
                                                        $zone->execute(); 
                                                        while($see_state = $zone->fetch()){ ?>
                                                            <option value="<?php echo $see_state['location']; ?>"><?php echo $see_state['location']. " State"; ?></option><?php  
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" style="margin-bottom: 20px">
                                                <label>Address</label>
                                                <div class="input-text">
                                                    <textarea class="form-control" name="address" placeholder="Please Enter Your Street Address" required>      
                                                    <?php echo $getAddress['address'] ?></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" name="customer_id" value="<?php echo $getAddress['customer_id'] ?>"><br><br>
                                            <div class="col-xs-12">
                                                
                                                <div class="submit-text">
                                                    <button class="button" type="submit" name="update-address"><i class="fa fa-user"></i>&nbsp; <span>Update Details</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form><?php
                                } 
                            }else{ ?>
                                <form action="handlers/shipping/add-shipping-address.php" method="POST">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="check-title">
                                                <h4>Customer Shipping Address</h4>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <label>First Name:</label>
                                            <div class="input-text">
                                                <input type="text" name="full_name" value="<?php echo $_SESSION['name']; ?>"" class="form-control" 
                                                placeholder="Enter your Full Name" readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <label>E-Mail:</label>
                                            <div class="input-text">
                                                <input type="text" name="email"  value="<?php echo $_SESSION['user_name']; ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <label>Phone Number</label>
                                            <div class="input-text">
                                                <input type="number" name="phone" class="form-control" placeholder="Enter your Phone number" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <label>Opposite</label>
                                            <div class="input-text">
                                                <input type="text" name="landmark" class="form-control" placeholder="Enter your Landmark" minlenght="" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <label>State</label>
                                            <div class="input-text">
                                                <select  class="form-control" name="state" required>
                                                    <option value="">-- Select Your State -- </option>
                                                    <option value=""></option><?php 
                                                    $zone = $db->prepare("SELECT * FROM shipping_location_charge ORDER BY location ASC");
                                                    $zone->execute(); 
                                                    while($see_state = $zone->fetch()){ ?>
                                                        <option value="<?php echo $see_state['location']; ?>"><?php echo $see_state['location']. " State"; ?></option><?php  
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="margin-bottom: 20px">
                                            <label>Address</label>
                                            <div class="input-text">
                                                <textarea class="form-control" name="address" placeholder="Please Enter Your Street Address" required>      
                                                </textarea>
                                            </div>
                                        </div><br><br>
                                        
                                        <div class="col-xs-12">
                                            
                                            <div class="submit-text">
                                                <button class="button" type="submit" name="add-address"><i class="fa fa-user"></i>&nbsp; <span>Add Shipping Address</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form><?php
                            }?>
                        </div>
                    </div>
                    <aside class="right sidebar col-sm-4 col-xs-12">
                        <div class="sidebar-checkout block">
                            <div class="sidebar-bar-title">
                                <h3>Your Checkout</h3>
                            </div>
                            <div class="block-content">
                                <dl>
                                    <a class="continue-btn" href="shop.php"><i class="fa fa-arrow-left"> </i>&nbsp; 
                                        Continue shopping
                                    </a><br><br>
                                    <a class="checkout-btn" href="shopping-cart.php"><i class="fa fa-arrow-left"> </i>&nbsp; 
                                        Shopping Cart
                                    </a> <br><br>
                                    <a class="checkout-btn" href="checkout.php"><i class="fa fa-shopping-cart"> </i>&nbsp; 
                                        Check Out
                                    </a> <br><br>
                                    <a class="checkout-btn" href="shop.php"><i class="fa fa-arrow-left"> </i>&nbsp; 
                                    Continue shopping</a>

                                         
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                                      
                </div>
            </div>
        </div>
    </div>  
<?php 
    require_once('footer.php');
?>