<?php
//Authors - Jack Turner & Aziah Miller
$showAlert = false;
$showError = false;
$exists=false;

echo "<h1>begin</h1>";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h1>found post</h1>";
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

    echo "<h1>starting query bind</h1>";
    $sql = "Select * from users where username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $num = mysqli_num_rows($result);

    // This sql query is use to check if
    // the username is already present
    // or not in our Database

    if($num == 0) {
        echo "<h1>creating account</h1>";
        if(($password == $cpassword) && $exists==false) {
            echo "<h1>hashing password</h1>";
            $hash = password_hash($password,
                PASSWORD_DEFAULT);

            // Password Hashing is used here.
            echo "<h1>declaring sql with params</h1>";
            $sql = "INSERT INTO `Users` ( `username`, 
                `password`, `title`,`surname`, `preferred`, `email`,`created`) VALUES (?,?, 
                ?, ?, ?,?,current_timestamp())";
            echo "<h1>prepare</h1>";
            $stmt = $conn->prepare($sql);
            echo "<h1>binding params</h1>";
            $stmt->bind_param("ssssss", $username, $hash, $title,$surname,$preferred,$email);
            echo "<h1>execute</h1>";
            $stmt->execute();

            $result = $stmt->get_result();
            echo "<h1>result: " . $result . "</h1>";
            if ($result) {
                $showAlert = true;
            }

        }
        else {
            echo "<h1>passwords not matching</h1>";
            $showError = "Passwords do not match";
        }
    }// end if

    if($num>0)
    {
        echo "<h1>user already exists</h1>";
        $exists="Username not available";
    }

}//end if

?>
