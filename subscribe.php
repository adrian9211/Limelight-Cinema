<?php
include 'main.php';

# Set page title
$page_title = "Limelight Cinema - Subscribe";
# Include header file
include('includes/header.php');

echo "<div class='container about-page'>";
// Ensure post variable exists
if (isset($_POST['email'])) {


        // Validate email address
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo "Please provide a valid email address!";
        }
        // Check if email exists in the database
        $stmt = $pdo->prepare('SELECT * FROM subscribers WHERE email = ?');
        $stmt->execute([ $_POST['email'] ]);
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<h1 class="text-center about-page">You\'re already a subscriber!</h1>';
            echo "<br>";
            echo "You will be redirected to the login page in 5 seconds";
            echo '<h2 class="text-center about-page">You will be redirected to the main page in 5 seconds...</h2>';
        }
        // Insert email address into the database
        $stmt = $pdo->prepare('INSERT INTO subscribers (email,date_subbed) VALUES (?,?)');
        $stmt->execute([ $_POST['email'], date('Y-m-d\TH:i:s') ]);
        // Output success response
        echo '<h1 class="text-center about-page">Thank you for subscribing!</h1>';
        echo "<br>";
        echo '<h2 class="text-center about-page">You will be redirected to the main page in 5 seconds...</h2>';

} else {
        echo '<h1 class="text-center about-page">Please provide a valid email address!</h1>';
        echo "<br>";
        echo '<h1 class="text-center about-page">You will be redirected to the main page in 5 seconds...</h1>';

}
echo "</div>";

?>
    <script>
        // Will prevent the popup from reopening when the close button is clicked
        let keepClosed = false;
        // Open the newsletter subscription popup
        const openNewsletterPopup = () => {
            // Update the style and element properties
            document.querySelector('.newsletter-popup').style.display = 'flex';
            document.querySelector('.newsletter-popup').getBoundingClientRect();
            document.querySelector('.newsletter-popup').classList.add('open');
            document.querySelector('.newsletter-popup-container').getBoundingClientRect();
            document.querySelector('.newsletter-popup-container').classList.add('open');
        };
        const closeNewsletterPopup = () => {
            // Revert the element properties
            document.querySelector('.newsletter-popup').style.display = 'none';
            document.querySelector('.newsletter-popup').classList.remove('open');
            document.querySelector('.newsletter-popup-container').classList.remove('open');
            // Keep it closed!
            keepClosed = true;
        };
        // Get the subscription form
        const newsletterForm = document.querySelector('.newsletter-popup form');
        // On submit event handler (submit button is pressed)
        newsletterForm.onsubmit = event => {
            event.preventDefault();
            // Bind the subscription form and execute AJAX request
            fetch(newsletterForm.action, {
                method: 'POST',
                body: new FormData(newsletterForm)
            }).then(response => response.text()).then(data => {
                // Output the response
                document.querySelector('.newsletter-msg').innerHTML = data;
            });
        };
        // Close button onclick event handler
        document.querySelector('.newsletter-popup-close-btn').onclick = event => {
            event.preventDefault();
            // CLose the popup widget
            closeNewsletterPopup();
        };
        // Open the popup widget when the user reaches a specific point while scrolling down
        document.addEventListener('scroll', () => {
            // If you want to open the widget further down the page, increase the 400 value
            if (window.scrollY >= 400 && !keepClosed) {
                // Open the widget
                openNewsletterPopup();
            }
        });


    </script>



    <script>
        setTimeout(function (){ window.location.href= 'http://23.102.4.246/Limelight-Cinema';},5000);
    </script>
<?php
# Include footer
include('includes/footer.php');
?>