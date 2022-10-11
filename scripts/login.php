<?php
//Authors - Jack Turner & Aziah Miller
session_start();
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
    $url = $_GET['url'];
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
        $_SESSION["errorMessage"]= "Username does not exist.";
        header("Location: ../signin.php"); //no account found
    }
    else {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])){
            echo "<h1>Login Successful</h1>";
            $showAlert = 'Login Successful';
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['name'] = $row['preferred'];
            
            //Added conditonal to redirect to purchase page if user logs in with cart login modal prior to purchase - Az
            if($url === "cart"){
                header("Location: ../purchase.php");
            }elseif($url === "cart_page"){
                header("Location: ../cart.php");
            }else{
                header("Location: ../home.php");
            }
        } else {
            $_SESSION["errorMessage"]= "Incorrect Password!";
            header("Location: ../signin.php");
        }

    }// end if

}//end if

?>