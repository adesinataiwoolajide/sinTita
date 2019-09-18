<?php
	require_once('../header.php');
    $author = new Author;
    $type = new Type;
    $genre = new Genre;
    $publisher = new Publisher;
    $category = new Category;
    $product = new Product;
    $weight = new Weight;

    $slug = $_GET['slug'];
    $details = $product->getSingleProduct($slug);

    $product_name = $details['product_name'];
    $category_id = $details['category_id'];
    $publisher_id = $details['publisher_id'];;
    $genre_id = $details['genre_id'];
    $edition = $details['edition'];
    $stock = $product->getsProductStock($product_name, $category_id, $genre_id, $publisher_id, $edition); 
    $category_id = $details['category_id']; 
    $cate = $category->getSingleCategoryList($category_id);
    $genre_id = $details['genre_id'];
    $see = $genre->getSingleGenreType($genre_id);
    $type_id = $see['type_id'];
    $name = $type->getSingleBookType($type_id);
    $type_name = $name['type_name'];
    $weight_id = $details['weight_id']; 
    $deel = $weight->getSingleBookWeight($weight_id);
    $author_id = $details['author_id'];
    $hello = $author->getSingleAuthorList($author_id);
    $publisher_id = $details['publisher_id'];
    $hel = $publisher->getSinglePublisherList($publisher_id); 
	
