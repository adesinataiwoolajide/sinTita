<?php
	require_once('../header.php');
    $author = new Author;
    $type = new Type;
    $genre = new Genre;
    $publisher = new Publisher;
    $product = new Product;
    $order = new Order;
    $customer = new Customer;
    $category = new Category;
    $weight = new Weight;
    $location = new LocationCharge;
?>
<div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mt-3 gradient-dusk">
            <div class="card-content">
                <div class="row row-group m-0"  style="cursor: pointer">
                    <div class="col-12 col-lg-6 col-xl-3 border-white-2" onclick="location.href='view-products.php'">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="mb-0 text-white">&#8358;<?php echo number_format($product->sumAllProduct()); ?></h4>
                                    <span class="text-white">Total <br>Assets</span>
                                </div>
                                <div class="align-self-center w-icon">
                                    <i class="icon-basket-loaded text-white"></i></div>
                            </div>
                            <div class="progress-wrapper mt-3">
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-white-2" onclick="location.href='unshipped-order.php'">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="mb-0 text-white"><?php echo count($order->unshippedCustomerOrder()); ?></h4>
                                    <span class="text-white">Un Shipped<br> Orders</span>
                                </div>
                                <div class="align-self-center w-icon">
                                    <i class="icon-wallet text-white"></i></div>
                            </div>
                            <div class="progress-wrapper mt-3">
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-white-2" onclick="location.href='shipped-order.php'">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="mb-0 text-white"><?php echo count($location->getAllShipping()); ?></h4>
                                    <span class="text-white">Shipped  <br>Orders</span>
                                </div>
                                <div class="align-self-center w-icon">
                                    <i class="icon-pie-chart text-white"></i></div>
                            </div>
                            <div class="progress-wrapper mt-3">
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-white-2" onclick="location.href='customer-order.php'">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="mb-0 text-white"><?php echo count($order->getAllOrders()) ?></h4>
                                    <span class="text-white">New <br> Orders</span>
                                </div>
                                <div class="align-self-center w-icon">
                                    <i class="icon-user text-white"></i></div>
                            </div>
                            <div class="progress-wrapper mt-3">
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="card mt-3 gradient-forest">
            <div class="card-content">
                <div class="row row-group m-0" style="cursor: pointer">
                    <div class="col-12 col-lg-6 col-xl-3 border-white-2"  onclick="location.href='view-products.php'">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="mb-0 text-white"><?php echo count($product->getAllProduct()); ?></h4>
                                    <span class="text-white">Total  <br>Products</span>
                                </div>
                                <div class="align-self-center w-icon">
                                    <i class="fa fa-cogs text-white"></i></div>
                            </div>
                            <div class="progress-wrapper mt-3">
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-white-2"  onclick="location.href='confirmed-payment.php'">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="mb-0 text-white"><?php echo count($order->confirmPayment()); ?></h4>
                                    <span class="text-white">Confirmed <br> Payment</span>
                                </div>
                                <div class="align-self-center w-icon">
                                    <i class="icon-wallet text-white"></i></div>
                            </div>
                            <div class="progress-wrapper mt-3">
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-white-2"  onclick="location.href='unconfirmed-payment.php'">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="mb-0 text-white"><?php echo count($order->unconfirmPayment()); ?></h4>
                                    <span class="text-white">Un Confirmed <br> Payment</span>
                                </div>
                                <div class="align-self-center w-icon">
                                    <i class="icon-pie-chart text-white"></i></div>
                            </div>
                            <div class="progress-wrapper mt-3">
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-white-2"  onclick="location.href='all-payments.php'">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="mb-0 text-white"><?php echo count($order->getAllOrders()) ?></h4>
                                    <span class="text-white">All <br> Payments</span>
                                </div>
                                <div class="align-self-center w-icon">
                                    <i class="icon-user text-white"></i></div>
                            </div>
                            <div class="progress-wrapper mt-3">
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="card mt-3 gradient-army">
            <div class="card-content">
                <div class="row row-group m-0" style="cursor: pointer">
                    <div class="col-12 col-lg-6 col-xl-3 border-white-2">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="mb-0 text-white"><?php echo count($weight->getAllProductWeight()); ?></h4>
                                    <span class="text-white">Product <br>Weight</span>
                                </div>
                                <div class="align-self-center w-icon">
                                    <i class="fa fa-cogs text-white"></i></div>
                            </div>
                            <div class="progress-wrapper mt-3">
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-white-2">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="mb-0 text-white"><?php echo count($product->seeAllPubProduct()); ?></h4>
                                    <span class="text-white">Product <br> Sub Categories</span>
                                </div>
                                <div class="align-self-center w-icon">
                                    <i class="icon-wallet text-white"></i></div>
                            </div>
                            <div class="progress-wrapper mt-3">
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-white-2">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="mb-0 text-white"><?php echo count($product->seeAllUnPubProduct()); ?></h4>
                                    <span class="text-white">UnPublished <br> Products</span>
                                </div>
                                <div class="align-self-center w-icon">
                                    <i class="icon-pie-chart text-white"></i></div>
                            </div>
                            <div class="progress-wrapper mt-3">
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-white-2">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body text-left">
                                    <h4 class="mb-0 text-white"><?php echo count($order->getAllOrders()) ?></h4>
                                    <span class="text-white">New <br> Orders</span>
                                </div>
                                <div class="align-self-center w-icon">
                                    <i class="icon-user text-white"></i></div>
                            </div>
                            <div class="progress-wrapper mt-3">
                                <div class="progress" style="height:5px;">
                                    <div class="progress-bar" style="width:50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		  
    </div>
    <!-- End container-fluid-->
    
</div><!--End content-wrapper-->
         
        

<?php
	require_once('../footer.php');
?>