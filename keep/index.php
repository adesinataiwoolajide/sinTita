<?php 
	$body = "cms-index-index cms-home-page";
	require_once('header.php');
	$totalItems =  count($product->getAllProduct());
    $itemsPerPage = 20;
    $page = isset($_GET['page']) ? ($_GET['page']) : 1;
    $start = $page > 1 ? ($page * $itemsPerPage) - $itemsPerPage : 0;
    $totalPages = ceil($totalItems / $itemsPerPage);

    $listing = $product->allProductListing($start, $itemsPerPage);
?>
<div class="main-slider" id="home">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12 banner-left hidden-xs">
				<!-- <img src="images/banner-left.jpg" alt="banner"> -->
			</div>
            <div class="col-sm-9 col-md-9 col-lg-9 col-xs-12 jtv-slideshow">
                <div id="jtv-slideshow">
                    <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container' >
                        <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
                            <ul>
                                <li data-transition='fade' data-slotamount='7' data-masterspeed='1000' data-thumb=''>
                                    <img src='assets/images/slide4.jpg' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                                    <div class="caption-inner left">
										<div class='tp-caption LargeTitle sft  tp-resizeme' data-x='50'  data-y='110'  data-endspeed='500'  
										data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' 
										data-splitout='none' 
										data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'>
										<p style="color:black">Up to 50% OFF </p></div>
										<div class='tp-caption ExtraLargeTitle sft  tp-resizeme' data-x='50'  data-y='160'  data-endspeed='500'  
										data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' 
										data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'> 
										All Orders above #20,000 </div>
										<div class='tp-caption' data-x='72'  data-y='230'  data-endspeed='500'  data-speed='500' data-start='1100' 
										data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' 
										data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>
										Online Shopping Made Easy. Get Best Deals Available</div>
										<div class='tp-caption sfb  tp-resizeme ' data-x='72'  data-y='280'  data-endspeed='500'  data-speed='500'
										 data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' 
										 data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'>
										<a href='shop.php' class="buy-btn">
											Shop Now!</a> </div>
                                    </div>
                                </li>
                                <li data-transition='fade' data-slotamount='7' data-masterspeed='1000' data-thumb=''>
									<img src='assets/images/slide3.jpg' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                                    <div class="caption-inner">
									<div class='tp-caption LargeTitle sft  tp-resizeme' data-x='250'  data-y='110'  
									data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' 
									data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' 
									
									style='z-index:3; white-space:nowrap;'>Something Here</div>
									<div class='tp-caption ExtraLargeTitle sft  tp-resizeme' data-x='200'  data-y='160'  
									data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' 
									data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' 
									style='z-index:2; white-space:nowrap; color:#fff; text-shadow:none;'></div>
									<div class='tp-caption' data-x='310'  data-y='230'  data-endspeed='500'  data-speed='500' 
									data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' 
									data-elementdelay='0.1' data-endelementdelay='0.1' 
									style='z-index:2; white-space:nowrap; color:#f8f8f8;'>Perfect place to buy your books and stationaries</div>
									<div class='tp-caption sfb  tp-resizeme ' data-x='370'  data-y='280'  data-endspeed='500' 
									 data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' 
									 data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' 
									 style='z-index:4; white-space:nowrap;'><a href='shop.php' class="buy-btn">Get Started</a> </div>
                                    </div>
                                </li>
                                <li data-transition='fade' data-slotamount='7' data-masterspeed='1000' data-thumb=''><img src='assets/images/slide.jpg' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                                    <div class="caption-inner left">
										<div class='tp-caption LargeTitle sft  tp-resizeme' data-x='350'  data-y='100' 
										 data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' 
										 data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1'
										  style='z-index:3; white-space:nowrap;'></div>
										<div class='tp-caption ExtraLargeTitle sft  tp-resizeme' data-x='350'  data-y='160'  
										data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' 
										data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'></div>
										<div class='tp-caption' data-x='375'  data-y='230'  data-endspeed='500'  data-speed='500' 
										data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' 
										data-elementdelay='0.1' data-endelementdelay='0.1' 
										style='z-index:2; white-space:nowrap;color:#f8f8f8;'></div>
										<div class='tp-caption sfb  tp-resizeme ' data-x='375'  data-y='280'  data-endspeed='500'  
										data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' 
										data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' 
										style='z-index:4; white-space:nowrap;'><a href='shop.php' class="buy-btn">Start Buying 
											
										</a> </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="tp-bannertimer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- service section -->
