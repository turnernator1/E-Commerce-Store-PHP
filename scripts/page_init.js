// this section of code runs when each linked page runs
// it updates the right side nav bar to show
// log in or my account


const signin = document.getElementById("signin");


if (get_username() != ''){
    console.log("Signed in as user " + get_username());
    signin.innerHTML = '<a href="profile.php"> <b>My Account</b></a><a href="scripts/logout.php"><b>Logout</b></a>'
} else {
    signin.innerHTML ='<a href="signin.php"> <b>Sign In / Register </b></a>'
}

// retrieves username from php session passed into script from php
function get_username() {
    try {
        return document.currentScript.getAttribute("user_id");
    }
    catch (err){
        return '';
    }

}




