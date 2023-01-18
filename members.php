

<?php
# Set page title
$page_title = "Account";
# Include header file
include('includes/header.php');
require_once ("db.php");

session_start();
$user = $_SESSION['user'];

// if statement to check if user is logged in
if(isset($_SESSION['logged-in'])) {

$userPrivilege = "SELECT Privileges FROM users WHERE Username = '$user'";
$userPrivilegeResult= mysqli_query($conn, $userPrivilege) or die ("couldn't run query");
$userPrivilegeResult2 = $userPrivilegeResult->fetch_assoc()['Privileges'];

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
    echo "<td><input type='submit' name='insertMovie' class='btn btn-primary'  value='insert'></td>";
    echo "</tr>";
    echo "</div>";
    echo "</div>";
    echo "</form>";
}
?>


<div class="container">
    <p class="text-center m-3 ">
        <a class="btn btn-info mt-2" data-bs-toggle="collapse" href="#multiCollapseExample6" role="button" aria-expanded="false" aria-controls="multiCollapseExample6">Hide all details</a>
    </p>
    <div class="row">
        <div class="col-12">
            <div class="collapse show " id="multiCollapseExample6">
                <div>Welcome : <?php
                    echo "$user . You are successfully logged in";
                    echo "<br>";

                    echo "<br>";
                    echo "Your privileges are: " .$userPrivilegeResult2;

                    echo "<br>";
                    echo "Legend: A = admin, C = customer";

                    $dobQuerry = "SELECT DOB FROM users WHERE Username = '$user'";
                    $dobResult = mysqli_query($conn, $dobQuerry) or die ("couldn't run query");
                    $dobResult2 = $dobResult->fetch_assoc()['DOB'];
                    echo "Your date of birth is:" .$dobResult2;
                    //$dobResult2 = "1990-01-03";
                    list($year, $month, $day) = explode('-' , $dobResult2);
                    $birthDate = mktime(0, 0, 0, $month, $day, $year);
                    echo "<br>";
                    //        echo "Your age is: " .(date('Y') - date('Y', $birthDate));
//                    echo "total ammount of seconds that have passed between UNIX epoch and DOB: " .$birthDate;
                    echo "<br>";
//                    echo "total ammount of seconds that have passed between UNIX epoch and today: " .time();
                    echo "<br>";
                    $timeDifference = time() - $birthDate;
