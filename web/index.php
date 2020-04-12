<?php
header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 'On');
error_reporting(E_ERROR);
include ("inc/db.php");
//if(!$_SESSION['name']){
//    header("Location: ../login.php");
//}
$sql = mysqli_query($dblink,"SELECT * FROM user WHERE POSITION ='customer'");
if($sql){
    $count =mysqli_num_rows($sql);
}
 mysqli_free_result($sql);

$sqlns =mysqli_query($dblink,"SELECT * FROM product");
if($sqlns){
    $product_count =mysqli_num_rows($sqlns);
}
mysqli_free_result($sqlns);


 $sqli = mysqli_query($dblink,"SELECT * FROM ordders");
 if($sqli){
     $order_count = mysqli_num_rows($sqli);
 }
 mysqli_free_result($sqli);

 // mysqli_close($dblink);


?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Easy Foods Grocery | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
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
            <!--four-grids here-->
            <div class="four-grids">
                <div class="col-md-3 four-grid">
                    <div class="four-agileits">
                        <div class="icon">
                            <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                        </div>
                        <div class="four-text">
                            <h3>User</h3>
                            <h4><?php echo $count;?></h4>

                        </div>

                    </div>
                </div>
                <div class="col-md-3 four-grid">
                    <div class="four-agileinfo">
                        <div class="icon">
                            <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                        </div>
                        <div class="four-text">
                            <h3>Orders</h3>
                            <h4><?php echo $order_count;?></h4>

                        </div>

                    </div>
                </div>
                <div class="col-md-3 four-grid">
                    <div class="four-w3ls">
                        <div class="icon">
                            <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
                        </div>
                        <div class="four-text">
                            <h3>Products</h3>
                            <h4><?php echo $product_count;?></h4>

                        </div>

                    </div>
                </div>
                <div class="col-md-3 four-grid">
                    <div class="four-wthree">
                        <div class="icon">
                            <i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>
                        </div>
                        <div class="four-text">
                            <h3>Customers</h3>
                            <h4><?php echo $count;?></h4>

                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-sm-4 wthree-crd">
                <div class="card">
                    <div class="card-body">
                        <div class="widget widget-report-table">
                            <header class="widget-header m-b-15">
                            </header>

                            <div class="row m-0 md-bg-grey-100 p-l-20 p-r-20">
                                <div class="col-md-6 col-sm-6 col-xs-6 w3layouts-aug">
                                    <p>Transaction Reports</p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 ">
                                    <?php
                                    $sqlcount = "SELECT SUM(amount) AS sum FROM ordders";
                                    $count    = mysqli_query($dblink,$sqlcount);
                                    $row      = mysqli_fetch_array($count);
                                    $sum      = $row['sum'];
                                    ?>
                                    <h2 class="text-right c-teal f-300 m-t-20"><?php echo "KES: ".$sum;?></h2>
                                </div>
                            </div>

                            <div class="widget-body p-15">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Amount</th>
                                        <th>Quantity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sqls     = "SELECT*FROM ordders";
                                        $result   = mysqli_query($dblink, $sqls);
                                       while($row = mysqli_fetch_array($result)){
                                     ?>
                                    <tr>
                                        <td><?php echo $row[product];?></td>
                                        <td><?php echo $row[amount];?></td>
                                        <td><?php echo $row[quantity];?></td>
                                    </tr>
                                    <?php
                                      }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 w3-agileits-crd">

                <div class="card card-contact-list">
                    <div class="agileinfo-cdr">
                        <div class="card-header">
                            <h3>Mail Messages</h3>
                        </div>
                        <div class="card-body p-b-20">
                            <div class="list-group">
                                <a class="list-group-item media" href="">
                                     <?php
                                    $sqlss    = "SELECT*FROM contanent";
                                    $result   = mysqli_query($dblink, $sqlss);

                                    while($row = mysqli_fetch_array($result)){

                                     ?>
                                    <div class="pull-left">
                                        <img class="lg-item-img" src="images/in4.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="pull-left">
                                            <div class="lg-item-heading"><?php echo $row[name]." | ".$row[email];?></div>
                                            <small class="lg-item-text"> <?php echo $row[telephone];?></small>
                                        </div>
                                        <div class="pull-right">
                                            <div class="lg-item-heading"><?php echo $row[message];?></div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 w3-agile-crd">
                <div class="card">
                    <div class="card-body card-padding">
                        <div class="widget">
                            <header class="widget-header">
                                <h4 class="widget-title">Suppliers:</h4>
                            </header>
                            <hr class="widget-separator">
                            <div class="widget-body">
                                <div class="streamline">
                                    <?php
                                                $sqlu     = "SELECT*FROM users";
                                                $result   = mysqli_query($dblink, $sqlu);

                                                while($row = mysqli_fetch_array($result)){

                                                 ?>
                                    <div class="sl-item sl-success">
                                        <div class="sl-content">
                                            <small class="text-muted"><?php echo $row[Name];?></small>
                                            <p><?php echo $row[Product];?></p>
                                            <p><?php echo $row[Contact];?></p>
                                            <p><?php echo $row[Address];?></p>

                                        
                                        </div>
                                    </div>
                                    <?php
                                            }
                                            ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
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
                <p>© <?php echo date("Y"); ?>  Easy Foods Grocery Store. All rights reserved | Design by <a href="http:github.io/Mogaka1994/">Polycarp</a></p>
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
<!-- morris JavaScript -->
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<script>
    $(document).ready(function() {
        //BOX BUTTON SHOW AND CLOSE
        jQuery('.small-graph-box').hover(function() {
            jQuery(this).find('.box-button').fadeIn('fast');
        }, function() {
            jQuery(this).find('.box-button').fadeOut('fast');
        });
        jQuery('.small-graph-box .box-close').click(function() {
            jQuery(this).closest('.small-graph-box').fadeOut(200);
            return false;
        });

        //CHARTS
        function gd(year, day, month) {
            return new Date(year, month - 1, day).getTime();
        }

        graphArea2 = Morris.Area({
            element: 'hero-area',
            padding: 10,
            behaveLikeLine: true,
            gridEnabled: false,
            gridLineColor: '#dddddd',
            axes: true,
            resize: true,
            smooth:true,
            pointSize: 0,
            lineWidth: 0,
            fillOpacity:0.85,
            data: [
                {period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
                {period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
                {period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
                {period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
                {period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
                {period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
                {period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
                {period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
                {period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
                {period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
            ],
            lineColors:['#ff4a43','#a2d200','#22beef'],
            xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true
        });


    });
</script>
</body>
</html>
