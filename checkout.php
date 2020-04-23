<!--
author: Polycarp
-->
<?php
include ("inc/header.php");
include ("inc/db.php");

ini_set('display_errors', 'On');
error_reporting(E_ERROR);
if(isset($_POST['btn-address'])){
    $name =$_POST['name'];
    $msisdn =$_POST['msisdn'];
    $place =$_POST['place'];
    $xplace =$_POST['xplace'];
    $address_type =$_POST['address_type'];
    $sql ="INSERT INTO personal_information (full_name,place,exact_place,address_type,phone_number)
                VALUES('$name','$place','$xplace','$address_type','$msisdn')";
    file_put_contents("log.txt","$sql",FILE_APPEND);
    if(mysqli_query($dblink,$sql)){
        $response ="<div class='alert alert-success'>Customer Details Added Successfully <a href='payment.php'class='btn btn-info'>Click to Pay</a> </div>";
    }else{
        $response ="<div class='alert alert-danger'>Failed to Add Customer Details</div>";
    }
}

switch($_GET["action"]) {
    case "del":
        $productById = "SELECT * FROM ordders WHERE id='" . $_GET["id"] . "'";
        file_put_contents("log.txt", "$productById"."\n",FILE_APPEND);
        $result      = mysqli_query($dblink, $productById);
        $row         = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $id    = $row[id];
        $sqlns = "DELETE FROM ordders WHERE id ='$row[id]'";
        file_put_contents("log.txt","$sqlns",FILE_APPEND);
        $rss   = mysqli_query($dblink,$sqlns);
        if($result){
            $response ="<div class='alert alert-success'>Product Removed from Cart Successfully</div>";
            ?>
            <script>
                window.location.href = "checkout.php";
            </script>
            <?php
        }else{
            $response ="<div class='alert alert-danger'>Failed to Remove Product from Cart </div>";
        }
//        mysqli_free_result($rss);
//        mysqli_close($dblink);
        break;
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
<div class="products-breadcrumb" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
            <li>Checkout</li>
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
            <h3>Chec<span>kout</span></h3>

            <div class="checkout-right">
                <h4>Your shopping cart contains:</h4>
                <table class="timetable_sub">
                    <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql    = "SELECT id,product,quantity,amount,(SELECT product.product_img from product WHERE ordders.product =product.product_name) AS image from ordders";
                    $result = mysqli_query($dblink, $sql);
                    $count  = 1;
                    while($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr class="rem1">
                            <td class="invert"><?php echo $count;?></td>
                            <td class="invert-image"><a href="single.php"><img src="web/images/<?php echo $row[image];?>" alt=" "class="img-responsive"></a></td>
                            <td class="invert">
                                <div class="quantity">
                                    <div class="quantity-select">
                                        <div class="entry value-minus">&nbsp;</div>
                                        <div class="entry value"><span><?php echo $row[quantity];?></span></div>
                                        <div class="entry value-plus active">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="invert"><?php echo $row[product];?></td>
                            <td class="invert"><?php $var ="Ksh";echo $var." ".$row[amount];?></td>
                            <td class="invert">
                                <div class="rem">
                                   <form  method="POST"  action="checkout.php?action=del&id=<?php echo $row[id]; ?>">
                                           <input type="submit" class="close1" />
                                   </form>
                                </div>

                            </td>
                        </tr>
                        <?php
                        $count ++;
                    }
                    ?>
                    </tbody></table>
            </div>
            <div class="checkout-left">
                <div class="col-md-4 checkout-left-basket">
                    <a href="index.php"><h4>Continue to basket</h4></a>
                    <ul>
                    <?php
                       $sqlns = "SELECT id,product,quantity,amount,(SELECT product.product_img from product WHERE ordders.product =product.product_name) AS image from ordders";
                       $rss = mysqli_query($dblink, $sqlns);
                       $count = 1;
                       $rs = mysqli_fetch_array($rss);
                       $amount =$rs[amount];
                        ?>
                        <?php
                        $sqlcount = "SELECT SUM(amount) AS sum FROM ordders";
                        $count    = mysqli_query($dblink,$sqlcount);
                        $row      = mysqli_fetch_array($count);
                        $sum      = $row['sum'];
                        ?>
                        <li>Total Service Charges <i>-</i> <span><?php $var ="Ksh";echo $var." "."20";?></span></li>
                        <li>Total <i>-</i> <span><?php $total = ""; $total = $sum+20; echo $var.$total;?></span></li>
                    </ul>
                </div>
                <div class="col-md-8 address_form_agile">
                    <h4>Add a new Details</h4>
                    <form action="checkout.php" method="POST" class="creditly-card-form agileinfo_form">
                        <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                            <div class="information-wrapper">
                                <div class="first-row form-group"><?php echo $response;?>
                                    <div class="controls">
                                        <label class="control-label">Full name: </label>
                                        <input class="billing-address-name form-control" type="text" name="name" id="name" placeholder="Full name">
                                    </div>
                                    <div class="w3_agileits_card_number_grids">
                                        <div class="w3_agileits_card_number_grid_left">
                                            <div class="controls">
                                                <label class="control-label">Mobile number:</label>
                                                <input class="form-control" type="text" id="msisdn" name="msisdn" placeholder="Mobile number">
                                            </div>
                                        </div>
                                        <div class="w3_agileits_card_number_grid_right">
                                            <div class="controls">
                                                <label class="control-label">Estate: </label>
                                                <input class="form-control" type="text" id="place" name="place" placeholder="Exact Place">
                                            </div>
                                        </div>
                                        <div class="clear"> </div>
                                        <div class="w3_agileits_card_number_grid_right">
                                            <div class="controls">
                                                <label class="control-label">Exact Place: </label>
                                                <input class="form-control" type="text" id="xplace" name="xplace" placeholder="Landmark">
                                            </div>
                                        </div>
                                        <div class="clear"> </div>
                                    </div>
                                    <div class="controls">
                                        <label class="control-label">Address type: </label>
                                        <select class="form-control option-w3ls" name="address_type" id="address_type">
                                            <option value="office">Office</option>
                                            <option value="home">Home</option>

                                        </select>
                                    </div>
                                </div>
                                <input  type="submit" class="submit check_out btn btn-success" name="btn-address" id="btn-address" value="Delivery to this Address">
                            </div>
                        </section>
                    </form>
                    <div class="checkout-right-basket">
                        <a href="payment.php">Make a Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                    </div>
                </div>

                <div class="clearfix"> </div>

            </div>

        </div>
        <!-- //about -->
    </div>
    <div class="clearfix"></div>
</div>
<!-- //banner -->
<!-- newsletter -->
<div class="newsletter">
    <div class="container">
        <div class="w3agile_newsletter_left">
            <h3>Sign up for our newsletter</h3>
        </div>
        <div class="w3agile_newsletter_right">
            <form action="checkout.php" method="post"><?php echo $response;?>
                <input type="email" name="email" value="email"  required="">
                <input type="submit"  name="btn-subscribe" value="subscribe now">
            </form>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //newsletter -->
<?php
    include ("inc/footer.php");
?>
</body>
</html>
