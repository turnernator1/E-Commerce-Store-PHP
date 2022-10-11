//Js script to alter the login modal, this message will apear when a guest goes to cart with no items
//Author - Aziah Miller
checkout = document.getElementById("modal-login");
checkout.classList.remove("hidden");

document.getElementById('close').addEventListener('click', 
function(){
    window.location.href = 'home.php';
});

login_msg = document.getElementById('login_message');
login_msg.innerHTML ='\n        <h2>Your cart is empty!</h2><br>\n        <p>Do you want to login to view your cart?</p>\n';

continue_msg = document.getElementById('continue_message');
continue_msg.innerHTML = "\n                    <h2>Continue shopping</h2>\n                    <p>In a rush? That's fine you can continue without an account.</p>\n                    <form action='home.php'>\n                    <button type='submit' class='BTN login_button'>Continue as guest</button>\n    </form>";


//updates the redirect to the cart page
redirect_data = document.getElementById('redirect_data');
redirect_data.setAttribute('value', 'cart_page');
