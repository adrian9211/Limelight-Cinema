<?php
require_once ("db.php");

session_start();
$user = $_SESSION['user'];
if ( !isset($_SESSION['logged-in']) || $_SESSION['logged-in'] !== true) {

    header('Location:login.php');
    exit;

}

$userPrivilege = "SELECT Privileges FROM users WHERE Username = '$user'";
$userPrivilegeResult= mysqli_query($conn, $userPrivilege) or die ("couldn't run query");
$userPrivilegeResult2 = $userPrivilegeResult->fetch_assoc()['Privileges'];



function registerUser() {
            echo "<form action='members.php' method='post'>";
            echo "<tr>";
            echo "<td><input type='text' class='form-control' name='hidden' placeholder='Do not need to be filled up  ' value='" . $row['UserID'] . "'></td>";
            echo "<td><input type='text' class='form-control' name='Username' value='" . $row['Username'] . "'></td>";
            echo "<td><input type='text' class='form-control' name='Password' value='" . $row['Password'] . "'></td>";
            echo "<td><input type='text' class='form-control' name='FirstName' value='" . $row['FirstName'] . "'></td>";
            echo "<td><input type='text' class='form-control' name='Surname' value='" . $row['Surname'] . "'></td>";
            echo "<td><input type='text' class='form-control' name='dob' value='" . $row['DOB'] . "'></td>";
            echo "<td><input type='submit' name='insert' class='btn btn-primary' onclick='insertUser()' value='insert'></td>";
            echo "</tr>";
            echo "</form>";
        };

