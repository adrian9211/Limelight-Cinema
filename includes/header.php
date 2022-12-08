<?php session_start();

?>

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script>
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                autoPlay: 3000, //Set AutoPlay to 3 seconds
                items : 5,
                itemsDesktop : [640,4],
                itemsDesktopSmall : [414,3]

            });

            $("#owl-demo2").owlCarousel({
                autoPlay: 6000, //Set AutoPlay to 3 seconds
                items : 3,
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
<!--Navbar-->
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
        <img src="./images/icons/logo.png" alt="Logo"  class="d-inline-block align-text-top m-auto ps-5 ps-sm-1">
        </a>
        <form class="d-flex">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" <?php if (isset($_COOKIE['loggedin'])) {
                echo 'style="display:none;"';
            }
            else {
                echo 'style="display:block;"';
            }
            ?>>
                LOGIN
            </button>
        </form>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light bottom-navbar">
    <div class="container-fluid ">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0 ">
                <div class="container nav-container">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="movie.php">MOVIES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="about.php">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="upcoming.php">UPCOMING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="contact.php">CONTACT</a>
                    </li>
                    <?php if (isset($_COOKIE['loggedin'])) {
                        echo ' <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="members.php">ACCOUNT</a>
                </li>';
                        echo ' <li class="nav-item">
                    <a class="nav-link " aria-current="page" data-bs-toggle="modal" data-bs-target="#myModalLogout" href="logout.php">LOGOUT</a>
                </li>';
                    }
                    else {
//                            echo 'style="display:none;"';
                    }
                    ?>
                </div>
            </ul>
        </div>
    </div>
</nav>


<!--Navbar-->
<!-- Button trigger modal -->

<!-- bootstrap-pop-up -->
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Sign In & Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
<!-- bootstrap-pop-up logout -->
<div class="modal video-modal fade" id="myModalLogout" tabindex="-1" role="dialog" aria-labelledby="myModalLogout">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <section>
                <div class="modal-body">
                    <div class="Limelight_login_module">
                        <div class="module form-module">
                            <div class="form">
                                <h3>Are you sure you want to log out? Confirm</h3>
                                <form action="logout.php" method="post">
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary" >Logout</button>
                                </form>
                            </div>
                            <div class="form">
                                <h3>Are you sure you want to log out? Confirm</h3>
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


<!--Social media icons-->

<div class="general_social_icons">
    <nav class="social">
        <ul>
            <li class="Limelight_twitter"><a href="https://twitter.com" target="_blank">Twitter <i class="fa fa-twitter"></i></a></li>
            <li class="Limelight_facebook"><a href="http://facebook.com" target="_blank">Facebook <i class="fa fa-facebook"></i></a></li>
            <li class="Limelight_dribbble"><a href="https://github.com/adrian9211/Limelight-Cinema" target="_blank">GitHub <i class="fa fa-github"></i></a></li>
            <li class="Limelight_g_plus"><a href="https://youtube.com" target="_blank">YouTube<i class="fa fa-youtube"></i></a></li>
        </ul>
    </nav>
</div>

<!--Social media icons-->



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


<?php include('assets/includes/functions.php'); ?>
<?php include('assets/includes/login.php'); ?>
<?php include('assets/includes/register.php'); ?>
