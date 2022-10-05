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
    $hash = password_hash($password, PASSWORD_DEFAULT);


    $sql = "Select * from Users where username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $num = mysqli_num_rows($result);


    if($num == 0) {
        $showError = "Account does not exist"; //no account found
    }
    else {
        $row = mysqli_fetch_assoc($result);
        if ($hash == $row['password']){
            $showAlert = 'Login Successful';
        } else {
            $showAlert = 'Incorrect Password';
        }

    }// end if

}//end if

?>