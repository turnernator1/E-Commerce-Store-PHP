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

<div class="topnav">
    <a>S.E.N.I.O.R</a>
    <b class="active" href="#home">Home</b>
    <b href="#news">News</b>
    <b href="#contact">Contact</b>
    <b href="Marketplace.php">Marketplace</b>
    <div id = signin></div>
</div>

<!--Search Bar Form
    Post to results.php
-->

<div class="results">
<!-- get search term from GET parameter and then preprare the sql statement and execute-->
<?php
    $search = '%' . $_GET["search"] . '%';
    if(isset($_GET["search"])){
        global $conn;
        require_once "scripts/dbconnect.php";
        $sql = "SELECT * from ItemStock where brand like ? or item_name like ? or description like ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $search,$search,$search);
        $stmt->execute();
        if($result = $stmt->get_result()){
            $num_rows = mysqli_num_rows($result);
            while($row = mysqli_fetch_assoc($result)) {
                $code = $row['item_code'];
                $name = $row['item_name'];
                $price = $row['price'];
                $descr = $row['description'];
                $bytes = $row['image_bytes'];
                echo "<div class='result'> <img src='data:image/jpeg;base64,$bytes'> <h1>" . $name . "</h1><p class='price'>$". $price . "</p>
        <p><button>Add to Cart</button></p>
        </div>";
            }
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