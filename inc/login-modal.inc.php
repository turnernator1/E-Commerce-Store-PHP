<!--
This popup will occur when user is trying to purchase if they are not logged in.

Will ask them to login or continue as guest.

Author - Aziah Miller
-->

    
<!--Top navigation menu-->

<script src="scripts/login-modal.js" defer></script>

<body>
<div class="background-modal hidden" id="modal-login">
    <div class="modal-content">
        <div id="close">X</div>
        <span class="modal-h1" id="login_message">
        <h2>You are not signed in!</h2><br>
        <p>To use your saved details, do you want to login?</p>
        </span>
        <div class="row">
            <div class=" login_form">
                <div class="FormBTN">
                    <form action="scripts/login.php" method="get">
                        <input name="username" type="text" placeholder="Username" required>
                        <input name="password" type="password" placeholder="Password" required>
                        <!-- Hack to include url data in the request without session/js (hence the in-line hidden styling) -->
                        <input id="redirect_data" name="url" type="hidden" value="cart">
                        <button type="submit" class="BTN login_button">Login</button>
                    </form>
                    <br>
                    <hr>
                    <br>
                    <span class="modal-h1" id="continue_message">
                    <h2>Continue to purchase</h2>
                    <p>In a rush? Click to continue to checkout without logging in.</p>
                    <form action="purchase.php">
                    <button type="submit" class="BTN login_button">Continue as guest</button>
    </form></span>
                </div>
    </div>
    
</div>
            
</body>
</html>