?>
<div class="clearfix"></div>
	
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                    <li class="breadcrumb-item"><a href="view-product-details.php?slug=<?php echo $slug ?>">View Product Details</a></li>
                    <li class="breadcrumb-item"><a href="view-products.php">View Product</a></li>
                    <li class="breadcrumb-item"><a href="add-product.php">Add Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List of Saved Products</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card profile-card-2">
                    <div class="card-body border-top border-light">
                        <div align="center">
                            <img src="<?php echo "../../assets/images/product/".$details['image'] ?>" 
                            alt="skill img" style="width: 200px; height:200px">
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="card profile-card-2">
                    
                    <div class="card-body border-top border-light">
                       
                        <?php  $add = $stock['quantity']; ?>
                        
                        
                        
                        <div class="media align-items-center">
                            <div class="table-responsive">
                                <table class="table table-hover table-responsive">
                                    
                                    <tbody>                                    
                                        <tr>
                                            <td>Amount</td  >
                                            <td>&#8358;<?php echo number_format($details['amount'] )?></td>
                                        </tr>
                                    </tbody>
                                    <tbody>                                    
                                        <tr>
                                            <td>Quantity</td>   
                                            <td><?php echo $details['quantity'] ?></td>
                                        </tr>
                                    </tbody>
                                    
                                    <tbody>                                    
                                        <tr>
                                            <td>Manufacturer</td >  
                                            <td><?php echo $hel['publisher_name']; ?></td>
                                        </tr>
                                    </tbody>
                                    <tbody>                                    
                                        <tr>
                                            <td>Supplier</td >  
                                            <td><?php echo $hello['author_name'] ?></td>
                                        </tr>
                                    </tbody>
                                    
                                    <tbody>                                    
                                        <tr>
                                            <td>Description</td >  
                                            <td><?php echo $details['description'] ?></td>
                                        </tr>
                                    </tbody>

                                    
                                </table>
                            
                            </div>
                        </div>
                        <hr>
                       
                  
                    </div>
                </div>
                
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><i class="icon-user"></i> 
                            <span class="hidden-xs">More Details</span></a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                        </li>
                    </ul>
                    <div class="tab-content p-3">
                        <div class="tab-pane active" id="profile">
                            
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <h5 class="mt-2 mb-3"><span class="fa fa-clock-o ion-clock float-right"></span> Product Details</h5>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-responsive">
                                                <tbody>                                    
                                                    <tr>
                                                        <td>Product Number</td  > 
                                                        <td><?php echo $slug ?></td>
                                                    </tr>
                                                </tbody>
                                                <tbody>                                    
                                                    <tr>
                                                        <td>Product Name</td  > 
                                                        <td><?php echo $details['product_name'] ?></td>
                                                    </tr>
                                                </tbody>
                                                <tbody>                                    
                                                    <tr>
                                                        <td>Category</td >  
                                                        <td><?php echo $cate['category_name'] ?></td>
                                                    </tr>
                                                </tbody>
                                                <tbody>                                    
                                                    <tr>
                                                        <td>Type</td > 
                                                        <td><?php echo $type_name ?></td>
                                                    </tr>
                                                </tbody>
                                                <tbody>                                    
                                                    <tr>
                                                        <td>Sub Type</td >  
                                                        <td><?php echo $see['genre_name'] ?></td>
                                                    </tr>
                                                </tbody>
                                                
                                                
                                            </table>
                                        
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                            </div>
                            
                            <div class="tab-pane" id="edit">
                                <form action="update-product.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row ">
                                        <div class="col-sm-6">
                                            <label for="input-6">Change Image </label>
                                            <input type="file" class="form-control form-control-rounded" name="image" 
                                            >
                                            <span style="color: red">** This Field is Optional **</span>     
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="input-6">Product Name </label>
                                            <input type="text" class="form-control form-control-rounded" name="product_name" required 
                                            placeholder="Enter The Product Name" value="<?php echo $details['product_name']; ?>">
                                            <span style="color: red">** This Field is Required **</span>     
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="input-6">Category Name </label>
                                            <select class="form-control form-control-rounded" name="category_id" required>
                                                <option value="<?php echo $category_id ?>"><?php echo $cate['category_name'] ?></option>
                                                <option value=""></option><?php
                                                foreach ($category->getAllCategory() as $listType) { ?>
                                                    <option value="<?php echo $listType['category_id'] ?>">
                                                        <?php echo $listType['category_name'] ?>	
                                                    </option><?php
                                                } ?>
                                            </select>
                                            <span style="color: red">** This Field is Required **</span>     
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="input-6">Product Type </label>
                                            <select class="form-control form-control-rounded" name="type_id" id="" required onchange="showGenre(this.value)" required>>
                                                
                                                <option value="<?php echo $type_id ?>"><?php echo $type_name ?></option>
                                                <option value=""></option><?php
                                                foreach ($type->getAllProductType() as $listType) { ?>
                                                    <option value="<?php echo $listType['type_id'] ?>" selected>
                                                        <?php echo $listType['type_name'] ?>	
                                                    </option><?php
                                                } ?>
                                            </select>
                                            <span style="color: red">** This Field is Required **</span>     
                                        </div>

                                        <div class="col-sm-6" id="txtHint2">
                                            <label for="input-6">Sub Type Name </label>
                                            <select class="form-control form-control-rounded" name="genre_id" id="" required>
                                                <option value="<?php echo $see['genre_id'] ?>"><?php echo $see['genre_name'] ?></option>
                                            </select>
                                            <span style="color: green">** This Field is Autoload **</span>  
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <label for="input-6">Product Weight </label>
                                            <select class="form-control form-control-rounded" name="weight_name" id="" required onchange="showAmount(this.value)" required>
                                                
                                                <option value="<?php echo $weight_id ?>"><?php echo $deel['weight_name'] ?></option>
                                                <option value=""></option>
                                                <?php foreach($weight->getAllProductWeight() as $roll) { ?>
                                                    <option value="<?php echo $roll['weight_id'] ?>"><?php echo $roll['weight_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <span style="color: red">** This Field is Required **</span>     
                                        </div>
                                    
                                        <div class="col-sm-6" id="txtHint3">
                                            <label for="input-6">Weight Amount </label>
                                            <select class="form-control form-control-rounded" name="weight_id" required>
                                                <option value="<?php echo $weight_id ?>"><?php echo $deel['amount'] ?></option>
                                            </select>
                                            <span style="color: green">** This Field is Autoload **</span>  
                                        </div>

                                        
                                        <div class="col-sm-6">
                                            <label for="input-6">Supplier Name </label>
                                            <select class="form-control form-control-rounded" name="author_id" required>
                                                <option value="<?php echo $author_id ?>"><?php echo $hello['author_name'] ?></option>
                                                <option value=""></option><?php
                                                foreach ($author->getAllAuthor() as $listType) { ?>
                                                    <option value="<?php echo $listType['author_id'] ?>">
                                                        <?php echo $listType['author_name'] ?>	
                                                    </option><?php
                                                } ?>
                                            </select>
                                            <span style="color: red">** This Field is Required **</span>     
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="input-6">Manufacturer Name </label>
                                            <select class="form-control form-control-rounded" name="publisher_id" required>
                                                <option value="<?php echo $publisher_id ?>">
                                                <?php echo $hel['publisher_name']; ?></option>
                                                
                                                <option value=""></option><?php
                                                foreach ($publisher->getAllPublisher() as $listType) { ?>
                                                    <option value="<?php echo $listType['publisher_id'] ?>">
                                                        <?php echo $listType['publisher_name'] ?>	
                                                    </option><?php
                                                } ?>
                                            </select>
                                            <span style="color: red">** This Field is Required **</span>     
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="input-6">Product Quantity</label>
                                            <input type="number" class="form-control form-control-rounded" name="quantity" required 
                                            placeholder="Enter The Quantity" value="<?php echo $details['quantity']; ?>">
                                            <span style="color: red">** This Field is Required **</span>  
                                            <input type="hidden" name="quat" value="<?php echo $details['quantity']; ?>">   
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="input-6">Product Amount </label>
                                            <input type="number" class="form-control form-control-rounded" name="amount" required 
                                            placeholder="Enter The Amount" value="<?php echo $details['amount']; ?>">
                                            <span style="color: red">** This Field is Required **</span>     
                                        </div> 
                                        
                                        <input type="hidden" class="form-control form-control-rounded" name="edition" 
                                            placeholder="Enter The Edition" value="<?php echo $details['edition']; ?>">
                                                
                                        <div class="col-sm-6">
                                            <label for="input-12">Product Description </label>
                                            <textarea class="form-control form-control-rounded" name="description" required 
                                            placeholder="Enter The Product Description"><?php echo $details['description'] ?> </textarea>
                                            <span style="color: red">** This Field is Required **</span>     
                                        </div>    
                                        <input type="hidden" name="slug" value="<?php echo $slug ?>">
                                        
                                        <div class="col-sm-12" align="center">
                                            <button type="submit" class="btn btn-success btn-lg btn-block" name="update-product">UPDATE THE PRODUCT DETAILS</button>
                                        </div>   
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
    <!-- End container-fluid-->
   </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    <script>
	function showUser(str) {
		if (str == "") {
		    document.getElementById("txtHint").innerHTML = "";
		    return;
		} else { 
		    if (window.XMLHttpRequest) {
		        // code for IE7+, Firefox, Chrome, Opera, Safari
		        xmlhttp = new XMLHttpRequest();
		    } else {
		        // code for IE6, IE5
		        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		    }
		    xmlhttp.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
		            document.getElementById("txtHint").innerHTML = this.responseText;
		        }
		    };
		    xmlhttp.open("GET","loadsub.php?q="+str,true);
		    xmlhttp.send();
		}
	}
