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
                $response ="<div class='alert alert-success'>Product Added to Cart Successfully</div>";
                header("location:https://localhost/Ramona1/Ramona/web/drinks.php");
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
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
            <li>Fruits & Vegetables</li>
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
        <div class="w3l_banner_nav_right_banner5">
            <h3>Best Deals For New Products<span class="blink_me"></span></h3>
        </div>
        <div class="w3l_banner_nav_right_banner3_btm">
<!--            <div class="col-md-4 w3l_banner_nav_right_banner3_btml">-->
<!--                <div class="view view-tenth">-->
<!--                    <img src="images/18.jpg" alt=" " class="img-responsive" />-->
<!--                    <div class="mask">-->
<!--                        <h4>Grocery Store</h4>-->
<!--                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h4>Fruits & Vegetables</h4>-->
<!--                <ol>-->
<!--                    <li>sunt in culpa qui officia</li>-->
<!--                    <li>commodo consequat</li>-->
<!--                    <li>sed do eiusmod tempor incididunt</li>-->
<!--                </ol>-->
<!--            </div>-->
<!--            <div class="col-md-4 w3l_banner_nav_right_banner3_btml">-->
<!--                <div class="view view-tenth">-->
<!--                    <img src="images/19.jpg" alt=" " class="img-responsive" />-->
<!--                    <div class="mask">-->
<!--                        <h4>Grocery Store</h4>-->
<!--                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h4>Dry Fruits</h4>-->
<!--                <ol>-->
<!--                    <li>enim ipsam voluptatem officia</li>-->
<!--                    <li>tempora incidunt ut labore et</li>-->
<!--                    <li>vel eum iure reprehenderit</li>-->
<!--                </ol>-->
<!--            </div>-->
<!--            <div class="col-md-4 w3l_banner_nav_right_banner3_btml">-->
<!--                <div class="view view-tenth">-->
<!--                    <img src="images/20.jpg" alt=" " class="img-responsive" />-->
<!--                    <div class="mask">-->
<!--                        <h4>Grocery Store</h4>-->
<!--                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h4>Vegetables</h4>-->
<!--                <ol>-->
<!--                    <li>dolorem eum fugiat voluptas</li>-->
<!--                    <li>ut aliquid ex ea commodi</li>-->
<!--                    <li>magnam aliquam quaerat</li>-->
<!--                </ol>-->
<!--            </div>-->
            <div class="clearfix"> </div>
        </div>
        <div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_veg">
            <h3 class="w3l_fruit">Fruits & Vegetables</h3> <?php echo $response;?>
            <?php
            $sql = "SELECT id,product_name,product_description,product_img,price,discount FROM product WHERE cat_id='109'";
            $result = mysqli_query($dblink, $sql);
            while($row = mysqli_fetch_array($result)){
                ?>
                <div class="col-md-3 w3ls_w3l_banner_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos">
                                <img src="images/offer.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <a href="single.php"><img src="images/<?php echo $row[product_img];?>" alt=" " class="img-responsive" /></a>

                                            <p><?php echo $row[product_name];?></p>
                                            <h4><?php $var ="Ksh";echo $var." ".$row[price];?><span>Ksh<?php $var =00;echo $row[discount].".".$var;?></span></h4>
                                        </div>
                                        <div class="snipcart-details">
                                            <form  method="POST"  action="vegetables.php?action=add&id=<?php echo $row[id]; ?>">
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
                                                    <input type="submit" value="Order" class="button" />
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            mysqli_free_result($result);
            mysqli_close($dblink);
            ?>
    </div>
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
            <form action="vegetables.php" method="post"><?php echo $response;?>
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
