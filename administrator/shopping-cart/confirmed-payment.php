<?php
    require_once('../header.php');
    
    $author = new Author;
    $type = new Type;
    $genre = new Genre;
    $publisher = new Publisher;
    $category = new Category;
    $product = new Product;
    $order = new Order;
    $ship = new LocationCharge;
    $customer = new Customer;

    $total = count($order->confirmPayment());
?>
<div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item"><a href="confirmed-payment.php">Confirm Payment</a></li>
                    <li class="breadcrumb-item"><a href="unconfirm-payment.php">Un Confirm Pyment</a></li>
                    <li class="breadcrumb-item"><a href="all-payments.php">View All Payment</a></li>
                </ol>
            </div>
        </div>
       
        <div class="row">
	    	<div class="col-lg-12">
	          	<div class="card"><?php
	          		if($total==0){ ?>
                        <div class="card-header" align="center" style="color: red">
                            <i class="fa fa-table"></i> The List is Empty
						</div><?php 
					}else{ ?>
						
						<div class="card-header"><i class="fa fa-table"></i> List of Confirmed Customer OrderPaymant</div>
						<div class="card-body">
							<div class="table-responsive">
                                <table id="default-datatable" class="table table-bordered">
									<thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Customer</th>
                                            <th> Order Number</th>
                                            <th>Paystack </th>
                                            <th>Status </th>
                                            <th>Total Order</th>
                                            <th>Time</th>
										</tr>
									</thead>

									<tfoot>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Customer</th>
                                            <th> Order Number</th>
                                            <th>Paystack </th>
                                            <th>Status </th>
                                            <th>Total Order</th>
                                            <th>Time</th>
										</tr>
									</tfoot>
									<tbody>
										<?php $number =1; 
										foreach($order->confirmPayment() as $listOrder) {
                                            $customer_id = $listOrder['customer_id'];
                                            $level = $customer->getAllSingleCustomer($customer_id);
                                            $orderId=$listOrder['order_id'];
                                            $tot = $order->singleOrder($customer_id, $orderId); ?>
											<tr>
												<td><?php echo $number; ?>
                                                    <a href="process-payment.php?action=<?php echo 'UnConfirm' ?>&&order_number=<?php echo $orderId ?>&&customer_number=<?php echo $customer_id ?>" class="btn btn-success">
                                                        <i class="fa fa-cogs">UnConfirm</i>
                                                    </a>
                                            
                                                </td><?php
                                                $reg_number = $level['reg_number'];
                                                foreach($register->gettingShippinCustomerAddress($reg_number) as $shippingDetails){ ?>
                                                    <td><?php echo $level['full_name']. " <br>". $level['user_name']. "<br>".
                                                      $shippingDetails['phone']; ?></td>
                                                    <?php 
                                                } ?>
                                                <td><?php echo $orderId ?></td>
                                                <td><?php echo $listOrder['paystack_reference'] ?></td>
                                                <td><p style="color: green"> Confirmed</p></td>
                                                <td> &#8358;<?php echo number_format($tot['amount']); ?></td>
                                                <td><?php echo $listOrder['time_created'] ?></td>

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
    <!-- End container-fluid-->
    
</div><!--End content-wrapper-->
         
        

<?php
	require_once('../footer.php');
?>