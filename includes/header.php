<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $page_title; ?></title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Midlothian, area, cinema, Limelight" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="css/contactstyle.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/faqstyle.css" type="text/css" media="all" />
    <link href="css/single.css" rel='stylesheet' type='text/css' />
    <link href="css/medile.css" rel='stylesheet' type='text/css' />
    <!-- banner-slider -->
    <link href="css/jquery.slidey.min.css" rel="stylesheet">
    <!-- //banner-slider -->
    <!-- pop-up -->
    <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //pop-up -->
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <!-- //font-awesome icons -->
    <!-- js -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <!-- //js -->
    <!-- banner-bottom-plugin -->
    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/owl.carousel.js"></script>
    <script>
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                autoPlay: 3000, //Set AutoPlay to 3 seconds
                items : 5,
                itemsDesktop : [640,4],
                itemsDesktopSmall : [414,3]

            });

        });
    </script>
    <!-- //banner-bottom-plugin -->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!-- start-smoth-scrolling -->
</head>

<body>
<!-- header -->
<div class="header">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="./images/icons/logo.png" alt="Logo"  class="d-inline-block align-text-top">
        </a>
        <div class="Limelightl_sign_in_register">
            <ul>
                <li><a href="#" data-toggle="modal" data-target="#myModal" <?php if (isset($_COOKIE['loggedin'])) {
                echo 'style="display:none;"';
                }
                else {
                echo 'style="display:block;"';
                }
                ?>>Login</a></li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //header -->
<!-- bootstrap-pop-up -->
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Sign In & Sign Up
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <section>
                <div class="modal-body">
                    <div class="Limelight_login_module">
                        <div class="module form-module">
                            <div class="toggle"><i class="fa fa-times fa-pencil">Login/Register</i>
                                <div class="tooltip">Click Me</div>
                            </div>
                            <div class="form">
                                <h3>Login to your account</h3>
                                <form action="login.php" method="post">
                                    <input type="text" name="username" placeholder="Username" required="">
                                    <input type="password" name="password" placeholder="Password" required="">
                                    <input type="submit" value="submit" name="submit">
                                </form>
                            </div>
                            <div class="form">
                                <h3>Create an account</h3>
                                <form action="register.php" method="post">
                                    <input type="text" name="firstname" placeholder="FirstName" required="">
                                    <input type="text" name="surname" placeholder="Surname" required="">
                                    <input type="text" name="username" placeholder="Username" required="">
                                    <input type="password" name="password" placeholder="Password" required="">
                                    <input type="email" name="email" placeholder="Email Address" required="">
                                    <label for="birthday">Date of birth:</label>
                                    <input type="date" id="birthday" name="dob">
                                    <input type="submit" value="submit" name="submit">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<!--Logout modal-->
<!-- bootstrap-pop-up -->
<div class="modal video-modal fade" id="myModalLogout" tabindex="-1" role="dialog" aria-labelledby="myModalLogout">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Logout
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <section>
                <div class="modal-body">
                    <div class="Limelight_login_module">
                        <div class="module form-module">
                            <div class="form">
                                <h3>Would you like to log out? Just hit button.</h3>
                                <form action="logout.php" method="post">
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary" >Logout</button>
                                </form>
                            </div>
                            <div class="form">
                                <h3>Would you like to log out? Just hit button.</h3>
                                <form action="logout.php" method="post">
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary" >Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!--Logout modal-->
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
<!-- //bootstrap-pop-up -->

<!-- nav -->
<div class="movies_nav">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header navbar-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <nav>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">HOME</a></li>
                        <li><a href="movies.php">MOVIES</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                        <li><a href="upcoming.php">UPCOMING</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                        <?php if (isset($_COOKIE['loggedin'])) {
                            echo ' <li><a href="members.php">ACCOUNT</a></li>';
                            echo ' <li><a href="#" data-toggle="modal" data-target="#myModalLogout">Logout</a></li>';
                        }
                        else {
//                            echo 'style="display:none;"';
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
</div>
<!-- //nav -->


<?php include('assets/includes/functions.php'); ?>
<?php include('assets/includes/login.php'); ?>
<?php include('assets/includes/register.php'); ?>

