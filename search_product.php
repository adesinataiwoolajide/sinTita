<?php 
    $body = 'shop_grid_page';
    require_once('header.php');

    if(isset($_POST['search_product'])){
        $search = $all_purpose->sanitizeInput($_POST['name']);
        $category_name = $all_purpose->sanitizeInput($_POST['category_name']);

        $seth = $category->getSingleCategoryName($category_name);
        $category_id = $seth['category_id'];
        $demo = $category->getSingleCategoryList($category_id);

        $totalItems =  count($product->getSingleCategoryProduct($category_id));
        $itemsPerPage = 12;
        $page = isset($_GET['page']) ? ($_GET['page']) : 1;
        $start = $page > 1 ? ($page * $itemsPeraPage) - $itemsPerPage : 0;
        $totalPages = ceil($totalItems / $itemsPerPage);
        
        $listing = $product->getSingleCategoryProduct($category_id, $start, $itemsPerPage);  ?>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul>
                            <li class="home"> <a title="Go to Home Page" href="./">Home</a><span>&raquo;</span></li>
                            <li class=""> <a title="Go to produsearch_product.php?category_name=<?php echo $category_name ?> Product" 
                                href="product_categoriess.php?category_name=<?php echo $category_name ?>">
                                <?php echo $category_name ?> Products </a><span>&raquo;

                                </span>
                            </li>
                            <li><strong>List of Products in<?php echo $category_name ?> Categories</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-container col2-left-layout">
            <div class="container">
                <div class="row"><?php
                    if(empty($search)){ ?>
                        <div class="col-main col-sm-9 col-xs-12 col-sm-push-3"><?php
                            if($totalItems == 0){ ?>
                                
                                <div class="col-main col-sm-9 col-xs-9" align="center"> <h3>
                                    <p style="color: red" align="center"> No Product is Found For 
                                        <?php echo $category_name ?> Categories</p>
                                    </h3> 
                                </div>
                                <?php
                            }else{ ?>
                                <div class="shop-inner">
                                    <div class="page-title">
                                        <h2>Products in <?php echo $category_name ?> Categories</h2>
                                    </div>
                                    
                                    <div class="product-grid-area">
                                        <ul class="products-grid"><?php
                                            foreach($listing as $listShop){ ?>
                                                <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                                                    <div class="product-item">
                                                        <div class="item-inner">
                                                            <div class="product-thumbnail">
                                                                <div class="icon-new-label new-left">New</div>
                                                                <div class="pr-img-area"> 
                                                                    <a title="Product title here" href="product_details.php?slug=<?php echo $listShop['slug']; ?>">
                                                                        <figure> 
                                                                            <img class="first-img" src="<?php echo 'assets/images/product/'.$listShop['image']; ?>" alt="HTML template"> 
                                                                            <img class="hover-img" src="<?php echo 'assets/images/product/'.$related['image']; ?>" alt="<?php echo $listShop['product_name'] ?>">
                                                                        </figure>
                                                                    </a> 
                                                                </div>
                                                                <div class="pr-info-area">
                                                                    <div class="pr-button">
                                                                        <div class="mt-button add_to_wishlist"> <a href="handlers/registration/addit.php?slug=<?php echo $listShop['slug'] ?>&&action=<?php echo 'Wishlist' ?>"> 
                                                                            <i class="fa fa-heart-o"></i> </a> 
                                                                        </div>
                                                                        <div class="mt-button add_to_compare"> <a href="handlers/registration/addit.php?slug=<?php echo $listShop['slug'] ?>&&action=<?php echo 'Compare' ?>"> 
                                                                            <i class="fa fa-link"></i> </a> 
                                                                        </div>
                                                                        <div class="mt-button quick-view"> <a href="product_details.php?slug=<?php echo $listShop['slug']; ?>"> <i class="fa fa-shopping-cart"></i> </a> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title"> 
                                                                        <a title="<?php echo $listShop['product_name'] ?>" href="product_details.php?slug=<?php echo $listShop['slug']; ?>"><?php echo $listShop['product_name'] ?> </a> 
                                                                    </div>
                                                                    <div class="item-content">
                                                                        <div class="rating"> <i class="fa fa-star"></i> 
                                                                            <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> 
                                                                            <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> 
                                                                            <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> 
                                                                            <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> 
                                                                        </div>
                                                                        <div class="item-price">
                                                                            <div class="price-box"> <span class="regular-price"> 
                                                                                <span class="price">&#8358;<?php echo number_format($listShop['amount']); ?></span> </span> 
                                                                            </div>
                                                                        </div>
                                                                        <!-- <div class="pro-action">
                                                                            <button type="button" class="add-to-cart"><span> Add to Cart</span> </button>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li><?php 
                                            } ?>
                            
                                        </ul>
                                    </div>
                                    <div class="pagination-area">
                                    <?php 
                                        if($totalItems > 0){ ?>
                                            <ul>
                                                <?php $b = $page - 1;
                                                if($page != 1){ ?>
                                                    <li class="prev"><a href="product_categories.php?category_name=<?php echo $category_name ?>&&page=<?php echo $page - 1?>" 
                                                        class="buy-btn">Previous <i class="fa fa-angle-left"></i></a>
                                                    </li>
                                                <?php } ?>

                                                <?php if($page != $totalPages){ ?>
                                                    <li><a href="product_categories.php?category_name=<?php echo $category_name ?>&&page=<?php echo $page + 1?>" 
                                                        class="buy-btn"> Next Page</a>
                                                    </li>
                                                <?php } ?>                                        
                                            </ul>
                                            <p class="result-count">Showing <?php echo $totalItems ?> of <?php echo $itemsPerPage ?> result</p><?php 
                                        } ?>
                                    </div>
                                </div><?php 
                            } ?>
                            
                        </div><?php
                    }else{
                        $result = $product->searchProduuct($search); 
                        $totalItem =  count($product->getSingleCategoryProduct($category_id));
                        $number = 12;
                        $pag = isset($_GET['page']) ? ($_GET['page']) : 1;
                        $starting = $page > 1 ? ($pag * $paging) - $paging : 0;
                        $totalPage = ceil($totalItem / $paging); ?>
                        <div class="col-main col-sm-9 col-xs-12 col-sm-push-3"><?php
                            if($result == 0){ ?>
                                
                                <div class="col-main col-sm-9 col-xs-9" align="center"> <h3>
                                    <p style="color: red" align="center"> No Product is Found For 
                                        <?php echo $category_name ?> Products</p>
                                    </h3> 
                                </div>
                                <?php
                            }else{ ?>
                                <div class="shop-inner">
                                    <div class="page-title">
                                        <h2>Products in <?php echo $search ?> Categories</h2>
                                    </div>
                                    
                                    <div class="product-grid-area">
                                        <ul class="products-grid"><?php
                                            foreach($product->searchingProduuct($search, $starting, $paging) as $listShop){ ?>
                                                <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                                                    <div class="product-item">
                                                        <div class="item-inner">
                                                            <div class="product-thumbnail">
                                                                <div class="icon-new-label new-left">New</div>
                                                                <div class="pr-img-area"> 
                                                                    <a title="Product title here" href="product_details.php?slug=<?php echo $listShop['slug']; ?>">
                                                                        <figure> 
                                                                            <img class="first-img" src="<?php echo 'assets/images/product/'.$listShop['image']; ?>" alt="HTML template"> 
                                                                            <img class="hover-img" src="<?php echo 'assets/images/product/'.$related['image']; ?>" alt="<?php echo $listShop['product_name'] ?>">
                                                                        </figure>
                                                                    </a> 
                                                                </div>
                                                                <div class="pr-info-area">
                                                                    <div class="pr-button">
                                                                        <div class="mt-button add_to_wishlist"> <a href="handlers/registration/addit.php?slug=<?php echo $listShop['slug'] ?>&&action=<?php echo 'Wishlist' ?>"> 
                                                                            <i class="fa fa-heart-o"></i> </a> 
                                                                        </div>
                                                                        <div class="mt-button add_to_compare"> <a href="handlers/registration/addit.php?slug=<?php echo $listShop['slug'] ?>&&action=<?php echo 'Compare' ?>"> 
                                                                            <i class="fa fa-link"></i> </a> 
                                                                        </div>
                                                                        <div class="mt-button quick-view"> <a href="product_details.php?slug=<?php echo $listShop['slug']; ?>"> <i class="fa fa-shopping-cart"></i> </a> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="item-info">
                                                                <div class="info-inner">
                                                                    <div class="item-title"> 
                                                                        <a title="<?php echo $listShop['product_name'] ?>" href="product_details.php?slug=<?php echo $listShop['slug']; ?>"><?php echo $listShop['product_name'] ?> </a> 
                                                                    </div>
                                                                    <div class="item-content">
                                                                        <!-- <div class="rating"> <i class="fa fa-star"></i> 
                                                                            <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> 
                                                                            <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> 
                                                                            <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> 
                                                                            <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> 
                                                                        </div> -->
                                                                        <div class="item-price">
                                                                            <div class="price-box"> <span class="regular-price"> 
                                                                                <span class="price">&#8358;<?php echo number_format($listShop['amount']); ?></span> </span> 
                                                                            </div>
                                                                        </div>
                                                                        <!-- <div class="pro-action">
                                                                            <button type="button" class="add-to-cart"><span> Add to Cart</span> </button>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li><?php 
                                            } ?>
                            
                                        </ul>
                                    </div>
                                    <div class="pagination-area">
                                    <?php 
                                        if($totalItem > 0){ ?>
                                            <ul>
                                                <?php $b = $pag - 1;
                                                if($pag != 1){ ?>
                                                    <li class="prev"><a href="search_product.php?page=<?php echo $pag - 1?>" 
                                                        class="buy-btn">Previous <i class="fa fa-angle-left"></i></a>
                                                    </li>
                                                <?php } ?>

                                                <?php if($pag != $totalPage){ ?>
                                                    <li><a href="search_product.php?page=<?php echo $page + 1?>" 
                                                        class="buy-btn"> Next Page</a>
                                                    </li>
                                                <?php } ?>                                        
                                            </ul>
                                            <p class="result-count">Showing <?php echo $totalItem ?> of <?php echo $paging ?> result</p><?php 
                                        } ?>
                                    </div>
                                </div><?php 
                            } ?>
                            
                        </div>
                        <?php
                    
                    } ?>
        
                    <aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
                        
                        <div class="block shop-by-side">
                            <div class="sidebar-bar-title">
                                <h3>Shop By</h3>
                            </div>
                            <div class="block-content">
                                <p class="block-subtitle">Shopping Options</p>
                                <div class="manufacturer-area">
                                    <h2 class="saider-bar-title">Manufacturer</h2>
                                    <div class="saide-bar-menu">
                                        <ul><?php
                                            foreach($publisher->getAllPublisherSide() as $row){
                                                $manu_name = $row['publisher_name']; ?>
                                                <li><a href="manufacturer_product.php?manufacturer_name=<?php echo $manu_name ?>">
                                                <i class="fa fa-angle-right"></i> <?php echo $manu_name ?></a></li><?php 
                                            }?>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class="layered-Category">
                                    <h2 class="saider-bar-title">Categories</h2>
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
                                <h3>Special Products</h3>
                            </div>
                            <div class="block-content">
                                <ul><?php 
                                    foreach($product->getAllProductSideBar() as $side){ ?>
                                        <li class="item">
                                            <div class="products-block-left"> 
                                                <a href="<?php echo "assets/images/product/".$side['image'] ?>" title="<?php echo $side['product_name']; ?>" class="product-image">
                                                <img src="<?php echo "assets/images/product/".$side['image'] ?>" alt="<?php echo $side['product_name']; ?>"></a></div>
                                            <div class="products-block-right">
                                                <p class="product-name"> <a href="product_details.php?slug=<?php echo $side['slug'] ?>">
                                                    <?php echo $side['product_name']; ?></a> </p>
                                                <span class="price">&#8358;<?php echo number_format($side['amount']); ?></span>
                                                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                            </div>
                                        </li><?php 
                                    }?>
                                    
                                </ul>
                                <a class="link-all" href="shop.php">All Products</a> </div>
                            </div>
                            <div class="block popular-tags-area ">
                                <div class="sidebar-bar-title">
                                    <h3>Popular Tags</h3>
                                </div>
                                <div class="tag">
                                    <ul><?php
                                        foreach($type->getAllProductType() as $man){ ?>
                                            <li><a href="product_types.php?type_name=<?php echo $man['type_name'] ?>"><?php echo $man['type_name'] ?></a></li><?php
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
            
                        <!-- <div class="offer-banner"><img src="images/offer-banner.jpg" alt="banner"></div> -->
                    </aside>
                </div>
            </div>
        </div><?php

    }else{
         
        //Fetch The Serach Result Here
    } ?>
?>
    
<?php 
    require_once('footer.php');
?>