<?php require_once "inc/session.inc.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="scripts/page_init.js" user_id="<?php echo $session_value; ?>" async></script>
    <title>Catalog</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
</head>
<body>

<?php require_once "inc/header.inc.php"; ?>
<?php require_once "inc/cart.inc.php"; ?>

                <!--Products-->

                <div class="SContainer">

                    <div class="row row2">
                        <h2>All Products</h2>
                        <select>
                            <option> All </option>
                            <option> Sort by Price </option>
                            <option> Sort by Populatrity </option>
                            <option> Sort by Rating  </option>
                            <option> On sale </option>

                        </select>

                    </div>




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
        echo "<p> $" . $price."</p></a></div>";}}?>



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


</body>
</html>