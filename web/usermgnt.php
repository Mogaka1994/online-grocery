<?php
header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 'On');
error_reporting(E_ERROR);
include ("inc/db.php");
//if(!$_SESSION['name']){
//    header("Location: ../login.php");
//}
switch($_GET["action"]) {
    case "del":
        $sqls        = "SELECT * FROM user WHERE USER_ID='" . $_GET["id"] . "'";
        file_put_contents("log.txt", "$sqls"."\n",FILE_APPEND);
        $result      = mysqli_query($dblink, $sqls);
        $row         = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $sqlns = "DELETE FROM user WHERE USER_ID ='$row[USER_ID]'";
        file_put_contents("log.txt","$sqlns",FILE_APPEND);
        $rss   = mysqli_query($dblink,$sqlns);
        if($result){
            $response ="<div class='alert alert-success'>User Deleted Successfully</div>";
            ?>
            <script>
                window.location.href = "usermgnt.php";
            </script>
            <?php
        }else{
            $response ="<div class='alert alert-danger'>Failed to Remove User</div>";
        }
        mysqli_free_result($rss);
        mysqli_close($dblink);
        break;
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Easy Food Grocery| Users </title>
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
                <li class="breadcrumb-item"><a href="index.php">Home</a><i class="fa fa-angle-right"></i>Users </li>
            </ol>
            <div class="agile3-grids">

                <div class="grid_3 grid_4 w3_agileits_icons_page">
                    <div class="icons">
                        <h2 class="agileits-icons-title">Users </h2>
                        <section id="new">
                            <div class="row fontawesome-icon-list">                           
                                     <table class="table table-bordered">
                                         <thead>
                                            <tr>
                                            <th>Position</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th>Mail</th>
                                            <th>Phone Number</th>
                                            <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sqls     = "SELECT*FROM user";
                                        $result   = mysqli_query($dblink, $sqls);
                                       while($row = mysqli_fetch_array($result)){
                                     ?>
                                    <tr>
                                        <td><?php echo $row[POSITION];?></td>
                                        <td><?php echo $row[USERNAME];?></td>
                                        <td><?php echo $row[STATUS];?></td>
                                        <td><?php echo $row[EMAIL];?></td>
                                        <td><?php echo $row[PHONE_NUMBER];?></td>
                                        <td>
                                             <form  method="POST"  action="usermgnt.php?action=del&id=<?php echo $row[USER_ID]; ?>">
                                                <input type="submit" class="close1" />
                                            </form>
                                        </td>


                                    </tr>
                                    <?php
                                      }
                                    ?>
                                    </tbody>
                                     </table>

                            </div>

                        </section>
                        </div>
                    </div>
                </div>
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
