<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">hot deals</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss"><?php 
        foreach($product->getAllProductSideBar() as $sideProduct){
            $slug = $sideProduct['slug'];
            $ragzProduct = $product->getSingleProduct($slug);
            $type_id = $ragzProduct['genre_id'];
            $typeDetails = $type->getSingleBookType($type_id);
            $category_id = $ragzProduct['category_id'];
            $categoryDetails = $category->getSingleCategoryList($category_id);
            $category_name = $categoryDetails['category_name'];
            $author_id = $ragzProduct['author_id'];
            $authorDetails = $author->getSingleAuthorList($author_id);
            ?>
            <div class="item">
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image"> 
                            <img src="<?php echo "assets/images/product/".$ragzProduct['image'] ?>" ">
                        </div>
                    </div>
                    <!-- /.hot-deal-wrapper -->
                    <div class="product-info text-center m-t-20" >
                        <h3 class="name">
                            <a href="product-detail.php?slug=<?php echo $slug ?>">
                                <?php echo $ragzProduct['product_name']; ?>
                                
                            </a>
                        </h3>
                        <div class="rating rateit-small" >
                            
                        </div>
                        <div class="description">
                            <?php echo $authorDetails['author_name']; ?>
                        </div>
                        <div class="product-price"> 
                            <span class="price" style="color: green"> <?php 
                                $num2= (20/100)*$ragzProduct['amount'];
                                $adding = $num2 + $ragzProduct['amount'];
                                number_format($ragzProduct['amount']); ?> 
                                 &#8358;<?php echo number_format($adding) ?> 
                            </span> 
                            <span class="price-before-discount" style="color: red"><?php
                                $num3= (40/100)*$ragzProduct['amount'];
                                $adding2 = $num3 + $ragzProduct['amount'];
                                number_format($ragzProduct['amount']); ?> 
                                 &#8358;<?php echo number_format($adding2) ?>
                            </span> 
                        </div>
                        <!-- /.product-price -->  
                    </div><!-- /.product-info -->
                   
                    <div class="col-md-12" align="center"> 
                        <form action="handlers/cart/addToCart.php" method="get">
                            
                            <input type="hidden" name="amount" value="<?php echo $adding ?>">
                            <input type="hidden" name="slug" value="<?php echo $slug; ?>">
                             <input type="hidden" name="name" value="<?php echo $ragzProduct['product_name']; ?>">
                            <input type="hidden" name="quantity" value="<?php echo 1 ?>">
                            <input type="hidden" name="return" value="<?php $_SERVER['REQUEST_URI'] ?>">
                            <a data-toggle="tooltip" class="btn btn-danger" href="handlers/registration/addit.php?slug=<?php echo $slug?>&&action=<?php echo 'Wishlist' ?>" title="Wishlist"> <i class="icon fa fa-heart"></i>  </a> 

                            <button data-toggle="tooltip" class="btn btn-primary icon" type="submit" title="Add Cart"> <i class="fa fa-shopping-cart"></i>  </button>

                            <a data-toggle="tooltip" class="btn btn-danger" href="handlers/registration/addit.php?slug=<?php echo $slug?>&&action=<?php echo 'Compare' ?>" title="Compare"> <i class="icon fa fa-signal"></i>  </a> 
                        </form> 
                    </div>
                    <!-- /.cart --> 
                </div>
            </div><?php 
        } ?>

    </div>
          <!-- /.sidebar-widget --> 
</div>

<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list"> 
            <?php
            $cate = $db->prepare("SELECT * FROM product_type ORDER BY type_name asc  LIMIT 0,20");
            $cate->execute();
            while($see_cate = $cate->fetch()){?>
                <a class="item" href="products-types.php?type_name=<?php echo $see_cate['type_name'] ?>" name="<?php echo $see_cate['type_name'] ?>"><?php echo $see_cate['type_name'] ?> </a><?php
            } ?>
        </div>
        <!-- /.tag-list --> 
    </div>
    <!-- /.sidebar-widget-body --> 
</div>     
<div class="sidebar-widget outer-bottom-small wow fadeInUp">
    <h3 class="section-title">Special Offer</h3>
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
                        $category_id = $ragzProductTwo['category_id'];
                        $categoryDetails = $category->getSingleCategoryList($category_id);
                        $category_name = $categoryDetails['category_name'];
                        $author_id = $ragzProductTwo['author_id'];
                        $authorDetailsTwo = $author->getSingleAuthorList($author_id);

                        ?>
                        <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image"> 
                                                <a href="product-detail.php?slug=<?php echo $slug ?>"> <img src="<?php echo "assets/images/product/".$ragzProductTwo['image'] ?>" "> </a> 
                                            </div>
                                                <!-- /.image --> 
                                        </div>
                                      <!-- /.product-image --> 
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name">
                                                <a href="product-detail.php?slug=<?php echo $slug ?>">
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
                        $category_id = $ragzProductThree['category_id'];
                        $categoryDetails3 = $category->getSingleCategoryList($category_id);
                        $category_name = $categoryDetails3['category_name'];
                        $author_id = $ragzProductThree['author_id'];
                        $authorDetailsThree = $author->getSingleAuthorList($author_id);
                        

                        $sku = $slug; ?>
                        <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image"> 
                                                <a href="product-detail.php?slug=<?php echo $slug ?>"> <img src="<?php echo "assets/images/product/".$ragzProductThree['image'] ?>" "> </a> 
                                            </div>
                                                <!-- /.image --> 
                                        </div>
                                      <!-- /.product-image --> 
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name">
                                                <a href="product-detail.php?slug=<?php echo $slug ?>">
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
        
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
            <h3 class="section-title">Newsletters</h3>
            <div class="sidebar-widget-body outer-top-xs">
                <p>Sign Up for Our Newsletter!</p>
                <form>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                    </div>
                    <button class="btn btn-primary">Subscribe</button>
                </form>
            </div>
            <!-- /.sidebar-widget-body --> 
        </div>
        
       

    </div>
