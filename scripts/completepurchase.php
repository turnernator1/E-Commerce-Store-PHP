<?php
@session_start();

$session_value = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : '';

// Author - Jack Turner

//set up for encyrpting - same variables used to decrypt
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$iv='1234567891011121';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include file which makes the
    // Database Connection.
    global $conn;
    require_once 'dbconnect.php';
    if ($session_value = ''){
        $user_id=null;
    } else {
        $user_id=$_SESSION['user_id'];
    }
    $name = $_POST["firstname"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $postcode = $_POST["postcode"];
    //encrypt card number
    // use user email as the key
    $encryptionkey = $email;
    $cardno = openssl_encrypt($_POST["cardnumber"],$ciphering,$encryptionkey,$options,$iv);
    echo"<h1>" . $cardno . "</h1>";
    $exp = $_POST["expmonth"] . " " . $_POST["expyear"];
    echo"<h1>" . $exp . "</h1>";
    $cvv = openssl_encrypt($_POST["cvv"],$ciphering,$encryptionkey,$options,$iv);
    echo"<h1>" . $cvv . "</h1>";
    $total_cost=$_SESSION["cart_total"];
    //insert purchase
    $sql = "INSERT INTO Purchases (user_id, name, address, suburb, state, postcode, country, price, creditcard_no, creditcard_cvv, creditcard_expiry) VALUES(?,?,?,?,?,?,'Australia',?,?,?,?) ON DUPLICATE KEY UPDATE price = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssidsssd", $user_id,$name,$address,$city,$state,$postcode,$total_cost, $cardno,$cvv, $exp,$total_cost);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$result){
        unset($_SESSION["cart"]);
        $_SESSION['cart'] = array();
        $_SESSION["errorMessage"]= "Purchase Successful!";
        header("Location: ../home.php");
    } else {
        $_SESSION["errorMessage"] = "Error in purchase! Your card was not billed. Please try again.";
        header("Location: ../cart.php");
    }



}

?>