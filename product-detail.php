<?php 
	include("connection/connection.php");
	$slug = $_GET['slug'];
	$pagetitle = "Product Details";
	include("header.php");
	$details = $product->getSingleProduct($slug);
    $type_id = $details['genre_id'];
    $typeDetails = $type->getSingleBookType($type_id);
    $category_id = $details['category_id'];


    $categoryDetails = $category->getSingleCategoryList($category_id);
    $category_name = $categoryDetails['category_name'];
    $author_id = $details['author_id'];
    $authorDetails = $author->getSingleAuthorList($author_id);
    $totalItems =  count($product-> getSingleCategoryProduct($category_id));
    $itemsPerPage = 16;
    $page = isset($_GET['page']) ? ($_GET['page']) : 1;
    $start = $page > 1 ? ($page * $itemsPerPage) - $itemsPerPage : 0;
    $totalPages = ceil($totalItems / $itemsPerPage);
    $seeProdcut = $product->getSingleCategoryProductss($category_id, $start, $itemsPerPage); ?>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="./">Home</a></li>
				<li><a href="product-detail.php?slug=<?php echo $details['slug'] ?>"> Details</a></li>
				<li class='active'><?php echo $details['product_name'] ?></li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
					<div class="home-banner outer-top-n">
						<img src="style/images/banners/LHS-banner.jpg" alt="Image" >
					</div>		
   
					<div class="sidebar-widget hot-deals wow fadeInUp outer-top-vs">
						<h3 class="section-title">hot deals</h3>
						<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs"><?php
		
                            foreach($product->getAllProductSideBarTwo() as $sideProductTwo){
                                $slugTwo = $sideProductTwo['slug'];
                                $ragzProductTwo = $product->getSingleProductTwo($slugTwo);
                                $type_id = $ragzProductTwo['genre_id'];
                                $typeDetailsTwo = $type->getSingleBookType($type_id);
                                $category_id = $ragzProductTwo['category_id'];
                                $categoryDetailsTwo = $category->getSingleCategoryList($category_id);
                                $category_name = $categoryDetailsTwo['category_name'];
                                $author_id = $ragzProductTwo['author_id'];
                                $authorDetailsTwo = $author->getSingleAuthorList($author_id);
        
                                ?>
                                <div class="item">
                                    <div class="products">
                                        <div class="hot-deal-wrapper">
                                            <div class="image"> 
                                                <img src="<?php echo "assets/images/product/".$ragzProductTwo['image'] ?>" ">
                                            </div>
                                        </div>
                                        <!-- /.hot-deal-wrapper -->
                                        <div class="product-info text-center m-t-20" >
                                            <h3 class="name">
                                                <a href="product-detail.php?slug=<?php echo $slugTwo ?>">
                                                    <?php echo $ragzProductTwo['product_name']; ?>
                                                    
                                                </a>
                                            </h3>
                                            <div class="rating rateit-small" >
                                                
                                            </div>
                                            <div class="description">
                                                <?php echo $authorDetailsTwo['author_name']; ?>
                                            </div>
                                            <div class="product-price"> 
                                                <span class="price" style="color: green"> <?php 
                                                    $num2= (20/100)*$ragzProductTwo['amount'];
                                                    $adding = $num2 + $ragzProductTwo['amount'];
                                                    number_format($ragzProductTwo['amount']); ?> 
                                                    &#8358;<?php echo number_format($adding) ?> 
                                                </span> 
                                                <span class="price-before-discount" style="color: red"><?php
                                                    $num3= (40/100)*$ragzProductTwo['amount'];
                                                    $adding2 = $num3 + $ragzProductTwo['amount'];
                                                    number_format($ragzProductTwo['amount']); ?> 
                                                    &#8358;<?php echo number_format($adding2) ?>
                                                </span> 
                                            </div>
                                            <!-- /.product-price -->  
                                        </div><!-- /.product-info -->
                                    
                                        <div class="col-md-12" align="center"> 
                                            <form action="handlers/cart/addToCart.php" method="get">
                                                
                                                <input type="hidden" name="amount" value="<?php echo $adding ?>">
                                                <input type="hidden" name="slug" value="<?php echo $slugTwo; ?>">
                                                <input type="hidden" name="name" value="<?php echo $ragzProductTwo['product_name']; ?>">
                                                <input type="hidden" name="quantity" value="<?php echo 1 ?>">
                                                <input type="hidden" name="return" value="<?php $_SERVER['REQUEST_URI'] ?>">
                                                <a data-toggle="tooltip" class="btn btn-danger" href="handlers/registration/addit.php?slug=<?php echo $slugTwo?>&&action=<?php echo 'Wishlist' ?>" title="Wishlist"> <i class="icon fa fa-heart"></i>  </a> 

                                                <button data-toggle="tooltip" class="btn btn-primary icon" type="submit" title="Add Cart"> <i class="fa fa-shopping-cart"></i>  </button>

                                                <a data-toggle="tooltip" class="btn btn-danger" href="handlers/registration/addit.php?slug=<?php echo $slugTwo?>&&action=<?php echo 'Compare' ?>" title="Compare"> <i class="icon fa fa-signal"></i>  </a> 
                                            </form> 
                                        </div>
                                        <!-- /.cart --> 
                                    </div>
                                </div><?php 
                            } ?>
					    </div>
					</div>
				</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
	            <div class="detail-block">
					<div class="row  wow fadeInUp">
					    <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
						    <div class="product-item-holder size-big single-product-gallery small-gallery">
						    	
						        <div id="owl-single-product"><?php
						        	$image = "assets/images/product/".$details['image'];
						        	$thumb = "assets/images/product/".$details['image'];
						        	 ?>
						            <div class="single-product-gallery-item" id="slide1" align="center">
                                        <a data-lightbox="image-1" data-title="Gallery" href="<?php echo "assets/images/product/".$details['image'] ?>" 
                                        width="200" height="350px" >
                                            <img class="img-responsive" alt="" src="<?php echo "assets/images/product/".$details['image'] ?>" 
                                            width="200" height="350px" data-echo="<?php echo "assets/images/product/".$details['image'] ?>" 
                                            width="200" height="350px" align="center">
						                </a>
						            </div><!-- /.single-product-gallery-item -->

						            <div class="single-product-gallery-item" id="slide2" align="center">
						                <a data-lightbox="image-1" data-title="Gallery" href="<?php echo $thumb ?>" width="100" height="150px" >
						                    <img class="img-responsive" alt="" src="<?php echo $thumb ?>" width="200" height="350px" data-echo="<?php echo $thumb ?>" width="200" height="350px" align="center">
						                </a>
						            </div><!-- /.single-product-gallery-item -->
						        </div><!-- /.single-product-slider -->

						        <div class="single-product-gallery-thumbs gallery-thumbs">

						            <div id="owl-single-product-thumbnails">
						                <div class="item">
						                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
						                        <img class="img-responsive" width="85" alt="" src="<?php echo $image; ?>" data-echo="<?php echo $image; ?>" />
						                    </a>
						                </div>

						                <div class="item">
						                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
						                        <img class="img-responsive" width="100" alt="" src="<?php echo $thumb; ?>" data-echo="<?php echo $thumb; ?>"/>
						                    </a>
						                </div>
						                
						                 <div class="item">
						                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
						                        <img class="img-responsive" width="85" alt="" src="<?php echo $image; ?>" data-echo="<?php echo $image; ?>" />
						                    </a>
						                </div>

						                <div class="item">
						                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
						                        <img class="img-responsive" width="100" alt="" src="<?php echo $thumb; ?>" data-echo="<?php echo $thumb; ?>"/>
						                    </a>
						                </div>
						            </div><!-- /#owl-single-product-thumbnails -->   

						        </div><!-- /.gallery-thumbs -->

    						</div><!-- /.single-product-gallery -->
						</div><!-- /.gallery-holder -->        			
						<div class='col-sm-6 col-md-7 product-info-block'>
							<div class="product-info">
								<h1 class="name"><?php echo $name= $details['product_name'] ?></h1>
								
								<div class="rating-reviews m-t-20">
									<div class="row">
										<div class="col-sm-3">
											<div class="rating rateit-small"></div>
										</div>
										<div class="col-sm-8">
											<div class="reviews">
												<a href="#" class="lnk">(13 Reviews)</a>
											</div>
										</div>
									</div><!-- /.row -->		
								</div><!-- /.rating-reviews -->

								<div class="stock-container info-container m-t-10">
									<div class="row">
										<div class="col-sm-9">
											<div class="stock-box">
												<span class="label">Availability: 
													<strong><?php 
														$qty = $details['quantity'];
														if($qty>0){ ?>
															In Stock <i class="fa fa-check-square-o" style="color: green"></i><?php
														}else{ ?>
															Out of Stock <i class="fa fa-bell-slash-o" style="color: red"></i><?php
														}?>	
													 </strong>
												</span>
											</div>	<br>
										</div><br>
										<div class="col-sm-9">
											<div class="stock-box">
												<span class="value">Quantity: <strong><?php echo $qty = $details['quantity'] ?></strong></span>
											</div>	
										</div>
										<div class="col-sm-9">
											

										</div>
									</div><!-- /.row -->	
								</div><!-- /.stock-container -->

								<div class="description-container m-t-20">
									
								</div><!-- /.description-container -->

								<div class="price-container info-container m-t-20">
									<div class="row">
										
										<div class="col-sm-6">
											<div class="price-box">
												<span class="price" style="color: green"><?php 
                                                    $num = (5/100)*$details['amount'] + $details['amount'];
                                                    $num2= (20/100)*$details['amount'];
                                                    $adding = $num2 + $details['amount'];
                                                    number_format($details['amount']); ?> 
                                                     &#8358;<?php echo number_format($adding) ?></span>
												<span class="price-strike" style="color: red">
													<?php 
													$num3= (40/100)*$details['amount'];
													$adding2 = $num3 + $details['amount'];
                                                    ?> 
                                                     &#8358;<?php echo number_format($adding2) ?>
                                                     	
                                                </span>
											</div>
										</div>
									</div><!-- /.row -->
								</div><!-- /.price-container -->
								<div class="quantity-container info-container">
									<div class="row">
										 <form action="handlers/cart/addToCart.php" method="get">
											<div class="col-sm-12">
												<a data-toggle="tooltip" class="btn btn-danger" href="handlers/registration/addit.php?slug=<?php echo $slug?>&&action=<?php echo 'Wishlist' ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> WISHLIST </a> 

	                                                
	                                                <input type="hidden" name="amount" value="<?php echo $adding ?>">
	                                                <input type="hidden" name="slug" value="<?php echo $slug; ?>">
	                                                 <input type="hidden" name="name" value="<?php echo $details['product_name']; ?>">
	                                                <input type="hidden" name="quantity" value="<?php echo 1 ?>">
	                                                <input type="hidden" name="return" value="<?php $_SERVER['REQUEST_URI'] ?>">

	                                                <button data-toggle="tooltip" class="btn btn-primary icon" type="submit" title="Add Cart"> <i class="fa fa-shopping-cart"></i> CART </button>

	                                            	 <!-- <button data-name="<?php echo $name ?>" data-quantity="1" data-id="<?php echo $details['slug'] ?>" data-price="<?php echo $adding ?>"  class="btn btn-danger cartbutton">Add To Cart
                                					</button> -->
												
												<a data-toggle="tooltip" class="btn btn-danger" href="handlers/registration/addit.php?slug=<?php echo $slug?>&&action=<?php echo 'Wishlist' ?>" title="Compare"> <i class="icon fa fa-signal"></i> COMPARE </a> 
											</div>
										</form>	
									</div><!-- /.row -->
								</div><!-- /.quantity-container -->
							</div><!-- /.product-info -->
						</div><!-- /.col-sm-7 -->
					</div><!-- /.row -->
                </div>

				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#tags">TAGS</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text"><?php echo $details['description'] ?></p>
									</div>	
								</div><!-- /.tab-pane -->

								

								<div id="tags" class="tab-pane">
									<div class="product-tag">
										
										<h3 class="title">Product Tags</h3>
										<h5 class="title"><strong><?php echo 1; ?></strong></h5>
										
									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

				<section class="section featured-product wow fadeInUp">
		            <h3 class="section-title">Other Products In <?php echo $category_name ?> Categories</h3>
		                <div class="col col-sm-6 col-md-12 text-right">
		                    <div class="pagination-container">
	                            
	                        </div>
	                        
	                        <!-- /.col --> 
	                    </div>
		                <div id="myTabContent" class="tab-content category-list">
			                <div class="tab-pane active " id="grid-container">
			                    <div class="category-product">
			                        <div class="row">
			                            <?php
		                                foreach($seeProdcut as $featureProduct){ 
						                    $slugThree = $featureProduct['slug'];
                                            $ragzProductThree = $product->getSingleProductThree($slugThree);
                                            
                                            $type_id = $ragzProductThree['genre_id'];
                                            $typeDetailsTwo = $type->getSingleBookType($type_id);
                                            $category_id = $ragzProductThree['category_id'];
                                            $categoryDetails3 = $category->getSingleCategoryList($category_id);
                                            $category_name = $categoryDetails3['category_name'];
                                            $author_id = $ragzProductThree['author_id'];
                                            $authorDetailsThree = $author->getSingleAuthorList($author_id); ?>
		                                    
		                                    <div class="col-sm-6 col-md-3 wow fadeInUp">
		                                        <div class="products">
		                                            <div class="product">
		                                                <div class="product-image">
		                                                    <div class="image"> 
		                                                        <a href="product-detail.php?slug=<?php echo $ragzProductThree['slug']; ?>">
		                                                        	<img src="<?php echo "assets/images/product/".$ragzProductThree['image'] ?>" width="100" height="150px" alt="">
		                                                        </a> 
		                                                    </div>
		                                                    <!-- /.image -->                          
		                                                    <div class="tag new"><span>new</span>
		                                                    </div>
		                                                </div>
		                                                <!-- /.product-image -->
		                        
		                                                <div class="product-info text-left">
                                                            <h3 class="name"><a href="product-detail.php?slug=<?php echo $ragzProductThree['slug']; ?>">
                                                            <?php echo $ragzProductThree['product_name']; ?></a></h3>
		                                                    <div class="rating rateit-small">
		                                                        
		                                                    </div>
		                                                    <div class="description">
                                                                <?php echo $authorDetailsThree['author_name'];  ?>
									                        </div>
		                                                    <div class="product-price"> 
		                                                        <span class="price"><?php 
		                                                            $num = (5/100)*$ragzProductThree['amount'] + $ragzProductThree['amount'];
		                                                            $num2= (20/100)*$ragzProductThree['amount'];
		                                                            $addsing = $num2 + $ragzProductThree['amount'];
		                                                            number_format($ragzProductThree['amount']); ?> 
		                                                             &#8358;<?php echo number_format($addsing) ?> </span> <span class="price-before-discount">discount</span> 
		                                                        </div>
		                                                  <!-- /.product-price --> 
		                                                </div>
		                                                <!-- /.product-info -->
		                                                <div class="cart clearfix animate-effect">
		                                                    <div class="action">
		                                                        <ul class="list-unstyled">
		                                                        	
		                                                           <li class="lnk wishlist"> 
		                                                                <a data-toggle="tooltip" class="add-to-cart" href="handlers/registration/addit.php?slug=<?php echo $ragzProductThree['slug']?>&&action=<?php echo 'Wishlist' ?>" class="paction add-wishlist" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> 
		                                                            </li>
		                                                            <li class="add-cart-button btn-group">
		                                                            	<form action="handlers/cart/addToCart.php" method="get">
				                                                        	
				                                                            <input type="hidden" name="amount" value="<?php echo $addsing ?>">
				                                                            <input type="hidden" name="slug" value="<?php echo $ragzProductThree['slug']; ?>">
				                                                             <input type="hidden" name="name" value="<?php echo $ragzProductThree['product_name']; ?>">
				                                                            <input type="hidden" name="quantity" value="<?php echo 1 ?>">
				                                                            <input type="hidden" name="return" value="<?php $_SERVER['REQUEST_URI'] ?>">
				                                                            <button data-toggle="tooltip" class="btn btn-primary icon" type="submit" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>

			                                                        	</form>
		                                                                
		                                                               <!-- <button data-name="<?php echo $name ?>" data-quantity="1" data-id="<?php echo $slug ?>" data-price="<?php echo $adding ?>"  class="btn btn-danger cartbutton"><i class="fa fa-shopping-cart"></i>Add To Cart
		                                								</button> -->
		                                                            </li>           
		                                                            <li class="lnk"> 
		                                                                <a data-toggle="tooltip" class="add-to-cart" href="handlers/registration/addit.php?slug=<?php echo $ragzProductThree['slug']?>&&action=<?php echo 'Compare' ?>" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> 
		                                                            </li>
		                                                        </ul>
		                                                    </div>
		                                                      <!-- /.action --> 
		                                                </div>
		                                                    <!-- /.cart --> 
		                                            </div>
		                                            <!-- /.home-owl-carousel --> 
		                                        </div>
		                                          <!-- /.product-slider --> 
		                                    </div><?php 
		                                } ?>
		                                <!-- /.tab-pane --> 
		                            </div>
		                        </div>  
		                    </div>
		                    <!-- /.tab-content --> 
		                </div>
		            </div>
		        </div>
		        
		    </section>
		    <script>
		    let cartToCartButtons = document.querySelectorAll(".cartbutton");
		    console.log(cartToCartButtons);
		    cartToCartButtons.forEach(function(cartbutton){
		            cartbutton.addEventListener("click", (e) => {
		            let currentCartButton = e.target;
		            let productnumber = currentCartButton.getAttribute("data-id");
		            let name = currentCartButton.getAttribute("data-name");
		            let amount = currentCartButton.getAttribute("data-price");
		            let quantity = currentCartButton.getAttribute("data-quantity");
		            let url = `handlers/cart/addToCart.php?productnumber=${productnumber}&name=${name}&amount=${amount}&quantity=${quantity}`;
		            let cqty = currentCartButton.getAttribute("data-quantity");
		            let xhr = new XMLHttpRequest();
		            xhr.open("GET", url, true);
		            xhr.onload = (e) => {
		                if(xhr.status === 200){
		                    let currentQtyVal = parseInt(document.querySelector("#cqty").textContent);
		                    document.querySelector("#cqty").textContent = currentQtyVal + parseInt(quantity);
		                    alert("You Have <?php echo $name ?> To Your Shopping Cart Successfully");
		                }
		            }
		            xhr.send();  

		        });
		        
		    });

		</script> 

		</div><!-- /.col -->
		<div class="clearfix"></div>
	</div><!-- /.row -->
<?php include("footer.php");?>