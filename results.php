<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Jack Turner">
    <link rel="stylesheet" href="Styles/Style.css">
    <title>Homepage</title>
    <script src="scripts/page_init.js" async> </script>
</head>
<body>

<?php require_once "inc/header.inc.php"; ?>

<!--Search Bar Form
    Post to results.php
-->

<div class="results">
<!-- get search term from GET parameter and then preprare the sql statement and execute-->
<?php
    $search = '%' . $_GET["search"] . '%';
    if(isset($_GET["search"])) {
        global $conn;
        require_once "scripts/dbconnect.php";
        $sql = "SELECT * from Items where brand like ? or item_name like ? or description like ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $search, $search, $search);
        $stmt->execute();
        if ($result = $stmt->get_result()) {
            $num_rows = mysqli_num_rows($result);
            if ($num_rows > 0) {
                if ($num_rows > 1){echo "<h2>" . $num_rows . " Results Found.</h2>";}else{echo "<h2>" . $num_rows . " Result Found.</h2>";}
                while ($row = mysqli_fetch_assoc($result)) {
                    $code = $row['item_code'];
                    $name = $row['item_name'];
                    $price = $row['price'];
                    $descr = $row['description'];
                    $bytes = $row['image_bytes'];
                    echo "<div class='card'> <img src='data:image/jpeg;base64,$bytes'> <h1>" . $name . "</h1><p class='price'>$" . $price . "</p>
            <p><button>Add to Cart</button></p>
            </div>";
                }
            } else {
                echo "<h2>" . $num_rows . " Results Found. Please Try Again.</h2>";
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
