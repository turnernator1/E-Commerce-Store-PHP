<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Cart</title>
</head>
<body>

    <div class="Header">
    <div class="Container">
    <div class="topnav">
        <a class="logo">S.E.N.I.O.R</a>
        <a href="home.php"><b class="active">Home</b></a>
        <a href="home.php"><b>Shop</b></a>
        <a href="home.php"><b>Marketplace</b></a>
        <a href="home.php"><b>Support</b></a>
        <div class="topnav-right">
            <a href="home.php"><c>Sign in</c></a>
            <a href="home.php"><c>Cart</c></a>
        </div>
    </div>

<!--Cart-->
<div class="SContainer SCcart">
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>

        </tr>
        <tr>
            <td>
                <div class="cartimage">
                    <img src="Images/test.png">
                    <div>
                        <p>Product name</p>
                        <small>Price:$1000</small>
                        <br>    
                        <a href="">Remove</a>
                    </div>
                </div>
            </td>
            <td>PRODUCT NAME GOES HERE</td>
            <td><input type="number" value="1"></td>
            <td>$100</td>

        </tr>

        <tr>
            <td>
                <div class="cartimage">
                    <img src="Images/test.png">
                    <div>
                        <p>Product name</p>
                        <small>Price:$1000</small>
                        <br>    
                        <a href="">Remove</a>
                    </div>
                </div>
            </td>
            <td>PRODUCT NAME GOES HERE</td>
            <td><input type="number" value="1"></td>
            <td>$100</td>

        </tr>

        <tr>
            <td>
                <div class="cartimage">
                    <img src="Images/test.png">
                    <div>
                        <p>Product name</p>
                        <small>Price:$1000</small>
                        <br>    
                        <a href="">Remove</a>
                    </div>
                </div>
            </td>
            <td>PRODUCT NAME GOES HERE</td>
            <td><input type="number" value="1"></td>
            <td>$100</td>

        </tr>


    </table>

<div class="Tprice">
    <table>
        <tr>
            <td>Subtotal</td>
            <td>$300</td>
        </tr>
        <tr>
            <td>Tax</td>
            <td>$100</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>$400</td>
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