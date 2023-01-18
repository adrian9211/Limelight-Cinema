
<?php

//# Set page title
//$page_title = "Order";

require_once ("db.php");

session_start();

$user = $_SESSION['user'];

$time = $_POST['screening_time'];
$quantity = $_POST['quantity'];
$movieID = $_SESSION['movieID'];

$stock = mysqli_query($conn, "SELECT * FROM movies WHERE MovieID = " . $movieID);
while ($row = mysqli_fetch_array($stock, MYSQLI_ASSOC)) {
    $stock = $row['Stock'];
    $order = mysqli_prepare($conn, "INSERT INTO `orders` (Username, Screening_time, Tickets_number, MovieID) VALUES ('$user', '$time', '$quantity', '$movieID')");
    if($order !== FALSE){
        if(mysqli_stmt_execute($order)){
            $_SESSION['time'] = $time;
            $_SESSION['quantity'] = $quantity;
            $_SESSION['movieID'] = $movieID;
            $_SESSION['title'] = $row['Title'];

            if ($stock >= $quantity) {
                $stock = $stock - $quantity;
                $update = mysqli_query($conn, "UPDATE movies SET Stock = '$stock' WHERE MovieID = '$movieID'");
                if ($update) {
                    header("location:thank-you.php");

                } else {
                    echo "<div class='container order-form'>";
                    echo "<h4 class='text-center'>Error updating stock</h4>";
                    echo "</div>";
                }
            } else {
                # Include header file
                include('includes/header.php');

                echo "<div class='container order-form'>";
                echo "<h4 class='text-center'>Sorry, we don't have enough tickets for this movie. Please try again</h4>";
                echo "</div>";

                # Include footer
                include('includes/footer.php');


            }
        } else {
            echo mysqli_stmt_error($order);
        }
    } else{
        echo mysqli_error($conn);
    }
}

