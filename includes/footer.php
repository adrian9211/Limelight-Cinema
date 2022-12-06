<!--Footer-->

<footer>
    <div class="row">
        <div class="col-sm-12 col-md-6 ps-4 ms-5">
            <div class="row">
                <div class="col-sm-12 col-md-6  text-center d-flex align-items-center justify-content-center">
                    <img src="./images/icons/logo_white.png" class="img-fluid" alt="logo">
                    <a href="index.php"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6  text-center d-flex align-items-center justify-content-center">
                    <ul class="footer-links">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="movies.php">Movies</a>
                        </li>
                        <li>
                            <a href="about.php">About</a>
                        </li>
                        <li>
                            <a href="comedy.html">Upcoming</a>
                        </li>
                        <li>
                            <a href="members.php">Account</a>
                        </li>
                        <li>
                            <a href="faq.html">FAQ</a>
                        </li>
                        <li>
                            <a href="contact.php">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 ps-4 ">
            <div class="content">
                <form class="subscription">
                    <input class="add-email" type="email" placeholder="Your email">
                    <button class="submit-email" type="button">
                        <span class="before-submit">Subscribe</span>
                        <span class="after-submit">Thank you for subscribing!</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <p class="text-center">&copy; 2022 Limelight Cinema. All rights reserved | <a href="https://github.com/adrian9211/Limelight-Cinema">Design by Adrian Nykiel GitHUB</p>
</footer>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Bootstrap Core JavaScript -->
<!--<script src="js/bootstrap.min.js"></script>-->
<script>
    $(document).ready(function(){
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>
<!-- //Bootstrap Core JavaScript -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //here ends scrolling icon -->
</body>
</html>