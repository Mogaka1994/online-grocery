<!--
author: Polycarp

-->
<?php
include ("inc/header.php");
include ("inc/db.php");

header('Access-Control-Allow-Origin: *');
ini_set('display_errors', 'On');
error_reporting(E_ERROR);
if (isset($_POST['btn-register'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email    = $_POST['email'];
    $msisdn   = $_POST['msisdn'];

    $sql = "INSERT INTO user (USERNAME,PASSWORD,EMAIL,PHONE_NUMBER) VALUES ('$username','$password','$email','$msisdn')";
    file_put_contents("log.txt","$sql",FILE_APPEND);
    if (!mysqli_query($dblink, $sql)) {
        $response = '<div class="alert alert-warning">Failed to Save User Records</div>';
        echo $response;
    } else {
        $response = '<div class="alert alert-success">Successfully Saved User Record</div>';
        echo $response;
    }
    mysqli_close($dblink);
}
if(isset($_POST['btn-login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql ="SELECT USERNAME,PASSWORD,POSITION,PHONE_NUMBER FROM user WHERE USERNAME = '$username' AND PASSWORD ='$password'";
    file_put_contents("log.txt","$sql"."\n",FILE_APPEND);
    $result =mysqli_query($dblink,$sql);
    $row =mysqli_fetch_array($result,MYSQLI_BOTH);

    if($password == $row['PASSWORD'] && $username == $row['USERNAME'] && $row['POSITION'] == 'admin'){
        $_SESSION['name'] =$row['USERNAME'];
        $_SESSION['admin']=$row['POSITION'];
        $_SESSION['msisdn'] =$row['PHONE_NUMBER'];
        $rs =$row['POSITION'];
        file_put_contents("log.txt","$rs"."\n",FILE_APPEND);
        $response = '<div class="alert alert-success">Welcome to Easy Food</div>';
        ?>
        <script>
            window.location.href = "web/index.php";
        </script>
        <?php
    }elseif($password == $row['PASSWORD'] && $username == $row['USERNAME'] && $row['POSITION'] == 'customer'){
        $_SESSION['name'] =$row['USERNAME'];
        $_SESSION['msisdn'] =$row['PHONE_NUMBER'];
        $response = '<div class="alert alert-success">Welcome to Easy Food</div>';
        ?>
        <script>
            window.location.href = "products.php";
        </script>
        <?php
    }else{
        $response = '<div class="alert alert-danger">Wrong Details</div>';
    }
}
?>
<!-- header -->
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
            <li>Sign In & Sign Up</li>
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
        <!-- login -->
        <div class="w3_login">
            <h3>Sign In & Sign Up</h3>
            <div class="w3_login_module">
                <div class="module form-module">
                    <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                        <div class="tooltip">Click Me</div>
                    </div>
                    <div class="form">
                        <h2>Login to your account</h2>
                        <form  name="login" action="login.php" method="POST"><?php echo $response;?>
                            <input type="text" name="username" placeholder="Username" required>
                            <input type="password" name="password" placeholder="Password" required>
                            <input type="submit"  name="btn-login" value="Login">
                        </form>
                    </div>
                    <div class="form">
                        <h2>Create an account</h2>
                        <form action="login.php" method="POST"><?php echo $response;?>
                            <input type="text" name="username" placeholder="Username" required=" ">
                            <input type="password" id="password" name="password" placeholder="Password" required=" ">
                            <input type="email" name="email" placeholder="Email Address" required=" ">
                            <input type="text" name="msisdn" placeholder="Phone Number" required=" ">
                            <input type="submit" name="btn-register" value="Register">
                        </form>
                    </div>
                    <div class="cta"><a href="#">Forgot your password?</a></div>
                </div>
            </div>
            <script>
                $('.toggle').click(function(){
                    // Switches the Icon
                    $(this).children('i').toggleClass('fa-pencil');
                    // Switches the forms
                    $('.form').animate({
                        height: "toggle",
                        'padding-top': 'toggle',
                        'padding-bottom': 'toggle',
                        opacity: "toggle"
                    }, "slow");
                });
            </script>
        </div>
        <!-- //login -->
    </div>
    <div class="clearfix"></div>
</div>
<!-- banner -->
<!-- newsletter-top-serv-btm -->
<div class="newsletter-top-serv-btm">
    <div class="container">
        <div class="col-md-4 wthree_news_top_serv_btm_grid">
            <div class="wthree_news_top_serv_btm_grid_icon">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
            <h3>Orders</h3>
            <p>We ensure our esteemed clients get whatever orderd.</p>
        </div>
        <div class="col-md-4 wthree_news_top_serv_btm_grid">
            <div class="wthree_news_top_serv_btm_grid_icon">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
            </div>
            <h3>Pricing.</h3>
            <p>We ensure that our prices are customer friendly</p>
        </div>
        <div class="col-md-4 wthree_news_top_serv_btm_grid">
            <div class="wthree_news_top_serv_btm_grid_icon">
                <i class="fa fa-truck" aria-hidden="true"></i>
            </div>
            <h3>Delivery</h3>
            <p>Timely Delivery.Call to Place an Order on:<br>+254 741562827</br></p>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- newsletter-top-serv-btm -->
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
<!--
author: Polycarp
-->
<?php
 include ("inc/footer.php");
?>
</body>
</html>
