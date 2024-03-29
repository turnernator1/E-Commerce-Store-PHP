<?php require_once "inc/session.inc.php"; ?>

<!-- this is the general page users will use to login -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact Us</title>
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
                <div class="FormContainer form" id="contact_form">
                    <div class="FormBTN">
                        <!-- <span> -->
                        <h1>Contact Us</h1>
                        <hr><br>
                        <h4 id="contactText">Can't find the answer to your question or need further support?<br>
                        We aim to respond to all inquiries within 3 business days.
                    </h4>
                        <br>
                        <!-- </span> -->
                        <form class="contact_box" action="home.php">
                            <span class="sideBySide">
                                <input id="contactBoxes" class="left" type="text" placeholder="First name" required>
                                <input id="contactBoxes" class="right" type="text" placeholder="Last name" required>
                            </span>
                            <input id="contactBoxes" type="email" placeholder="Email address" required>
                            <input id="contactBoxes" type="text" placeholder="Subject" required>
                            
                            <label for="details"></label>
                            <p id="contactText">Tell Us More:</p>
                            <textarea rows="7" cols="50" id="details" name="details"></textarea>
                             <button id="contactSubmit"type="submit" class="BTN login_button register_button">SUBMIT</button>
                        </form>
                    </div>

</body>

</html>