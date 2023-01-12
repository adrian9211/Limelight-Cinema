<?php
# Set page title
$page_title = "Single movie";
# Include header file
include('includes/header.php');
require_once ("db.php");

//if (isset($_GET['MovieID'])) {
////        // Prepare statement and execute, prevents SQL injection
//    $stmt = $conn->prepare('SELECT * FROM movies WHERE MovieID = ?');
//    $stmt->execute([$_GET['MovieID']]);
////    // Fetch the product from the database and return the result as an Array
//    $product = $stmt->fetch(PDO::FETCH_ASSOC);
////    // Check if the product exists (array is not empty)
////    if (!$product) {
////        // Simple error to display if the id for the product doesn't exists (array is empty)
////        exit('Product does not exist!');
////    }
////} else {
////    // Simple error to display if the id wasn't specified
////    exit('Product does not exist!');
////}
$result = mysqli_query($conn, "SELECT file_name_narrow FROM movies WHERE MovieID = " . $_GET['MovieID']);
$row = mysqli_fetch_array($result);
echo "<img src='uploads/" . $row['file_name_narrow'] . "' title='album-name' class='card-img-top' alt=' ' />";

?>


    <div class="general">
        <h4 class="latest-text Limelight_latest_text">Single Movie</h4>
        <div class="container">
            <div class="row justify-content-md-center">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM movies WHERE MovieID = " . $_GET['MovieID']);
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
//                    echo "<img src='uploads/" . $row['file_name_narrow'] . "' title='album-name' class='card-img-top' alt=' ' />";
                    echo "<div class='col-md-6 col-sm-12 shadow-sm p-3 d-flex flex-column'> ";
                    echo "<h3 class='hvr-shutter-out-horizontal card-img-top'><img src='uploads/" . $row['file_name'] . "' title='album-name' class='card-img-top' alt=' ' />
                                <div class='Limelightl-action-icon'><i class='fa fa-play-circle' aria-hidden='true'></i></div>
                                ";
                    echo "</h3>";
                    echo "</div>";
                    echo "<div class='col-md-6 col-sm-12 shadow-sm p-3 d-flex flex-column'>";
                    echo "<h6 class='card-title'><a href='single.html' >" . $row['Title'] . " </a></h6>";
                    echo "<p class='card-text'>" . $row['Description'] . "</p>";
                    echo "<h6><a href='single.html'>" . $row['Type'] . "</a></h6>";
                    echo "<div class='mid-2 agile_mid_2_home'>";
                    echo "<div class='block-stars'>";
                    echo "<ul class='Limelightl-ratings'>";
//                    echo "<p>" . $row['Rating'] . "</p>";
                    while ($row['Rating'] > 0) {
                        echo "<li><a href='#'><i class='fa fa-star' aria-hidden='true'></i></a></li>";
                        $row['Rating']--;
                    }
                    echo "</ul>";
                    echo "</div>";
                    echo "<div class='clearfix'></div>";
                    echo "<div class='row'>";
                    echo "<div class='col-md-6 col-xsm-6'>";
                    echo "<h6 class='card-title'>Category</h6>";
                    echo "<br>";
                    echo "<h6 class='card-title'>Likes</h6>";
                    echo "<br>";
                    echo "<h6 class='card-title'>Stock Available</h6>";
                    echo "<br>";
                    echo "<h6 class='card-title'>Rating</h6>";
                    echo "<br>";
                    echo "<h6 class='card-title'>Length</h6>";
                    echo "</div>";
                    echo "<div class='col-md-6 col-xsm-6'>";
                    echo "<h6 class='card-title'>" . $row['Category'] . "</h6>";
                    echo "<br>";
                    echo "<form action='single-movie.php' method='post'>";
                    echo "<h6 class='card-title'>" . $row['Likes'] . " <i class='fa fa-thumbs-up fa-lg'></i></h6>";
                    echo "<br>";
                    echo "<h6 class='card-title'>" . $row['Stock'] . "</h6>";
                    echo "<br>";
                    echo "<h6 class='card-title'>" . $row['Rating'] . "</h6>";
                    echo "<br>";
                    echo "<h6 class='card-title'>" . $row['Length'] . " min</h6>";
                    echo "<br>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='time-buttons m-3'>";
                    echo "<button class='btn btn-primary m-4' type='button' > ".$row['Display time 1']."</button>";
                    echo "<button class='btn btn-primary m-4' type='button' > ".$row['Display time 2']."</button>";
                    echo "<button class='btn btn-primary m-4' type='button' > ".$row['Display time 3']."</button>";
                    echo "</div>";
                    ?>
                    <form action="index.php?page=cart" method="post">
                        <input type="number" name="quantity" value="1" min="1" max="<?=$row['Stock']?>" placeholder="Quantity" required>
                        <input type="hidden" name="MovieID" value="<?=$row['MovieID']?>">
                        <input type="submit" value="Add To Cart">
                    </form>
                        <?php
                    echo "</div>";
                    echo "</div>";
                };
                ?>
            </div>
        </div>
    </div>

    <!-- general -->
<!--<div class="product content-wrapper">-->
<!--    <img src="uploads/--><?php //=$product['file_name']?><!--" width="500" height="500" alt="--><?php //=$product['Title']?><!--">-->
<!--    <div>-->
<!--        <h1 class="name">--><?php //=$product['Description']?><!--</h1>-->
<!--        <form action="single-movie.php?page=cart" method="post">-->
<!--            <input type="number" name="quantity" value="1" min="1" max="--><?php //=$product['Stock']?><!--" placeholder="Stock" required>-->
<!--            <input type="hidden" name="product_id" value="--><?php //=$product['MovieID']?><!--">-->
<!--            <input type="submit" value="Add To Cart">-->
<!--        </form>-->
<!--        <div class="description">-->
<!--            --><?php //=$product['Description']?>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<?php
# Include footer
include('includes/footer.php');
?>