//                    echo "total ammount of seconds that have passed between DOB and today: " .$timeDifference;
                    echo "<br>";
                    $age = floor($timeDifference / 31556926); // 31556926 is the number of seconds in a year
                    echo "Your age is: " .$age;
                    $_SESSION['age'] = $age;
                    echo "<br>";
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
                    ?></div>
                <br>
                <p>Great to see you again</p>
                <br>

                <?php
                if($userPrivilegeResult2 == "A") {
                    echo "You are an admin";
                    echo "<br>";
                    echo "Welcome to Admin page";
                    echo "<br>";

                    ?>
            </div>
        </div>
    </div>
    </div>

    <div class="container p-0">
        <p class="text-center m-3 ">
            <a class="btn btn-primary mt-2" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Add Movie</a>
            <button class="btn btn-primary mt-2 " type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Edit Movies</button>
            <button class="btn btn-primary mt-2 " type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample3">Display Movies</button>
            <button class="btn btn-primary mt-2 " type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample4" aria-expanded="false" aria-controls="multiCollapseExample4">Edit Users</button>
            <button class="btn btn-primary mt-2 " type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample5" aria-expanded="false" aria-controls="multiCollapseExample5">Display your details</button>
            <button class="btn btn-primary  mt-2" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2 multiCollapseExample3 multiCollapseExample4 multiCollapseExample5">Show all</button>
        </p>
        <div class="row">
            <div class="col-12">
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <?php
                    echo "<h2>Add new movie</h2>";
                    addMovie();
                    ?>
                </div>
            </div>
            <div class="col-12">
                <div class="collapse multi-collapse" id="multiCollapseExample2">
                    <?php
                    echo "<h2>Edit movie</h2>";
                    $statusMsg = '';
                    $targetDir = "uploads/";
                    $fileName = basename($_FILES["file"]["name"]);
                    $targetFilePath = $targetDir . $fileName;
                    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

                    if(isset($_POST["updateMovie"])){
                        // Allow certain file formats
                        $allowTypes = array('jpg','png','jpeg','gif','JPG','PNG','JPEG','GIF');
                        if(in_array($fileType, $allowTypes)){
                            // Upload file to server
                            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                                // Insert image file name into database
                                $update = $conn->query("UPDATE movies SET Title = '$_POST[Title]',Description = '$_POST[Description]', Category = '$_POST[Category]', Type = '$_POST[Type]', `Age restricted` = '$_POST[Agerestricted]' ,`Display time 1` = '$_POST[Display1]',`Display time 2` = '$_POST[Display2]',`Display time 3` = '$_POST[Display3]', file_name = '".$fileName."', Stock = '$_POST[Stock]', Rating = '$_POST[Rating]', Likes = '$_POST[Likes]', Length = '$_POST[Length]', file_name_narrow = '".$fileName."' WHERE MovieID = ".$_POST['hidden']);
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

                    // Display status message
                    echo $statusMsg;


                    if (isset($_POST['delete'])) {
                        $deleteQuerry = "DELETE FROM movies WHERE MovieID = '$_POST[hidden]'";
                        mysqli_query($conn, $deleteQuerry) or die ("couldn't run query");
                        echo 'Movie deleted';
                    }





                    $statusMsg = '';
                    $targetDir = "uploads/";
                    $fileName = basename($_FILES["file"]["name"]);
                    $targetFilePath = $targetDir . $fileName;
                    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

                    if(isset($_POST["insertMovie"]) && !empty($_FILES["file"]["name"])){
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
                        echo "<td><input type='submit' name='updateMovie' class='btn btn-success me-1 mt-1' onclick='updateMovie()' value='update'></td>";
                        echo "<td><input type='submit' name='delete' class='btn btn-danger me-1 mt-1'  onclick='deleted()' value='delete'></td>";
                        echo "</tr>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</form>";
                    }

                    ?>
                </div>
            </div>
            <div class="col-12">
                <div class="collapse multi-collapse" id="multiCollapseExample3">
                    <h2>Available movies</h2>
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <?php
                            $resultMovies = mysqli_query($conn, "SELECT * FROM movies");
                            $i = 1;
                            $numberofMovie = $i++;
                            while ($row = mysqli_fetch_array($resultMovies, MYSQLI_ASSOC)) {
                                echo "<div class='col-md-6 col-sm-12 shadow-sm p-3 d-flex flex-column mb-3'>";
                                echo "<table class='table table-striped table-hover'>";
                                echo "<tr>";
                                echo "<td>$numberofMovie</td>";
                                echo "<td><img src='uploads/".$row['file_name']."' class='card-img-top' ></td>";
                                echo "</tr>";
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
                                echo "</table>";
                                echo "</div>";
                                $numberofMovie++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-5">
                <div class="collapse multi-collapse" id="multiCollapseExample4">
                    <?php
                    $resultAdmin = mysqli_query($conn, "SELECT * FROM users");
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
                        echo "<td><input type='date' class='form-control' name='dob' value='" . $row['DOB'] . "'></td>";
                        echo "<td><input type='text' class='form-control' name='Privileges' value='" . $row['Privileges'] . "'></td>";
                        echo "<td><input type='submit' name='update' class='btn btn-success' onclick='update2()' value='update'></td>";
                        echo "<td><input type='submit' name='delete' class='btn btn-danger'  onclick='deleted()' value='delete'></td>";
                        echo "</tr>";
                        echo "</form>";
                    }
                    registerUser(); // calling function to insert new user
                    echo "</table>";

                    ?>
                </div>
            </div>

            <div class="col-12 mb-5">
                <div class="collapse multi-collapse" id="multiCollapseExample5">
                    <?php
                    $resultSingleUser = mysqli_query($conn, "SELECT * FROM users WHERE Username = '$user'");

                    echo "<div class='single user'>";

                    echo "<table border='1'>
                        <tr>
                            <th>UserID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>First Name</th>
                            <th>Surname</th>
                            <th>Date of birth</th>
                        </tr>";

                    while ($row = mysqli_fetch_array($resultSingleUser, MYSQLI_ASSOC)) {
                        echo "<form action='members.php' method='post'>";
                        echo "<tr>";
                        echo "<td><input type='text' class='form-control' name='hidden' value='" . $row['UserID'] . "'></td>";
                        echo "<td><input type='text' class='form-control' name='Username' value='" . $row['Username'] . "'></td>";
                        echo "<td><input type='text' class='form-control' name='Password' value='" . $row['Password'] . "'></td>";
                        echo "<td><input type='text' class='form-control' name='FirstName' value='" . $row['FirstName'] . "'></td>";
                        echo "<td><input type='text' class='form-control' name='Surname' value='" . $row['Surname'] . "'></td>";
                        echo "<td><input type='date' class='form-control' name='dob' value='" . $row['DOB'] . "'></td>";
                        echo "<td><input type='submit' name='update' class='btn btn-success' onclick='update2()' value='update'></td>";
                        echo "<td><input type='submit' name='delete' class='btn btn-danger'  onclick='deleted()' value='delete'></td>";
                        echo "</tr>";
                        echo "</form>";
                    }
                    echo "</table>";

                    echo "</div>";
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}
else {
    echo "You are customer without admin privileges";
    ?>
    <div class="container p-0">
        <p class="text-center m-3 ">
            <button class="btn btn-primary mt-2 " type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample5" aria-expanded="false" aria-controls="multiCollapseExample5">Display your details</button>
        </p>
        <div class="row">
            <div class="col-12 mb-5">
                <div class="collapse multi-collapse" id="multiCollapseExample5">
                    <?php
                    $resultSingleUser = mysqli_query($conn, "SELECT * FROM users WHERE Username = '$user'");

                    echo "<div class='single user'>";

                    echo "<table border='1'>
                                <tr>
                                    <th>UserID</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>First Name</th>
                                    <th>Surname</th>
                                    <th>Date of birth</th>
                                </tr>";

                    while ($row = mysqli_fetch_array($resultSingleUser, MYSQLI_ASSOC)) {
                        echo "<form action='members.php' method='post'>";
                        echo "<tr>";
                        echo "<td><input type='text' class='form-control' name='hidden' value='" . $row['UserID'] . "'></td>";
                        echo "<td><input type='text' class='form-control' name='Username' value='" . $row['Username'] . "'></td>";
                        echo "<td><input type='text' class='form-control' name='Password' value='" . $row['Password'] . "'></td>";
                        echo "<td><input type='text' class='form-control' name='FirstName' value='" . $row['FirstName'] . "'></td>";
                        echo "<td><input type='text' class='form-control' name='Surname' value='" . $row['Surname'] . "'></td>";
                        echo "<td><input type='date' class='form-control' name='dob' value='" . $row['DOB'] . "'></td>";
                        echo "<td><input type='submit' name='update' class='btn btn-success' onclick='update2()' value='update'></td>";
                        echo "<td><input type='submit' name='delete' class='btn btn-danger'  onclick='deleted()' value='delete'></td>";
                        echo "</tr>";
                        echo "</form>";
                    }
                    echo "</table>";

                    echo "</div>";
                    ?>
                </div>
            </div>
        </div>
    </div>


    <?php
}
?>


<!--</div>-->
F
    <?php


}
// else statement to checked if user is logged in
else {
    echo '<div class="container">';
    echo 'not logged yet';
    echo '<br>';
    echo 'Please login';
    echo '<br>';
    echo 'You will be redirected to the main page in 5 seconds';
    echo '</div>';
    echo '<script>';
    echo 'setTimeout(function(){window.location.href = "http://23.102.4.246/Limelight-Cinema";}, 5000);';
    echo '</script>';
};
// end of else statement
?>






<?php
# Include footer
include('includes/footer.php');
?>

