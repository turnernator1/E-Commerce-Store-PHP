<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles/Style.css">
    <title>Homepage</title>
</head>
<body>

<!--Top navigation menu-->

<div class="topnav">
    <a>S.E.N.I.O.R</a>
    <b class="active" href="#home">Home</b>
    <b href="#news">News</b>
    <b href="#contact">Contact</b>
    <b href="#about">About</b>
</div>

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
    echo "<div class='cards'>";
    while($row = mysqli_fetch_assoc($result)) {
        $code = $row['item_code'];
        $name = $row['item_name'];
        $price = $row['price'];
        $descr = $row['description'];
        $bytes = $row['image_bytes'];
        echo "<div class='card'> <img src='data:image/jpeg;base64,$bytes'> <h1>" . $name . "</h1><p class='price'>$". $price . "</p>
        <p><button>Add to Cart</button></p>
        </div>";
    }
    echo "</div>";
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


<!--form-->
<div class="container">
    <form action="/action_page.php">
        <div class="row">
            <div class="col-25">
                <label for="fname">First Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="fname" name="firstname" placeholder="Your name..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lname">Last Name</label>
            </div>
            <div class="col-75">
                <input type="text" id="lname" name="lastname" placeholder="Your last name..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="country">Country</label>
            </div>
            <div class="col-75">
                <select id="country" name="country">
                    <option value="australia">Australia</option>
                    <option value="canada">USA</option>
                    <option value="usa">OTHER</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="subject">Subject</label>
            </div>
            <div class="col-75">
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <input type="submit" value="Submit">
        </div>
    </form>
</div>



</body>
</html>