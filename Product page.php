<?php
session_start();
$session_value = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : '';

//Get product data from the request to display further down
if($_SERVER["REQUEST_METHOD"] == "GET") {

// Include file which makes the
// Database Connection.
    global $conn;
    require_once 'scripts/dbconnect.php';

    $code = $_GET["item_code"];

    $sql = "Select * from items where item_code=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_assoc($result);
    $code = $row['item_code'];
    $name = $row['item_name'];
    $brand = $row['brand'];
    $price = $row['price'];
    $rating = $row['rating'];
    $descr = $row['description'];
    $bytes = $row['image_bytes'];
}//end if

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?php echo $brand . " - " . $name ?></title>
</head>
<?php require_once "inc/header.inc.php"; ?>
<body>


                <!--Single product-->
<?php
echo
"<div class='=SContainer PPage'>
    <div class='row'>
        <div class='col-2'>
            <img src='data:image/jpeg;base64,$bytes' width='50%' id='PLimg'>

        </div>
        <div class='col-2'>
            <p>" . $brand ."</p>
            <h1>" . $name. "</h1>
            <h4>$" .$price ."</h4>
            <input type='number' value='1'>
            <a href='' class='BTN'>Add to Cart</a> ";
             for ($x = 1; $x<=5;$x++)    {
                        if($x <= $rating){
                        echo " <span class='fa fa-star checked'></span>";
                        }else {
                        echo "<span class='fa fa-star'></span>";
                        }
                    }
echo                "<h3>Description</h3><br>
            <p>" . $descr."</p>
        </div>
    </div>
</div></br></br></br></br>"
?>

          

</div>
</div>
<!--Footer-->

<div class="footer">
    <div class="Container">
        <div class="row">
            <div class="footer-col-1">
                <h3> Footer links go here </h3>

            </div>

            <div class="footer-col-2">
                <h3> Footer links go here </h3>
            
            
            </div>

        </div>
    
    
      
        <h3></h3>
    </div>

    
</div>


</body>
</html>