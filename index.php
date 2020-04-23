<!--
author: Polycarp
-->
<?php
ini_set('display_errors', 'On');
error_reporting(E_ERROR);
include ("inc/header.php");
include ("inc/db.php");
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            $productById = "SELECT * FROM product WHERE id='" . $_GET["id"] . "'";
            $result = mysqli_query($dblink, $productById);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $name = $row[product_name];
            $price =$row[price];
            $disc =$row[discount];
            $sqlns = "INSERT INTO ordders(product,amount,discount) VALUES ('$name','$price','$disc')";
            file_put_contents("log.txt","$sqlns",FILE_APPEND);
            $rss   = mysqli_query($dblink,$sqlns);
            if($result){
                $response ="<div class='alert alert-success'>Product Added to Cart Successfully<a href='checkout.php'class='btn btn-info'>Click to Checkout</a> </div>";
            }else{
                $response ="<div class='alert alert-danger'>Failed to Add Prouct to Cart </div>";
            }
            mysqli_free_result($rss);
            mysqli_close($dblink);
            break;
    }
}
if(isset($_POST['btn-subscribe'])){
    $email = $_POST['email'];
    $stmt  = "insert into emails (email) values ('$email')";
    file_put_contents("log.txt","$stmt",FILE_APPEND);
    if(mysqli_query($dblink,$stmt)){
        $response ="<div class='alert alert-success'>Subscribed  Successfully</div>";
    }else{
        $response ="<div class='alert alert-success'>Mail Subscription Failed</div>";
    }
}
?>
<!-- //header -->
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
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="w3l_banner_nav_right_banner">
                            <h3>Making your <span>grocery</span> Shopping easier.</h3>
                            <div class="more">
                                <a href="products.php" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w3l_banner_nav_right_banner1">
                            <h3>Making your <span>grocery</span> Shopping easier.</h3>
                            <div class="more">
                                <a href="products.php" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w3l_banner_nav_right_banner2">
                            <h3>upto <i>50%</i> off.</h3>
                            <div class="more">
                                <a href="products.php" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- flexSlider -->
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
        <script defer src="js/jquery.flexslider.js"></script>
        <script type="text/javascript">
            $(window).load(function(){
                $('.flexslider').flexslider({
                    animation: "slide",
                    start: function(slider){
                        $('body').removeClass('loading');
                    }
                });
            });
        </script>
        <!-- //flexSlider -->
    </div>
    <div class="clearfix"></div>
</div>
<!-- banner -->
<div class="banner_bottom">
    <div class="wthree_banner_bottom_left_grid_sub">
    </div>
    <div class="wthree_banner_bottom_left_grid_sub1">
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img src="images/4.jpg" alt=" " class="img-responsive" />
                <div class="wthree_banner_bottom_left_grid_pos">
                    <h4>Discount Offer <span>25%</span></h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img src="images/5.jpg" alt=" " class="img-responsive" />
                <div class="wthree_banner_btm_pos">
                    <h3>Introducing <span>best store</span> for <i>groceries</i></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img src="images/6.jpg" alt=" " class="img-responsive" />
                <div class="wthree_banner_btm_pos1">
                    <h3>Save <span>Upto</span> Ksh.10</h3>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
