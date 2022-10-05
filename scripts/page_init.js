// this section of code runs when each linked page runs
// it updates the right side nav bar to show
// log in or my account


const signin = document.getElementById("signin");

if (get_username() != null){
    console.log("Signed in as user " + get_username());
    signin.innerHTML = '<a href="account.php"> <b>My Account</b></a><a href="scripts/logout.php"><b>Logout</b></a>'
} else {
    signin.innerHTML ='<a href="signin.php"> <b>Sign In / Register </b></a>'
}

// retrieves username from php session passed into script from php
function get_username() {
    try {
        return document.currentScript.getAttribute("user_id");
    }
    catch (err){
        return null;
    }

}


// updates welcome message on homepage
function welcome(){
    const welcome = document.getElementById("welcome");
    if (get_username() != null){
        welcome.innerText = 'Welcome, ' + get_username();
    } else {
        welcome.innerText = 'Welcome, Guest!\nPlease Sign In or Register!';
    }
}


