<?php

session_start();
//Authors - Jack Turner & Aziah Miller
$showAlert = false;
$showError = false;
$exists=false;


if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include file which makes the
    // Database Connection.
    global $conn;
    require_once 'dbconnect.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $title = $_POST["title"];
    $surname = $_POST["surname"];
    $preferred = $_POST["preferred"];
    $email = $_POST["email"];

    $sql = "Select * from users where username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $num = mysqli_num_rows($result);

    // This sql query is used to check if
    // the username is already present
    // or not in our Database

    if($num == 0) {
        $sql = "Select * from users where email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $enum =mysqli_num_rows($result);
        if($enum == 0){

            if(($password == $cpassword) && $exists==false) {
                $hash = password_hash($password,
                    PASSWORD_DEFAULT);

                // Password Hashing is used here.
                // Creating user in database
                $sql = "INSERT INTO `Users` ( `username`, 
                `password`, `title`,`surname`, `preferred`, `email`,`created`) VALUES (?,?, 
                ?, ?, ?,?,current_timestamp())";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssss", $username, $hash, $title,$surname,$preferred,$email);
                $stmt->execute();
                $result = $stmt->get_result();
                if (!$result) {
                    $_SESSION["errorMessage"]= "Error registering, please try again.";
                    header("Location: ../register.php");
                }
                // getting new users user_id from database for session data
                $sql = "SELECT * FROM Users WHERE username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result=$stmt->get_result();
                $row = mysqli_fetch_assoc($result);
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['name'] = $row['preferred'];
                // return home signed in
                header("Location: ../home.php");

            }

            else {
                $_SESSION["errorMessage"]= "Passwords do not match";
                header("Location: ../register.php");
            }
        }
        if ($enum>0){

            $_SESSION["errorMessage"]= $email . " is already associated with an account. Please try another email";
            header("Location: ../register.php");
        }

    }// end if

    if($num>0)
    {
        $_SESSION["errorMessage"]="Username not available, please try another username";
        header("Location: ../register.php");
    }

}//end if

?>
