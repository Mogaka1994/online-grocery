<!--
author:Polycarp
-->
<?php
 include("inc/header.php");
?>
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
            <li>About Us</li>
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
        <!-- about -->
        <div class="privacy about">
            <h3>About Us</h3>
            <p class="animi">Located in the heart of Nakuru, EASY FOODS will offer a convenient one stop source for fish, groceries and cereals to the residents of Nakuru town.
                We will capitalize on our central location to pull in customers from the neighboring residential areas namely: Kiti, Naka, Section 58, Lanet, Whitehouse, Eastmore, Teachers estate, Makao, Mawanga, Kiamunyi, Ngata and Milimani areas.
                EASY FOODS settled on fish so as to provide alternative proteins to most Kenyan citizens who are currently deviating from red meat because of health reasons. We will also supply mushrooms and other plant proteins and legumes. </p>
            <div class="agile_about_grids">
                <div class="col-md-6 agile_about_grid_right">
                    <img src="images/31.jpg" alt=" " class="img-responsive" />
                </div>
                <div class="col-md-6 agile_about_grid_left">
                    <ul>
                        <h3>Objectives</h3>
                        <li>Ensure food security in urban and peri urban areas in line with SDG.2 on Zero hunger</li>
                        <li>To provide our customers with healthy, organic and highly nutritious food products by supplying foods without artificial colors, flavors, preservatives, additives and genetic modifications. </li>
                        <h3>Mission</h3>
                        <li>To deliver best quality food products and alternative proteins to our customers in a more convenient way and affordable price. </li>
                        <h3>Vision</h3>
                        <li>Grow a customer base that will expand each year and hopefully expand to other major towns and cities in Kenya and East Africa. </li>

                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- //about -->
    </div>
    <div class="clearfix"></div>
</div>
<!-- //banner -->
<!-- team -->
<div class="team">
    <div class="container">
        <h3>Meet Our Amazing Team</h3>
        <div class="agileits_team_grids">
            <div class="col-md-6 agileits_team_grid">
                <img src="images/32.jpg" alt=" " class="img-responsive" />
                <h4>Paullete Ramona</h4>
                <p>CEO</p>
                <ul class="agileits_social_icons agileits_social_icons_team">
                    <li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="col-md-6 agileits_team_grid">
                <img src="images/34.jpg" alt=" " class="img-responsive" />
                <h4>Bilha Sangara</h4>
                <p>Director</p>
                <ul class="agileits_social_icons agileits_social_icons_team">
                    <li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
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
<?php
include("inc/footer.php");
?>
</body>
</html>
