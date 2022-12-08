<?php //session_start(); ?>
<?php
# Set page title
$page_title = "Limelight Cinema - Contact";
# Include header file
include('includes/header.php');
//$_SESSION['loggedin'] = 0;
?>

<div class="container text-center about-page">
    <h1>Limelight Cinema - Contact Page</h1>
    <h2>Building in progress...</h2>
</div>

<!-- pop-up-box -->
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<!--//pop-up-box -->
<div id="small-dialog" class="mfp-hide">
    <iframe src="https://player.vimeo.com/video/164819130?title=0&byline=0"></iframe>
</div>
<div id="small-dialog1" class="mfp-hide">
    <iframe src="https://player.vimeo.com/video/148284736"></iframe>
</div>
<div id="small-dialog2" class="mfp-hide">
    <iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe>
</div>
<script>
    $(document).ready(function() {
        $('.Limelight_play_icon,.Limelight_play_icon1,.Limelight_play_icon2').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

    });
</script>
<!-- //Latest-tv-series -->

<?php
# Include footer
include('includes/footer.php');
?>

