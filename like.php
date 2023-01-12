<?php
function like() {
    if(isset($_POST['like'])){
        $result2 = mysqli_query($conn, "UPDATE movies SET Likes = Likes + 1 WHERE MovieID = " . $_GET['MovieID']);
    }
    else {
        echo "<h6 class='card-title'> cant save to datbase</h6>";
        echo mysqli_error($conn);
    }
}