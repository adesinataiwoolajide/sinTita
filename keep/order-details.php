<?php 
$body = 'shop_grid_page';
require_once('header.php');
if(!isset($_SESSION['id'])){ ?>
        <script type="text/javascript"> window.location=('login.php');</script><?php 
    $_SESSION['error'] = "Please Register Or Login into Your Account"; 
}
$reg_number = $_GET['registration_number'];
$orderId = $_GET['order_number'];
$buy = $order->getOrderId($orderId);  
?>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <li class="home"> <a title="Go to Home Page" href="./">Home</a><span>&raquo;</span></li>
                    <li class=""> <a title="Go to Order Details" 
                        href="my_orders.php?registration_number=<?php echo $reg_number ?>">
                        Order List </a><span>&raquo;

                        </span>
                    </li>
                    <li><strong>List of <?php echo $_SESSION['name'] ?> Order Details</strong></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="main-container col2-right-layout">
    <div class="main container">
        <div class="col-main">
            <div class="cart">
               
            <div class="col-main col-sm-12 col-xs-12">
                <div class="page-content page-order">
                    <div class="page-title">
                        <h2><?php echo $_SESSION['name'] ?> Order List</h2>
                    </div>
                    <div class="order-detail-content">
                        <div class="table-responsive">
                            <table class="table table-bordered cart_summary">
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
                                            <td>&#8358;<?php echo number_format($listOrder['weight_pro']) ?></td>
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
            <div class="col-main col-sm-6 col-xs-12">
                <div class="page-content page-order">
                    <div class="page-title">
                        <h2><?php echo $_SESSION['name'] ?> Shipping Address</h2>
                    </div>
                    <div class="order-detail-content">
                        <div class="table-responsive">
                            <table class="table table-bordered cart_summary"><?php
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
            <div class="col-main col-sm-6 col-xs-12">
                <div class="page-content page-order">
                    <div class="page-title">
                        <h2>Payment Break Down</h2>
                    </div>
                    <div class="order-detail-content">
                        <div class="table-responsive">
                            <table class="table table-bordered cart_summary"><?php
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
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</section>
<?php 
    require_once('footer.php');
?>