function addMovie() {
    echo "<form action='members.php' method='post' enctype='multipart/form-data'>";
    echo "<div class='row'>";
    echo "<div class='col-md-6 col-sm-6 shadow-sm p-3 d-flex flex-column'>";
    echo "<input type='hidden' name='hidden' value='" . $row['MovieID'] . "'>";
    echo "<table class='table table-striped table-hover'>";
    echo "<tr>";
    echo "<td>Title:</td>";
    echo "<td><input type='text' name='Title' value='" . $row['Title'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Description:</td>";
    echo "<td><input type='text' name='Description' value='" . $row['Description'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Category:</td>";
    echo "<td><input type='text' name='Category' value='" . $row['Category'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Type:</td>";
    echo "<td><input type='text' name='Type' value='" . $row['Type'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Age restricted:</td>";
    echo "<td><input type='text' name='Agerestricted' value='" . $row['Age restricted'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Display time 1:</td>";
    echo "<td><input type='time' name='Display1' value='" . $row['Display time 1'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Display time 2:</td>";
    echo "<td><input type='time' name='Display2' value='" . $row['Display time 2'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Display time 3:</td>";
    echo "<td><input type='time' name='Display3' value='" . $row['Display time 3'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Image:</td>";
    echo "<td><input type='file' name='file' value='" . $row['file_name'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Stock</td>";
    echo "<td><input type='text' name='Stock' value='" . $row['Stock'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Rating</td>";
    echo "<td><input type='text' name='Rating' value='" . $row['Rating'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Likes</td>";
    echo "<td><input type='text' name='Likes' value='" . $row['Likes'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Length</td>";
    echo "<td><input type='text' name='Length' value='" . $row['Length'] . "'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><p class='text-muted'>* All fields required</p></td>";
    echo "</tr>";
    echo "</table>";
    echo "</div>";
    echo "<div class='col-md-6 col-sm-12 shadow-sm p-3 d-flex flex-column '>";
    echo "<div class='movie-card'>";
    echo "<img src='uploads/upload.jpeg' class='card-img-top' >";
    echo "<tr>";
    echo "<td><input type='submit' name='insert' class='btn btn-primary'  onclick='insertMovie()' value='insert'></td>";
    echo "</tr>";
    echo "</div>";
    echo "</div>";
    echo "</form>";
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Members</title>
    <link rel="stylesheet" href="css/style.css" title="style" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- banner-slider -->
    <link href="css/jquery.slidey.min.css" rel="stylesheet">
    <!-- //banner-slider -->
    <!-- pop-up -->
    <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //pop-up -->
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <!-- //font-awesome icons -->
    <!-- js -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <!-- //js -->
    <!-- banner-bottom-plugin -->
    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/owl.carousel.js"></script>
    <script>
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({

                autoPlay: 3000, //Set AutoPlay to 3 seconds

                items : 5,
                itemsDesktop : [640,4],
                itemsDesktopSmall : [414,3]

            });

        });
    </script>
    <!-- //banner-bottom-plugin -->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!-- start-smoth-scrolling -->
</head>
<body>
<div class="container">



    <div id="main" class="col-md-auto">
        <nav id="nav">

        </nav>
        <div>Welcome : <?php
            echo "$user";
            echo "<br>";

            echo "<br>";
            echo "Your privileges are: " .$userPrivilegeResult2;

            echo "<br>";
            echo "Legend: A = admin, C = customer";
        ?></div>
        <br>
        <p>Great to see you again</p>
        <br>


        <form action="logout.php" method="post">
            <br>
            <label>Would you like to log out? Just hit button.</label>
            <button type="submit" name="submit" value="submit" class="btn btn-primary" >Logout</button>
        </form>

        <?php
        if ($userPrivilegeResult2 == "A") {


            echo "<h2>Add new movie</h2>";

            addMovie();


            echo "<h2>Edit movie</h2>";
            $statusMsg = '';
            $targetDir = "uploads/";
            $fileName = basename($_FILES["file"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            if(isset($_POST["update"])){
                // Allow certain file formats
                $allowTypes = array('jpg','png','jpeg','gif','JPG','PNG','JPEG','GIF');
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                        // Insert image file name into database
                        $update = $conn->query("UPDATE movies SET Title = '$_POST[Title]',Description = '$_POST[Description]', Category = '$_POST[Category]', Type = '$_POST[Type]', `Age restricted` = '$_POST[Agerestricted]' ,`Display time 1` = '$_POST[Display1]',`Display time 2` = '$_POST[Display2]',`Display time 3` = '$_POST[Display3]', file_name = '".$fileName."', Stock = '$_POST[Stock]', Rating = '$_POST[Rating]', Likes = '$_POST[Likes]', Length = '$_POST[Length]' WHERE MovieID = ".$_POST['hidden']);
                        if($update){
                            $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                        }else{
                            $statusMsg = "File upload failed, please try again.";
                        }
                    }else{
                        $statusMsg = "Sorry, there was an error uploading your file.";
                    }
                }else{
                    $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                }
            }else{
                $statusMsg = 'Please select a file to upload.';
            }


            if (isset($_POST['delete'])) {
                $deleteQuerry = "DELETE FROM movies WHERE MovieID = '$_POST[hidden]'";
                mysqli_query($conn, $deleteQuerry) or die ("couldn't run query");
            echo 'Movie deleted';
            }




            if(isset($_POST["insert"]) && !empty($_FILES["file"]["name"])){
                // Allow certain file formats
                $allowTypes = array('jpg','png','jpeg','gif','JPG','PNG','JPEG','GIF');
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                        // Insert image file name into database
                        $insert = $conn->query("INSERT into  movies (Title, Description, Category, Type, `Age restricted`, `Display time 1`, `Display time 2`, `Display time 3`,file_name, uploaded_on, Stock, Rating, Likes, Length) VALUES ('$_POST[Title]','$_POST[Description]', '$_POST[Category]', '$_POST[Type]', '$_POST[Agerestricted]', '$_POST[Display1]', '$_POST[Display2]', '$_POST[Display3]','".$fileName."', NOW(),'$_POST[Stock]','$_POST[Rating]', '$_POST[Likes]', '$_POST[Length]')");
                        if($insert){
                            $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                        }else{
                            $statusMsg = "File upload failed, please try again.";
                        }
                    }else{
                        $statusMsg = "Sorry, there was an error uploading your file.";
                    }
                }else{
                    $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
                }
            }else{
                $statusMsg = 'Please select a file to upload.';
            }

// Display status message
            echo $statusMsg;


            $result = mysqli_query($conn, "SELECT * FROM movies");



            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo "<form action='members.php' method='post' enctype='multipart/form-data'>";
                echo "<div class='row'>";
                echo "<div class='col-md-6 col-sm-6 shadow-sm p-3 d-flex flex-column'>";
                echo "<input type='hidden' name='hidden' value='" . $row['MovieID'] . "'>";
                echo "<table class='table table-striped table-hover'>";
                echo "<tr>";
                echo "<td>Title:</td>";
                echo "<td><input type='text' name='Title' value='" . $row['Title'] . "'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Description:</td>";
                echo "<td><input type='text' name='Description' value='" . $row['Description'] . "'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Category:</td>";
                echo "<td><input type='text' name='Category' value='" . $row['Category'] . "'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Type:</td>";
                echo "<td><input type='text' name='Type' value='" . $row['Type'] . "'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Age restricted:</td>";
                echo "<td><input type='text' name='Agerestricted' value='" . $row['Age restricted'] . "'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Display time 1:</td>";
                echo "<td><input type='time' name='Display1' value='" . $row['Display time 1'] . "'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Display time 2:</td>";
                echo "<td><input type='time' name='Display2' value='" . $row['Display time 2'] . "'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Display time 3:</td>";
                echo "<td><input type='time' name='Display3' value='" . $row['Display time 3'] . "'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Image:</td>";
                echo "<td><input type='file' name='file' value='" . $row['file_name'] . "'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Stock</td>";
                echo "<td><input type='text' name='Stock' value='" . $row['Stock'] . "'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Rating</td>";
                echo "<td><input type='text' name='Rating' value='" . $row['Rating'] . "'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Likes</td>";
                echo "<td><input type='text' name='Likes' value='" . $row['Likes'] . "'></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>Length</td>";
                echo "<td><input type='text' name='Length' value='" . $row['Length'] . "'></td>";
                echo "</tr>";
                echo "</table>";
                echo "</div>";
                echo "<div class='col-md-6 col-sm-12 shadow-sm p-3 d-flex flex-column'>";
                echo "<div class='movie-card'>";
                echo "<img src='uploads/".$row['file_name']."' class='card-img-top' >";
                echo "<tr>";
                echo "<td><input type='submit' name='update' class='btn btn-success me-1 mt-1' onclick='updateMovie()' value='update'></td>";
                echo "<td><input type='submit' name='delete' class='btn btn-danger me-1 mt-1'  onclick='deleted()' value='delete'></td>";
                echo "</tr>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
            }
//            addMovie(); // calling function to insert new user

        }

        else {
            echo "You are not an admin";
        }
        ?>



        <h2>Available movies</h2>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM movies");

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<div class='row'>";
            echo "<div class='col-md-6 col-sm-6 shadow-sm p-3 d-flex flex-column'>";
            echo "<table class='table table-striped table-hover'>";
            echo "<tr>";
            echo "<td>Title:</td>";
            echo "<td>" . $row['Title'] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Description:</td>";
            echo "<td>" . $row['Description'] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Category:</td>";
            echo "<td>" . $row['Category'] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Type:</td>";
            echo "<td>" . $row['Type'] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Age restricted:</td>";
            echo "<td>" . $row['Age restricted'] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Display time 1:</td>";
            echo "<td>" . $row['Display time 1'] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Display time 2:</td>";
            echo "<td>" . $row['Display time 2'] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Display time 3:</td>";
            echo "<td>" . $row['Display time 3'] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Image:</td>";
            echo "<td><img src='uploads/".$row['file_name']."' class='card-img-top' ></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Stock</td>";
            echo "<td>" . $row['Stock'] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Rating</td>";
            echo "<td>" . $row['Rating'] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Likes</td>";
            echo "<td>" . $row['Likes'] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Length</td>";
            echo "<td>" . $row['Length'] . "</td>";
        }

        ?>
        <h2>Would you like to do some changes in Your database?</h2>

        <?php

        if (isset($_POST['update']))
        {
            $updateQuerry = "UPDATE users SET FirstName = '$_POST[FirstName]', Surname = '$_POST[Surname]', Username = '$_POST[Username]', Password = '$_POST[Password]' ,DOB = '$_POST[dob]',Privileges = '$_POST[Privileges]' WHERE UserID = '$_POST[hidden]'";
            mysqli_query($conn, $updateQuerry) or die ("couldn't run query");
//            echo "Record updated";
        }
        if (isset($_POST['delete']))
        {
            $deleteQuerry = "DELETE FROM users WHERE UserID = '$_POST[hidden]'";
            mysqli_query($conn, $deleteQuerry) or die ("couldn't run query");
//            echo 'User deleted';
        }

        if (isset($_POST['insert']))
        {
            $insertQuerry = "INSERT INTO users (FirstName, Surname, Username, Password, DOB) VALUES ('$_POST[FirstName]', '$_POST[Surname]', '$_POST[Username]', '$_POST[Password]', '$_POST[dob]')";
            mysqli_query($conn, $insertQuerry)
            or die ("couldn't run query");
//            echo "New User record inserted";
        }
        $result = mysqli_query($conn, "SELECT * FROM users WHERE Username = '$user'");
        $resultAdmin = mysqli_query($conn, "SELECT * FROM users");

        //        display all data depends on User Privileges
        if ($userPrivilegeResult2 == "A") {


                echo "<table border='1'>
            <tr>
                <th>UserID</th>
                <th>Username</th>
                <th>Password</th>
                <th>First Name</th>
                <th>Surname</th>
                <th>Date of birth</th>
                <th>Privileges</th>
            </tr>";

                while ($row = mysqli_fetch_array($resultAdmin, MYSQLI_ASSOC)) {
                    echo "<form action='members.php' method='post'>";
                    echo "<tr>";
                    echo "<td><input type='text' class='form-control' name='hidden' value='" . $row['UserID'] . "'></td>";
                    echo "<td><input type='text' class='form-control' name='Username' value='" . $row['Username'] . "'></td>";
                    echo "<td><input type='text' class='form-control' name='Password' value='" . $row['Password'] . "'></td>";
                    echo "<td><input type='text' class='form-control' name='FirstName' value='" . $row['FirstName'] . "'></td>";
                    echo "<td><input type='text' class='form-control' name='Surname' value='" . $row['Surname'] . "'></td>";
                    echo "<td><input type='text' class='form-control' name='dob' value='" . $row['DOB'] . "'></td>";
                    echo "<td><input type='text' class='form-control' name='Privileges' value='" . $row['Privileges'] . "'></td>";
                    echo "<td><input type='submit' name='update' class='btn btn-success' onclick='update2()' value='update'></td>";
                    echo "<td><input type='submit' name='delete' class='btn btn-danger'  onclick='deleted()' value='delete'></td>";
                    echo "</tr>";
                    echo "</form>";
                }
                registerUser(); // calling function to insert new user
                echo "</table>";


        }
        else {

                echo "<table border='1'>
            <tr>
                <th>UserID</th>
                <th>Username</th>
                <th>Password</th>
                <th>First Name</th>
                <th>Surname</th>
                <th>Date of birth</th>
            </tr>";

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo "<form action='members.php' method='post'>";
                    echo "<tr>";
                    echo "<td><input type='text' class='form-control' name='hidden' value='" . $row['UserID'] . "'></td>";
                    echo "<td><input type='text' class='form-control' name='Username' value='" . $row['Username'] . "'></td>";
                    echo "<td><input type='text' class='form-control' name='Password' value='" . $row['Password'] . "'></td>";
                    echo "<td><input type='text' class='form-control' name='FirstName' value='" . $row['FirstName'] . "'></td>";
                    echo "<td><input type='text' class='form-control' name='Surname' value='" . $row['Surname'] . "'></td>";
                    echo "<td><input type='text' class='form-control' name='dob' value='" . $row['DOB'] . "'></td>";
                    echo "<td><input type='submit' name='update' class='btn btn-success' onclick='update2()' value='update'></td>";
                    echo "<td><input type='submit' name='delete' class='btn btn-danger'  onclick='deleted()' value='delete'></td>";
                    echo "</tr>";
                    echo "</form>";
                }
                echo "</table>";

        }
        //        display all data depends on User Privileges


        echo "<br>";
        echo "<br>";
        $dobQuerry = "SELECT DOB FROM users WHERE Username = '$user'";
        $dobResult = mysqli_query($conn, $dobQuerry) or die ("couldn't run query");
        $dobResult2 = $dobResult->fetch_assoc()['DOB'];
        echo "Your date of birth is:" .$dobResult2;
//$dobResult2 = "1990-01-03";
        list($year, $month, $day) = explode('-' , $dobResult2);
        $birthDate = mktime(0, 0, 0, $month, $day, $year);
        echo "<br>";
//        echo "Your age is: " .(date('Y') - date('Y', $birthDate));
        echo "total ammount of seconds that have passed between UNIX epoch and DOB: " .$birthDate;
        echo "<br>";
        echo "total ammount of seconds that have passed between UNIX epoch and today: " .time();
        echo "<br>";
        $timeDifference = time() - $birthDate;
        echo "total ammount of seconds that have passed between DOB and today: " .$timeDifference;
        echo "<br>";
        $age = floor($timeDifference / 31556926); // 31556926 is the number of seconds in a year
        echo "Your age is: " .$age;
        if ($age >= 18)
        {
            echo "<br>";
            echo "<b>You are an adult member</b>";

        }
        else
        {
            echo "<br>";
            echo "<b>You are an junior member</b>";

        }

        mysqli_close($conn);

        ?>





        <!-- banner-bottom -->
        <div class="banner-bottom">
            <div class="container">
                <div class="w3_agile_banner_bottom_grid">
                    <div id="owl-demo" class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                                <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m13.jpg" title="album-name" class="img-responsive" alt=" " />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <h6><a href="single.html">Citizen Soldier</a></h6>
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p>2016</p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="ribben">
                                    <p>NEW</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                                <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m11.jpg" title="album-name" class="img-responsive" alt=" " />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <h6><a href="single.html">X-Men</a></h6>
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p>2016</p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="ribben">
                                    <p>NEW</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                                <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m12.jpg" title="album-name" class="img-responsive" alt=" " />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <h6><a href="single.html">Greater</a></h6>
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p>2016</p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="ribben">
                                    <p>NEW</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                                <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m7.jpg" title="album-name" class="img-responsive" alt=" " />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <h6><a href="single.html">Light B/t Oceans</a></h6>
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p>2016</p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="ribben">
                                    <p>NEW</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                                <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m8.jpg" title="album-name" class="img-responsive" alt=" " />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <h6><a href="single.html">The BFG</a></h6>
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p>2016</p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="ribben">
                                    <p>NEW</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                                <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m9.jpg" title="album-name" class="img-responsive" alt=" " />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <h6><a href="single.html">Central Intelligence</a></h6>
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p>2016</p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="ribben">
                                    <p>NEW</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                                <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m10.jpg" title="album-name" class="img-responsive" alt=" " />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <h6><a href="single.html">Don't Think Twice</a></h6>
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p>2016</p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="ribben">
                                    <p>NEW</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                                <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m17.jpg" title="album-name" class="img-responsive" alt=" " />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <h6><a href="single.html">Peter</a></h6>
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p>2016</p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="ribben">
                                    <p>NEW</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                                <a href="single.html" class="hvr-shutter-out-horizontal"><img src="images/m15.jpg" title="album-name" class="img-responsive" alt=" " />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <h6><a href="single.html">God’s Compass</a></h6>
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p>2016</p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="ribben">
                                    <p>NEW</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //banner-bottom -->










    </div>
</div>
<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    function insertUser() {
        alert("New user added");
    }

    function insertMovie() {
        alert("New movie added");
    }
    function update2() {
        alert("User details updated!");
    }

    function deleted() {
        alert("User deleted!");
    }

    function updateMovie() {
        alert("Movie details updated!");
    }



</script>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>




<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
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