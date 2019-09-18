<?php
	require_once('../header.php');
	$type = new Type;
	$total = count($type->getAllProductType());
?>
<div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item"><a href="type.php">Add Product Type</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List of Saved Product Types</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><i class="fa fa-table"></i> Please Fill The Below Form To Add New Product Type </div>
                    <div class="card-body">
                        <form action="process-type.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group row ">
                                <div class="col-sm-3">
                                	<label for="input-12">Type Name </label>
                                    <input type="text" class="form-control form-control-rounded" name="type_name" required 
                                    placeholder="Enter The Product Type Name">
                                    <span style="color: red">** This Field is Required **</span>     
                                </div>
                                <div class="col-sm-3">
                                	<label for="input-12">Type Name </label>
                                    <input type="text" class="form-control form-control-rounded" name="type_name" required 
                                    placeholder="Enter The Product Type Name">
                                    <span style="color: red">** This Field is Required **</span>     
                                </div>
                                <div class="col-sm-3">
                                	<label for="input-12">Type Name </label>
                                    <input type="text" class="form-control form-control-rounded" name="type_name" required 
                                    placeholder="Enter The Product Type Name">
                                    <span style="color: red">** This Field is Required **</span>     
                                </div>
                                <div class="col-sm-3">
                                	<label for="input-12">Type Name </label>
                                    <input type="text" class="form-control form-control-rounded" name="type_name" required 
                                    placeholder="Enter The Product Type Name">
                                    <span style="color: red">** This Field is Required **</span>     
                                </div>

                                <div class="col-sm-12" align="center">
                                    <button type="submit" class="btn btn-success btn-lg btn-block" name="add-type">ADD THE USER </button>
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

		            
		            	<div class="card-header"><i class="fa fa-table"></i> List of Saved Product Types</div>
	            		<div class="card-body">
	              			<div class="table-responsive">
								<table id="default-datatable" class="table table-bordered">
	              					<thead>
					                    <tr>
					                        <th>S/N</th>
					                        <th>Type Name</th>
											
					                    </tr>
					                </thead>

					                <tfoot>
					                    <tr>
											<th>S/N</th>
											<th>Type Name</th>
											
					                    </tr>
					                </tfoot>
					                <tbody>
					                	<?php $number =1; 
										foreach($type->getAllProductType() as $listType) {
											$type_id = $listType['type_id'];
											$type_name=$listType['type_name'] ?>
											<tr>
												<td><?php echo $number; ?>
													<a href="delete-type.php?type_name=<?php echo $type_name ?>&&type_id=<?php echo $type_id ?>" class="btn btn-danger" onclick="return(confirmToDelete());"><i class="fa fa-trash-o"></i></a>
													<a href="edit-type.php?type_name=<?php echo $type_name ?>&&type_id=<?php echo $type_id ?>" class="btn btn-success" onclick="return(confirmToEdit());"><i class="fa fa-pencil"></i></a>
												</td>
												<td><?php echo $type_name ?></td>
												
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