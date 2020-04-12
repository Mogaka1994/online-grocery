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
            <li>Events</li>
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
        <!-- events -->
        <div class="events">
            <h3>Events</h3>
            <div class="w3agile_event_grids">
                <div class="col-md-6 w3agile_event_grid">
                    <div class="col-md-3 w3agile_event_grid_left">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-9 w3agile_event_grid_right">
                        <h4>To be Updated</h4>
                        <p></p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="col-md-6 w3agile_event_grid">
                    <div class="col-md-3 w3agile_event_grid_left">
                        <i class="fa fa-trophy" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-9 w3agile_event_grid_right">
                        <h4>To be Updated</h4>
                        <p></p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="events-bottom">
                    <div class="col-md-12">
                        <img src="images/15.jpg" alt=" " class="img-responsive" />
                        <h4>To be Updated</h4>
<!--                        <ul>-->
<!--                            <li><i class="fa fa-clock-o" aria-hidden="true"></i>3:00 PM</li>-->
<!--                            <li><i class="fa fa-user" aria-hidden="true"></i><a href="#">Admin</a></li>-->
<!--                        </ul>-->
<!--                        <p></p>-->
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- //events -->
    </div>
    <div class="clearfix"></div>
</div>
<!-- //banner -->
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
include ("inc/footer.php");
?>
</body>
</html>
