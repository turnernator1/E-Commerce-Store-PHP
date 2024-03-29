<!-- this is the general page users will use to login -->
<?php require_once "inc/session.inc.php";
if(isset($_SESSION['errorMessage'])){
    echo "<script type = 'text/javascript'>
           alert('" . $_SESSION["errorMessage"] ."'); 
           </script>";
    unset($_SESSION['errorMessage']);
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="scripts/caps-lock-on.js" defer></script>
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/login.css">
    
    <meta charset="UTF-8" />
    <meta name="author" content="Aziah Miller" />
    <!-- <script src="scripts/script.js" defer></script> -->
</head>

<!--Top navigation menu-->

<?php require_once "inc/header.inc.php"; ?>
<?php require_once "inc/cart.inc.php"; ?>
<body>
<div class="AccountPage">
    <div class="Container">
        <div class="row">
            <div class="FormContainer login_form">
                <div class="FormBTN">
                    <h2>Account Login</h2>
                    <form id="loginForm" action="scripts/login.php" method="get">
                        Username:
                        <input id="accLine" name="username" type="text" placeholder="Username" required>
                        Password:
                        <input id="p_ass" name="password" type="password" id="password" placeholder="Password" required>
                        <div class="warning"></div>
                        <button type="submit" class="BTN login_button">Login</button>
                    </form>
                    <br>
                    <hr>
                    <br>
                    <h2>HELP!</h2>
                    <form action="account-recovery.php">
                    <button type="submit" class="BTN login_button">Forgotten Password?</button>
                    </form>
                    <form action="register.php">
                    <button type="submit" class="BTN login_button">Create New Account</button>
                    </form>
                </div>
            
</body>
</html>
