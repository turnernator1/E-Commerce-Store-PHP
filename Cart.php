<?php require_once "inc/session.inc.php";
if(isset($_SESSION['errorMessage'])){
    echo "<script type = 'text/javascript'>
           alert('" . $_SESSION["errorMessage"] ."'); 
           </script>";
    unset($_SESSION['errorMessage']);
}?>

<!-- HTML/CSS Template created by Jeremy Genovese, Cart functionality/dynamic elements (php/JS/login modal/cart empty handling etc) created by Aziah. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="scripts/page_init.js" user_id="<?php echo $session_value; ?>" async></script>
    <script src="scripts/cart-remove.js" defer></script>
    <title>Cart</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
</head>
<body>

<?php require_once "inc/header.inc.php"; ?>
<?php require_once "inc/cart.inc.php"; ?>

<!--Cart-->

<!-- Hide the checkout if the user's cart is empty. If they are not logged in ask them to login or continue as guest, and then redirect to home  -->

<?php
    if(isset($_SESSION['user_id']) and (!(isset($_SESSION['total_prd_cnt']) and $_SESSION['total_prd_cnt'] > 0))){
        //don't show modal
        echo "<span class='center'>
        <h1 class='title cart'>Your cart is empty</h1>
        <p>Come back here when you have added a product to your cart.
        </span";
        
    }elseif(!(isset($_SESSION['total_prd_cnt']) and $_SESSION['total_prd_cnt'] > 0))
    {
        
        require_once "inc/login-modal.inc.php";
        echo '<script src="scripts/login-empty-cart.js" defer></script>';
    }else{
echo 
'<div class="SContainer SCcart">
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>

        </tr>';

        
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
                                             <form id='form__submit' action='inc/cart.inc.php' method='post'> 
                                             <input type='text' name='prod_id' class='hidden' value='" .$code ."'>   
                                             <a href='#' onclick='submitForm()'>Remove</a>
                                             </form>
                                         </div>
                                         </div>
                                     </td>
                                          
                                          <td><p>   " .$items['count'] ."</p></td>
                                          <td>$" .$items['count']*$price ."</td>
                                     </tr>";
                                     
            $total = $items['count']*$price + $total;
            }
            
        }}
        
        mysqli_close($conn);
    
        

        




 echo '</table>

<div class="Tprice">
    <table>
        <tr>
            <td>Subtotal</td>
            <td>' .$total .'</td>
        </tr>
        <tr>
            <td>Tax</td>
            <td>' .$total*.1 .'</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>' .($total + $total*.1) .'</td>
        </tr>

    </table>
    

</div>

<button type="button" class="BTN CartBTN hidden" id="checkout_login">Purchase</button>
<a href="Purchase.php" class="BTN CartBTN hidden" id="checkout">Purchase</a>

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
';
 $_SESSION["cart_total"] = ($total + $total*.1) ;
//if user is logged in, no need for login modal to load
if(isset($_SESSION['user_id'])){
    echo '
    <script>
    checkout = document.getElementById("checkout");
    checkout.classList.remove("hidden");
    </script>';
}else{

    echo '<script src="scripts/login-modal.js" defer></script>';
    require_once "inc/login-modal.inc.php";
}

echo'</body>
</html>';
    }