<div class="jtv-service-area">
    <div class="container">
        <div class="row">
            <div class="col col-md-3 col-sm-6 col-xs-12">
                <div class="block-wrapper ship">
                    <div class="text-des">
                        <div class="icon-wrapper"><i class="fa fa-paper-plane"></i></div>
                        <div class="service-wrapper">
                            <h3>World-Wide Shipping</h3>
                            <p>On order over $99</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-md-3 col-sm-6 col-xs-12 ">
                <div class="block-wrapper return">
                    <div class="text-des">
                        <div class="icon-wrapper"><i class="fa fa-rotate-right"></i></div>
                        <div class="service-wrapper">
                            <h3>100% secure payments</h3>
                            <p>Credit/ Debit Card/ Banking </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-md-3 col-sm-6 col-xs-12">
                <div class="block-wrapper support">
                    <div class="text-des">
                        <div class="icon-wrapper"><i class="fa fa-umbrella"></i></div>
                        <div class="service-wrapper">
                            <h3>Support 24/7</h3>
                            <p>Call us: ( +123 ) 456 789</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-md-3 col-sm-6 col-xs-12">
                <div class="block-wrapper user">
                    <div class="text-des">
                        <div class="icon-wrapper"><i class="fa fa-tags"></i></div>
                        <div class="service-wrapper">
                            <h3>Member Discount</h3>
                            <p>25% on order over $199</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
  <!-- All products-->
  
  <div class="main-container col1-layout">
        <div class="container">
            <div class="row">
                <div class="col-main col-sm-12 col-xs-12">
                    <div class="shop-inner">
                        <div class="page-title">
                            <h2>New Arrival</h2>
                        </div>
                        
                        <div class="product-grid-area">
                            <ul class="products-grid"><?php
                                foreach($listing as $listShop){ ?>
                                    <li class="item col-lg-3 col-md-4 col-sm-6 col-xs-6 ">
                                        <div class="product-item">
                                            <div class="item-inner">
                                                <div class="product-thumbnail">
                                                    <div class="icon-sale-label sale-left">For Sale</div>
                                                    <!-- <div class="icon-new-label new-right">New</div> -->
                                                    <div class="pr-img-area"> 
                                                        <a title="Product title here" href="product_details.php?slug=<?php echo $listShop['slug']; ?>">
                                                            <figure> 
                                                                <img class="first-img" src="<?php echo 'assets/images/product/'.$listShop['image']; ?>" alt="<?php echo $listShop['product_name'] ?>" style="height:250px"> 
                                                                <img class="hover-img" src="<?php echo 'assets/images/product/'.$related['image']; ?>" 
																alt="<?php echo $listShop['product_name'] ?>"  style="height:250px">
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
                                                            <div class="rating"> 
                                                                <i class="fa fa-star-o"></i> 
                                                                <i class="fa fa-star-o"></i> 
                                                                <i class="fa fa-star-o"></i> 
                                                                <i class="fa fa-star-o"></i> 
                                                                <i class="fa fa-star-o"></i>  
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
                                        <li><a href="shop.php?page=<?php echo $page - 1?>" class="active">
                                        <i class="fa fa-angle-left">Previous</i></a></li>
                                    
                                        <?php 
                                    } 
                                    if($page != $totalPages){ ?>
                                        <li><a href="shop.php?page=<?php echo $page + 1?>" class="active">
                                        <i class="fa fa-angle-right">Next </i></a></li>
                                    
                                       <?php 
                                    } ?>
                                </ul>
                                <p class="result-count">Showing <?php echo $totalItems ?> of <?php echo $itemsPerPage ?> result</p><?php 
                            } ?>
                        </div>
                        
                    </div>
                </div>

				
            </div>
        </div>
    </div>

	<div class="container">
		<div class="banner-section">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<figure> 
							<img src="assets/images/new3.jpg" alt="banner laptop">
						</figure>
					</div>
					<div class="col-sm-6">
						<figure> 
							<img src="assets/images/new5.jpg" alt="banner moblie" style="height: 185px">
						</figure>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="daily-deal-section"> 
				<!-- daily deal section-->
				<div class="col-md-7 daily-deal">
					<h3 class="deal-title">Deal of the day</h3>
					<div class="title-divider"><span></span></div>
					<p>Description of The Deal </p>
					<div class="hot-offer-text">Summer Sale <span><?php echo date('Y') ?></span></div>
					<div class="box-timer"> 
						<span class="des-hot-deal">Hurry up! Special offer</span>
						<div class="time" data-countdown="countdown" data-date="09-30-2018-10-20-50"></div>
						<a href="shop.php" class="link">Shopping Now</a> 
					</div>
					</div>
					<div class="col-md-5 hot-pr-img-area">
						<div id="daily-deal-slider" class="product-flexslider hidden-buttons">
							<div class="slider-items slider-width-col4 "><?php 
								foreach($product->getAllProductByGenreListing() as $show){ ?>
									<div class="pr-img-area"> <a title="<?php echo $show['product_name'] ?>" href="product_details.php?slug=<?php echo $show['slug'] ?>" style="height:250px">
										<figure> <img class="first-img" src="<?php echo 'assets/images/product/'.$show['image']; ?>" 
										alt="<?php echo $show['product_name'] ?>" style="height:250px"></figure>
										</a> 
									</div><?php 
								} ?>
								
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