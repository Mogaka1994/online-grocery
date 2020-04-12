<?php

include("inc/db.php");
header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 'On');
error_reporting(E_ERROR);
//if(!$_SESSION['name']){
//    header("Location: ../login.php");
//}

if(isset($_POST['btn-product'])){
    $product_name =$_POST['product_name'];
    $product_desc =$_POST['product_desc'];
    $price        =$_POST['price'];
    $discount     =$_POST['discount'];
    $product_code =$_POST['product_code'];
    $cat_id       =$_POST['cat_id'];
    $targetDir    ="images/";
    $product_img  =basename($_FILES['product_img']['name']);
    $targetFilePath =$targetDir.$product_img;
    $filetype =pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $allowtpyes = array('jpg','png','gif','jpeg','pdf');

    if(in_array($filetype,$allowtpyes)) {
        if (move_uploaded_file($_FILES['product_img']['tmp_name'], $targetFilePath)) {
            $sql = "INSERT INTO product (product_name,product_description,product_img,product_code,price,discount,cat_id)
                                VALUES('$product_name','$product_desc','$product_img','$product_code','$price','$discount','$cat_id')";
            file_put_contents("log.txt","$sql",FILE_APPEND);
            if(mysqli_query($dblink,$sql)){
                $response ="<div class='alert alert-success'>Product Created Successfully</div>";
            }else{
                $response ="<div class='alert alert-danger'>Failed to Add Product</div>";
            }
            $response ="<div class='alert alert-warning'>Error Uploading Product</div>";
        }
        $response ="<div class='alert alert-success'>Product Created Successfully</div>";
    }

}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Easy Food Grocery| Product </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="ADMIN DASHBOARD Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/morris.css" type="text/css"/>
    <!-- Graph CSS -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <!-- //jQuery -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
    <!-- //lined-icons -->
</head>
<body>
<div class="page-container">
    <!--/content-inner-->
    <div class="left-content">
        <div class="mother-grid-inner">
            <!--header start here-->
            <div class="header-main">
                <div class="logo-w3-agile">
                    <h1><a href="index.php">ADMIN DASHBOARD</a></h1>
                </div>
                <div class="clearfix"> </div>
            </div>
            <!--heder end here-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            </ol>
                <div class="grid-form1">
                    <h3>Create A new Product</h3>
                    <div class="tab-content">
                        <div class="tab-pane active" id="horizontal-form"><?php echo $response;?>
                            <form class="form-horizontal" name="product_form" method="POST"  action="product.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="product" class="col-sm-2 control-label">Product Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" id="product_name" name="product_name" placeholder="Product Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product" class="col-sm-2 control-label">Product Description</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" id="product_desc" name="product_desc" placeholder="Product Description">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword" class="col-sm-2 control-label">Product Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control1" id="product_img" name="product_img" placeholder="Product Image">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtarea1" class="col-sm-2 control-label">Product Code</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" id="product_code" name="product_code" placeholder="Product Code">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="smallinput" class="col-sm-2 control-label label-input-sm">Price</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1 input-sm" id="price"  name="price" placeholder="Price in Ksh.">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mediuminput" class="col-sm-2 control-label">Discount</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" id="discount" name="discount" placeholder="Discount">
                                    </div>
                                </div>
                                <div class="form-group mb-n">
                                    <label for="largeinput" class="col-sm-2 control-label label-input-lg">Category ID</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="cat_id" id="cat_id" required="">
                                            <option value="102">Foodstuff & Cereals</option>
                                            <option value="109">Dairy & Eggs</option>
                                            <option value="103">Groceries</option>
                                            <option value="101">Fruits</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-n">
                                    <label f class="col-sm-2 control-label label-input-lg"></label>
                                    <div class="col-sm-8">
                                        <input type="submit" class=" btn btn-success" id="btn-product" name="btn-product">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--//grid-->

            <!-- script-for sticky-nav -->
            <script>
                $(document).ready(function() {
                    var navoffeset=$(".header-main").offset().top;
                    $(window).scroll(function(){
                        var scrollpos=$(window).scrollTop();
                        if(scrollpos >=navoffeset){
                            $(".header-main").addClass("fixed");
                        }else{
                            $(".header-main").removeClass("fixed");
                        }
                    });

                });
            </script>
            <!-- /script-for sticky-nav -->
            <!--inner block start here-->
            <div class="inner-block">

            </div>
            <!--inner block end here-->
            <!--copy rights start here-->
            <div class="wthree_footer_copy">
                <p>© <?php echo date("Y");?> Easy Foods Grocery Store. All rights reserved | Design by <a href="http:github.io/Mogaka1994/">Polycarp</a></p>
            </div>
            <!--COPY rights end here-->
        </div>
    </div>
    <!--//content-inner-->
    <!--/sidebar-menu-->
    <?php
     include ("sidebar.php");
    ?>
    <div class="clearfix"></div>
</div>
<script>
    var toggle = true;

    $(".sidebar-icon").click(function() {
        if (toggle)
        {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({"position":"absolute"});
        }
        else
        {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({"position":"relative"});
            }, 400);
        }

        toggle = !toggle;
    });
</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- /Bootstrap Core JavaScript -->

</body>
</html>