</script>

<script>
	function showGenre(str) {
		if (str == "") {
		    document.getElementById("txtHint2").innerHTML = "";
		    return;
		} else { 
		    if (window.XMLHttpRequest) {
		        // code for IE7+, Firefox, Chrome, Opera, Safari
		        xmlhttp = new XMLHttpRequest();
		    } else {
		        // code for IE6, IE5
		        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		    }
		    xmlhttp.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
		            document.getElementById("txtHint2").innerHTML = this.responseText;
		        }
		    };
		    xmlhttp.open("GET","load_new.php?genre_id="+str,true);
		    xmlhttp.send();
		}
	}

	function showAmount(str) {
		if (str == "") {
		    document.getElementById("txtHint3").innerHTML = "";
		    return;
		} else { 
		    if (window.XMLHttpRequest) {
		        // code for IE7+, Firefox, Chrome, Opera, Safari
		        xmlhttp = new XMLHttpRequest();
		    } else {
		        // code for IE6, IE5
		        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		    }
		    xmlhttp.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
		            document.getElementById("txtHint3").innerHTML = this.responseText;
		        }
		    };
		    xmlhttp.open("GET","load_amount.php?weight_id="+str,true);
		    xmlhttp.send();
		}
	}
</script>

<?php
	require_once('../footer.php');
?>