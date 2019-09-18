<?php 
    $body = 'product-page';
    require_once('header.php');
    $slug = $_GET['slug'];
    $details = $product->getSingleProduct($slug);
    $product_name = $details['product_name'];
    $category_id = $details['category_id'];
    $publisher_id = $details['publisher_id'];;
    $genre_id = $details['genre_id'];
    $edition = $details['edition'];
    $stock = $product->getsProductStock($product_name, $category_id, $genre_id, $publisher_id, $edition); 
?>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home"> <a title="Go to Home Page" href="./">Home</a><span>&raquo;</span></li>
                        <li class=""> <a title="Go to Product Details Page" href="product_details.php?slug=<?php echo $slug; ?>">Product Details</a><span>&raquo;</span></li>
                        <li><strong><?php echo $details['product_name']; ?></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container col2-left-layout">
        <div class="container">
            <div class="row">
                <div class="col-main col-sm-9 col-xs-12">
                    <div class="product-view-area">
                        <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
                            <div class="icon-sale-label sale-left">Sale</div>
                            <div class="large-image"> <a href="<?php echo "assets/images/product/".$details['image'] ?>" 
                                class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> 
                                <img class="zoom-img" src="<?php echo "assets/images/product/".$details['image'] ?>" alt="products"
                                
                                style="height:250px;"> </a> 
                            </div>
                            
                        </div>
                        <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">
                            <div class="product-name">
                                <h1><?php echo $details['product_name'] ?></h1>
                            </div>
                            <div class="price-box">
                                <p class="special-price" style="color: green"> <span class="price-label">Special Price</span> <span class="price"> 
                                    &#8358;<?php echo number_format($details['amount']); ?> </span> 
                                </p>
                                <p class="old-price" style+"color: green"> <span class="price-label">Regular Price:</span> <span class="price"><?php
                                    $num3= (40/100)*$details['amount'];
                                    $adding2 = $num3 + $details['amount']; ?>
                                    &#8358;<?php echo number_format($adding2) ?> </span> 
                                </p>
                            </div>
                            <div class="ratings">
                                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                    <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                </div>
                                <?php 
                                if($stock['quantity'] < 1){ ?>
                                    <p class="availability in-stock pull-right">Availability: Out of Stock</p><?php
                                }else{ ?>
                                    <p class="availability in-stock pull-right">Availability: <span style="color: rgreened">In Stock</span></p><?php
                                }?>
                                
                            </div>
                            <div class="short-description">
                                <h2>Brief Description</h2>
                                <p><?php echo $details['description'] ?>
                                </p>
                            </div>
              
                            <form action="handlers/cart/addToCart.php" method="get">
	                            <input type="hidden" name="amount" value="<?php echo $details['amount'] ?>">
	                            <input type="hidden" name="slug" value="<?php echo $details['slug']; ?>">
	                            <input type="hidden" name="name" value="<?php echo $details['product_name']; ?>">
                                <input type="hidden" name="return" value="<?php $_SERVER['REQUEST_URI'] ?>">
                                <div class="product-variation">
                                    <form action="#" method="post">
                                        <div class="cart-plus-minus">
                                            <label for="qty">Qty:</label>
                                            <div class="numbers-row">
                                                <!-- <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="dec qtybutton">
                                                    <i class="fa fa-minus">&nbsp;</i>
                                                </div>
                                                <input type="text" class="qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                                <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="inc qtybutton">
                                                    <i class="fa fa-plus">&nbsp;</i>
                                                </div> -->
                                                <?php
                                                $early = 1;
                                                $current = $stock['quantity'];
                                                print '<select class ="form-control" id="frm-login-uname" required name ="quantity">';
                                                foreach(range($early, $current) as $i){
                                                    print'<option value=" '.$i.'"'.($i === $current ? 'selected="selected"' : '').'>'.$i.'</option>';
                                                }
                                                print '</select>';?>
                                            </div>
                                        </div><?php 
                                        if($stock['quantity'] <1){ ?>
                                            <button class="button pro-add-to-cart" title="Add to Cart" type="button"><span>
                                            <i class="fa fa-shopping-basket"></i> OUT OF STOCK</span></button><?php
                                             
                                        }else{ ?>
                                            <button class="button pro-add-to-cart" title="Add to Cart" type="submit"><span>
                                            <i class="fa fa-shopping-basket"></i> Add to Cart</span></button><?php
                                            
                                        }?>
                                    </form>
                                </div>
                                <div class="product-cart-option">
                                    <ul>
                                        <li><a href="handlers/registration/addit.php?slug=<?php echo $details['slug'] ?>&&action=<?php echo 'Wishlist' ?>"><i class="fa fa-heart-o"></i><span>Add to Wishlist</span></a></li>
                                        <li><a href="handlers/registration/addit.php?slug=<?php echo $details['slug'] ?>&&action=<?php echo 'Compare' ?>"><i class="fa fa-link"></i><span>Add to Compare</span></a></li>
                                        <!-- <li><a href="#"><i class="fa fa-envelope"></i><span>Email to a Friend</span></a></li> -->
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="product-overview-tab">
                        <div class="product-tab-inner">
                            <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                                <li class="active"> <a href="#description" data-toggle="tab"> Description </a> </li>
                                <li> <a href="#reviews" data-toggle="tab">Reviews</a> </li>
                                <li> <a href="#product_tags" data-toggle="tab">Tags</a></li>
                                <li> <a href="#custom_tabs" data-toggle="tab">Custom Tab</a> </li>
                            </ul>
                            <div id="productTabContent" class="tab-content">
                                <div class="tab-pane fade in active" id="description">
                                    <div class="std">
                                        <p><?php echo $details['description'] ?></p>
                                    </div>
                                </div>
                                <div id="reviews" class="tab-pane fade">
                                    <div class="col-sm-5 col-lg-5 col-md-5">
                                        <div class="reviews-content-left">
                                            <h2>Customer Reviews</h2>
                                            <div class="review-ratting">
                                                <p><a href="#">Amazing</a> Review by Company</p>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <th>Price</th>
                                                            <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Value</th>
                                                            <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Quality</th>
                                                            <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p class="author"> Angela Mack<small> (Posted on 16/12/2015)</small> </p>
                                            </div>
                                            <div class="review-ratting">
                                                <p><a href="#">Good!!!!!</a> Review by Company</p>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <th>Price</th>
                                                            <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Value</th>
                                                            <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Quality</th>
                                                            <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p class="author"> Lifestyle<small> (Posted on 20/12/2015)</small> </p>
                                            </div>
                                            <div class="review-ratting">
                                                <p><a href="#">Excellent</a> Review by Company</p>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <th>Price</th>
                                                            <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Value</th>
                                                            <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Quality</th>
                                                            <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p class="author"> Jone Deo<small> (Posted on 25/12/2015)</small> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-7 col-lg-7 col-md-7">
                                        <div class="reviews-content-right">
                                        <h2>Write Your Own Review</h2>
                                        <form>
                                            <h3>You're reviewing: <span>Donec Ac Tempus</span></h3>
                                            <h4>How do you rate this product?<em>*</em></h4>
                                            <div class="table-responsive reviews-table">
                                            <table>
                                                <tbody>
                                                <tr>
                                                    <th></th>
                                                    <th>1 star</th>
                                                    <th>2 stars</th>
                                                    <th>3 stars</th>
                                                    <th>4 stars</th>
                                                    <th>5 stars</th>
                                                </tr>
                                                <tr>
                                                    <td>Quality</td>
                                                    <td><input type="radio"></td>
                                                    <td><input type="radio"></td>
                                                    <td><input type="radio"></td>
                                                    <td><input type="radio"></td>
                                                    <td><input type="radio"></td>
                                                </tr>
                                                <tr>
                                                    <td>Price</td>
                                                    <td><input type="radio"></td>
                                                    <td><input type="radio"></td>
                                                    <td><input type="radio"></td>
                                                    <td><input type="radio"></td>
                                                    <td><input type="radio"></td>
                                                </tr>
                                                <tr>
                                                    <td>Value</td>
                                                    <td><input type="radio"></td>
                                                    <td><input type="radio"></td>
                                                    <td><input type="radio"></td>
                                                    <td><input type="radio"></td>
                                                    <td><input type="radio"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                            <div class="form-area">
                                            <div class="form-element">
                                                <label>Nickname <em>*</em></label>
                                                <input type="text">
                                            </div>
                                            <div class="form-element">
                                                <label>Summary of Your Review <em>*</em></label>
                                                <input type="text">
                                            </div>
                                            <div class="form-element">
                                                <label>Review <em>*</em></label>
                                                <textarea></textarea>
                                            </div>
                                            <div class="buttons-set">
                                                <button class="button submit" title="Submit Review" type="submit"><span><i class="fa fa-thumbs-up"></i> &nbsp;Review</span></button>
                                            </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                
                                <div class="tab-pane fade" id="custom_tabs">
                                    <div class="product-tabs-content-inner clearfix">
                                        <p><strong>Lorem Ipsum</strong><span>&nbsp;is
                                        simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                        has been the industry's standard dummy text ever since the 1500s, when 
                                        an unknown printer took a galley of type and scrambled it to make a type
                                        specimen book. It has survived not only five centuries, but also the 
                                        leap into electronic typesetting, remaining essentially unchanged. It 
                                        was popularised in the 1960s with the release of Letraset sheets 
                                        containing Lorem Ipsum passages, and more recently with desktop 
                                        publishing software like Aldus PageMaker including versions of Lorem 
                                        Ipsum.</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="right sidebar col-sm-3 col-xs-12">
                    <div class="block shop-by-side">
                        <div class="sidebar-bar-title">
                            <h3>Shop By Category</h3>
                        </div>
                        <div class="block-content">
                            <div class="layered-Category">
                                <div class="layered-content">
                                    <ul class="check-box-list"><?php
                                        foreach($category->getAllCategory() as $listCate){ 
                                            $category_id = $listCate['category_id'];
                                            $name =$listCate['category_name']; ?>
                                            <li>
                                                <input type="checkbox" id="jtv1" name="jtvc">
                                                <label for="jtv1"> <span class="button"></span> 
                                                    <a href="product_categories.php?category_name=<?php echo $name ?>">
                                                        <?php echo $name ?>
                                                    </a><span class="count">
                                                        (<?php echo count($product->getSingleCategoryProduct($category_id)) ?>)</span> 
                                                </label>
                                            </li><?php 
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block special-product">
                        <div class="sidebar-bar-title">
                            <h3>Manufacturer Products</h3>
                        </div>
                        <div class="block-content">
                            <ul>
                            <?php 
                                $publisher_id = $details['publisher_id'];
                                $bub =$publisher->getSinglePublisherList($publisher_id);
                                $manu_name = $bub['publisher_name'];
								foreach($product->getAllProductByPublis($publisher_id) as $listPub){ ?>
                                    <li class="item">
                                        <div class="products-block-left"> <a href="product_details.php?slug=<?php echo $listPub['slug'] ?>" 
                                        title="Sample Product" class="product-image"><img src="<?php echo "assets/images/product/".$listPub['image'] ?>" alt="Sample Product "></a></div>
                                        <div class="products-block-right">
                                            <p class="product-name"> <a href="product_details.php?slug=<?php echo $listPub['slug'] ?>">
                                                <?php echo $listPub['product_name']; ?>
                                                </a> 
                                            </p>
                                            <span class="price">&#8358;<?php echo number_format($listPub['amount']); ?></span>
                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                                            <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                        </div>
                                    </li><?php 
                                } ?>
                                
                            </ul>
                            <a class="link-all" href="manufacturer_product.php?manufacturer_name=<?php echo $manu_name ?>">All Products</a> 
                        </div>
                    </div>
                    <div class="block popular-tags-area ">
                        <div class="sidebar-bar-title">
                            <h3>Popular Tags</h3>
                        </div>
                        <div class="tag">
                            <ul><?php
                                $genre_id = $details['genre_id'];
                                $hype = $genre->getSingleGenreType($genre_id);
                                $typeid = $hype['type_id']; 
                                foreach($type->getSingleBookTypes($typeid) as $seeType){ ?>
                                <li><a href="product_types.php?type_name=<?php echo $seeType['type_name'] ?>"><?php echo $seeType['type_name'] ?></a></li><?php 
                                } ?>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="related-product-area">
                    <div class="page-header">
                        <h2>Related Products</h2>
                    </div>
                    <div class="related-products-pro">
                        <div class="slider-items-products">
                            <div id="related-product-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col4 fadeInUp">
                                <?php 
                                    $genre_id = $details['genre_id'];
                                    foreach($product->listSingleGensProductS($genre_id) as $related){ ?>
                                        <div class="product-item">
                                            <div class="item-inner">
                                                <div class="product-thumbnail">
                                                    <div class="icon-new-label new-left">New</div>
                                                    <div class="pr-img-area"> 
                                                        <a title="Product title here" href="product_details.php?slug=<?php echo $related['slug']; ?>">
                                                            <figure> 
                                                                <img class="first-img" src="<?php echo 'assets/images/product/'.$related['image']; ?>" alt="<?php echo $related['product_name'] ?>"> 
                                                                <img class="hover-img" src="<?php echo 'assets/images/product/'.$related['image']; ?>" alt="<?php echo $related['product_name'] ?>">
                                                            </figure>
                                                        </a> 
                                                    </div>
                                                    <div class="pr-info-area">
                                                        <div class="pr-button">
                                                            <div class="mt-button add_to_wishlist"> <a href="handlers/registration/addit.php?slug=<?php echo $related['slug'] ?>&&action=<?php echo 'Wishlist' ?>" "> 
                                                                <i class="fa fa-heart-o"></i> </a> 
                                                            </div>
                                                            <div class="mt-button add_to_compare"> <a href="handlers/registration/addit.php?slug=<?php echo $related['slug'] ?>&&action=<?php echo 'Compare' ?>" "> 
                                                                <i class="fa fa-link"></i> </a> 
                                                            </div>
                                                            <div class="mt-button quick-view"> <a href="product_details.php?slug=<?php echo $related['slug']; ?>"> 
                                                            <i class="fa fa-shopping-cart"></i> </a> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title"> 
                                                            <a title="<?php echo $related['product_name'] ?>" href="product_details.php?slug=<?php echo $related['slug']; ?>"><?php echo $related['product_name'] ?> </a> 
                                                        </div>
                                                        <div class="item-content">
                                                            <div class="rating"> <i class="fa fa-star"></i> 
                                                                <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> 
                                                                <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> 
                                                                <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> 
                                                                <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> 
                                                                <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> 
                                                                 
                                                            </div>
                                                            <div class="item-price">
                                                                <div class="price-box"> <span class="regular-price"> 
                                                                    <span class="price">&#8358;<?php echo number_format($related['amount']); ?></span> </span> 
                                                                </div>
                                                            </div>
                                                            <!-- <div class="pro-action">
                                                                <button type="button" class="add-to-cart"><span> Add to Cart</span> </button>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><?php 
                                    }?>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php 
    require_once('footer.php');
?>