<!--
author: Polycarp
-->
<?
include ("inc/db.php");
include ("inc/header.php");
ini_set('display_errors', 'On');
error_reporting(E_ERROR);
if(isset($_POST['btn-mail'])){
    $name  = $_POST['name'];
    $email = $_POST['mail'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $msg     = $_POST['message'];
    $sql = "INSERT INTO contanent (name,email,telephone,message,subject)
                    VALUES('$name','$email','$phone','$msg','$subject')";
    file_put_contents("log.txt","$sql"."\n",FILE_APPEND);
    if(mysqli_query($dblink,$sql)){
        $response ="<div class='alert alert-success'>Mail saved and sent Successfully</div>";
    }else{
        $response ="<div class='alert alert-success'>Failed Saving Mail</div>";
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
</div>
<!-- //header -->
<!-- products-breadcrumb -->
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
            <li>Mail Us</li>
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
        <!-- mail -->
        <div class="mail">
            <h3>Mail Us</h3>
            <div class="agileinfo_mail_grids">
                <div class="col-md-4 agileinfo_mail_grid_left">
                    <ul>
                        <?php
                        $sql = "SELECT address,company_phone,mail FROM settings";
                        $row = mysqli_fetch_array(mysqli_query($dblink,$sql),MYSQLI_BOTH);
                        ?>
                        <li><i class="fa fa-home" aria-hidden="true"></i></li>
                        <li>Address<span><?php echo $row[address];?></span></li>
                    </ul>
                    <ul>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i></li>
                        <li>Mail<span><a href="mailto:info@example.com"><?php echo $row[mail];?></a></span></li>
                    </ul>
                    <ul>
                        <li><i class="fa fa-phone" aria-hidden="true"></i></li>
                        <li>Call Us<span><?php $var = "+254";echo $var."".$row[company_phone];?></span></li>
                    </ul>
                </div>
                <div class="col-md-8 agileinfo_mail_grid_right">
                    <form action="mail.php"  name="mail_form" method="POST">
                        <div class="col-md-6 wthree_contact_left_grid"><?php echo $response;?>
                            <input type="text" name="name" id="name" value="Name*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name*';}" required="">
                            <input type="email" name="mail"  id="mail" value="Email*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email*';}" required="">
                        </div>
                        <div class="col-md-6 wthree_contact_left_grid">
                            <input type="text" name="phone"  id="phone" value="Telephone*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone*';}" required="">
                            <input type="text" name="subject"  id="subject" value="Subject*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject*';}" required="">
                        </div>
                        <div class="clearfix"> </div>
                        <textarea  name="message" id="message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
                        <input type="submit"  class="btn btn-success" name="btn-mail" id="btn-mail" value="Submit">
                        <input type="reset" value="Clear">
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- //mail -->
    </div>
    <div class="clearfix"></div>
</div>
<div id="googleMap" style="height:400px;width:100%;"></div>
<script>
    function myMap() {
        var myCenter = new google.maps.LatLng(-0.294526, 36.0601893);
        var mapProp = {center:myCenter, zoom:12, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        var marker = new google.maps.Marker({position:myCenter});
        marker.setMap(map);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyDls_wWfq4tUJDqvmxmwuKB8R0Lkgu0twE&amp;callback=myMap"></script>

<!-- //map -->
<!-- newsletter -->
<div class="newsletter">
    <div class="container">
        <div class="w3agile_newsletter_left">
            <h3>sign up for our newsletter</h3>
        </div>
        <div class="w3agile_newsletter_right">
            <form action="mail.php" method="post"><?php echo $response;?>
                <input type="email" name="email" value="email"  required="">
                <input type="submit"  name="btn-subscribe" value="subscribe now">
            </form>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- newsletter -->
<!-- footer -->
<!--
author: Polycarp
-->
<?php
include ("inc/footer.php");
?>
</body>
</html>
