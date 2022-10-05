<?php
session_start();
$session_value = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : ''; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Homepage</title>
</head>
<?php require_once "inc/secondheader.inc.php"; ?>

<body>
<div class="content">

<!-- Includes header  -->

<!-- <div class="Header">
    <div class="Container">
    <div class="topnav">
        <a class="logo">S.E.N.I.O.R</a>
        <a href="home.php"><b class="active">Home</b></a>
        <a href="Catalog.php"><b>Shop</b></a>
        <a href="home.php"><b>Marketplace</b></a>
        <a href="Support.php"><b>Support</b></a>
        <div class="topnav-right">
            <a href="signin.php"><c>Account</c></a>
            <a href="signin.php"><c>Sign in</c></a>
            <a href="cart.php"><c>Cart</c></a>
        </div>
    </div> -->


    <!-- Includes header  -->

<div class="row">
    <div class="col-2">
        <h1>Insert Text Here</h1>
        <p> THIS CAN BE USED FOR A BIG ADD </p>
        <a href="" class="BTN">View Product &#8594;</a>
            
    </div>
    <div class="col-2">
            <img src="Images/test.png">
    </div>
    
</div>
</div>
</div>

<!--Featured categories-->
<div class="Categories">
    <div class="SContainer">
     <div class="row">
        <div class="col-3">
            <img src="Images/test.png">

        </div>

        <div class="col-3">
            <img src="Images/test.png">

        </div>

        <div class="col-3">
            <img src="Images/test.png">
        </div>
    </div>

    </div>

</div>

<!--Featured Products-->
<div class="SContainer">
    <h2 class="title">Featured Products</h2>
    <div class="row">
        <div class="col-4">
            <img src="Images/test.png">
            <h4>PRODUCT NAME GOES HERE</h4>
            <div class="Rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
            <p>PRICE GOES HERE $50</p>
            

        </div>

        <div class="col-4">
            <img src="Images/test.png">
            <h4>PRODUCT NAME GOES HERE</h4>
            <div class="Rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
            <p>PRICE GOES HERE $50</p>
            

        </div>

        <div class="col-4">
            <img src="Images/test.png">
            <h4>PRODUCT NAME GOES HERE</h4>
            <div class="Rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
            <p>PRICE GOES HERE $50</p>
            

        </div>

        <div class="col-4">
            <img src="Images/test.png">
            <h4>PRODUCT NAME GOES HERE</h4>
            <div class="Rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
            <p>PRICE GOES HERE $50</p>
            

        </div>

    </div>
    <h2 class="title">New Products</h2>
    <div class="row">
        <div class="col-4">
            <img src="Images/test.png">
            <h4>PRODUCT NAME GOES HERE</h4>
            <div class="Rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
            <p>PRICE GOES HERE $50</p>
            

        </div>

        <div class="col-4">
            <img src="Images/test.png">
            <h4>PRODUCT NAME GOES HERE</h4>
            <div class="Rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
            <p>PRICE GOES HERE $50</p>
            

        </div>

        <div class="col-4">
            <img src="Images/test.png">
            <h4>PRODUCT NAME GOES HERE</h4>
            <div class="Rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
            <p>PRICE GOES HERE $50</p>
            

        </div>

        <div class="col-4">
            <img src="Images/test.png">
            <h4>PRODUCT NAME GOES HERE</h4>
            <div class="Rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
            <p>PRICE GOES HERE $50</p>
            

        </div>

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





</div>
</body>
</html>
