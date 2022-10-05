<?php
//Authors - Jack Turner & Aziah Miller
$showAlert = false;
$showError = false;
$exists=false;

if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Include file which makes the
    // Database Connection.
    global $conn;
    require_once 'scripts/dbconnect.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];


    $sql = "Select * from Users where username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $num = mysqli_num_rows($result);

    // This sql query is use to check if
    // the username is already present
    // or not in our Database
    if($num == 0) {
        if(($password == $cpassword) && $exists==false) {

            $hash = password_hash($password,
                PASSWORD_DEFAULT);

            // Password Hashing is used here.
            $sql = "INSERT INTO `Users` ( `username`, 
                `password`, `date`) VALUES (?, 
                ?, current_timestamp())";
                $sql = "Select * from Users where username=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $hash);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result) {
                $showAlert = true;
            }
        }
        else {
            $showError = "Passwords do not match";
        }
    }// end if

    if($num>0)
    {
        $exists="Username not available";
    }

}//end if

?>
