<!-- this is the general page users will use to login -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Account Recovery</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/login.css">
    <meta charset="UTF-8" />
    <meta name="author" content="Aziah Miller" />
    <?php require_once "inc/cart.inc.php"; ?>
</head>

<!--Top navigation menu-->

<?php require_once "inc/header.inc.php"; ?>

<body>
<div class="AccountPage">
    <div class="Container">
        <div class="row">
            <div class="FormContainer login_form">
                <div class="FormBTN">
                    <h2>Reset Password</h2>
                    <form action="home.php">
                        <input type="text" placeholder="Username or Email Address" required>
                        <button type="submit" class="BTN login_button">Reset Password</button>
                    </form>
                </div>

</body>
</html>
