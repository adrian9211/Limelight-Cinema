<?php
session_start();

# Set page title
$page_title = "Thank you";
# Include header file
include('includes/header.php');
require_once ("db.php");
?>

<?php
$user = $_SESSION['user'];

$time = $_SESSION['time'];
$qty= $_SESSION['quantity'];
$id= $_SESSION['movieID'];

?>

<!--Thank you message-->

<!--Feedback from our customers owl-carousel-->
<div class="thank-you mt-5">
    <h4 class="latest-text Limelight_latest_text">Thank you for your purchase</h4>
    <div class="container">
        <h3><b>Order details</b></h3>
        <br>
        <h6>Username: <?php echo $user; ?></h6>
        <br>
        <h6>Screening time: <?php echo $time; ?></h6>
        <br>
        <h6>Quantity: <?php echo $qty; ?></h6>
        <br>
        <h6>Movie ID: <?php echo $id; ?></h6>
        <br>
        <h6>Movie title: <?php echo $_SESSION['title']; ?></h6>
    </div>
</div>
<!--Feedback from our customers owl-carousel-->




<!--Feedback from our customers owl-carousel-->
<div class="feedback mt-5">
    <h4 class="latest-text Limelight_latest_text">Feedback from our customers</h4>
    <div class="container">
        <div class="Limelight_agile_banner_bottom_grid">
            <div id="owl-demo2" class="owl-carousel owl-theme">
                <div class="item">
                    <section class="feedback-card">
                        <blockquote>Calvin: Sometimes when I'm talking with others, my words can't keep up with my thoughts. I wonder why we think faster than we speak. Hobbes: Probably so we can think twice. </blockquote>
                        <div class="author">
                            <img src="images/faces/small/1.png" alt="face1"/>
                            <h5>Steve P.</h5>
                        </div>
                    </section>
                </div>

                <div class="item">
                    <section class="feedback-card">
                        <blockquote>Thank you. before I begin, I'd like everyone to notice that my report is in a professional, clear plastic binder...When a report looks this good, you know it'll get an A. That's a tip kids. Write it down.</blockquote>
                        <div class="author">
                            <img src="images/faces/small/2.png" alt="face2"/>
                            <h5>Max C.</h5>
                        </div>
                    </section>
                </div>

                <div class="item">
                    <section class="feedback-card">
                        <blockquote>My behaviour is addictive functioning in a disease process of toxic co-dependency. I need holistic healing and wellness before I'll accept any responsibility for my actions.</blockquote>
                        <div class="author">
                            <img src="images/faces/small/3.png" alt="face3"/>
                            <h5>Eleanor F</h5>
                        </div>
                    </section>
                </div>

                <div class="item">
                    <section class="feedback-card">
                        <blockquote>Calvin: Sometimes when I'm talking with others, my words can't keep up with my thoughts. I wonder why we think faster than we speak. Hobbes: Probably so we can think twice. </blockquote>
                        <div class="author">
                            <img src="images/faces/small/4.png" alt="face4"/>
                            <h5>Alice G.</h5>
                        </div>
                    </section>
                </div>

                <div class="item">
                    <section class="feedback-card">
                        <blockquote>Thank you. before I begin, I'd like everyone to notice that my report is in a professional, clear plastic binder...When a report looks this good, you know it'll get an A. That's a tip kids. Write it down.</blockquote>
                        <div class="author">
                            <img src="images/faces/small/5.png" alt="face5"/>
                            <h5>Ruth A.</h5>
                        </div>
                    </section>
                </div>

                <div class="item">
                    <section class="feedback-card">
                        <blockquote>My behaviour is addictive functioning in a disease process of toxic co-dependency. I need holistic healing and wellness before I'll accept any responsibility for my actions.</blockquote>
                        <div class="author">
                            <img src="images/faces/small/6.png" alt="face6"/>
                            <h5>Eleanor F</h5>
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>
</div>
<!--Feedback from our customers owl-carousel-->

<?php
# Include footer
include('includes/footer.php');
?>



