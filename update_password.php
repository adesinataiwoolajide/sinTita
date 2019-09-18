<?php 
    $body = 'myaccount_page';
    require_once('header.php');
    $user_name = $_GET['user_name'];
    $deel = $register->gettingUserCredential($user_name);
    $full_name = $deel['full_name'];
?>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home"> <a title="Go to Home Page" href="./">Home</a><span>&raquo;</span></li>
                        <li class=""> <a title="Go to login.php Page" 
                            href="shop.php">
                            Shop Products </a><span>&raquo;

                            </span>
                        </li>
                        <li><strong>User Login page</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container col1-layout">
        <div class="container">
            <div class="row">
                <div class="col-main col-sm-12 col-xs-12">
                   
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                        <div class="single-input p-bottom50 clearfix">
                            <form action="handlers/registration/process-registration.php" name="frm-login" method="POST" >
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="check-title">
                                            <h4>Password Update Form</h4>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>First Name:</label>
                                        <div class="input-text">
                                            <input type="text" name="full_name" value="<?php echo $deel['full_name'] ?>" class="form-control" placeholder="Enter your Full Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>E-Mail:</label>
                                        <div class="input-text">
                                            <input type="text" name="user_name" value="<?php echo $deel['user_name'] ?>" class="form-control" placeholder="Enter your E-mail address">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-12">
                                        <label>Password</label>
                                        <div class="input-text">
                                            <input type="password" name="password" class="form-control" placeholder="Enter your Password" minlenght="4">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Repeat Password</label>
                                        <div class="input-text">
                                            <input type="password" name="repeat" class="form-control" placeholder="Repeat Your Password" minenght="4">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        
                                        <div class="submit-text">
                                            <button class="button" type="submit" name="register"><i class="fa fa-user"></i>&nbsp; <span>Update Your Account</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                        <h4>Retrieve your account</h4>
                        <p class="before-login-text">Welcome back! Sign in to your account</p>
                        <form acttion="handlers/registration/retrieve-password.php" method="POST">
                            <label for="emmail_login">Email address<span class="required">*</span></label>
                            <input id="" name="user_name" placeholder="Enter your E-mail Or Registration Number" 
                            type="text" class="form-control">
                            <br><br>
                            <button class="submit" name="retrieve-password"><i class="icon-lock icons"></i>&nbsp; <span>Login</span></button>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 ">

                    </div>
                </div>
            </div>
        </div>
    </div>

    
  <!-- service section -->
<!-- <div class="jtv-service-area">
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
</div> -->


    
<?php 
    require_once('footer.php');
?>