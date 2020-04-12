<!--
author: Polycarp

-->
<?php
 include ("inc/header.php");
?>
<!-- //header -->
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
            <li>Services</li>
        </ul>
    </div>
</div>
<!-- //products-breadcrumb -->
<!-- banner -->
<div class="banner">
    <div class="w3l_banner_nav_left">
        <nav class="navbar nav_bottom">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <?php
            include ("inc/main_sidebar.php");
            ?>
        </nav>
    </div>
    <div class="w3l_banner_nav_right">
        <!-- services -->
        <div class="services">
            <h3>Services</h3>
            <div class="w3ls_service_grids">
                <div class="col-md-5 w3ls_service_grid_left">
                    <h4>Fresh Farm Produce.</h4>
                    <p>We've got fresh farm produce that can be delivered to your doorstep.Contact us to make an order.</p>
                </div>
                <div class="col-md-7 w3ls_service_grid_right">
                    <div class="col-md-4 w3ls_service_grid_right_1">
                        <img src="images/18.jpg" alt=" " class="img-responsive" />
                    </div>
                    <div class="col-md-4 w3ls_service_grid_right_1">
                        <img src="images/19.jpg" alt=" " class="img-responsive" />
                    </div>
                    <div class="col-md-4 w3ls_service_grid_right_1">
                        <img src="images/20.jpg" alt=" " class="img-responsive" />
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="w3ls_service_grids1">
                <div class="col-md-6 w3ls_service_grids1_left">
                    <img src="images/4.jpg" alt=" " class="img-responsive" />
                </div>
                <div class="col-md-6 w3ls_service_grids1_right">
                    <ul>
                        <li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>We deliver farm produce to your doorstep.</li>
                        <li><i class="fa fa-long-arrow-right" aria-hidden="true"></i>We offer quality vegetables and fruits at affordable prices.</li>
                    </ul>
                    <a href="products.php">Shop Now</a>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- //services -->
    </div>
    <div class="clearfix"></div>
</div>
<!-- //banner -->
<!-- services-bottom -->
<div class="services-bottom">
    <div class="container">
        <div class="col-md-4 about_counter_left">
            <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
            <p class="counter">20</p>
            <h3>Followers</h3>
        </div>
        <div class="col-md-4 about_counter_left">
            <i class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></i>
            <p class="counter">50,000</p>
            <h3>Savings</h3>
        </div>
        <div class="col-md-4 about_counter_left">
            <i class="glyphicon glyphicon-export" aria-hidden="true"></i>
            <p class="counter">2,000</p>
            <h3>Support</h3>
        </div>
        <div class="clearfix"> </div>
        <!-- Stats-Number-Scroller-Animation-JavaScript -->
        <script src="js/waypoints.min.js"></script>
        <script src="js/counterup.min.js"></script>
        <script>
            jQuery(document).ready(function( $ ) {
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });
            });
        </script>
        <!-- //Stats-Number-Scroller-Animation-JavaScript -->

    </div>
</div>
<!-- //newsletter-top-serv-btm -->
<!-- newsletter -->
<div class="newsletter">
    <div class="container">
        <div class="w3agile_newsletter_left">
            <h3>sign up for our newsletter</h3>
        </div>
        <div class="w3agile_newsletter_right">
            <form action="#" method="post">
                <input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                <input type="submit" value="subscribe now">
            </form>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //newsletter -->
<!-- footer -->
<?php
include("inc/footer.php");
?>
</body>
</html>
