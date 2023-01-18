<?php


session_start();
// if the user is logged in, unset the session

if (isset($_SESSION['logged-in'])) {
    session_destroy();
    header('Location:index.php');
    echo "You are logged out";
}
else {
    echo "You are not logged in";
    session_destroy();

}

?>