</div>
<!-- top-brands -->
<div class="top-brands">
    <div class="container">
        <h3>Hot Offers</h3><?php echo $response;?>

        <div class="agile_top_brands_grids">
            <?php
            $sql = "SELECT id,product_name,product_description,product_img,price,discount FROM product WHERE cat_id='101'";
            $result = mysqli_query($dblink, $sql);
            while($row = mysqli_fetch_array($result)) {
                ?>
                <div class="col-md-3 top_brand_left" >
                    <div class="hover14 column" >
                        <div class="agile_top_brand_left_grid" >
                            <div class="tag" ><img src = "images/tag.png" alt = " " class="img-responsive" /></div >
                            <div class="agile_top_brand_left_grid1" >
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <a href="single.php"><img src="web/images/<?php echo $row[product_img];?>" alt=" " class="img-responsive" /></a>

                                            <p><?php echo $row[product_name];?></p>
                                            <h4><?php $var ="Ksh";echo $var." ".$row[price];?><span>Ksh<?php $var =00;echo $row[discount].".".$var;?></span></h4>
                                        </div>
                                        <div class="snipcart-details">
                                            <form  method="POST"  action="index.php?action=add&id=<?php echo $row[id]; ?>">
                                                <fieldset>
                                                    <!--<input type="hidden" name="cmd" value="_cart" />-->
                                                    <!--<input type="hidden" name="add" value="1" />-->
                                                    <!--<input type="hidden" name="business" value=" " />-->
                                                    <input type="hidden" name="item_name" value="<?php echo $row[product_name];?>" />
                                                    <input type="hidden" name="amount" value="<?php echo $row[price];?>" />
                                                    <input type="hidden" name="discount_amount" value="<?php $var =00;echo $row[discount].".".$var;?>" />
                                                    <!--<input type="hidden" name="currency_code" value="USD" />-->
                                                    <!--<input type="hidden" name="return" value=" " />-->
                                                    <!--<input type="hidden" name="cancel_return" value=" " />-->
                                                    <input type="submit" value="Add to Cart" class="button" />
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </figure>
                            </div >
                        </div >
                    </div >
                </div >
                <?php
            }
            ?>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //top-brands -->
<!-- fresh-vegetables -->
<div class="fresh-vegetables">
    <div class="container">
        <h3>Top Products</h3>
        <div class="w3l_fresh_vegetables_grids">
            <div class="col-md-3 w3l_fresh_vegetables_grid w3l_fresh_vegetables_grid_left">
                <div class="w3l_fresh_vegetables_grid2">
                    <ul>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a href="index.php">All Brands</a></li>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a href="vegetables.php">VEGETABLES</a></li>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a href="fruits.php">FRUITS</a></li>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a href="product.php">CEREALS</a></li>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a href="dairy_egg.php">DAIRY & EGGS</a></li>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a href="dairy_egg.php">SPICES</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 w3l_fresh_vegetables_grid_right">
                <div class="col-md-4 w3l_fresh_vegetables_grid">
                    <div class="w3l_fresh_vegetables_grid1">
                        <img src="images/8.jpg" alt=" " class="img-responsive" />
                    </div>
                </div>
                <div class="col-md-4 w3l_fresh_vegetables_grid">
                    <div class="w3l_fresh_vegetables_grid1">
                        <div class="w3l_fresh_vegetables_grid1_rel">
                            <img src="images/7.jpg" alt=" " class="img-responsive" />
                            <div class="w3l_fresh_vegetables_grid1_rel_pos">
                                <div class="more m1">
                                    <a href="products.php" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w3l_fresh_vegetables_grid1_bottom">
                        <img src="images/10.jpg" alt=" " class="img-responsive" />
                        <div class="w3l_fresh_vegetables_grid1_bottom_pos">
                            <h5>Special Offers</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 w3l_fresh_vegetables_grid">
                    <div class="w3l_fresh_vegetables_grid1">
                        <img src="images/9.jpg" alt=" " class="img-responsive" />
                    </div>
                    <div class="w3l_fresh_vegetables_grid1_bottom">
                        <img src="images/11.jpg" alt=" " class="img-responsive" />
                    </div>
                </div>
                <div class="clearfix"> </div>
                <div class="agileinfo_move_text">
                    <div class="agileinfo_marquee">
                        <h4>get <span class="blink_me">25% off</span> on first order and also get gift voucher</h4>
                    </div>
                    <div class="agileinfo_breaking_news">
                        <span> </span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //fresh-vegetables -->
<!-- newsletter -->
<div class="newsletter">
    <div class="container">
        <div class="w3agile_newsletter_left">
            <h3>sign up for our newsletter</h3>
        </div>
        <div class="w3agile_newsletter_right">
            <form action="index.php" method="post"><?php echo $response;?>
                <input type="email" name="email" value="email"  required="">
                <input type="submit"  name="btn-subscribe" value="subscribe now">
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
