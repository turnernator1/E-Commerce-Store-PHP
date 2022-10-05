<?php
//Authors - Jack Turner & Aziah Miller
$showAlert = false;
$showError = false;
$exists=false;

if($_SERVER["REQUEST_METHOD"] == "GET") {

    // Include file which makes the
    // Database Connection.
    global $conn;
    require_once 'dbconnect.php';

    $username = $_GET["username"];
    $password = $_GET["password"];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    echo "<h1>finding " . $username. " with hash " . $hash."</h1>";
    $sql = "Select * from Users where username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $num = mysqli_num_rows($result);
    echo "<h1>Num rows : " . $num."</h1>";

    if($num == 0) {
        echo "<h1>Account does not exist</h1>";
        $showError = "Account does not exist"; //no account found
    }
    else {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])){
            echo "<h1>Login Successful</h1>";
            $showAlert = 'Login Successful';
            header("Location: home.php");
        } else {
            echo "<h1>Incorrect Password</h1>";
            $showAlert = 'Incorrect Password';
        }

    }// end if

}//end if

?>