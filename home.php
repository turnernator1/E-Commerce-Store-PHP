<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles/Style.css">
    <title>Homepage</title>
    <script src="scripts/page_init.js" async> </script>
</head>
<body>

<!--Top navigation menu-->

<<<<<<< HEAD
<div class="topnav">
    <a class="logo">S.E.N.I.O.R</a>
    <a href="home.php"><b class="active">Home</b></a>
    <a href="home.php"><b>Shop</b></a>
    <a href="home.php"><b>Marketplace</b></a>
    <a href="home.php"><b>Support</b></a>
    <div class="topnav-right">
    <a href="home.php"><c><div id = signin></div></c></a>
    </div>
    <form action="results.php" method="get">
        <input  name="search" type="text" placeholder="Search for products.." required>
        <input type="submit" value="Search">
    </form>
    
</div>
=======
<!-- Includes header  -->
<?php require_once "inc/header.inc.php"; ?>
>>>>>>> 1620d184d5ef0f6324775a4e2567d1824c2eadfd

<h2 id="welcome"></h2>

<!--Search Bar Form
    Post to results.php
-->

<div class="cards">
<!--Product cards-->
<!--php code to create card element for top n items in database-->
<?php
require_once "scripts/dbconnect.php";
$sql = "SELECT * from ItemStock";
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