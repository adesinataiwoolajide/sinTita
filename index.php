<?php 
    include('header.php');
    $totalItems =  count($product->getAllProduct());
    $itemsPerPage = 20;
    $page = isset($_GET['page']) ? ($_GET['page']) : 1;
    $start = $page > 1 ? ($page * $itemsPerPage) - $itemsPerPage : 0;
    $totalPages = ceil($totalItems / $itemsPerPage);

    $listing = $product->getPaginateProductsPublish($start, $itemsPerPage);
?>
<div class="body-content outer-top-xs" id="top-banner-and-menu">  
    <div class="container">
        <div class="row"> 
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> <?php 
                include('sidebar.php'); ?>
                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
            
                    <div id="hero">
                        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                            <div class="item" style="background-image: url(style/images/sliders/cas.jpg);">
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">
                                        <div class="slider-header fadeInDown-1" style="color: white">Top Brands</div>
                                        <div class="big-text fadeInDown-1" style="color: white"> New Collections </div>
                                        <div class="excerpt fadeInDown-2 hidden-xs" style="color: white"> 
                                            <!-- <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span> -->
                                        </div>
                                        <div class="button-holder fadeInDown-3"> 
                                            <a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
                                        </div>
                                    </div>
                                    <!-- /.caption --> 
                                </div>
                            <!-- /.container-fluid --> 
                            </div>

                            <div class="item" style="background-image: url(style/images/sliders/newwatch.jpg);">
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">
                                        <div class="slider-header fadeInDown-1" style="color: white">Spring 2016</div>
                                        <div class="big-text fadeInDown-1" style="color: white"> Women <span class="highlight">Fashion</span> </div>
                                        <div class="excerpt fadeInDown-2 hidden-xs" style="color: white">
                                         <span>
                                        
                                        </span> 
                                        </div>
                                        <div class="button-holder fadeInDown-3"> <a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                                    </div>
                                    <!-- /.caption --> 
                                </div>
                            <!-- /.container-fluid --> 
                            </div> 

                            <div class="item" style="background-image: url(style/images/sliders/home-appliances.png);">
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">
                                        <div class="slider-header fadeInDown-1">Top Brands</div>
                                        <div class="big-text fadeInDown-1"> New Collections </div>
                                        <div class="excerpt fadeInDown-2 hidden-xs"> 
                                            <!-- <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span> -->
                                        </div>
                                        <div class="button-holder fadeInDown-3"> 
                                            <a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
                                        </div>
                                    </div>
                                    <!-- /.caption --> 
                                </div>
                            <!-- /.container-fluid --> 
                            </div>
                            <!-- /.item -->
                            
                            <div class="item" style="background-image: url(style/images/sliders/new_shorts_news_story_pic_2018.png);">
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">
                                        <div class="slider-header fadeInDown-1">Spring 2016</div>
                                        <div class="big-text fadeInDown-1"> Women <span class="highlight">Fashion</span> </div>
                                        <div class="excerpt fadeInDown-2 hidden-xs"> 
                                        <span>
                                        </span> 
                                        </div>
                                        <div class="button-holder fadeInDown-3"> <a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                                    </div>
                                    <!-- /.caption --> 
                                </div>
                            <!-- /.container-fluid --> 
                            </div>
                            
                            <!-- /.item --> 
                        </div>
                        <!-- /.owl-carousel --> 
                    </div>
                    <div class="info-boxes wow fadeInUp">
                        <div class="info-boxes-inner">
                            <div class="row">
                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">money back</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">30 Days Money Back Guarantee</h6>
                                    </div>
                                </div>
                            <!-- .col -->
                                <div class="hidden-md col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">free shipping</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Shipping on orders over &#8358;<?php echo number_format(15000) ?></h6>
                                    </div>
                                </div>
                            <!-- .col -->
                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">Special Sale</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Extra $5 off on all items </h6>
                                    </div>
                                </div>
                            <!-- .col --> 
                            </div>
                            <!-- /.row --> 
                        </div>
                        <!-- /.info-boxes-inner -->  
                    </div>

                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">New Products</h3>
                            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                                <li class="active"><a href="./">All</a></li><?php 
                                $cate = $db->prepare("SELECT * FROM products_category ORDER BY category_id desc LIMIT 0,7");
                                $cate->execute();
                                while($see_cate = $cate->fetch()){?>
                                    <li>
                                        <a href="products-categories.php?category_name=<?php echo $see_cate['category_name'] ?> ">
                                            <?php echo $see_cate['category_name'] ?> 
                                        </a> 
                                    </li><?php
                                } ?>  

                            </ul>
                        <!-- /.nav-tabs --> 
                    
                            <div class="col col-sm-6 col-md-12 text-right">
                                <div class="pagination-container">
                                    <?php 
                                    if($totalItems > 11){ ?>
                                        <ul class="list-inline list-unstyled">
                                            <?php $b = $page - 1;
                                            if($page != 1){ ?>
                                                <li class="prev"><a href="index.php?page=<?php echo $page - 1?>"><i class="fa fa-angle-left">Previous</i></a></li>
                                            <?php } ?>
                                            <?php if($page != $totalPages){ ?>
                                                <li class="next"><a href="index.php?page=<?php echo $page + 1?>"><i class="fa fa-angle-right">Next</i></a></li>
                                            <?php } ?>                                        
                                        </ul><?php 
                                    } ?>
                                    <!-- /.list-inline --> 
                                </div>
                        
                            <!-- /.col --> 
                            </div>
                        </div>
                        <div class="tab-content outer-top-xs">
                            <div id="myTabContent" class="tab-content category-list">
                                <div class="tab-pane active " id="grid-container">
                                    <div class="category-product">
                                        <div class="row"><?php
                                        
                                            foreach($listing as $index){
                                                $slug = $index['slug'];
                                                $hike = $product->getSingleProduct($slug);
                                                $type_id = $index['genre_id'];
                                                $typeDetails = $type->getSingleBookType($type_id);
                                                $category_id = $hike['category_id'];
                                                $categoryDetails = $category->getSingleCategoryList($category_id);
                                                $category_name = $categoryDetails['category_name'];
                                                $author_id = $hike['author_id'];
                                                $authorDetails = $author->getSingleAuthorList($author_id); ?>
                                                <div class="col-sm-6 col-md-3 wow fadeInUp">
                                                    <div class="products">
                                                        <div class="product">
                                                            <div class="product-image">
                                                                <div class="image"> 
                                                                    <a href="product-detail.php?slug=<?php echo $slug ?>">
                                                                    <img src="<?php echo "assets/images/product/".$hike['image'] ?>" style="width: 150px; height: 150px;"></a>
                                                                </div>
                                                                <!-- /.image -->                          
                                                                <div class="tag new"><span>new</span>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-image -->
                                    
                                                            <div class="product-info text-center">
                                                                <h3 class="name"><a href="product-detail.php<?php echo '?slug='.$sku?>"><?php echo $name = $hike['product_name']; ?></a></h3>
                                                                <div class="rating rateit-small">
                                                                    
                                                                </div>
                                                                <div class="description">
                                                                    <?php  echo $authorDetails ['author_name'];  ?>
                                                                </div>
                                                                <div class="product-price"> 
                                                                    <span class="price" style="color: green"><?php 
                                                                        $num2= (20/100)*$hike['amount'];
                                                                        $adding = $num2 + $hike['amount'];?> 
                                                                        &#8358;<?php echo number_format($adding) ?>    
                                                                    </span> 
                                                                    <span class="price-before-discount" style="color: red"><?php
                                                                        $num3= (40/100)*$hike['amount'];
                                                                        $adding2 = $num3 + $hike['amount']; ?> 
                                                                        &#8358;<?php echo number_format($adding2) ?>
                                                                    </span> 
                                                                </div>
                                                            <!-- /.product-price --> 
                                                            </div>
                                                            
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="lnk wishlist"> 
                                                                            <a data-toggle="tooltip" class="add-to-cart" href="handlers/registration/addit.php?slug=<?php echo $slug?>&&action=<?php echo 'Wishlist' ?>" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> 
                                                                        </li>
                                                                        <li class="add-cart-button btn-group">
                                                                            <form action="handlers/cart/addToCart.php" method="get">
                                                                                
                                                                                <input type="hidden" name="amount" value="<?php echo $num2 + $hike['amount']; ?>">
                                                                                <input type="hidden" name="slug" value="<?php echo $slug; ?>">
                                                                                <input type="hidden" name="name" value="<?php echo $hike['product_name']; ?>">
                                                                                <input type="hidden" name="quantity" value="<?php echo 1 ?>">
                                                                                <input type="hidden" name="return" value="<?php $_SERVER['REQUEST_URI'] ?>">

                                                                                <button data-toggle="tooltip" class="btn btn-primary icon" type="submit" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                                            </form>
                                                                        </li>
                                                                        <li class="lnk"> 
                                                                            <a data-toggle="tooltip" class="add-to-cart" href="handlers/registration/addit.php?slug=<?php echo $slug?>&&action=<?php echo 'Compare' ?>" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> 
                                                                            </a> 
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <!-- /.action --> 
                                                            </div>
                                                        </div>
                                                        <!-- /.home-owl-carousel --> 
                                                    </div>
                                                    <!-- /.product-slider --> 
                                                </div>
                                                <?php 
                                            } ?>
                                            <!-- /.tab-pane --> 
                                        </div>
                                    </div>  
                                </div>
                                <!-- /.tab-content --> 
                            </div>
                        </div>
                    </div>
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"> <img class="img-responsive" src="style/images/banners/1_5.jpg" alt=""> 
                                    </div>
                                </div>
                                <!-- /.wide-banner --> 
                            </div>
                            <!-- /.col -->
                            <div class="col-md-5 col-sm-5">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"> <img class="img-responsive" src="style/images/banners/1_5.jpg" alt=""> 
                                    </div>
                                </div>
                                <!-- /.wide-banner --> 
                            </div>
                            <!-- /.col --> 
                        </div>
                        <!-- /.row --> 
                    </div>
                    
<?php 
    include('footer.php');
?>