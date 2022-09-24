<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles/Style.css">
    <title>Homepage</title>
    <script>let username = null </script>
    <script>document.cookie = "user="+username;</script>
    <script>document.cookie = "user=Jack";</script>
    <script src="scripts/script.js"> </script>
    <script>username = get_username()</script>
</head>
<body>

<!--Top navigation menu-->

<div class="topnav">
    <a>S.E.N.I.O.R</a>
    <b class="active" href="#home">Home</b>
    <b href="#news">News</b>
    <b href="#contact">Contact</b>
    <b href="#about">About</b>
    <script>
        if (username != null){ // cookie?? or just a js or html flag
            document.write('<b href="#account" id="signin"> My Account</b>')
        } else {
            document.write('<b href="#signin" id="signin">Sign In / Register</b>')
        }
    </script
    </script>
</div>

<h2>Welcome, <script>'<h2>' + document.write(username) +'<h2>'</script></h2>

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
        echo "<div class='card'> <img src='data:image/jpeg;base64,$bytes'> <h1 class='brand'>" . $brand . "</h1><h2 class='name'>" . $name . "</h2><p class='price'>$". $price . "</p>
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