
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="scripts/caps-lock-on.js" defer></script>
    <title>Account</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
</head>
<body>

<?php require_once "inc/header.inc.php"; ?>
<?php require_once "inc/cart.inc.php"; ?>
<!--Account-->



<div class="AccountPage">
    <div class="Container">
        <div class="row">
            <div class="FormContainer">
                <div class="FormBTN">
                    <span>Login</span>
                    <button class="BTN" id="ID">Login</button>
                    <form>
                        <input type="text" placeholder="Username">
                        <input type="password" id="password" placeholder="Password">
                        <div class="warning"></div>
                        <a href="">Forgot password</a>
                    </form>
                    
                </div>

            </div>
            <div class="col-2">

            </div>
                <div class="FormContainer">
                    <div class="FormBTN">
                        <span>register</span>

                        <form>
                            <input type="text" placeholder="Username">
                            <input type="email" placeholder="Email">
                            <input type="password" placeholder="Password">
                            <button type="submit" class="BTN">Register</button>
                        </form>

                    </div>

                </div>

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