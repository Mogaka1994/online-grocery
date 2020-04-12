<?php
header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 'On');
error_reporting(E_ERROR);
include("inc/db.php");
//if(!$_SESSION['name']){
//    header("Location: ../login.php");
//}
if(isset($_POST['btn-about'])){
    $mission =$_POST['mission'];
    $vision  =$_POST['vision'];

    $targetDir    ="images/";
    $dphoto  =basename($_FILES['dphoto']['name']);
    $cphoto  =basename($_FILES['cphoto']['name']);
    $mphoto  =basename($_FILES['mphoto']['name']);

    $targetFilePath =$targetDir.$dphoto;
    $path  =$targetDir.$cphoto;
    $filepath =$targetDir.$mphoto;

    $filetype =pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $filetype1 =pathinfo($path,PATHINFO_EXTENSION);
    $filetype2 =pathinfo($filepath,PATHINFO_EXTENSION);

    $allowtpyes = array('jpg','png','gif','jpeg','pdf');

    if(in_array($filetype,$allowtpyes) && in_array($filetype1,$allowtpyes) && in_array($filetype2,$allowtpyes)) {
        if (move_uploaded_file($_FILES['dphoto']['tmp_name'], $targetFilePath) && move_uploaded_file($_FILES['cphoto']['tmp_name'],$path) && move_uploaded_file($_FILES['mphoto']['tmp_name'],$filepath)) {
            $sql = "INSERT INTO about (mission,vision,company_photo,director_photo,manager_photo)
                                VALUES('$mission','$vision','$cphoto','$dphoto','$mphoto')";

            file_put_contents("log.txt","$sql",FILE_APPEND);

            if(mysqli_query($dblink,$sql)){
                $response ="<div class='alert alert-success'>About Us Updated Successfully</div>";
            }else{
                $response ="<div class='alert alert-danger'>Failed to Update About Us</div>";
            }
            $response ="<div class='alert alert-warning'>Error Photos Product</div>";
        }
        $response ="<div class='alert alert-success'>About Us Updated Successfully</div>";
    }

}

?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Easy Food Grocery| ABOUT US </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
            <div style="align-content: center">
            <div class="agile3-grids ">
                <!-- //Color-variations -->
                <div class="agile-buttons-grids">
                    <div class="col-md-12 hover-buttons" >
                        <div class="wrap">
                            <div class="bg-effect">
                                <h2>ABOUT US</h2>
                                <form action="about.php" method="POST" enctype="multipart/form-data">
                                    <div class="col-md-8 form-group1"><?php echo $response;?>
                                        <label class="control-label">Mission:</label>
                                        <textarea class="form-control" name="mission" id="mission" placeholder="Company Mission" required rows="4" cols="4"></textarea>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-md-8 form-group1">
                                        <label class="control-label">Vision:</label>
                                        <textarea class="form-control" name="vision" id="vision" placeholder="Company Vision" required rows="4" cols="4"></textarea>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-md-8 form-group1">
                                        <label class="control-label">Company Photo:</label>
                                        <input type="file" name="cphoto"  id="cphoto" class="form-control" placeholder="Company photo" required>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-md-8 form-group1">
                                        <label class="control-label">Director Photo:</label>
                                        <input type="file" name="dphoto" id="dphoto" class="form-control" placeholder="Director photo" required>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="col-md-8 form-group1">
                                        <label class="control-label">Manager Photo:</label>
                                        <input type="file" name="mphoto" id="mphoto" class="form-control" placeholder="Director photo" required>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-8 form-group1">
                                        <input type="submit" name="btn-about" id="btn-about" class="btn btn-success btn-round" value="Submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- //buttons -->
            </div></div>
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
            <div class="wthree_footer_copy">
                <p>© <?php echo date("Y");?> Easy Foods Grocery Store. All rights reserved | Design by <a href="http:github.io/Mogaka1994/">Polycarp</a></p>
            </div>
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
</body>
</html>
