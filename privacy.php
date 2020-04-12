<!--
author: Polycarp

-->
<?php
include ("inc/header.php");
?>
<!--header -->
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
            <li>Privacy Policy & Terms of Use</li>
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
        <!-- privacy -->
        <div class="privacy">
            <div class="privacy1">
                <h3>Privacy Policy</h3>
                <div class="banner-bottom-grid1 privacy1-grid">
                    <ul>
                        <li><i class="glyphicon glyphicon-user" aria-hidden="true"></i></li>
                        <li>Profile <span>Excepteur sint occaecat cupidatat non proident, sunt in
							culpa qui officia deserunt mollit anim id est laborum.</span></li>
                    </ul>
                    <ul>
                        <li><i class="glyphicon glyphicon-search" aria-hidden="true"></i></li>
                        <li>Search <span>Excepteur sint occaecat cupidatat non proident, sunt in
							culpa qui officia deserunt mollit anim id est laborum.</span></li>
                    </ul>
                    <ul>
                        <li><i class="glyphicon glyphicon-paste" aria-hidden="true"></i></li>
                        <li>News Feed <span>Excepteur sint occaecat cupidatat non proident, sunt in
							culpa qui officia deserunt mollit anim id est laborum.</span></li>
                    </ul>
                    <ul>
                        <li><i class="glyphicon glyphicon-qrcode" aria-hidden="true"></i></li>
                        <li>Applications <span>Excepteur sint occaecat cupidatat non proident, sunt in
							culpa qui officia deserunt mollit anim id est laborum.</span></li>
                    </ul>
                </div>
            </div>
            <div class="privacy1">
                <h3>Terms of Use</h3>
                <div class="banner-bottom-grid1 privacy2-grid">
                    <div class="privacy2-grid1">
                        <h4>deserunt mollit anim id est laborum?</h4>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                        <div class="privacy2-grid1-sub">
                            <h5>1. sint occaecat cupidatat non proident, sunt</h5>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="privacy2-grid1-sub">
                            <h5>2.perspiciatis unde omnis iste natus error</h5>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="privacy2-grid1-sub">
                            <h5>3. natus error sit voluptatem accusant</h5>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="privacy2-grid1-sub">
                            <h5>4. occaecat cupidatat non proident, sunt in</h5>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="privacy2-grid1-sub">
                            <h5>5. deserunt mollit anim id est laborum</h5>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //privacy -->
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
