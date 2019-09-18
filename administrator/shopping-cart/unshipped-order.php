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
    $total = count($order->unshippedCustomerOrder());
	
?>
<div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item"><a href="unshipped-order.php">Unshipped Order</a></li>
                    <li class="breadcrumb-item"><a href="shipped-order.php">Shipped Order</a></li>
                    <li class="breadcrumb-item"><a href="view-order.php">View All Order</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Customer Unshipped Order</li>
                </ol>
            </div>
        </div>
       
        <div class="row">
	    	<div class="col-lg-12">
	          	<div class="card"><?php
	          		if($total==0){ ?>
                        <div class="card-header" align="center" style="color: red">
                            <i class="fa fa-table"></i> No Recent Order Was Found
						</div><?php 
					}else{ ?>
						
						<div class="card-header"><i class="fa fa-table"></i> List of Unshipped Order</div>
						<div class="card-body">
							<div class="table-responsive">
                                <table id="default-datatable" class="table table-bordered">
									<thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Customer</th>
                                            <th>Status</th>
                                            <th> Order Number</th>
                                            <th>Payment</th>
                                            <th>Total Order</th>
										</tr>
									</thead>

									<tfoot>
										<tr>
                                            <th>S/N</th>
                                            <th>Customer</th>
                                            <th>Status</th>
                                            <th> Order Number</th>
                                            <th>Payment</th>
                                            <th>Total Order</th>
										</tr>
									</tfoot>
									<tbody>
										<?php $number =1; 
										foreach($order->unshippedCustomerOrder() as $listOrder) {
                                            $customer_id = $listOrder['customer_id'];
                                            $level = $customer->getAllSingleCustomer($customer_id);
											$order_id=$listOrder['order_id'] ?>
											<tr>
												<td><?php echo $number; ?>
                                                    <a href="ship-order.php?order_number=<?php echo $order_id ?>" class="btn btn-primary">
                                                    <i class="fa fa-id-badge"></i></a>
                                                </td>
                                                <td><?php echo $level['full_name'] ?></td>
                                                <td><p style="color: red">Un Shipped</p></td>
                                                <td><?php echo $order_id ?></td>
                                                <td><?php echo $listOrder['paystack_reference'] ?></td>
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
    <!-- End container-fluid-->
    
</div><!--End content-wrapper-->
         
        

<?php
	require_once('../footer.php');
?>