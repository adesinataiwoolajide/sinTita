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

<div class="container">
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="our-clients">
          <div class="slider-items-products">
            <div id="our-clients-slider" class="product-flexslider hidden-buttons">
              <div class="slider-items slider-width-col6"><?php 
                foreach($publisher->getAllPublisher() as $logo){ $publisher_name = $logo['publisher_name']; ?>
                <div class="item"><a href="#"><img src="<?php echo "administrator/assets/images/publisher/".$logo['publisher_logo'] ?>" 
                style="width: 70px; height: 60px;" alt="<?php echo $publisher_name ?>"></a> </div>
               <?php 
                } ?>
                
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-3 col-xs-12">
          <div class="footer-logo"><a href="index.html"><img src="assets/images/abv.png" alt="fotter logo"></a> </div>
          
          <div class="social">
            <ul class="inline-mode">
              <li class="social-network fb"><a title="Connect us on Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li class="social-network googleplus"><a title="Connect us on Google+" href="#"><i class="fa fa-google"></i></a></li>
              <li class="social-network tw"><a title="Connect us on Twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li class="social-network linkedin"><a title="Connect us on Pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
              <li class="social-network rss"><a title="Connect us on Instagram" href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-2 col-xs-12 collapsed-block">
          <div class="footer-links">
            <h5 class="links-title">Information<a class="expander visible-xs" href="#TabBlock-1">+</a></h5>
            <div class="tabBlock" id="TabBlock-1">
              <ul class="list-links list-unstyled">
                <li><a href="#s">Delivery Information</a></li>
                
                <li><a href="privacy-policy.php">Privacy Policy</a></li>
                <li><a href="faq.php">FAQs</a></li>
                <li><a href="terms-and-condition.php">Terms &amp; Condition</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-md-2 col-xs-12 collapsed-block">
          <div class="footer-links">
            <h5 class="links-title">Insider<a class="expander visible-xs" href="#TabBlock-3">+</a></h5>
            <div class="tabBlock" id="TabBlock-3">
              <ul class="list-links list-unstyled">
                
               
                <li><a href="">About Us</a></li>
                <li><a href="">Contact Us</a></li>
                
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-md-2 col-xs-12 collapsed-block">
          <div class="footer-links">
            <h5 class="links-title">Service<a class="expander visible-xs" href="#TabBlock-4">+</a></h5>
            <div class="tabBlock" id="TabBlock-4">
              <ul class="list-links list-unstyled">
                
                
                <li><a href="">Return Policy</a></li>
                <li><a href="">Special</a></li>
                
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-xs-12 collapsed-block">
          <div class="footer-links">
            <h5 class="links-title">Payment Option<a class="expander visible-xs" href="#TabBlock-5">+</a></h5>
            <div class="tabBlock" id="TabBlock-5">
             
              <div class="payment">
                <ul>
                  <li><a href=""><img title="Visa" alt="Visa" src="images/visa.png"></a></li>
                  <li><a href=""><img title="Paypal" alt="Paypal" src="images/paypal.png"></a></li>
                 
                  <li><a href=""><img title="Master Card" alt="Master Card" src="images/master-card.png"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-coppyright">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-xs-12 coppyright"> Copyright © <?php echo date('Y') ?> <a href="#"> Abvesbooks </a>. All Rights Reserved. </div>
          <div class="col-sm-6 col-xs-12">
            <ul class="footer-company-links">
              <li> <a href="">About Us</a> </li>
              
              <li> <a href="">Privacy Policy</a> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-up"></i></a> 
  
  <!-- End Footer --> 
</div>

<!-- JS --> 

<!-- jquery js --> 
<script type="text/javascript" src="js/jquery.min.js"></script> 

<!-- bootstrap js --> 
<script type="text/javascript" src="js/bootstrap.min.js"></script> 

<!-- owl.carousel.min js --> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script> 

<!-- jquery.mobile-menu js --> 
<script type="text/javascript" src="js/mobile-menu.js"></script> 
<script type="text/javascript" src="js/jquery.bxslider.js"></script> 
<script type="text/javascript" src="js/jquery.flexslider.js"></script> 
<script type="text/javascript" src="js/cloud-zoom.js"></script>
<!--jquery-ui.min js --> 
<script type="text/javascript" src="js/jquery-ui.js"></script> 

<!-- main js --> 
<script type="text/javascript" src="js/main.js"></script> 

<!-- countdown js --> 
<script type="text/javascript" src="js/countdown.js"></script> 

<!-- Slider Js --> 
<script type="text/javascript" src="js/revolution-slider.js"></script> 
<script src="administrator/assets/Toast/js/Toast.min.js"></script>
    <?php 
    if(isset($_SESSION['success'])){
        $message = $_SESSION['success']; ?>
        <script type="text/javascript">
            new Toast({ message: '<?php echo $message; ?>', type: 'success' });
        </script><?php 
        unset($_SESSION['success']);
    }
    if(isset($_SESSION['error'])){
        $message = $_SESSION['error'];?>
    
        <script type="text/javascript">
            new Toast({ message: '<?php echo $message; ?>', type: 'danger' });
        </script><?php 
        unset($_SESSION['error']);
    }  ?>
<script type='text/javascript'>
        jQuery(document).ready(function(){
            jQuery('#rev_slider_4').show().revolution({
                dottedOverlay: 'none',
                delay: 5000,
                startwidth: 865,
	            startheight: 450,

                hideThumbs: 200,
                thumbWidth: 200,
                thumbHeight: 50,
                thumbAmount: 2,

                navigationType: 'thumb',
                navigationArrows: 'solo',
                navigationStyle: 'round',

                touchenabled: 'on',
                onHoverStop: 'on',
                
                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,
            
                spinner: 'spinner0',
                keyboardNavigation: 'off',

                navigationHAlign: 'center',
                navigationVAlign: 'bottom',
                navigationHOffset: 0,
                navigationVOffset: 20,

                soloArrowLeftHalign: 'left',
                soloArrowLeftValign: 'center',
                soloArrowLeftHOffset: 20,
                soloArrowLeftVOffset: 0,

                soloArrowRightHalign: 'right',
                soloArrowRightValign: 'center',
                soloArrowRightHOffset: 20,
                soloArrowRightVOffset: 0,

                shadow: 0,
                fullWidth: 'on',
                fullScreen: 'off',

                stopLoop: 'off',
                stopAfterLoops: -1,
                stopAtSlide: -1,

                shuffle: 'off',

                autoHeight: 'off',
                forceFullWidth: 'on',
                fullScreenAlignForce: 'off',
                minFullScreenHeight: 0,
                hideNavDelayOnMobile: 1500,
            
                hideThumbsOnMobile: 'off',
                hideBulletsOnMobile: 'off',
                hideArrowsOnMobile: 'off',
                hideThumbsUnderResolution: 0,
					

                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                startWithSlide: 0,
                fullScreenOffsetContainer: ''
            });
        });
        </script>
</body>
</html>
