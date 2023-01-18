
<?php
require_once ("db.php");

session_start();

$user = $_SESSION['user'];

$time = $_POST['screening_time'];
$quantity = $_POST['quantity'];
$movieID = $_SESSION['movieID'];

$stock = mysqli_query($conn, "SELECT * FROM movies WHERE MovieID = " . $movieID);
while ($row = mysqli_fetch_array($stock, MYSQLI_ASSOC)) {
    $stock = $row['Stock'];
    echo $stock;

    $order = mysqli_prepare($conn, "INSERT INTO `orders` (Username, Screening_time, Tickets_number, MovieID) VALUES ('$user', '$time', '$quantity', '$movieID')");
    if($order !== FALSE){
        if(mysqli_stmt_execute($order)){
            $_SESSION['time'] = $time;
            $_SESSION['quantity'] = $quantity;
            $_SESSION['movieID'] = $movieID;
            $_SESSION['title'] = $row['Title'];

            echo "Order placed successfully";
            echo "<br>";
            echo "You will be redirected to the login page in 5 seconds";
            echo "<br>";
            echo "Your order details are as follows:, $user, $time, $quantity, $movieID,STOCK:  $stock";
            if ($stock > 0) {
                $stock = $stock - $quantity;
                echo $stock;
                $update = mysqli_query($conn, "UPDATE movies SET Stock = '$stock' WHERE MovieID = '$movieID'");
                if ($update) {
                    echo "Stock updated successfully";
                } else {
                    echo "Error updating stock";
                }
            } else {
                echo "Stock is empty";
            }
        header("location:thank-you.php");
        } else {
            echo mysqli_stmt_error($order);
        }
    } else{
        echo mysqli_error($conn);
    }
}





?>