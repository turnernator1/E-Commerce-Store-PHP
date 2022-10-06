<?php
session_start();
//Authors - Jack Turner
$showAlert = false;
$showError = false;
$exists=false;

$session_value = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : '999';
if($session_value != '') {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Include file which makes the
        // Database Connection.
        global $conn;
        require_once 'dbconnect.php';

        $brand = $_POST["brand"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $descr = $_POST["descr"];
        $bytes = base64_encode(file_get_contents($_FILES["bytes"]["tmp_name"]));
        $user_id = $session_value;
        // random item code not already in database
        $item_code = null;
        $item_codeexist = false;
        // check random code doesnt already exist
        while(!$item_codeexist){
            echo "<h1>generating item code</h1>";
            $item_code = random_int(55000,55999);
            $sql = "select item_code from items where item_code = $item_code";
            $result = mysqli_query($conn, $sql);
            $numrows = mysqli_num_rows($result);
            if($numrows == 0){
                echo "<h1>item code okay</h1>";
                $item_codeexist = true;
            }
        }
        // echo for debugging
        echo "<h1>inserting</h1>";
        echo "<h1>" . $brand . " - ". $name . " - ". $price . " - ". $descr . " - ". $bytes . " - ". $user_id . " - ". $item_code . "</h1>";
        $sql = "INSERT INTO `items` ( `item_code`,`brand`, 
                `item_name`, `price`,`description`, `image_bytes`, `in_stock`,`marketplace_flag`, `marketplace_userid`) VALUES (?,?,?, 
                ?, ?, ?,1,1,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issdssi", $item_code,$brand, $name, $price,$descr,$bytes,$user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if (!$result){
            //error in upload
            $showError = "Error in upload";
        }
        //redirect to account?
        echo "<h1>Upload Succesfull!</h1>";
        //return to home page, maybe make this direct to profile so the user can see thier updated listings
        header("Location: ../home.php");



    }//end if
}else {
    echo "<h1>User not signed in</h1>";
//Error user not signed in
}
?>
