<?php require_once "inc/session.inc.php";
if(isset($_SESSION['errorMessage'])){
    echo "<script type = 'text/javascript'>
           alert('" . $_SESSION["errorMessage"] ."'); 
           </script>";
    unset($_SESSION['errorMessage']);
}?>
<!-- this is the general page users will use to login -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up | New User Register</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/login.css">
    <script src="scripts/page_init.js" user_id="<?php echo $session_value; ?>" async></script>
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
                <div id="regFormCont" class="FormContainer registration_form">
                    <div class="FormBTN">
                        <!-- <span> -->
                        <h2 id="signupTitle">Enter your Details To Join</h2>
                        <br>

                        <br>
                        <!-- </span> -->
                        <form id="signupForm" action="scripts/signup.php" method="post">
                            <div id="regSubHead"> Username: </div>
                            <input id="signupField" name="username" type="text" placeholder="Username" required> <br>
                            <div id="regSubHead"> First Name: </div>

                            <select id="signupSelect" name="title">
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Ms">Ms</option>
                                <option value="-">Other</option>
                            </select>
                                <input id="signupField" name="preferred" type="text" placeholder="First name" required> <br>
                                <div id="regSubHead"> Surname: </div>
                                <input id="signupField" name="surname" type="text" placeholder="Last name" required><br>
                                <div id="regSubHead"> Email: </div>
                                <input id="signupField" name="email" type="email" placeholder="Email address" required><br>
                                <div id="regSubHead"> Password: </div>
                                <input id="signupField" name="password" type="password" placeholder="Password" required> <br>
                                <div id="regSubHead"> Confirm Password: </div>
                                <input id="signupField"  name="cpassword" type="password" placeholder="Confirm Password" required><br>
                            <div class="tooltip">Tips for a secure password? <br>
                                <span class="tooltiptext">
                                <ul>
                                    <li>Include numbers, symbols, and both uppercase and lowercase.</li>
                                    <li>No personal details.</li>
                                    <li>Use a unique password for every site.</li>
                                </ul>    
                            </div>
                            <br>
                            <button id="signupButton" type="submit" class="BTN login_button register_button">Next</button>
                        </form>
                    </div>

</body>

</html>