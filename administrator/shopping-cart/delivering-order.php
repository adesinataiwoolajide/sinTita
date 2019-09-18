<?php
    require_once('../header.php');
    
    $author = new Author;
    $type = new Type;
    $genre = new Genre;
    $publisher = new Publisher;
    $category = new Category;
    $product = new Product;
    $order = new Order;
    $customer = new Customer;
    $orderId = $_GET['order_number'];
    $buy = $order->getOrderId($orderId);  
   
?>
<div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item"><a href="delivering-order.php?order_number=<?php echo $orderId ?>">Delivering Order</a></li>
                    <li class="breadcrumb-item"><a href="deliver-order.php">Deliver Order</a></li>
                    <li class="breadcrumb-item"><a href="delivered-order.php">Delivered Order</a></li>
                    <li class="breadcrumb-item"><a href="view-order.php">View All Order</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Delivering The Customer Order</li>
                </ol>
            </div>
        </div>
       
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <p>The List of Product </p>
                        <div class="table-responsive">
                            <table id="default-datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Product </th>
                                        <th> Quantity</th>
                                        <th>Weight Amount</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Product </th>
                                        <th> Quantity</th>
                                        <th>Weight Amount</th>
                                        <th>Amount</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $number =1; 
                                    foreach($order->singleCustomerOrder($orderId) as $listOrder) {
                                        $buy = $order->getOrderId($orderId);
                                        $slug = $listOrder['product_id'];
                                        $see = $product->getSingleProduct($slug);
                                        $customer_id = $buy['customer_id'];
                                        $level = $customer->getAllSingleCustomer($customer_id);
                                        ?>
                                        <tr>
                                            <td><?php echo $number; ?>
                                            </td>
                                            <td><?php echo $see['product_name'] ?></td>
                                            <td><?php echo $listOrder['quantity'] ?></td>
                                            <td>&#8358;<?php echo ($listOrder['weight_pro']) ?></td>
                                            <td>&#8358;<?php echo number_format($listOrder['amount']) ?></td>
                                        </tr><?php
                                        $number++; 
                                    }?>
                                </tbody>
                            
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-12 col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <p>Customer Details </p>
                        <div class="table-responsive">
                            <table id="default-datatable" class="table table-bordered"><?php
                                $buy = $order->getCustomerOrderDetails($orderId);
                                $customer_id = $buy['customer_id'];
                                $level = $customer->getAllSingleCustomer($customer_id);
                                $reg_number = $level['reg_number'];
                                foreach($register->gettingShippinCustomerAddress($reg_number) as $shippingDetails){ ?>
                                    <tbody>
                                        <tr>
                                            
                                            <td>Full Name<?php echo $level['full_name'] ?></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            
                                            <td>E-Mail<?php echo $level['user_name'] ?></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            
                                            <td>Phone:<?php echo $shippingDetails['phone'] ?></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            
                                            <td>Opposite: <?php echo $shippingDetails['landmark'] ?></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            
                                            <td>Address<?php echo $shippingDetails['address']; ?></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            
                                            <td>State: <?php echo $shippingDetails['state'] ?></td>
                                        </tr>
                                    </tbody><?php 
                                } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <p>Payment Breakdown</p>
                        <div class="table-responsive">
                            <table id="default-datatable" class="table table-bordered"><?php
                                $buy = $order->getCustomerOrderDetails($orderId);
                                $customer_id = $buy['customer_id'];
                                $level = $customer->getAllSingleCustomer($customer_id);
                                $tot = $order->singleOrder($customer_id, $orderId); ?>
                                <tbody>
                                    <tr>
                                        <td>Order Number: <?php echo $orderId; ?></td>
                                    </tr>
                                </tbody>  
                                <tbody>
                                    <tr>
                                        <td>Payment Id: <?php echo ($tot['paystack_reference']); ?></td>
                                    </tr>
                                </tbody>   
                                <tbody>
                                    <tr>
                                        <td>Product Sub Total: &#8358;<?php echo number_format($tot['subtotal']) ?></td>
                                    </tr>
                                </tbody>
                                    <tbody>
                                        <tr>
                                            <td>Weight Charges: &#8358;<?php echo $order->sumSingleOrder($orderId) ?></td>
                                        </tr>
                                    </tbody>
                                <tbody>
                                    <tr>
                                        <td>Total Charges: &#8358;<?php echo number_format($tot['amount']); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><?php 
                        if($tot['delivery'] ==0){ ?>
                            <a href='confirm-delivery.php?action=<?php echo 'deliverOrder' ?>&&order_number=<?php echo $orderId ?>&&customer_number=<?php echo $customer_id ?>'  
                            class="btn btn-danger btn-lg btn-block">Deliver The Product</a><?php 
                        }else{ ?>
                            <a href='confirm-delivery.php?action=<?php echo 'undeliverOrder' ?>&&order_number=<?php echo $orderId ?>&&customer_number=<?php echo $customer_id ?>'  
                            class="btn btn-success btn-lg btn-block">Undeliver The Product</a><?php
                        } ?>
                        
                        
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