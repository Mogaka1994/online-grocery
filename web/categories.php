<?php
header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 'On');
error_reporting(E_ERROR);
include("inc/db.php");
//if(!$_SESSION['name']){
//    header("Location: ../login.php");
//}
if(isset($_POST['btn-category'])){
    $cat_name =$_POST['cat-name'];
    $cat_desc =$_POST['cat-desc'];
    $cat_id =$_POST['cat-id'];

    $sql = "INSERT INTO category (cat_id,category_name,category_desc) VALUES ('$cat_id','$cat_name','$cat_desc')";
    file_put_contents("log.txt","$sql",FILE_APPEND);

    if(mysqli_query($dblink,$sql)){
        $response ="<div class='alert alert-success'>Product Category Created Successfully</div>";
    }else{
        $response ="<div class='alert alert-success'>Failed to Create Product Category</div>";
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Easy Food Grocery| Categories </title>
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
            <div class="inbox-mail">
                <div class="col-md-4 compose w3layouts">

                    <h2>Categories Form</h2>
                    <nav class="nav-sidebar">
                        <ul class="nav tabs">
                            <form name="category" action="categories.php" method="POST">
                                <div class="vali-form"><?php echo $response;?>
                                    <div class="col-md-6 form-group1">
                                        <label class="control-label">Category Name</label>
                                        <input type="text" name="cat-name"  id="cat-name" placeholder="Category Name" class="form-control" required="">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="clearfix"> </div>
                                <div class="col-md-6 form-group1 group-mail">
                                    <label class="control-label">Category Description</label>
                                    <input type="text"  name="cat-desc" id="cat_desc" placeholder="Description" class="form-control" required="">
                                </div>
                                <div class="col-md-6 form-group1 group-mail">
                                    <label class="control-label">Category ID</label>
                                    <select class="form-control" name="cat-id" id="cat_id" required="">
                                        <option value="102">Foodstuff & Cereals</option>
                                        <option value="109">Dairy & Eggs</option>
                                        <option value="103">Groceries</option>
                                        <option value="101">Fruits</option>
                                    </select>
                                </div>
                                <div class="clearfix"> </div>
                                <div class="col-md-6 form-group">
                                    <input type="submit" name="btn-category" class="btn btn-success" value="Submit">
                                </div>
                                <div class="clearfix"> </div>
                            </form>
                        </ul>
                    </nav>

                </div>
                <!-- tab content -->
                <div class="col-md-8 tab-content tab-content-in w3">
                        <h2>Categories</h2>
                        <nav class="nav-sidebar">
                            <ul class="nav tabs">
                                <table class="table table-condensed bg-light">
                                    <thead>
                                        <th>Category Name</th>
                                        <th>Category Description</th>
                                        <th>Category ID</th>

                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT cat_id,category_name,category_desc FROM category";
                                    $res = mysqli_query($dblink,$sql);
                                    while($row = mysqli_fetch_array($res)){
                                     ?>
                                        <tr>
                                            <td><?php echo $row['category_name']; ?></td>
                                            <td><?php echo $row['category_desc']; ?></td>
                                            <td><?php echo $row['cat_id']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </ul>
                        </nav>
                </div>
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
