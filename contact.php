<?php //session_start(); ?>
<?php
# Set page title
$page_title = "Limelight Cinema - Contact";
# Include header file
include('includes/header.php');
//$_SESSION['loggedin'] = 0;
?>
<iframe
        width="100%"
        height="450"
        style="border:0"
        loading="lazy"
        allowfullscreen
        referrerpolicy="no-referrer-when-downgrade"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d120519.31565742021!2d-3.2476778117608336!3d55.85550172864269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4887b9a7365fccff%3A0x52629bc613f4b94b!2sEdinburgh%20College!5e0!3m2!1spl!2suk!4v1674021147748!5m2!1spl!2suk">
</iframe>

<h4 class="latest-text Limelight_latest_text mt-5">Contact Us</h4>

<div class="container text-center contact-page">
    <div class="row">
        <div class="col-xl-3 col-sm-6 col-xs-12">
            <section class="contact-box">
                <div class="circle-icon mt-3">
                    <i class="fa fa-phone "></i>
                </div>
                <h4 class="contact-text"><b>Phone</b></h4>
                <p class="contact-text">Customer Service</p>
                <p class="contact-text">0333 003 3450</p>
                <p class="contact-text">Sales</p>
                <p class="contact-text">0333 003 3411</p>
            </section>
        </div>

        <div class="col-xl-3 col-sm-6 col-xs-12">
            <section class="contact-box">
                <div class="circle-icon mt-3">
                    <i class="fa fa-envelope "></i>
                </div>
                <h4 class="contact-text"><b>Email</b></h4>
                <p class="contact-text">customer.services@limelight.co.uk</p>
                <p class="contact-text">or</p>
                <p class="contact-text">general.enquires@ limelight.co.uk</p>
            </section>
        </div>

        <div class="col-xl-3 col-sm-6 col-xs-12">
            <section class="contact-box">
                <div class="circle-icon mt-3">
                    <i class="fa fa-map"></i>
                </div>
                <h4 class="contact-text"><b>Address</b></h4>
                <p class="contact-text">Edinburgh College</p>
                <p class="contact-text">Milton Rd, Campus</p>
                <p class="contact-text">Edinburgh</p>
                <p class="contact-text">EH11 4BN</p>
            </section>
        </div>

        <div class="col-xl-3 col-sm-6 col-xs-12">
            <section class="contact-box">
                <div class="circle-icon mt-3">
                    <i class="fa fa-user "></i>
                </div>
                <h4 class="contact-text"><b>Social media</b></h4>
                <p class="contact-text">Edinburgh College</p>
                <p class="contact-text">Milton Rd, Campus</p>
                <p class="contact-text">Edinburgh</p>
                <p class="contact-text">EH11 4BN</p>
            </section>
        </div>
    </div>
</div>



<?php
# Include footer
include('includes/footer.php');
?>

