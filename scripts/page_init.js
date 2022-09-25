// this section of code runs when each linked page runs
// it updates the right side nav bar to show
// log in or my account
//updated the html to include working href and maintain bold text
const signin = document.getElementById("signin");
if (get_username() != null){
    signin.innerHTML = '<a href="account.php"> <b>My Account</b></a>'
} else {
    signin.innerHTML ='<a href="signin.php"> <b>Sign In / Register </b></a>'
}

// retrieves username from cookies
function get_username() {
    let cookie = document.cookie
        .split(';')
        .map(cookie => cookie.split('='))
        .reduce((accumulator, [key, value]) => ({ ...accumulator, [key.trim()]: decodeURIComponent(value) }), {})
    return cookie.user;
}

// sets username cookie
function set_username(username){
    document.cookie = "user="+username;
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


