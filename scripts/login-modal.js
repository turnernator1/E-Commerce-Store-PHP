//Js script for the login-modal include 
//Author - Aziah Miller
checkout = document.getElementById("checkout_login");
checkout.classList.remove("hidden");

document.getElementById('checkout_login').addEventListener('click', 
function(){
    mod = document.getElementById("modal-login");
    mod.classList.remove("hidden");
});

document.getElementById('close').addEventListener('click', 
function(){
    mod = document.getElementById("modal-login");
    mod.classList.add("hidden");
});


