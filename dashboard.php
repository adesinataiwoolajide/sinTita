<?php 
    $body = 'myaccount_page';
    require_once('header.php');
    if(!isset($_SESSION['id'])){ ?>
        <script type="text/javascript"> window.location=('login.php');</script><?php 
    $_SESSION['error'] = "Please Register Or Login into Your Account"; 
}
?>
   <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home"> <a title="Go to Home Page" href="./">Home</a><span>&raquo;</span></li>
                        <li class=""> <a title="Go to Order Details" 
                            href="dashboard.php">
                            Dashboard </a><span>&raquo;

                            </span>
                        </li>
                       
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
                    </div><?php

                    //$reg_number = $_SESSION['reg_number'];
                    $shipLocation = $register->getShippinCusgAddress($reg_number); 
                    $state = $shipLocation['state']; 
                    $shipAmount = $register->getShippinLocationMoney($state); 
                    $shippingFee = $shipAmount['charge']; 
                    $customer_id = $reg_number; 
                    if(count($customer->getAllSingleCustomerOrder($customer_id)) == 0){ ?>
                        <p style="color:red" align="center"> Your Order List is Empty </p><?php
                    }else{ ?>
                        <div class="order-detail-content">
                            <div class="table-responsive">
                                <table class="table table-bordered cart_summary">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Customer</th>
                                            <th>E-Mail</th>
                                            <th> Order Number</th>
                                            <th>Transaction Number </th>
                                            <th>Payment Status</th>
                                            <th>Shipping Status</th>
                                            <th>Delivery Status</th>
                                            <th>Total Order</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Customer</th>
                                            <th>E-Mail</th>
                                            <th> Order Number</th>
                                            <th>Transaction Number </th>
                                            <th>Payment Status</th>
                                            <th>Shipping Status</th>
                                            <th>Delivery Status</th>
                                            <th>Total Order</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $number =1; 
                                        foreach($customer->getAllSingleCustomerOrder($customer_id) as $listOrder) {
                                            $customer_id = $listOrder['customer_id'];
                                            $level = $customer->getAllSingleCustomer($customer_id);
                                            $order_id=$listOrder['order_id'] ?>
                                            <tr>
                                                <td><?php echo $number; ?>
                                                    <a href="order-details.php?order_number=<?php echo $order_id ?>&&registration_number=<?php echo $customer_id ?>" 
                                                    class="btn btn-success"><i class="fa fa-list"></i></a>
                                                </td>
                                                <td><?php echo $level['full_name'] ?></td>
                                                <td><?php echo $level['user_name'] ?></td>
                                                <td><?php echo $order_id ?></td>
                                                <td><?php echo $listOrder['paystack_reference'] ?></td> 
                                                <td><?php 
                                                    if($listOrder['paid_status'] ==0){ ?>
                                                        <p style="color: red"> Pending</p><?php
                                                    }else{ ?>
                                                        <p style="color: green"> Confirmed</p><?php
                                                    } ?>
                                                    
                                                </td>
                                                <td>
                                                    <?php 
                                                    if($listOrder['shipping'] ==0){ ?>
                                                        <p style="color: red"> Pending</p><?php
                                                    }else{ ?>
                                                        <p style="color: green"> Shipped</p><?php
                                                    } ?></td>
                                                <td>
                                                    <?php 
                                                    if($listOrder['delivery'] ==0){ ?>
                                                        <p style="color: red"> Pending</p><?php
                                                    }else{ ?>
                                                        <p style="color: green"> Delivered</p><?php
                                                    } ?></td>
                                                <td>&#8358;<?php echo number_format($listOrder['amount']) ?></td>
                                            </tr><?php
                                            $number++; 
                                        }?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div><?php
                    } ?>
                    
                    
                </div>
                
            </div>
        </div>
    </div>
</section>
   
<?php 
    require_once('footer.php');
?>