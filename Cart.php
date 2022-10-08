<!-- HTML/CSS Template created by Jeremy Genovese, Cart functionality/dynamic elements (php/JS etc) created by Aziah. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="scripts/page_init.js" user_id="<?php echo $session_value; ?>" async></script>
    <title>Cart</title>
</head>
<body>

<!-- <?php require_once "inc/header.inc.php"; ?> -->
<?php require_once "inc/cart.inc.php"; ?>
<!--Cart-->
<div class="SContainer SCcart">
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>

        </tr>

        <?php
        @session_start();
        require_once "scripts/dbconnect.php";
        $ids = array();

        $sql = "SELECT * FROM Items WHERE item_code = ?";
        global $conn;
        $total = 0;
        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $items){
                $statement = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($statement, $sql); 
                mysqli_stmt_bind_param($statement, 'i', $items['id']);
                mysqli_stmt_execute($statement);
                mysqli_stmt_bind_result($statement, $code, $brand, $name, $descr, $price, $rating, $in_stock, $bytes, $mfl, $musid);
                // mysqli_stmt_fetch($statement);
                if(mysqli_stmt_fetch($statement)){
                        // print image and name
                        echo "<tr>
                            <td>
                            <div class='cartimage'>
                            <img src='data:image/jpeg;base64,$bytes'>" .
                             "<div> <p>" .$name ."</p>
                                    <small>Price:$" .$price ."</small>
                                             <br>    
                                             <a href=''>Remove</a>
                                         </div>
                                         </div>
                                     </td>
                                          
                                          <td><input type='number' value='" .$items['count'] ."'></td>
                                          <td>$" .$items['count']*$price ."</td>
                                     </tr>";
            $total = $items['count']*$price + $total;
            }
            
        }}
        
        mysqli_close($conn);
        
        ?>

        




    </table>

<div class="Tprice">
    <table>
        <tr>
            <td>Subtotal</td>
            <td><?php echo $total; ?></td>
        </tr>
        <tr>
            <td>Tax</td>
            <td><?php echo $total*.1 ?></td>
        </tr>
        <tr>
            <td>Total</td>
            <td><?php echo $total + $total*.1; ?></td>
        </tr>

    </table>
    

</div>
<a href="Purchase.php" class="BTN CartBTN">Purchase</a>

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