<?php
    $pagetitle = "Product Categoires"; 
    include("header.php");
    $category_name = $_GET['category_name'];
    $cateDetails = $category->getSingleCategoriesL($category_name);
    $category_id = $cateDetails['category_id'];
    $totalItems =  count($product->getSingleCategoryProduct($category_id));
    $itemsPerPage = 20;
    $page = isset($_GET['page']) ? ($_GET['page']) : 1;
    $start = $page > 1 ? ($page * $itemsPerPage) - $itemsPerPage : 0;
    $totalPages = ceil($totalItems / $itemsPerPage);
    $seeProdcut = $product->getSingleCategoryProductss($category_id, $start, $itemsPerPage);
?>
<div class="body-content outer-top-xs" id="top-banner-and-menu" style="margin-bottom:40px;">  
    <div class="container">
        <div class="row"> 
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
            <!-- ================================== TOP NAVIGATION ================================== -->
            <div class="breadcrumb">
                <div class="container">
                    <div class="breadcrumb-inner">
                        <ul class="list-inline list-unstyled">
                            <li><a href="./">Home</a></li>
                            <li><a href="products-categories.php?category_name=<?php echo $category_name ?>"> Categories</a></li>
                            <li class='active'></li>
                        </ul>
                    </div><!-- /.breadcrumb-inner -->
                </div><!-- /.container -->
            </div><!-- /.breadcrumb -->
            <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                <h3 class="section-title">New Arrivals</h3>
                <div class="sidebar-widget-body outer-top-xs">
                    <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                        <div class="item">
                            <div class="products special-product">
                                <?php 
                                foreach($product->getAllProductSideBarTwo() as $sideProductTwo){
                                    $slugTwo = $sideProductTwo['slug'];
                                    $ragzProductTwo = $product->getSingleProductTwo($slugTwo);
                                    $type_id = $ragzProductTwo['genre_id'];
                                    $typeDetailsTwo = $type->getSingleBookType($type_id);
                                    // $category_id = $ragzProductTwo['category_id'];
                                    // $categoryDetails = $category->getSingleCategoryList($category_id);
                                    // $category_name = $categoryDetails['category_name'];
                                    $author_id = $ragzProductTwo['author_id'];
                                    $authorDetailsTwo = $author->getSingleAuthorList($author_id);

                                    ?>
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> 
                                                            <a href="product-detail.php?slug=<?php echo $slugTwo ?>"> <img src="<?php echo "assets/images/product/".$ragzProductTwo['image'] ?>" "> </a> 
                                                        </div>
                                                            <!-- /.image --> 
                                                    </div>
                                                <!-- /.product-image --> 
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name">
                                                            <a href="product-detail.php?slug=<?php echo $slugTwo ?>">
                                                                <?php echo $ragzProductTwo['product_name']; ?>
                                                            </a>
                                                        </h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="description">
                                                        <?php echo $authorDetailsTwo['author_name']; ?>
                                                        </div>
                                                        <div class="product-price"> 
                                                            <span class="price" style="color: green"> <?php 
                                                                $num2= (20/100)*$ragzProductTwo['amount'];
                                                                $adding = $num2 + $ragzProductTwo['amount'];
                                                                number_format($ragzProductTwo['amount']); ?> 
                                                                &#8358;<?php echo number_format($adding) ?> </span> 
                                                            <span class="price-before-discount" style="color: red"><?php
                                                                $num3= (40/100)*$ragzProductTwo['amount'];
                                                                $adding2 = $num3 + $ragzProductTwo['amount'];
                                                                number_format($ragzProductTwo['amount']); ?> 
                                                                &#8358;<?php echo number_format($adding2) ?>
                                                            </span> 
                                                        </div>
                                                    </div><!-- /.product-price --> 
                                                </div>

                                                <!-- /.col --> 
                                            </div>
                                            <!-- /.product-micro-row --> 
                                        </div>
                                        <!-- /.product-micro --> 
                                    </div><?php 
                                } ?>
                                
                            </div>
                        </div>
                        <div class="item">
                            <div class="products special-product">
                                <?php 
                                foreach($product->getAllProductSideBarThree() as $sideProductThree){
                                    $slugThree = $sideProductThree['slug'];
                                    $ragzProductThree = $product->getSingleProductThree($slugThree);
                                    
                                    $type_id = $ragzProductThree['genre_id'];
                                    $typeDetailsTwo = $type->getSingleBookType($type_id);
                                    // $category_id = $ragzProductThree['category_id'];
                                    // $categoryDetails3 = $category->getSingleCategoryList($category_id);
                                   // $category_name = $categoryDetails3['category_name'];
                                    $author_id = $ragzProductThree['author_id'];
                                    $authorDetailsThree = $author->getSingleAuthorList($author_id);
                                     ?>
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image"> 
                                                            <a href="product-detail.php?slug=<?php echo $slugThree ?>"> 
                                                            <img src="<?php echo "assets/images/product/".$ragzProductThree['image'] ?>" "> </a> 
                                                        </div>
                                                            <!-- /.image --> 
                                                    </div>
                                                <!-- /.product-image --> 
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-xs-7">
                                                    <div class="product-info">
                                                        <h3 class="name">
                                                            <a href="product-detail.php?slug=<?php echo $slugThree ?>">
                                                                <?php echo $ragzProductThree['product_name']; ?>
                                                            </a>
                                                        </h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="description">
                                                            <?php echo $authorDetailsThree['author_name'];  ?>
                                                        </div>
                                                        <div class="product-price"> 
                                                            <span class="price" style="color: green"> <?php 
                                                                $num2= (20/100)*$ragzProductThree['amount'];
                                                                $adding = $num2 + $ragzProductThree['amount'];
                                                                number_format($ragzProductThree['amount']); ?> 
                                                                &#8358;<?php echo number_format($adding) ?> </span> 
                                                            <span class="price-before-discount" style="color: red"><?php
                                                                $num3= (40/100)*$ragzProductThree['amount'];
                                                                $adding2 = $num3 + $ragzProductThree['amount'];
                                                                number_format($ragzProductThree['amount']); ?> 
                                                                &#8358;<?php echo number_format($adding2) ?>
                                                            </span> 
                                                        </div>
                                                    </div><!-- /.product-price --> 
                                                </div>
                                                <!-- /.col --> 
                                            </div>
                                            <!-- /.product-micro-row --> 
                                        </div>
                                        <!-- /.product-micro --> 
                                    </div><?php 
                                } ?></div>
                            </div>
                            <div class="item">
                                <div class="products special-product">
                                    <?php 
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.sidebar-widget-body --> 
                    </div>

            
                    <div class="sidebar-widget product-tag wow fadeInUp">
                        <h3 class="section-title">Product tags</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="tag-list"> 
                                <?php
                                $cate = $db->prepare("SELECT * FROM product_type ORDER BY type_id desc  LIMIT 0,15");
                                $cate->execute();
                                while($see_cate = $cate->fetch()){?>
                                    <a class="item" href="products-types.php?type_name=<?php echo $see_cate['type_name'] ?>" name="<?php echo $see_cate['type_name'] ?>"><?php echo $see_cate['type_name'] ?> </a><?php
                                } ?>
                            </div>
                            <!-- /.tag-list --> 
                        </div>
                        <!-- /.sidebar-widget-body --> 
                    </div>


                    <div class="home-banner"> <img src="style/images/banners/LHS-banner.jpg" alt="Image"> </div>
                </div>
                <!-- ============================================== CONTENT ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
            <!-- ========================================== SECTION – HERO ========================================= -->
            
            <div id="hero"> <?php
                if($totalItems == 0){ ?>
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3><p style="color: red" align="center">No Product is Found for <?php echo $category_name ?> Categories</p></h3>
                        </div>
                    </div>  <?php 
                } else{ ?>         
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">Products in <?php echo $category_name ?> Categories </h3>
                            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                                
                                <li class="active"><a href="products-categories.php?category_name=<?php echo $category_name ?> " ><?php echo $category_name ?></a>
                                </li>
                            </ul>
                            <!-- /.nav-tabs --> 
            
                            <div class="col col-sm-6 col-md-12 text-right">
                                <div class="pagination-container">
                                    <?php 
                                    if($totalItems > 3){ ?>
                                        <ul class="list-inline list-unstyled">
                                            <?php $b = $page - 1;
                                              if($page != 1){ ?>
                                                  <li class="prev"><a href="products-categories.php?category_name=<?php echo $category_name ?>&&page=<?php echo $page - 1?>"><i class="fa fa-angle-left"></i></a></li>
                                            <?php } ?>

                                            <?php if($page != $totalPages){ ?>
                                                  <li class="next"><a href="products-categories.php?category_name=<?php echo $category_name ?>&&page=<?php echo $page + 1?>"><i class="fa fa-angle-right"></i></a></li>
                                            <?php } ?>                                        
                                        </ul><?php 
                                    } ?>
                                    <!-- /.list-inline --> 
                                </div>
                        
                             <!-- /.col --> 
                            </div>

                            <hr>
                            <div class="tab-content outer-top-xs">
                                <div id="myTabContent" class="tab-content category-list">
                                    <div class="tab-pane active " id="grid-container">
                                        <div class="category-product">
                                            <div class="row"><?php
                                                 foreach($seeProdcut as $featureProduct){ 
                                                    $slugTwo = $featureProduct['slug'];
                                                    $ragzProductTwo = $product->getSingleProductTwo($slugTwo);
                                                    
                                                    $type_id = $ragzProductTwo['genre_id'];
                                                    $typeDetailsTwo = $type->getSingleBookType($type_id);
                                                    // $category_id = $ragzProductTwo['category_id'];
                                                    // $categoryDetails3 = $category->getSingleCategoryList($category_id);
                                                    //$category_name = $categoryDetails3['category_name'];
                                                    $author_id = $ragzProductTwo['author_id'];
                                                    $authorDetailsThree = $author->getSingleAuthorList($author_id); ?>
                                                    
                                                    <div class="col-sm-6 col-md-3 wow fadeInUp">
                                                        <div class="products">
                                                            <div class="product">
                                                                <div class="product-image">
                                                                    <div class="image"> 
                                                                        <a href="product-detail.php?slug=<?php echo $ragzProductTwo['slug']; ?>">
                                                                            <img src="<?php echo "assets/images/product/".$ragzProductTwo['image'] ?>" width="100" height="150px" alt="">
                                                                        </a> 
                                                                    </div>
                                                                    <!-- /.image -->                          
                                                                    <div class="tag new"><span>new</span>
                                                                    </div>
                                                                </div>
                                                                <!-- /.product-image -->
                                        
                                                                <div class="product-info text-left">
                                                                    <h3 class="name"><a href="product-detail.php?slug=<?php echo $ragzProductTwo['slug']; ?>">
                                                                    <?php echo $ragzProductTwo['product_name']; ?></a></h3>
                                                                    <div class="rating rateit-small">
                                                                        
                                                                    </div>
                                                                    <div class="description">
                                                                        <?php echo $authorDetailsThree['author_name'];  ?>
                                                                    </div>
                                                                    <div class="product-price"> 
                                                                        <span class="price"><?php 
                                                                            $num = (5/100)*$ragzProductTwo['amount'] + $ragzProductTwo['amount'];
                                                                            $num2= (20/100)*$ragzProductTwo['amount'];
                                                                            $addsing = $num2 + $ragzProductTwo['amount'];
                                                                            number_format($ragzProductTwo['amount']); ?> 
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
                                                                                    <input type="hidden" name="slug" value="<?php echo $ragzProductTwo['slug']; ?>">
                                                                                     <input type="hidden" name="name" value="<?php echo $ragzProductTwo['product_name']; ?>">
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
                                            </div>  
                                        </div>
                                        <!-- /.tab-content --> 
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div><?php 
                } ?>
            </div>
        </div>

    </div>
</div>
<?php
    include("footer.php"); 
?>