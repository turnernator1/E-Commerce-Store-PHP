<!-- this is the general page users will use to login -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/login.css">
    <meta charset="UTF-8" />
    <meta name="author" content="Aziah Miller" />
    <!-- <script src="scripts/script.js" defer></script> -->
</head>

<!--Top navigation menu-->

<?php require_once "inc/header.inc.php"; ?>

<body>
<div>
<h1>Account Login</h1>
</div>

<div class="Login_Form">
<form class="login" action="scripts/login_check.php">
    <label for="uname"></label>
    <input type="text" id="uname" name="uname" placeholder="Username" required>

    <label for="password"></label>
    <input type="password" id="password" name="password" placeholder="Password" required>
</form>
</div>
<!-- <?php require_once "inc/menu.inc.php"; ?> -->
    

</body>
</html>
