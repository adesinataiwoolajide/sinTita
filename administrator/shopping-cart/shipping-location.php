<?php
	require_once('../header.php');
    $location = new LocationCharge;
    $total = count($location->getAllLocation());
?>
<div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item"><a href="shipping-location.php">Add Shipping Location</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List of Saved Shipping Location</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><i class="fa fa-table"></i> Please Fill The Below Form To Add New Shipping Location</div>
                    <div class="card-body">
                        <form action="process_location.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group row">
                                <div class="col-sm-6">
                                	<label for="input-6">Shipping Location </label>
                                    <input type="text" class="form-control form-control-rounded" name="location" required 
                                    placeholder="Enter The Shipping Location ">
                                    <span style="color: red">** This Field is Required **</span>     
                                </div>

                                <div class="col-sm-6">
                                	<label for="input-6">Charges </label>
                                    <input type="number" class="form-control form-control-rounded" name="charge" required 
                                    placeholder="Enter The Charges">
                                    <span style="color: red">** This Field is Required **</span>     
                                </div>
                                
                                <div class="col-sm-12" align="center">
                                    <button type="submit" class="btn btn-success btn-lg btn-block" name="add-location">ADD THE LOCATION </button>
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
                            <i class="fa fa-table"></i> The List is Empty
						</div><?php 
					}else{ ?>
						
		            
		            	<div class="card-header"><i class="fa fa-table"></i> List of Saved Shipping Location</div>
	            		<div class="card-body">
	              			<div class="table-responsive">
	              				<table id="default-datatable" class="table table-bordered">
	              					<thead>
					                    <tr>
					                        <th>S/N</th>
					                        <th>Location</th>
					                        <th>Charge</th>
					                    </tr>
					                </thead>

					                <tfoot>
					                    <tr>
											<th>S/N</th>
											<th>Location</th>
					                        <th>Charge</th>
					                    </tr>
					                </tfoot>
					                <tbody>
					                	<?php $number =1; 
										foreach($location->getAllLocation() as $listGenre) {
											$locationid = $listGenre['id'];
											$locat=$listGenre['location']; ?>
											<tr>
												<td><?php echo $number; ?>
													<a href="delete-location.php?location=<?php echo $locat ?>" class="btn btn-danger" onclick="return(confirmToDelete());"><i class="fa fa-trash-o"></i></a>
                                                    <a href="edit-shipping-location.php?location=<?php echo $locat ?>&&location_id=<?php echo $locationid ?>" 
                                                    class="btn btn-success" onclick="return(confirmToEdit());"><i class="fa fa-pencil"></i></a>
												</td>
												<td><?php echo $locat ?></td>
												<td>
                                                    &#8358;<?php echo number_format($listGenre['charge']); ?>
												</td>
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
        </div> -->
        
    </div>
    <!-- End container-fluid-->
    
</div><!--End content-wrapper-->
         
        

<?php
	require_once('../footer.php');
?>