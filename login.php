<?php

require_once ("db.php");
//$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $database) or die('Could not connect: ' . mysqli_connect_error());

$query = "SELECT * FROM users WHERE Username = '$_POST[username]' AND Password = '$_POST[password]'";
$result = mysqli_query($conn, $query ) or die ("couldn't run query");
$count = mysqli_num_rows($result);

mysqli_close($conn);

if($count==1){
    session_start();        //start the session
    $_SESSION['logged-in'] = true;
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['admin'] = $row['admin'];
    $_SESSION['active'] = $row['active'];
//    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['first_name'] = $row['first_name'];
    $_SESSION['email'] = $row['email'];
//    $_SESSION['username'] = $_POST[username];  //set the username session variable
    $_SESSION['user'] = $_POST['username']; //set the username session variable

    $seconds = 5 + time();
    setcookie('loggedin', date("F jS - g:i a"), $seconds, '/');
    header("location:members.php");

    if (isset($_COOKIE['loggedin'])) {
        echo "Welcome, " . $_SESSION['user'] . "!";
    }
    else {
        echo "type message";
    }
}else{
//    echo 'Incorrect username or password. Please try again.';
    header("location:login-error.php");

}



?>

