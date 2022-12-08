<!--Footer-->

<footer>
    <div class="row">
        <div class="col-sm-12 col-md-6">
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
            <div class="newsletter-popup-container">
                <h3><i class="fa-solid fa-envelope"></i>Subscribe To Our Newsletter</h3>
                <p>Join our subscribers list to get the latest news, updates, and special offers directly in your inbox.</p>
                <form action="subscribe.php" method="post">
                    <input type="email" name="email" placeholder="Your Email" required>
                    <button type="submit">Subscribe</button>
                </form>
                <p class="newsletter-msg"></p>

            </div>
        </div>
    </div>

    <p class="text-center">&copy; 2022 Limelight Cinema. All rights reserved | <a href="https://github.com/adrian9211/Limelight-Cinema">Design by Adrian Nykiel GitHUB</p>
</footer>


<script>
    $(document).ready(function(){
        $('#subscribeBtn').on('click', function(){
            // Remove previous status message
            $('.status').html('');

            // Email and name regex
            var regEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;

            // Get input values
            var name = $('#name').val();
            var email = $('#email').val();

            // Validate input fields
            if(name.trim() == '' ){
                alert('Please enter your name.');
                $('#name').focus();
                return false;
            }else if (!regName.test(name)){
                alert('Please enter a valid name (first & last name).');
                $('#name').focus();
                return false;
            }else if(email.trim() == '' ){
                alert('Please enter your email.');
                $('#email').focus();
                return false;
            }else if(email.trim() != '' && !regEmail.test(email)){
                alert('Please enter a valid email.');
                $('#email').focus();
                return false;
            }else{
                // Post subscription form via Ajax
                $.ajax({
                    type:'POST',
                    url:'../includes/subscribtion_handler.php',
                    dataType: "json",
                    data:{subscribe:1,name:name,email:email},
                    beforeSend: function () {
                        $('#subscribeBtn').attr("disabled", "disabled");
                        $('.content-frm').css('opacity', '.5');
                    },
                    success:function(data){
                        if(data.status == 'ok'){
                            $('#subsFrm')[0].reset();
                            $('.status').html('<p class="success">'+data.msg+'</p>');
                        }else{
                            $('.status').html('<p class="error">'+data.msg+'</p>');
                        }
                        $('#subscribeBtn').removeAttr("disabled");
                        $('.content-frm').css('opacity', '');
                    }
                });
            }
        });
    });
</script>


<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->

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