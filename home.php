<?php $session_value = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : ''; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles/Style.css">
    <title>Homepage</title>
    <script src="scripts/page_init.js" user_id="<?php echo $session_value?>" async> </script>
</head>
<body>


<!-- Includes header  -->
<?php require_once "inc/header.inc.php";
        session_start();
        ?>


<h2 id="welcome"></h2>

<!--Search Bar Form
    Post to results.php
-->

<div class="cards">
<!--Product cards-->
<!--php code to create card element for top n items in database-->
<?php
require_once "scripts/dbconnect.php";
$sql = "SELECT * from Items";
global $conn;
//currently loops 10 times echoing the same html
//needs database conn, retrieve top n items, use vairbales to change price, name, image and text fields

if($result = mysqli_query($conn, $sql)){
    $num_rows = mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)) {
        $code = $row['item_code'];
        $name = $row['item_name'];
        $brand = $row['brand'];
        $price = $row['price'];
        $descr = $row['description'];
        $bytes = $row['image_bytes'];
        echo "<div class='card'> <img src='data:image/jpeg;base64,$bytes'> <h2 class='brand'>" . $brand . "</h2><h1 class='name'>" . $name . "</h1><p class='price'>$". $price . "</p>
        <p><button>Add to Cart</button></p>
        </div>";
    }
}
?>
</div>
<!-- Base card code, now used in php loop
<div class="card"> <img src="images/test.png">
<h1>product name</h1>
<p class="price">$19.99</p>
<p>Some text about the product..</p>
<p><button>Add to Cart</button></p>
</div>
-->






</body>
</html>
