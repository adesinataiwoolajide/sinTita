<?php
	require_once('../header.php');
	$category = new Category;
	$type = new Type;
	$genre = new Genre;
	$author = new Author;
	$publisher = new Publisher;
    $weight = new Weight;
    $product = new Product;
    $total = count($product->getAllProduct());
?>
<div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item"><a href="upload_products.php">Upload Products</a></li>
                    <li class="breadcrumb-item"><a href="add-product.php">Add Product</a></li>
                   
					<li class="breadcrumb-item"><a href="view-products.php">View Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Adding New Product</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><i class="fa fa-table"></i> Please Fill The Below Form To Add New Product </div>
                    <div class="card-body">
                        <form action="process_upload_products.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group row ">
                                <div class="col-sm-12">
                                	<label for="input-12">Upload Excel Document </label>
                                    <input type="file" class="form-control form-control-rounded" name="file" multiple required 
                                    >
                                    <span style="color: red">** This Field is Required **</span>     
                                </div>

                                <div class="col-sm-12" align="center">
                                    <button type="submit" class="btn btn-success btn-lg btn-block" name="add-product">ADD THE PRODUCT DETAILS</button>
                                </div>   
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
	    	<div class="col-lg-12">
	          	<div class="card"><?php
	          		if($total==0){ ?>
                        <div class="card-header" align="center" style="color: red">
                            <i class="fa fa-table"></i> The Product List is Empty
						</div><?php 
					}else{ ?>
						
						<div class="card-header"><i class="fa fa-table"></i> List of Saved Products</div>
						<div class="card-body">
							<div class="table-responsive">
                                <table id="default-datatable" class="table table-bordered">
									<thead>
										<tr>
                                            <th>S/N</th>
                                            <th>Image</th>
                                            <th> Name</th>
                                            <th>Quantity</th>
                                            <th>Amount</th>
										</tr>
									</thead>

									<tfoot>
										<tr>
                                        <th>S/N</th>
                                            <th>Image</th>
                                            <th> Name</th>
                                            <th>Quantity</th>
                                            <th>Amount</th>
										</tr>
									</tfoot>
									<tbody>
										<?php $number =1; 
										foreach($product->getAllProduct() as $listProduct) {
											$slug = $listProduct['slug'];
											$product_name=$listProduct['product_name'] ?>
											<tr>
												<td><?php echo $number; ?>
													<a href="delete-product.php?product_name=<?php echo $product_name ?>&&slug=<?php echo $slug ?>" onclick="return(confirmToDelete());" ><i class="fa fa-trash-o"></i></a>
                                                    
                                                    <a href="view-product-details.php?slug=<?php echo $slug ?>" class=""><i class="fa fa-id-badge"></i></a>
                                                </td>
                                                <td><?php echo $product_name ?></td>
                                                <td><img src="<?php echo "../../assets/images/product/".$listProduct['image'] ?>" 
                                                style="width: 50; height: 50px;" alt="<?php echo $product_name ?>"></td>
                                                
                                                <td><?php echo number_format($listProduct['quantity']) ?></td>
												<td>&#8358;<?php echo number_format($listProduct['amount']); ?></td>
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