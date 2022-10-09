<?php
session_start();

$session_value = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : ''; ?>
<!--HTML/CSS Template created by Jeremy Genovese, PHP and session implementation by Jack Turner -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="scripts/page_init.js" user_id="<?php echo $session_value; ?>" async></script>
    <title>Homepage</title>
</head>
<!-- Includes header  -->

<?php require_once "inc/header.inc.php"; ?>
<?php require_once "inc/cart.inc.php"; ?>
<body>
<div class="content">



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

            <?php
            require_once "scripts/dbconnect.php";
            $sql = "SELECT * from Items where marketplace_flag = 0";
            global $conn;

            if($result = mysqli_query($conn, $sql)){
                $num_rows = mysqli_num_rows($result);
                while($row = mysqli_fetch_assoc($result)) {
                    $code = $row['item_code'];
                    $name = $row['item_name'];
                    $brand = $row['brand'];
                    $price = $row['price'];
                    $rating = $row['rating'];
                    $descr = $row['description'];
                    $bytes = $row['image_bytes'];
                    // print image and name
                    echo "<div class='col-4'><a href='Product%20page.php?item_code=" . $code."'><img src='data:image/jpeg;base64,$bytes'>" .
                         "<h3>" . $brand ."</h3>" .
                         "<h4>" .$name . "</h4>" .
                         " <div class='Rating'>";
                    //get and print rating
                    for ($x = 1; $x<=5;$x++)    {
                        if($x <= $rating){
                        echo " <span class='fa fa-star checked'></span>";
                        }else {
                        echo "<span class='fa fa-star'></span>";
                        }
                    }
                    echo "</div>";
                    //print price
                    echo "<p> $" . $price."</p></a></div>";
}} ?>
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
</div>
</body>
</html>